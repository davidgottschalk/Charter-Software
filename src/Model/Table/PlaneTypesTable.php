<?php
namespace App\Model\Table;

use App\Model\Entity\PlaneType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PlaneTypes Model
 */
class PlaneTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('plane_types');
        $this->displayField('type');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Planes', [
            'foreignKey' => 'plane_type_id'
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
            ->requirePresence('manufacturer', 'create')
            ->notEmpty('manufacturer');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->add('speed', 'valid', ['rule' => 'numeric'])
            ->requirePresence('speed', 'create')
            ->notEmpty('speed');

        $validator
            ->add('max_range', 'valid', ['rule' => 'numeric'])
            ->requirePresence('max_range', 'create')
            ->notEmpty('max_range');

        $validator
            ->add('pax', 'valid', ['rule' => 'numeric'])
            ->requirePresence('pax', 'create')
            ->notEmpty('pax');

        $validator
            ->allowEmpty('engine_type');

        $validator
            ->add('engine_count', 'valid', ['rule' => 'numeric'])
            ->requirePresence('engine_count', 'create')
            ->notEmpty('engine_count');

        $validator
            ->add('hourly_cost', 'valid', ['rule' => 'numeric'])
            ->requirePresence('hourly_cost', 'create')
            ->notEmpty('hourly_cost');

        $validator
            ->add('annual_fixed_cost', 'valid', ['rule' => 'numeric'])
            ->requirePresence('annual_fixed_cost', 'create')
            ->notEmpty('annual_fixed_cost');

        $validator
            ->add('flight_crew', 'valid', ['rule' => 'numeric'])
            ->requirePresence('flight_crew', 'create')
            ->notEmpty('flight_crew');

        $validator
            ->add('cabin_crew', 'valid', ['rule' => 'numeric'])
            ->requirePresence('cabin_crew', 'create')
            ->notEmpty('cabin_crew');

        return $validator;
    }
}
