<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;

/**
 * Planes Controller
 *
 * @property \App\Model\Table\PlanesTable $Planes
 */
class PlanesController extends AppController
{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

        if( $this->Auth->user() ){ //eingelogget
            if( (in_array($this->Auth->user('group_id'), ['4']) && in_array($this->request->action, ['index', 'view', 'add', 'edit', 'delete'])) ||
                (in_array($this->Auth->user('group_id'), ['1','2','3']) && in_array($this->request->action, ['index', 'view'])) ){ // admin
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
        $this->paginate = [
            'contain' => ['PlaneTypes']
        ];
        $this->set('planes', $this->paginate($this->Planes));
        $this->set('_serialize', ['planes']);
    }

    /**
     * View method
     *
     * @param string|null $id Plane id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $plane = $this->Planes->get($id, [
            'contain' => ['PlaneTypes']
        ]);
        $this->set('plane', $plane);
        $this->set('_serialize', ['plane']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $plane = $this->Planes->newEntity();
        if ($this->request->is('post')) {
            $plane = $this->Planes->patchEntity($plane, $this->request->data);
            if ($this->Planes->save($plane)) {
                $this->Flash->success('Flugzeug erfolgreich hinzugefügt.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Die Änderungen konnten nicht gespeichert werden. Bitte erneut versuchen.');
            }
        }
        $planeTypes = $this->Planes->PlaneTypes->find('list', ['limit' => 200]);
        $this->set(compact('plane','planeTypes'));
        $this->set('_serialize', ['plane']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Plane id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $plane = $this->Planes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $plane = $this->Planes->patchEntity($plane, $this->request->data);
            if ($this->Planes->save($plane)) {
                $this->Flash->success('Das Flugzeug wurde gespeichert.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Das Flugzeug konnte nicht gespeichert werden. Bitte erneut versuchen.');
            }
        }
        $planeTypes = $this->Planes->PlaneTypes->find('list', ['limit' => 200]);
        $this->set(compact('plane','planeTypes'));
        $this->set('_serialize', ['plane']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Plane id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plane = $this->Planes->get($id);
        if(!$this->Planes->Flights->exists(['plane_id' => $plane->id,'status IN' =>[FLIGHT_SOON, FLIGHT_FLYING]])){
            if ($this->Planes->delete($plane)) {
                $this->Flash->success('Das Flugzeug wurde glöscht..');
            } else {
                $this->Flash->error('Das zu löschende Flugzeug wurde nicht gefunden. Bitte erneut versuchen.');
            }
        }else{
            $this->Flash->error('Das Flugzeug ist noch verbucht.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
