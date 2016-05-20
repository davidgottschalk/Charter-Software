<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AirportsFlightsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AirportsFlightsTable Test Case
 */
class AirportsFlightsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.airports_flights',
        'app.flights',
        'app.customers',
        'app.customer_types',
        'app.planes',
        'app.plane_types',
        'app.invoices',
        'app.airports',
        'app.users',
        'app.groups',
        'app.users_flights'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AirportsFlights') ? [] : ['className' => 'App\Model\Table\AirportsFlightsTable'];
        $this->AirportsFlights = TableRegistry::get('AirportsFlights', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AirportsFlights);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
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
