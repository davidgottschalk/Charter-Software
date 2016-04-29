<?php
namespace App\Model\Table;

use App\Model\Entity\AirportsFlight;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AirportsFlights Model
 */
class AirportsFlightsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('airports_flights');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Flights', [
            'foreignKey' => 'flight_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Airports', [
            'foreignKey' => 'airport_id',
            'joinType' => 'INNER'
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
            ->add('flight_time', 'valid', ['rule' => 'numeric'])
            ->requirePresence('flight_time', 'create')
            ->notEmpty('flight_time');
            
        $validator
            ->add('stay_duration', 'valid', ['rule' => 'numeric'])
            ->requirePresence('stay_duration', 'create')
            ->notEmpty('stay_duration');
            
        $validator
            ->add('order_number', 'valid', ['rule' => 'numeric'])
            ->requirePresence('order_number', 'create')
            ->notEmpty('order_number');

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
        $rules->add($rules->existsIn(['flight_id'], 'Flights'));
        $rules->add($rules->existsIn(['airport_id'], 'Airports'));
        return $rules;
    }
}
