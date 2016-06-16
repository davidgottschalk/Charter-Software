<?php
namespace App\Model\Table;

use App\Model\Entity\Plane;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Planes Model
 */
class PlanesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('planes');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('PlaneTypes', [
            'foreignKey' => 'plane_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Flights', [
            'foreignKey' => 'plane_id'
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
            ->requirePresence('plane_name', 'create')
            ->notEmpty('plane_name');

        $validator
            ->add('plane_number', 'valid', ['rule' => 'numeric'])
            ->requirePresence('plane_number', 'create')
            ->notEmpty('plane_number');

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
        $rules->add($rules->existsIn(['plane_type_id'], 'PlaneTypes'));
        return $rules;
    }

    public function getAllPlanes(){

        $planeNames =  $this->find()->select(['plane_name']);
        $planes[0] = 'Bitte wählen';
        $key = 1;
        foreach($planeNames as $planeName){
            $planes[$key]= $planeName->plane_name;
            $key++;
        }

        return $planes;

    }

}
