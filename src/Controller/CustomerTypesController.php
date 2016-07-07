<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;

/**
 * CustomerTypes Controller
 *
 * @property \App\Model\Table\CustomerTypesTable $CustomerTypes
 */
class CustomerTypesController extends AppController
{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

        if( $this->Auth->user() ){ //eingelogget
            if( (in_array($this->Auth->user('group_id'), ['4']) && in_array($this->request->action, ['index', 'view', 'add', 'edit', 'delete']) ) ){
                // ok
            }else{
                throw new UnauthorizedException();
            }
        }else{
            throw new UnauthorizedException();
        }
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('customerTypes', $this->paginate($this->CustomerTypes));
        $this->set('_serialize', ['customerTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Customer Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customerType = $this->CustomerTypes->get($id, [
            'contain' => ['Customers']
        ]);
        $this->set('customerType', $customerType);
        $this->set('_serialize', ['customerType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customerType = $this->CustomerTypes->newEntity();
        if ($this->request->is('post')) {
            $customerType = $this->CustomerTypes->patchEntity($customerType, $this->request->data);
            if ($this->CustomerTypes->save($customerType)) {
                $this->Flash->success('The customer type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The customer type could not be saved. Please, try again.');
            }
        }
        $this->set(compact('customerType'));
        $this->set('_serialize', ['customerType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customerType = $this->CustomerTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customerType = $this->CustomerTypes->patchEntity($customerType, $this->request->data);
            if ($this->CustomerTypes->save($customerType)) {
                $this->Flash->success('The customer type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The customer type could not be saved. Please, try again.');
            }
        }
        $this->set(compact('customerType'));
        $this->set('_serialize', ['customerType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customerType = $this->CustomerTypes->get($id);
        if ($this->CustomerTypes->delete($customerType)) {
            $this->Flash->success('The customer type has been deleted.');
        } else {
            $this->Flash->error('The customer type could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
