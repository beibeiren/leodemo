<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BoardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BoardsTable Test Case
 */
class BoardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BoardsTable
     */
    public $BoardsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.boards',
        'app.people'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Boards') ? [] : ['className' => BoardsTable::class];
        $this->BoardsTable = TableRegistry::getTableLocator()->get('Boards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BoardsTable);

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

    public function testBoardsTableFind(){
        $result = $this->BoardsTable->find('all')->first();
        $this->assertFalse(empty($result));
        $this->assertTrue(is_a($result,'App\Model\Entity\Board'));
        $this->assertEquals($result->id,1001);
        $this->assertStringStartsWith('test title 1',$result->title);
    }
}
