<?php
namespace App\Controller;

use Cake\Log\LogTrait;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController{

    use LogTrait;

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

        if( $this->Auth->user() ){ //eingelogget
            if( (in_array($this->Auth->user('group_id'), ['4']) && in_array($this->request->action, ['reemploy','resetPassword', 'login', 'dismiss', 'logout', 'index', 'view', 'add', 'edit', 'delete', 'passwordChange'])) ||
                (in_array($this->Auth->user('group_id'), ['1','2','3']) && in_array($this->request->action, ['view','login', 'logout', 'passwordChange'])) ){ // admin
                // ok
            }else{
                throw new UnauthorizedException();
            }
        }
        $this->Auth->allow(['login', 'logout']);

        $this->set('userStatus', ['Inaktiv','Aktiv','Passwort ändern','Entlassen']);
        $this->loadModel('UsersFlights');
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

        $this->set('flightStatus', ['Flug erledigt','Flug bald', '','Unterwegs']);

        $user = $this->Users->get($id, [
            'contain' => ['Groups', 'Flights' => ['Customers']]
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

            $password = $this->Users->generatePassword();
            $user->status = USER_PASSWORD_CHANGE;
            $user->password = $password;

            $user = $this->Users->save($user);
            if ($user) {
                $this->Users->sendGeneratedPassword($password, $user);
                $this->Flash->success('Benutzer wurde angelegt.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Der Benutzer konnte nicht angelegt werden, bitte versuchen Sie es später erneut.');
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'flights'));
        $flights = $this->Users->Flights->find('list', ['limit' => 200]);
        $this->set('_serialize', ['user']);
    }

    public function resetPassword($id = null){

        if ($this->request->is('get')) {

            $user = $this->Users->get($id);
            $password = $this->Users->generatePassword();

            $user->status = USER_PASSWORD_CHANGE;
            $user->password = $password;

            $user = $this->Users->save($user);

            if ($user) {
                $this->Users->sendGeneratedPassword($password, $user);
                $this->Flash->success('Passwort zurückgesetzt.');
            } else {
                $this->Flash->error('Das Passwort konnte nicht zurückgesetzt werden');
            }
        }
        return $this->redirect(['action' => 'index']);
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
                $this->Flash->success('Der Benutzer wurde erfolgreich geändert');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Der Benutzer konnte nicht geändert werden, bitte versuchen Sie es erneut.');
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $flights = $this->Users->Flights->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'flights'));
        $this->set('_serialize', ['user']);
    }


    public function dismiss($id = null){
        $canDismiss = true;
        $userWithFlights = $this->Users->find()->where(['id' => $id])->contain('Flights')->first();
        foreach($userWithFlights->flights as $flight){
            if(in_array($flight->status, [FLIGHT_SOON, FLIGHT_FLYING]) ) {
                $canDismiss = false;
            }
        }

        if($canDismiss){

            $user = $this->Users->get($id);
            $user->status = USER_DISMISS;
            $user->exit_date = date('Y-m-d H:i:s');
            if ($this->Users->save($user)) {
                $this->Flash->success('Der Benutzer wurde erfolgreich entlassen.');
            } else {
                $this->Flash->error('Der Benutzer konnte nicht entlassen werden.');
            }
        }else{
            $this->Flash->error('Der Benutzer ist noch verbucht, versuchen Sie es später erneut.');
        }
        return $this->redirect(['action' => 'index']);
    }


    public function reemploy($id = null){
         $user = $this->Users->get($id);
         $user->status = USER_ACTIVE;
         $user->exit_date = null;
         if ($this->Users->save($user)) {
                $this->Flash->success('Der Benutzer wurde erfolgreich wieder eingestellt.');
        } else {
            $this->Flash->error('Der Benutzer konnte nicht wieder eingestellt werden.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login(){

        if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                if($this->Auth->user('status') == USER_INACTIVE || $this->Auth->user('status') == USER_DISMISS){
                    $this->Flash->error("Falscher Benutzername oder Passwort!");
                    return $this->redirect(['action' => 'logout']);
                }
                return $this->redirect(['controller' => 'Flights', 'action'=>'index']);
            }
            $this->Flash->error("Falscher Benutzername oder Passwort!");
        }
    }

    public function logout(){
        $this->Auth->logout();
        $this->redirect(['controller' => 'Users', 'action'=>'login']);
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
                    $this->redirect(['controller' => 'Flights']);
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
