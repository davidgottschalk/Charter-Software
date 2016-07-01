<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\LogTrait;
use Cake\Network\Session\DatabaseSession;

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
        $this->loadModel('Customers');
        $this->loadModel('Invoices');

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

            $this->Flights->setFlight($this->request->data());

            if($this->Flights->isValidateInput()){

                if($this->Flights->checkAvailability()){

                    if($this->Flights->saveFlight()){
                        $this->request->session()->write('flight', $this->Flights->getFlight());
                        $this->Flash->success('Wir konnten ein Flugzeug für Sie reservieren.');
                        return $this->redirect(['action' => 'registerCustomer']);
                    }
                    $this->Flash->error('Der Flug ist leider nicht durchführbar!');
                }else{
                    $unavailableReasons = $this->Flights->getUnavailableReasons();
                    $this->Flash->error('Der Flug ist leider nicht durchführbar!');
                    if(isset($unavailableReasons['technicalUnavailable'])){
                        $this->set('unavailableReasons', 'Es steht leider kein Flugzeug zu Verfügung welches technisch zu einer solchen Reise in der Lage wäre.');
                    }elseif(isset($unavailableReasons['dateUnavailable'])){
                        $this->set('unavailableReasons', 'Zu diesem Termin sind leider keine Flugzeuge mehr verfügbar.');
                    }elseif(isset($unavailableReasons['insufficientCrew'])){
                        $this->set('unavailableReasons', 'Zu diesem Termin ist leider kein Flugpersonal mehr verfügbar.');
                    }
                    $this->set('activePanel',$this->request->data('mode'));
                }

            }else{
                $this->log($this->Flights->getInputError(),'debug');
                $this->set('inputErrors', $this->Flights->getInputError());
                $this->Flash->error('Die eingegebenen Daten sind nicht korrekt.');
            }
            $this->set('activePanel',$this->request->data('mode'));
        }
        if ($this->request->is('get')) {
            $this->set('activePanel','classicCharter');
        }
    }

    public function registerCustomer(){

        // $this->log($this->request->data(),'debug');

        if($this->request->is('post')) {

            $flight = $this->request->session()->read('flight');

            if(isset($this->request->data['customerNumber'])){
                $customer = $this->Customers->find()->where(['customer_number' => $this->request->data['customerNumber']])->first();
                if($customer && strlen($this->request->data['customerNumber']) == 8){ // kunden mit Kundennummer identifiziert
                    $this->request->session()->write('flight.customer', $customer);

                    // Flug wurde mit Dummy Kunde angelegt, nun muss der dummy durch den mit der Kundennummer identifizierten ersetzt werden
                    $flightEntity = $this->Flights->get($flight['flightDatabaseObject']->id);
                    $flightEntity->customer_id = $customer['id'];
                    if($this->Flights->save($flightEntity)){
                        // und der Dummy Customer muss aufgeräumt werden
                        $customerEntity = $this->Customers->get($flight['flightDatabaseObject']->customer_id);
                        $this->Customers->delete( $customerEntity);
                    }

                    $this->Flash->success('Wir konnten ein Flugzeug für Sie reservieren.');
                    return $this->redirect(['action' => 'offer']);
                }else{
                    $this->set('customerNumberError', 'Bitte prüfen Sie Ihre Kundenummer');
                    $this->Flash->success('Die eingegebene Kundennummer gibt es nicht.');
                }
            }

            if(isset($this->request->data['first_name'])){

                $customer = $this->Customers->get($flight['flightDatabaseObject']->customer_id);
                $customer = $this->Customers->patchEntity($customer, $this->request->data);
                $customer->status = CUSTOMER_ACTIVE;
                $this->request->session()->write('flight.customer', $customer);
                $success = $this->Customers->save($customer);

                if($success) {
                    $this->Flash->success('The flight has been saved.');
                    return $this->redirect(['action' => 'offer']);
                } else {
                    $this->set('errors', $customer->errors());
                    $this->Flash->error('The flight could not be saved. Please, try again.');
                }
            }
        }
    }

    public function abortCustomerCredentials(){

        $flight = $this->request->session()->read('flight');
        $this->request->session()->delete('flight');

        $flightEntity = $this->Flights->get($flight['flightDatabaseObject']->id);
        $this->Flights->delete( $flightEntity);
        $customerEntity = $this->Customers->get($flight['flightDatabaseObject']->customer_id);
        $this->Customers->delete( $customerEntity);
        return $this->redirect(['action' => 'order']);
    }

    public function offer(){

        $this->Flights->setFlight($this->request->session()->read('flight'));
        $this->Flights->calculateCosts();

        $this->set('data', $this->Flights->getFlight());

        if($this->request->is('post')){

            $this->Flights->setActiveFlight(); // kein Dummy Flight mehr
            $flight = $this->Flights->getFlight();

            if($this->request->data('payed')){ // direkt bezahlt, PRE
                $this->log("payed",'debug');
                $invoice = $this->Flights->writeInvoice(PAYED, false);
                $this->Flights->writeFlightInfoMail(); // sendet Flugdatensmail

                $this->redirect(['action'=>'payed','invoice_number' => $invoice->invoice_number,'flight_number' => $flight['flightDatabaseObject']['flight_number']]);

            }else{ // noch nicht bezahlt
                $this->log("await",'debug');
                $this->Flights->writeInvoice(AWAIT_PAYMENT, true); // sendet Rechnungsmail
                $this->request->session()->write('flight', $this->Flights->getFlight());
                $this->Flights->writeFlightInfoMail(); // sendet Flugdatensmail
                $this->redirect(['action' => 'bookingDone']);

            }
        }
    }

    public function payed(){

        if( $this->request->query('invoice_id') ){
            $this->Invoices->setNewStatus($this->request->query('invoice_id'), PAYED);
        }

        $this->set('invoiceNumber',$this->request->query('invoice_number'));
        $this->set('flightNumber',$this->request->query('flight_number'));
    }
    public function bookingDone(){}

    public function aboutOffer(){


        // redirect zu RejectReasons
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
