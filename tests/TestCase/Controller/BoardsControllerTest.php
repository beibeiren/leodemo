<?php
namespace App\Test\TestCase\Controller;

use App\Controller\BoardsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\BoardsController Test Case
 */
class BoardsControllerTest extends IntegrationTestCase
{

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
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/boards');
        $this->assertResponseOK();
        //$this->markTestIncomplete('Not implemented yet.');
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
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test show method
     *
     * @return void
     */
    public function testShow()
    {
        $this->get('/boards/show/1001');
        $this->assertResponseOk();
        //$this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test show2 method
     *
     * @return void
     */
    public function testShow2()
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
     * Test index2 method
     *
     * @return void
     */
    public function testIndex2()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test index3 method
     *
     * @return void
     */
    public function testIndex3()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testAddPost(){
        $data = [
            'name' => 'test',
            'password' => 'test',
            'title' => 'test new title 1',
            'content' => 'test new content 1'
        ];
        $this->post('/boards/add', $data);
        $this->assertResponseSuccess();
        $boards = TableRegistry::getTableLocator()->get('Boards');
        $query = $boards->find()->where(['title' => $data['title']]);
        $this->assertEquals(1,$query->count());
    }
}
