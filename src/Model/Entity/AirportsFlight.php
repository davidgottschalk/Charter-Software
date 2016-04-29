<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AirportsFlight Entity.
 */
class AirportsFlight extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'flight_id' => true,
        'airport_id' => true,
        'flight_time' => true,
        'stay_duration' => true,
        'order_number' => true,
        'flight' => true,
        'airport' => true,
    ];
}
