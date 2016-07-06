<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reporting Entity.
 */
class Reporting extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
         'invoices' => true,
		 'flights' =>true,
		 'value' => true,
		 
    ];
}

?>