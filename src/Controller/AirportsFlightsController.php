<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AirportsFlights Controller
 *
 * @property \App\Model\Table\AirportsFlightsTable $AirportsFlights
 */
class AirportsFlightsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Flights', 'Airports']
        ];
        $this->set('airportsFlights', $this->paginate($this->AirportsFlights));
        $this->set('_serialize', ['airportsFlights']);
    }

    /**
     * View method
     *
     * @param string|null $id Airports Flight id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $airportsFlight = $this->AirportsFlights->get($id, [
            'contain' => ['Flights', 'Airports']
        ]);
        $this->set('airportsFlight', $airportsFlight);
        $this->set('_serialize', ['airportsFlight']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $airportsFlight = $this->AirportsFlights->newEntity();
        if ($this->request->is('post')) {
            $airportsFlight = $this->AirportsFlights->patchEntity($airportsFlight, $this->request->data);
            if ($this->AirportsFlights->save($airportsFlight)) {
                $this->Flash->success('The airports flight has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The airports flight could not be saved. Please, try again.');
            }
        }
        $flights = $this->AirportsFlights->Flights->find('list', ['limit' => 200]);
        $airports = $this->AirportsFlights->Airports->find('list', ['limit' => 200]);
        $this->set(compact('airportsFlight', 'flights', 'airports'));
        $this->set('_serialize', ['airportsFlight']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Airports Flight id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $airportsFlight = $this->AirportsFlights->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $airportsFlight = $this->AirportsFlights->patchEntity($airportsFlight, $this->request->data);
            if ($this->AirportsFlights->save($airportsFlight)) {
                $this->Flash->success('The airports flight has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The airports flight could not be saved. Please, try again.');
            }
        }
        $flights = $this->AirportsFlights->Flights->find('list', ['limit' => 200]);
        $airports = $this->AirportsFlights->Airports->find('list', ['limit' => 200]);
        $this->set(compact('airportsFlight', 'flights', 'airports'));
        $this->set('_serialize', ['airportsFlight']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Airports Flight id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $airportsFlight = $this->AirportsFlights->get($id);
        if ($this->AirportsFlights->delete($airportsFlight)) {
            $this->Flash->success('The airports flight has been deleted.');
        } else {
            $this->Flash->error('The airports flight could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
