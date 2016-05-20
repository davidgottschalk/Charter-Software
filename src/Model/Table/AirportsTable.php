<?php
namespace App\Model\Table;

use App\Model\Entity\Airport;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Airports Model
 */
class AirportsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('airports');
        $this->displayField('name');
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
}
