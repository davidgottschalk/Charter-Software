<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncomeByPlaneTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncomeByPlaneTypesTable Test Case
 */
class IncomeByPlaneTypesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.income_by_plane_types',
        'app.plane_types',
        'app.planes',
        'app.flights',
        'app.customers',
        'app.customer_types',
        'app.invoices',
        'app.airports',
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
        $config = TableRegistry::exists('IncomeByPlaneTypes') ? [] : ['className' => 'App\Model\Table\IncomeByPlaneTypesTable'];
        $this->IncomeByPlaneTypes = TableRegistry::get('IncomeByPlaneTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IncomeByPlaneTypes);

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
