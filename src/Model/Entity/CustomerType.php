<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomerType Entity.
 */
class CustomerType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'customers' => true,
    ];
}
