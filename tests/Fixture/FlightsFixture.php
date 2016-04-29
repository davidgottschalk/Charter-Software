<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FlightsFixture
 *
 */
class FlightsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'flight_number' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'customer_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'plane_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'start_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'end_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'plane_key' => ['type' => 'index', 'columns' => ['plane_id'], 'length' => []],
            'customer_key' => ['type' => 'index', 'columns' => ['customer_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'flights_ibfk_1' => ['type' => 'foreign', 'columns' => ['plane_id'], 'references' => ['planes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'flights_ibfk_2' => ['type' => 'foreign', 'columns' => ['customer_id'], 'references' => ['customers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'flight_number' => 'Lorem ipsum dolor ',
            'customer_id' => 1,
            'plane_id' => 1,
            'start_date' => '2016-04-28 13:31:42',
            'end_date' => '2016-04-28 13:31:42',
            'status' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
