<?php
namespace App\Model\Table;

use App\Model\Entity\CustomerSatisfaction;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RejectReasons Model
 */
class CustomerSatisfactionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('customer_satisfactions');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
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
            ->add('answer1', 'valid', ['rule' => 'numeric'])
            ->requirePresence('answer1', 'create')
            ->notEmpty('answer1');

        $validator
            ->add('answer2', 'valid', ['rule' => 'numeric'])
            ->requirePresence('answer2', 'create')
            ->notEmpty('answer2');

        $validator
            ->add('answer3', 'valid', ['rule' => 'numeric'])
            ->requirePresence('answer3', 'create')
            ->notEmpty('answer3');

        $validator
            ->add('answer4', 'valid', ['rule' => 'numeric'])
            ->requirePresence('answer4', 'create')
            ->notEmpty('answer4');

        $validator
            ->add('answer5', 'valid', ['rule' => 'numeric'])
            ->requirePresence('answer5', 'create')
            ->notEmpty('answer5');

        return $validator;
    }

}
?>
