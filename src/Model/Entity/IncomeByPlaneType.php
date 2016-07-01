<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IncomeByPlaneType Entity.
 */
class IncomeByPlaneType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'plane_type_id' => true,
        'invoice_id' => true,
        'plane_type' => true,
        'invoice' => true,
    ];
}
