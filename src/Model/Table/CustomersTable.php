<?php
namespace App\Model\Table;

use App\Model\Entity\Customer;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 */
class CustomersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('customers');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('CustomerTypes', [
            'foreignKey' => 'customer_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Flights', [
            'foreignKey' => 'customer_id'
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
            ->allowEmpty('company');

        $validator
            ->requirePresence('street', 'create')
            ->notEmpty('street');

        $validator
            ->add('postal_code', 'valid', ['rule' => 'numeric'])
            ->requirePresence('postal_code', 'create')
            ->notEmpty('postal_code');

        $validator
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['customer_type_id'], 'CustomerTypes'));
        return $rules;
    }


    public function createDummyCustomer(){

        $customer = $this->newEntity();
        $customer->customer_number = rand(10000000,99999999);
        $customer->first_name = rand(10000000,99999999);
        $customer->last_name = rand(10000000,99999999);
        $customer->company = rand(10000000,99999999);
        $customer->street = rand(10000000,99999999);
        $customer->country = rand(10000000,99999999);
        $customer->postal_code = 12345;
        $customer->customer_type_id = 3;
        $customer->strike = 0;
        $customer->email = rand(10000000,99999999).'@'.'dummy.de';
        $customer->status = CUSTOMER_DUMMY;

        return $this->save($customer);

    }



}
