<?php
namespace App\Model\Table;

use App\Model\Entity\Airport;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Log\LogTrait;

/**
 * Airports Model
 */
class AirportsTable extends Table
{
    use LogTrait;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('airports');
        // $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsToMany('Flights', [
            'foreignKey' => 'airport_id',
            'targetForeignKey' => 'flight_id',
            'joinTable' => 'airports_flights'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        $validator
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        $validator
            ->allowEmpty('iata_faa');

        $validator
            ->allowEmpty('icao');

        $validator
            ->add('latitude', 'valid', ['rule' => 'decimal'])
            ->requirePresence('latitude', 'create')
            ->notEmpty('latitude');

        $validator
            ->add('longitude', 'valid', ['rule' => 'decimal'])
            ->requirePresence('longitude', 'create')
            ->notEmpty('longitude');

        $validator
            ->add('altitude', 'valid', ['rule' => 'numeric'])
            ->requirePresence('altitude', 'create')
            ->notEmpty('altitude');

        $validator
            ->add('timezone', 'valid', ['rule' => 'numeric'])
            ->requirePresence('timezone', 'create')
            ->notEmpty('timezone');

        $validator
            ->requirePresence('dst', 'create')
            ->notEmpty('dst');

        $validator
            ->requirePresence('timezone_db', 'create')
            ->notEmpty('timezone_db');

        return $validator;
    }

    public function getAllCountries(){
        $countries = $this->find()->select(['country'])->select(['country'])->distinct(['country']);

        $countryNames[0] = 'Bitte wählen Sie ein Land aus.';

        // $key = 1;
        foreach($countries as $country){
            $countryNames[$country->country] = $country->country;
            // $key++;
        }


        return $countryNames;
    }

    public function getAirportsByCountry($country){
        $airports =  $this->find()->where(['country' => $country])->select(['airport_name'])->distinct(['airport_name']);

        $airportNames[0] = 'Bitte wählen Sie einen Flughafen aus.';
        // $key = 1;
        foreach($airports as $airport){
            $airportNames[$airport->airport_name] = $airport->airport_name;
            // $key++;
        }

        return $airportNames;
    }

    public function calculateDistances($data){


        foreach($data['country'] as $key => $country){
            $data['stations'][$key] = $this->getCoordinatesByCountryAndAirport($country, $data['airport'][$key]);
        }

        for ($i=1; $i < count($data['stations']); $i++) {

            $x1 = $data['stations'][$i-1]['latitude'];
            $y1 = $data['stations'][$i-1]['longitude'];

            $x2 = $data['stations'][$i]['latitude'];
            $y2 = $data['stations'][$i]['longitude'];

            $data['stations'][$i]['passedDistance'] = acos(sin($x1=deg2rad($x1))*sin($x2=deg2rad($x2))+cos($x1)*
            cos($x2)*cos(deg2rad($y2) - deg2rad($y1)))*(6378.137);

        }

        return $data;
    }

    public function getCoordinatesByCountryAndAirport($country, $airport){

        $coords =  $this->find()->where(['country' => $country, 'airport_name' => $airport])->select(['latitude','longitude'])->all()->toArray();

        $stations['latitude'] = $coords[0]['latitude'];
        $stations['longitude'] = $coords[0]['longitude'];

        return $stations;

    }

}
