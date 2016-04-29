<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Planes Controller
 *
 * @property \App\Model\Table\PlanesTable $Planes
 */
class PlanesController extends AppController
{

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
                $this->Flash->success('The plane has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The plane could not be saved. Please, try again.');
            }
        }
        $planeTypes = $this->Planes->PlaneTypes->find('list', ['limit' => 200]);
        $this->set(compact('plane', 'planeTypes'));
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
                $this->Flash->success('The plane has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The plane could not be saved. Please, try again.');
            }
        }
        $planeTypes = $this->Planes->PlaneTypes->find('list', ['limit' => 200]);
        $this->set(compact('plane', 'planeTypes'));
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
        if ($this->Planes->delete($plane)) {
            $this->Flash->success('The plane has been deleted.');
        } else {
            $this->Flash->error('The plane could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
