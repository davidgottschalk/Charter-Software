<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IncomeByPlaneTypes Controller
 *
 * @property \App\Model\Table\IncomeByPlaneTypesTable $IncomeByPlaneTypes
 */
class IncomeByPlaneTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PlaneTypes', 'Invoices']
        ];
        $this->set('incomeByPlaneTypes', $this->paginate($this->IncomeByPlaneTypes));
        $this->set('_serialize', ['incomeByPlaneTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Income By Plane Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $incomeByPlaneType = $this->IncomeByPlaneTypes->get($id, [
            'contain' => ['PlaneTypes', 'Invoices']
        ]);
        $this->set('incomeByPlaneType', $incomeByPlaneType);
        $this->set('_serialize', ['incomeByPlaneType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $incomeByPlaneType = $this->IncomeByPlaneTypes->newEntity();
        if ($this->request->is('post')) {
            $incomeByPlaneType = $this->IncomeByPlaneTypes->patchEntity($incomeByPlaneType, $this->request->data);
            if ($this->IncomeByPlaneTypes->save($incomeByPlaneType)) {
                $this->Flash->success('The income by plane type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The income by plane type could not be saved. Please, try again.');
            }
        }
        $planeTypes = $this->IncomeByPlaneTypes->PlaneTypes->find('list', ['limit' => 200]);
        $invoices = $this->IncomeByPlaneTypes->Invoices->find('list', ['limit' => 200]);
        $this->set(compact('incomeByPlaneType', 'planeTypes', 'invoices'));
        $this->set('_serialize', ['incomeByPlaneType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Income By Plane Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $incomeByPlaneType = $this->IncomeByPlaneTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $incomeByPlaneType = $this->IncomeByPlaneTypes->patchEntity($incomeByPlaneType, $this->request->data);
            if ($this->IncomeByPlaneTypes->save($incomeByPlaneType)) {
                $this->Flash->success('The income by plane type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The income by plane type could not be saved. Please, try again.');
            }
        }
        $planeTypes = $this->IncomeByPlaneTypes->PlaneTypes->find('list', ['limit' => 200]);
        $invoices = $this->IncomeByPlaneTypes->Invoices->find('list', ['limit' => 200]);
        $this->set(compact('incomeByPlaneType', 'planeTypes', 'invoices'));
        $this->set('_serialize', ['incomeByPlaneType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Income By Plane Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $incomeByPlaneType = $this->IncomeByPlaneTypes->get($id);
        if ($this->IncomeByPlaneTypes->delete($incomeByPlaneType)) {
            $this->Flash->success('The income by plane type has been deleted.');
        } else {
            $this->Flash->error('The income by plane type could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
