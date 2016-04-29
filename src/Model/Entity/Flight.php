<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Flight Entity.
 */
class Flight extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'flight_number' => true,
        'customer_id' => true,
        'plane_id' => true,
        'start_date' => true,
        'end_date' => true,
        'status' => true,
        'customer' => true,
        'plane' => true,
        'airports' => true,
        'users' => true,
    ];
}
