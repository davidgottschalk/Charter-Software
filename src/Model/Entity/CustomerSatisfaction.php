<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomerSatisfaction Entity.
 */
class CustomerSatisfaction extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'answer1' => true,
        'answer2' => true,
        'answer3' => true,
        'answer4' => true,
        'answer5' => true,
        'created' => true,
    ];
}

?>
