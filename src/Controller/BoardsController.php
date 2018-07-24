<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;


/**
 * Boards Controller
 *
 * @property \App\Model\Table\BoardsTable $Boards
 *
 * @method \App\Model\Entity\Board[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BoardsController extends AppController
{
    //public $people;
    private $people;
    public $paginate = [
        'limit' => 5,
        'order' => [
            'id' => 'DESC'
        ],
        'contain' => ['People']

    ];

    public function initialize()
    {
        parent::initialize();
        $this->people = TableRegistry::getTableLocator()->get('People');
        I18n::setLocale('ja_JP');//
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function index($id = null)
    {
        /* $data = $this->Boards
            ->find('all')
            ->order(['Boards.id' => 'DESC'])
            ->contain(['People']); */
        $data = $this->paginate($this->Boards);
        $this->set('data',$data);
        $this->set('count',$data->count());
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
   /* public function add()
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
    }*/

    public function add()
    {
        if ($this->request->is('post')) {
            if (!$this->people->checkNameAndPass($this->request->getData())) {
                $this->Flash->error('名前かパスワードを確認してください。');
            } else {
                $res = $this->people->find()
                    ->where(['name'=>$this->request->getData('name')])
                    ->andWhere(['password'=>$this->request->getData('password')])
                    ->first();
                $board = $this->Boards->newEntity();
                $board->name = $this->request->getData('name');
                $board->title = $this->request->getData('title');
                $board->content = $this->request->getData('content');
                $board->person_id = $res['id'];
                if($this->Boards->save($board)){
                $this->redirect(['action' => 'index']);
                }
            }
        }
        $this->set('entity',$this->Boards->newEntity());
    }

    /**
     * Edit method
     *
     * @param string|null $id Board id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     *
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
    */
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

    public function show($param = 0){
        $data = $this->Boards
            ->find()
            ->where(['Boards.id'=>$param])
            ->contain(['People'])
            ->first();
        $this->set('data',$data);
    }

    public function show2($param = 0){
        $data = $this->people->get($param);
        $this->set('data',$data);
    }

    public function edit($param=0){
        if ($this->request->isPut()){
            $board = $this->Boards
                ->find()
                ->where(['Boards.id'=>$param])
                ->contain(['People'])
                ->first();
        $board->title = $this->request->getData('title');
        $board->content = $this->request->getData('content');
        $board->person_id = $this->request->getData('person_id');
        if(!$this->people->checkNameAndPass($this->request->getData())){
            $this->Flash->error('名前かパスワードを確認ください。');
        } else {
            if($this->Boards->save($board)){
                $this->redirect(['action' => 'index']);
            }
          }
        } else {
            $board = $this->Boards
                ->find()
                ->where(['Boards.id'=>$param])
                ->contain(['People'])
                ->first();
        }
        $this->set('entity',$board);
    }
    public function index2()
    {

    }

    public function index3()
    {
        $data = $this->paginate($this->Boards);
        $this->set('data',$data);
        $this->set('count',$data->count());
    }



}
