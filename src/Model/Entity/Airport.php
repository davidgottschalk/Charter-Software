<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Airport Entity.
 */
class Airport extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'city' => true,
        'country' => true,
        'iata_faa' => true,
        'icao' => true,
        'latitude' => true,
        'longitude' => true,
        'altitude' => true,
        'timezone' => true,
        'dst' => true,
        'timezone_db' => true,
        'flights' => true,
    ];
}
