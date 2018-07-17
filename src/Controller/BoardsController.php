<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;


/**
 * Boards Controller
 *
 * @property \App\Model\Table\BoardsTable $Boards
 *
 * @method \App\Model\Entity\Board[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BoardsController extends AppController
{   private $people;

    public function initialize()
    {
        parent::initialize();
        $this->people = TableRegistry::getTableLocator('People');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function index($id = null)
    {
        $data = $this->Boards
            ->find('all')
            ->order(['Boards.id' => 'DESC'])
            ->contain(['People']);
        $this->set('data',$data);

        /*$this->paginate = [
            'contain' => ['People']
        ];
        $boards = $this->paginate($this->Boards);

        $this->set(compact('boards'));*/
    }


   /* public function index($id = null)
    {
        $data = $this->Boards
        ->find('all')
        ->contain(['People']);
        $this->set('data',$data);
        
        /*$this->paginate = [
            'contain' => ['People']
        ];
        $boards = $this->paginate($this->Boards);

        $this->set(compact('boards'));
    }*/

    /**
     * View method
     *
     * @param string|null $id Board id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $board = $this->Boards->get($id, [
            'contain' => ['People']
        ]);

        $this->set('board', $board);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $board = $this->Boards->newEntity();
        if ($this->request->is('post')) {
            $board = $this->Boards->patchEntity($board, $this->request->getData());
            if ($this->Boards->save($board)) {
                $this->Flash->success(__('The board has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The board could not be saved. Please, try again.'));
        }
        $people = $this->Boards->People->find('list', ['limit' => 200]);
        $this->set(compact('board', 'people'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Board id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $board = $this->Boards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $board = $this->Boards->patchEntity($board, $this->request->getData());
            if ($this->Boards->save($board)) {
                $this->Flash->success(__('The board has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The board could not be saved. Please, try again.'));
        }
        $people = $this->Boards->People->find('list', ['limit' => 200]);
        $this->set(compact('board', 'people'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Board id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $board = $this->Boards->get($id);
        if ($this->Boards->delete($board)) {
            $this->Flash->success(__('The board has been deleted.'));
        } else {
            $this->Flash->error(__('The board could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
