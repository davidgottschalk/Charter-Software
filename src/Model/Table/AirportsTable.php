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

        return $validator;
    }
}
