<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RejectReason Entity.
 */
class RejectReason extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'reason_id' => true,
    ];
}
