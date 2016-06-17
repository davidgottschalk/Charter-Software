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
    private $unavailableReasons;

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



        if($this->flight['mode'] == 'classicCharter'){

            if($this->evaluateClassicFlight()){

                $this->log('Distance possible', 'debug');
                $this->log($this->flight['availablePlane'], 'debug');
                return true;
            }else{
                $this->log('Distance or Pax!impossible!', 'debug');
                return false;
            }
        }elseif($this->flight['mode'] == 'timeCharter'){
            if($this->evaluateTimeFlight()){
                return true;
            }else{
                return false;
            }
        }

        $this->log($this->unavailableReasons, 'debug');
    }

    private function evaluateTimeFlight(){

        return true;
    }


    private function evaluateClassicFlight(){

        $this->flight['startDate'] = (new \DateTime($this->flight['startDate']))->format('Y-m-d H:i:s');

        $this->flight = $this->Airports->calculateDistances($this->flight); // Distanzen berechnen um zeiten berechnen zu können
        $this->setTechnicallyPossiblePlaneTypes(); // genug platz für pax und Reichweite gut genug?

        $this->getPossibleDatesByPlaneType(); // berechnung der Reisezeit anhand der geschwindigkeit, Stay duration, inkl. Termine
        $this->filterPlaneTypesByAvailableCrew(); // ist zum angegebenen Teilpunkt für den jeweiligen Flug genug Cew vorhanden?

        if(!empty($this->flight['technicallyPossiblePlaneTypes'])){

// $this->log($this->flight['technicallyPossiblePlaneTypes'],'debug');
            foreach($this->flight['technicallyPossiblePlaneTypes'] as $key => $planeType ){

// $this->log('Flugzeug-typ:'.$planeType['type'].'('.$planeType['id'].')','debug');

                if($this->flight['technicallyPossiblePlaneTypes'][$key]['crewAvailable']){ // Crew für diesen Flugzeugtyp vorhanden?

                    if(isset($this->flight['wishedPlaneID']) && $this->flight['wishedPlaneID'] > 0){
                        $plane = $this->Planes->find()->where(['plane_type_id' =>$planeType['id'], 'id' =>$this->flight['wishedPlaneID']])->first();
// $this->log($plane,'debug');
// $this->log('Checke Wunsch Flugzeug Flugzeug-name:'.$plane['plane_name'],'debug');

                        if(isset($plane) && $this->checkPlanAvailablility($planeType, $plane['id'])){
// $this->log('Wunsch Flugzeug verfügbar','debug');
                            $this->flight['availablePlane'] = $plane;
                            return true;
                        }
                    }else{
                        $planes = $this->Planes->find()->where(['plane_type_id' =>$planeType['id']])->all();

                        foreach($planes as $plane){ //gibt es ein Flugzeug das frei ist?

                            if($this->checkPlanAvailablility($planeType, $plane['id'])){
                                $this->flight['availablePlane'] = $plane;
                                return true;
                            }
                        }
                    }

                }
            }
        }else{
            $this->unavailableReasons[] = "Distanz zu weit oder nicht genug Platz.";
        }
        return false;
    }

    private function checkPlanAvailablility( $planeType ,$planesID){
        if( !$this->exists(['start_date <' => $this->flight['startDate'], 'end_date >' => $this->flight['startDate'] ,'plane_id' => $planesID]) && //vor
            !$this->exists(['start_date >' => $this->flight['startDate'], 'end_date <' => $planeType['calculatedEndDate'] ,'plane_id' => $planesID]) && //mitte
            !$this->exists(['start_date <' => $planeType['calculatedEndDate'], 'end_date >' => $planeType['calculatedEndDate'] ,'plane_id' => $planesID]) && //nach
            !$this->exists(['start_date <' => $this->flight['startDate'], 'end_date >' => $planeType['calculatedEndDate'] ,'plane_id' => $planesID]) //umfangend
            ){
            return true;
        }
        return false;
    }

    private function filterPlaneTypesByAvailableCrew(){

        foreach($this->flight['technicallyPossiblePlaneTypes'] as $planeTypeKey => $planeType ){

            $blockedFlights = $this->find()
                ->where([' start_date <' => $this->flight['startDate'], 'end_date >' => $this->flight['startDate']])
                ->orWhere( ['AND' => [
                    ['start_date >' => $this->flight['startDate']], ['end_date <' => $planeType['calculatedEndDate']]
                ]])
                ->orWhere( ['AND' => [
                    ['start_date <' => $planeType['calculatedEndDate']], ['end_date >' => $planeType['calculatedEndDate']]
                ]])
                ->orWhere( ['AND' => [
                    ['start_date <' => $this->flight['startDate']], ['end_date >' => $planeType['calculatedEndDate']]
                ]])
                ->contain(['Users'])
                ->all();

            $blockedUserIds = [];
            foreach($blockedFlights as $blockedFlight){
                foreach($blockedFlight['users'] as $blockedUser){
                    $blockedUserIds[] = $blockedUser->id;
                }
            }
            $availableUsers = $this->Users->find()->where(['Users.id NOT IN' => $blockedUserIds])->contain(['Groups'])->all();
            $this->flight['technicallyPossiblePlaneTypes'][$planeTypeKey]['crewAvailable'] = $this->checkSufficientCrewByPlanetype($planeTypeKey, $availableUsers);
        }
    }

    private function checkSufficientCrewByPlanetype($planeTypeKey, $availableUsers){

            $flightCrewNeeded = $this->flight['technicallyPossiblePlaneTypes'][$planeTypeKey]['flight_crew'];
            $pilotsNeeded = 1;
            $copilotsNeeded = $flightCrewNeeded - 1;

            $crew = ['pilot'=>[],'copilot'=>[],'attendants'=>[]];
            $usedUserIds = [];

            $cabinCrewNeeded = $this->flight['technicallyPossiblePlaneTypes'][$planeTypeKey]['cabin_crew']+$this->flight['additionalAttendants'];

$this->log('Copiloten benötigt:'.$copilotsNeeded,'debug');
$this->log('CabinCrew benötigt:'.$cabinCrewNeeded,'debug');


            foreach($availableUsers as $key => $availableUser){

                if($availableUser['group_id'] == 1 && count($crew['pilot']) != $pilotsNeeded){ //pilot
                    $crew['pilot'][] = $availableUser;
                    $usedUserIds[] = $availableUser->id;
                    continue;
                }
                if($availableUser['group_id'] == 2 && count($crew['copilot']) != $copilotsNeeded){ //copilot
                    $crew['copilot'][] = $availableUser;
                    $usedUserIds[] = $availableUser->id;
                    continue;
                }
                if($availableUser['group_id'] == 3 && count($crew['attendants']) != $cabinCrewNeeded){
                    $crew['attendants'][] = $availableUser;
                    $usedUserIds[] = $availableUser->id;
                    continue;
                }
            }

            if(count($crew['copilot']) != $copilotsNeeded){

                foreach($availableUsers as $key => $availableUser){
                    if($availableUser['group_id'] == 1 && count([$crew['copilot']]) != $copilotsNeeded && !in_array($availableUser->id, $usedUserIds)){ //copilot
                        $crew['copilot'][] = $availableUser;
                    }
                }
            }

            if(count($crew['pilot']) != $pilotsNeeded || count($crew['copilot']) != $copilotsNeeded || count($crew['attendants']) != $cabinCrewNeeded){
                $this->unavailableReasons[] = "Nicht genügen Flugpersonal vorhanden.";
                return false;
            }
            $this->flight['technicallyPossiblePlaneTypes'][$planeTypeKey]['crew'] = $crew;
            return true;
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
    public function getFlight($data){ return $this->flight; }
}
