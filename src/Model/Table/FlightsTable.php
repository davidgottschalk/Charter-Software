<?php
namespace App\Model\Table;

use App\Model\Entity\Flight;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Log\LogTrait;

/**
 * Flights Model
 */
class FlightsTable extends Table
{

    private $flight;

    use LogTrait;
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('flights');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Planes', [
            'foreignKey' => 'plane_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'flight_id'
        ]);
        $this->belongsToMany('Airports', [
            'foreignKey' => 'flight_id',
            'targetForeignKey' => 'airport_id',
            'joinTable' => 'airports_flights'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'flight_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_flights'
        ]);


    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('flight_number');

        $validator
            ->add('start_date', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('start_date');

        $validator
            ->add('end_date', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('end_date');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['plane_id'], 'Planes'));
        return $rules;
    }


    public function checkAvailability(){

        $this->log('check availability', 'debug');

        $this->flight['startDate'] = (new \DateTime($this->flight['startDate']))->format('Y-m-d H:i:s');

        $this->flight = $this->Airports->calculateDistances($this->flight);
        $this->setTechnicallyPossiblePlaneTypes();



        if(!empty($this->flight['technicallyPossiblePlaneTypes'])){

            $this->log('Distance possible', 'debug');

            $this->registerAvailablePlane();
            $this->registerAvailableCrew();

            $this->log($this->flight, 'debug');

        }else{
            $this->log('Distance or Pax!impossible!', 'debug');
        }
    }

    public function registerAvailableCrew(){

    }

    private function registerAvailablePlane(){

        $this->getPossibleDatesByPlaneType();
        $this->filterPlaneTypesByAvailableCrew();

        foreach($this->flight['technicallyPossiblePlaneTypes'] as $planeType ){

            $planes = $this->Planes->find()->where(['plane_type_id' =>$planeType['id']])->all();

            foreach($planes as $plane){

                if( !$this->exists(['start_date <' => $this->flight['startDate'], 'end_date >' => $this->flight['startDate'] ,'plane_id' => $plane['id']]) && //vor
                    !$this->exists(['start_date >' => $this->flight['startDate'], 'end_date <' => $planeType['calculatedEndDate'] ,'plane_id' => $plane['id']]) && //mitte
                    !$this->exists(['start_date <' => $planeType['calculatedEndDate'], 'end_date >' => $planeType['calculatedEndDate'] ,'plane_id' => $plane['id']]) && //nach
                    !$this->exists(['start_date <' => $this->flight['startDate'], 'end_date >' => $planeType['calculatedEndDate'] ,'plane_id' => $plane['id']]) //umfangend
                    ){
                    $this->flight['availablePlane'] = $plane;
                    return;
                }
            }
        }
    }


    private function filterPlaneTypesByAvailableCrew(){

        foreach($this->flight['technicallyPossiblePlaneTypes'] as $planeType ){


            $this->log('------------------------------------------------------------------------', 'debug');
            $availableUser = $this->find()->orWhere(
                [
                    'NOT' => [' start_date <' => $this->flight['startDate'], 'end_date >' => $this->flight['startDate']] ,
                    'NOT' => ['start_date >' => $this->flight['startDate'], 'end_date <' => $planeType['calculatedEndDate']] ,
                    'NOT' => ['start_date <' => $planeType['calculatedEndDate'], 'end_date >' => $planeType['calculatedEndDate']] ,
                    'NOT' => ['start_date <' => $this->flight['startDate'], 'end_date >' => $planeType['calculatedEndDate']] ,
                ]
                )->contain(['Users'])->all();

            $this->log($availableUser, 'debug');
            $this->log('------------------------------------------------------------------------', 'debug');

        }

    }

    private function getPossibleDatesByPlaneType(){

        $this->calculateTravellTimeByPlaneType();

        foreach($this->flight['technicallyPossiblePlaneTypes'] as $key => $planeType){
            unset($end);

            $end = (new \DateTime($this->flight['startDate']))->modify('+'.ceil($planeType['travellTime']).' hour')->format('Y-m-d H:i:s');
            $this->flight['technicallyPossiblePlaneTypes'][$key]['calculatedEndDate'] = $end;
        }
    }


    private function calculateTravellTimeByPlaneType(){

        foreach($this->flight['technicallyPossiblePlaneTypes'] as $key => $planeType){
            $distance = 0;
            $stayDuration = 0;
            foreach($this->flight['stations'] as $stationKey => $station){
                $distance += (isset($station['passedDistance']))?$station['passedDistance']:0;

                if (isset($this->flight['stayDuration'][$stationKey])){
                    if($this->flight['stayDuration'][$stationKey] < 0.75){
                        $stayDuration += 0.75;
                    }else{
                        $stayDuration += $this->flight['stayDuration'][$stationKey];
                    }
                }
            }
            $nettoStayDuration = $stayDuration; // tatsächliche stay duration
            $this->flight['technicallyPossiblePlaneTypes'][$key]['travellTime'] = ($distance/$planeType['speed'])+$nettoStayDuration;

        }
    }


    private function setTechnicallyPossiblePlaneTypes(){

        // range weit genug und genug Platz für Passagiere
        $longestDistance = $this->getLongestDistance($this->flight);
        $this->flight['technicallyPossiblePlaneTypes'] = $this->Planes->PlaneTypes->find()->where(['max_range >=' => $longestDistance, 'pax >=' => $this->flight['pax']])->order(['speed'=>'DESC'])->all()->toArray();

        return $this->flight;
    }

    private function getLongestDistance($flight){
        $longestDistance = 0;
        foreach($flight['stations'] as $stations){

            if(isset($stations['passedDistance'])  && $longestDistance < $stations['passedDistance']){
                $longestDistance = $stations['passedDistance'];
            }
        }
        return $longestDistance;
    }

    public function setFlight($data){ $this->flight = $data; }

}
