<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\LogTrait;
/**
 * Flights Controller
 *
 * @property \App\Model\Table\FlightsTable $Flights
 */
class FlightsController extends AppController{
    use LogTrait;

    public function initialize() {
        parent::initialize();

        $this->loadModel('Airports');
        $this->loadModel('Planes');

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Planes']
        ];
        $this->set('flights', $this->paginate($this->Flights));
        $this->set('_serialize', ['flights']);
    }


    public function order(){

        $this->set('countries', $this->Airports->getAllCountries());
        $this->set('planes', $this->Planes->getAllPlanes());

        if ($this->request->is('post')) {


            // $this->log($this->request->data(),'debug');

$data = [
    'startDate' => '16.06.2016 07:30:00',
    'pax' => 7,
    'country' => ['Albania','Guinea','Germany','Antigua and Barbuda'],
    'airport' => ['Tirana Rinas','Fria','Strausberg','Codrington Airport'],
    'stayDuration' => [0.5, 30],
    'plane' => 0,
    'catering' => 0,
    'attendants' => 0,
];
            $this->Flights->setFlight($data);
            $this->Flights->checkAvailability($data);

            $this->Flash->success('The flight has been saved.');
            // return $this->redirect(['action' => 'index']);
        }
    }

    public function getAirportsByCountry(){
        $this->autoRender = false;
        $airportNames = $this->Airports->getAirportsByCountry($this->request->data('country'));
        echo json_encode( $airportNames );
    }


    /**
     * View method
     *
     * @param string|null $id Flight id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $flight = $this->Flights->get($id, [
            'contain' => ['Customers', 'Planes', 'Airports', 'Users', 'Invoices']
        ]);
        $this->set('flight', $flight);
        $this->set('_serialize', ['flight']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flight = $this->Flights->newEntity();
        if ($this->request->is('post')) {
            $flight = $this->Flights->patchEntity($flight, $this->request->data);
            if ($this->Flights->save($flight)) {
                $this->Flash->success('The flight has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The flight could not be saved. Please, try again.');
            }
        }
        $customers = $this->Flights->Customers->find('list', ['limit' => 200]);
        $planes = $this->Flights->Planes->find('list', ['limit' => 200]);
        $airports = $this->Flights->Airports->find('list', ['limit' => 200]);
        $users = $this->Flights->Users->find('list', ['limit' => 200]);
        $this->set(compact('flight', 'customers', 'planes', 'airports', 'users'));
        $this->set('_serialize', ['flight']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Flight id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flight = $this->Flights->get($id, [
            'contain' => ['Airports', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $flight = $this->Flights->patchEntity($flight, $this->request->data);
            if ($this->Flights->save($flight)) {
                $this->Flash->success('The flight has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The flight could not be saved. Please, try again.');
            }
        }
        $customers = $this->Flights->Customers->find('list', ['limit' => 200]);
        $planes = $this->Flights->Planes->find('list', ['limit' => 200]);
        $airports = $this->Flights->Airports->find('list', ['limit' => 200]);
        $users = $this->Flights->Users->find('list', ['limit' => 200]);
        $this->set(compact('flight', 'customers', 'planes', 'airports', 'users'));
        $this->set('_serialize', ['flight']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Flight id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $flight = $this->Flights->get($id);
        if ($this->Flights->delete($flight)) {
            $this->Flash->success('The flight has been deleted.');
        } else {
            $this->Flash->error('The flight could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
