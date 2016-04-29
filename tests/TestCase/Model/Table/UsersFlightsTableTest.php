<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersFlightsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersFlightsTable Test Case
 */
class UsersFlightsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_flights',
        'app.flights',
        'app.customers',
        'app.customer_types',
        'app.planes',
        'app.plane_types',
        'app.airports',
        'app.airports_flights',
        'app.users',
        'app.groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersFlights') ? [] : ['className' => 'App\Model\Table\UsersFlightsTable'];
        $this->UsersFlights = TableRegistry::get('UsersFlights', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersFlights);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
