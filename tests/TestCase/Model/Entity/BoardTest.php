<?php
namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\Board;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\Board Test Case
 */
class BoardTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Entity\Board
     */
    public $Board;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Board = new Board();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Board);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {

    }
    public function testBoardsInstance(){
        $this->assertTrue(is_a($this->Board,'App\Model\Entity\Board'));
    }
}
