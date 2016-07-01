<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IncomeByPlaneTypesFixture
 *
 */
class IncomeByPlaneTypesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'plane_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'invoice_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'plane_type_key' => ['type' => 'index', 'columns' => ['plane_type_id'], 'length' => []],
            'invoice_key' => ['type' => 'index', 'columns' => ['invoice_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'income_by_plane_types_ibfk_1' => ['type' => 'foreign', 'columns' => ['plane_type_id'], 'references' => ['plane_types', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'income_by_plane_types_ibfk_2' => ['type' => 'foreign', 'columns' => ['invoice_id'], 'references' => ['invoices', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'plane_type_id' => 1,
            'invoice_id' => 1,
            'created' => '2016-06-30 09:11:49'
        ],
    ];
}
