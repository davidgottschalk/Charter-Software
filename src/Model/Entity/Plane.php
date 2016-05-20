<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plane Entity.
 */
class Plane extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'plane_name' => true,
        'plane_number' => true,
        'plane_type_id' => true,
        'plane_type' => true,
        'flights' => true,
    ];
}
