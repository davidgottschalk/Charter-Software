<?php
namespace App\Model\Table;

use App\Model\Entity\Employee;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employees Model
 */
class EmployeesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('employees');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');
            
        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');
            
        $validator
            ->requirePresence('street', 'create')
            ->notEmpty('street');
            
        $validator
            ->requirePresence('country', 'create')
            ->notEmpty('country');
            
        $validator
            ->add('postal_code', 'valid', ['rule' => 'numeric'])
            ->requirePresence('postal_code', 'create')
            ->notEmpty('postal_code');
            
        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');
            
        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');
            
        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');
            
        $validator
            ->add('exit_date', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('exit_date');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        return $rules;
    }
}
