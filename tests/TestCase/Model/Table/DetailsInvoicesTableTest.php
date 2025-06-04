<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetailsInvoicesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetailsInvoicesTable Test Case
 */
class DetailsInvoicesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DetailsInvoicesTable
     */
    protected $DetailsInvoices;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.DetailsInvoices',
        'app.Spas',
        'app.Invs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DetailsInvoices') ? [] : ['className' => DetailsInvoicesTable::class];
        $this->DetailsInvoices = $this->getTableLocator()->get('DetailsInvoices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DetailsInvoices);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DetailsInvoicesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DetailsInvoicesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
