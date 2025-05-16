<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermitsTable Test Case
 */
class PermitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PermitsTable
     */
    protected $Permits;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Permits',
        'app.Roles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Permits') ? [] : ['className' => PermitsTable::class];
        $this->Permits = $this->getTableLocator()->get('Permits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Permits);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PermitsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
