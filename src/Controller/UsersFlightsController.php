<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersFlights Controller
 *
 * @property \App\Model\Table\UsersFlightsTable $UsersFlights
 */
class UsersFlightsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Flights', 'Users']
        ];
        $this->set('usersFlights', $this->paginate($this->UsersFlights));
        $this->set('_serialize', ['usersFlights']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Flight id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersFlight = $this->UsersFlights->get($id, [
            'contain' => ['Flights', 'Users']
        ]);
        $this->set('usersFlight', $usersFlight);
        $this->set('_serialize', ['usersFlight']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersFlight = $this->UsersFlights->newEntity();
        if ($this->request->is('post')) {
            $usersFlight = $this->UsersFlights->patchEntity($usersFlight, $this->request->data);
            if ($this->UsersFlights->save($usersFlight)) {
                $this->Flash->success('The users flight has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The users flight could not be saved. Please, try again.');
            }
        }
        $flights = $this->UsersFlights->Flights->find('list', ['limit' => 200]);
        $users = $this->UsersFlights->Users->find('list', ['limit' => 200]);
        $this->set(compact('usersFlight', 'flights', 'users'));
        $this->set('_serialize', ['usersFlight']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Flight id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersFlight = $this->UsersFlights->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersFlight = $this->UsersFlights->patchEntity($usersFlight, $this->request->data);
            if ($this->UsersFlights->save($usersFlight)) {
                $this->Flash->success('The users flight has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The users flight could not be saved. Please, try again.');
            }
        }
        $flights = $this->UsersFlights->Flights->find('list', ['limit' => 200]);
        $users = $this->UsersFlights->Users->find('list', ['limit' => 200]);
        $this->set(compact('usersFlight', 'flights', 'users'));
        $this->set('_serialize', ['usersFlight']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Flight id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersFlight = $this->UsersFlights->get($id);
        if ($this->UsersFlights->delete($usersFlight)) {
            $this->Flash->success('The users flight has been deleted.');
        } else {
            $this->Flash->error('The users flight could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
