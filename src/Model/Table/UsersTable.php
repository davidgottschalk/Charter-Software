<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\EntityInterface;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Flights', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'flight_id',
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
            ->add('payment', 'valid', ['rule' => 'numeric'])
            ->requirePresence('payment', 'create')
            ->notEmpty('payment');

        $validator
            ->add('exit_date', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('exit_date');

        return $validator;
    }


    public function validationPasswordChange(Validator $validator){
        return $validator
            ->notEmpty('id', __d('bpaVALIDATE', 'required'))
            ->notEmpty('password_old', __d('bpaVALIDATE', 'required'))
            ->notEmpty('password_confirm', __d('bpaVALIDATE', 'required'))
            ->notEmpty('password', __d('bpaVALIDATE', 'required'))
            ->add('password', 'minLength', [
                'rule' => ['minLength', 8],
                'message' => __d('bpaVALIDATE', 'password min size'),
            ])
            ->add('password', 'equal passwords',[
                'rule' => ['compareWith', 'password_confirm'],
                'message' => __d('bpaVALIDATE', 'passwords do not match'),
            ])
            ->add('password_old', 'validate old password', [
                'rule' => 'validateOldPassword',
                'provider' => 'table',
                'message' => __d('bpaVALIDATE', 'User old password false'),
            ])
        ;
    }
    public function validateOldPassword( $oldPassword, $context ){
         $password = $this->get($context['data']['id'])->password;
         return (new DefaultPasswordHasher)->check($oldPassword, $password);
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
