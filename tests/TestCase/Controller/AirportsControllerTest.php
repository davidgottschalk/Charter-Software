<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AirportsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AirportsController Test Case
 */
class AirportsControllerTest extends IntegrationTestCase
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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
