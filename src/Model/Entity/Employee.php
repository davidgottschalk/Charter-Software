<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity.
 */
class Employee extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'street' => true,
        'country' => true,
        'postal_code' => true,
        'username' => true,
        'password' => true,
        'group_id' => true,
        'status' => true,
        'exit_date' => true,
        'group' => true,
    ];
}
