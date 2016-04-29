<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlaneType Entity.
 */
class PlaneType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'manufacturer' => true,
        'type' => true,
        'speed' => true,
        'max_range' => true,
        'pax' => true,
        'engine_type' => true,
        'engine_count' => true,
        'hourly_cost' => true,
        'annual_fixed_cost' => true,
        'flight_crew' => true,
        'cabin_crew' => true,
        'planes' => true,
    ];
}
