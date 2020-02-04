<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DemandsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DemandsTable Test Case
 */
class DemandsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DemandsTable
     */
    protected $Demands;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Demands',
        'app.DemandsHistory',
        'app.Releases',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Demands') ? [] : ['className' => DemandsTable::class];
        $this->Demands = TableRegistry::getTableLocator()->get('Demands', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Demands);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
