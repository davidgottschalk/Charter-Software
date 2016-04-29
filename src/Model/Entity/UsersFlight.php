<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersFlight Entity.
 */
class UsersFlight extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'flight' => true,
        'user' => true,
    ];
}
