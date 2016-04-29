<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PlaneTypes Controller
 *
 * @property \App\Model\Table\PlaneTypesTable $PlaneTypes
 */
class PlaneTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('planeTypes', $this->paginate($this->PlaneTypes));
        $this->set('_serialize', ['planeTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Plane Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $planeType = $this->PlaneTypes->get($id, [
            'contain' => ['Planes']
        ]);
        $this->set('planeType', $planeType);
        $this->set('_serialize', ['planeType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $planeType = $this->PlaneTypes->newEntity();
        if ($this->request->is('post')) {
            $planeType = $this->PlaneTypes->patchEntity($planeType, $this->request->data);
            if ($this->PlaneTypes->save($planeType)) {
                $this->Flash->success('The plane type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The plane type could not be saved. Please, try again.');
            }
        }
        $this->set(compact('planeType'));
        $this->set('_serialize', ['planeType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Plane Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $planeType = $this->PlaneTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $planeType = $this->PlaneTypes->patchEntity($planeType, $this->request->data);
            if ($this->PlaneTypes->save($planeType)) {
                $this->Flash->success('The plane type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The plane type could not be saved. Please, try again.');
            }
        }
        $this->set(compact('planeType'));
        $this->set('_serialize', ['planeType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Plane Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $planeType = $this->PlaneTypes->get($id);
        if ($this->PlaneTypes->delete($planeType)) {
            $this->Flash->success('The plane type has been deleted.');
        } else {
            $this->Flash->error('The plane type could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
