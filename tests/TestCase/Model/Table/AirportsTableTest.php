<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AirportsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AirportsTable Test Case
 */
class AirportsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.airports',
        'app.flights',
        'app.customers',
        'app.customer_types',
        'app.planes',
        'app.plane_types',
        'app.invoices',
        'app.airports_flights',
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
        $config = TableRegistry::exists('Airports') ? [] : ['className' => 'App\Model\Table\AirportsTable'];
        $this->Airports = TableRegistry::get('Airports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Airports);

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
}
