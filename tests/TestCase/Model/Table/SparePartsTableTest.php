<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SparePartsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SparePartsTable Test Case
 */
class SparePartsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SparePartsTable
     */
    protected $SpareParts;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.SpareParts',
        'app.Sups',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SpareParts') ? [] : ['className' => SparePartsTable::class];
        $this->SpareParts = $this->getTableLocator()->get('SpareParts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SpareParts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SparePartsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SparePartsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
