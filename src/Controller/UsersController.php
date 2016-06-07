<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{


    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        // $this->Auth->allow(['login', 'logout']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups']
        ];
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Groups', 'Flights']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->status = USER_PASSWORD_CHANGE;
            $user->password = "placeholder";

            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $flights = $this->Users->Flights->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'flights'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Flights']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $flights = $this->Users->Flights->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'flights'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }


    public function login(){

        if ($this->request->is('post')) {

            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error("Falscher Benutzername oder Passwort!");
        }
    }

    public function logout(){

        return $this->redirect($this->Auth->logout());
    }


    public function passwordChange($id){

        $user = $this->Users->get( $id );

        if($this->request->is('get')){

            if ( !$user ) {
                $this->Flash->error('Passwort nicht änderbar.');
                return $this->redirect(['action' => 'login']);
            }
        }

        $userStatus = $user->status;

        if($this->request->is('put')){

            $this->Users->patchEntity($user, $this->request->data, ['validate' => 'PasswordChange']);
            $user->status = USER_ACTIVE;

            if( $this->Users->save($user) ){
                $this->Flash->success('Passwort geändert');
                if($userStatus == USER_ACTIVE){
                    $this->redirect(['controller' => 'Planes']);
                }else{
                    $this->redirect(['controller' => 'Users', 'action' => 'logout']);
                }
            }else {
                $this->Flash->error('Bitte Prüfen Sie Ihre Eingaben!');
                return $this->redirect(['controller' => 'Users', 'action' => 'passwordChange', $id]);
            }
        }
        $this->set('id',$id);
    }

}
