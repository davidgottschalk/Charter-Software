<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity.
 */
class Customer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'company' => true,
        'street' => true,
        'postal_code' => true,
        'country' => true,
        'customer_type_id' => true,
        'customer_type' => true,
        'flights' => true,
    ];
}
