<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolesPermitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RolesPermitsTable Test Case
 */
class RolesPermitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RolesPermitsTable
     */
    protected $RolesPermits;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.RolesPermits',
        'app.Rols',
        'app.Pers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RolesPermits') ? [] : ['className' => RolesPermitsTable::class];
        $this->RolesPermits = $this->getTableLocator()->get('RolesPermits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RolesPermits);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RolesPermitsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RolesPermitsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
