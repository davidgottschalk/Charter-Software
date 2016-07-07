<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\LogTrait;
use Cake\Network\Session\DatabaseSession;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;

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
        $this->loadModel('Groups');

        $this->Auth->allow();

    }

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

        if( $this->Auth->user() ){ //eingelogget
            if( (in_array($this->Auth->user('group_id'), ['4']) && in_array($this->request->action, ['index', 'view','edit', 'order', 'registerCustomer', 'abortCustomerCredentials', 'offer', 'payed', 'bookingDone', 'aboutOffer', 'getAirportsByCountry'])) ||
                (in_array($this->Auth->user('group_id'), ['1','2','3']) && in_array($this->request->action, ['index', 'view'])) ){ // admin
                // ok
            }else{
                throw new UnauthorizedException();
            }
        }elseif( !in_array($this->request->action,['order', 'registerCustomer', 'abortCustomerCredentials', 'offer', 'payed', 'bookingDone', 'aboutOffer', 'getAirportsByCountry']) ){
            throw new UnauthorizedException();
        }
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

                    $this->Flash->success('Der Flug wurde wurde mit Ihrer Kundennummer verbunden.');
                    return $this->redirect(['action' => 'offer']);
                }else{
                    $this->set('customerNumberError', 'Bitte prüfen Sie Ihre Kundenummer');
                    $this->Flash->error('Die eingegebene Kundennummer gibt es nicht.');
                }
            }

            if(isset($this->request->data['first_name'])){

                $customer = $this->Customers->get($flight['flightDatabaseObject']->customer_id);
                $customer = $this->Customers->patchEntity($customer, $this->request->data);
                $customer->status = CUSTOMER_DUMMY;
                $this->request->session()->write('flight.customer', $customer);
                $success = $this->Customers->save($customer);

                if($success) {
                    $this->Flash->success('Der Flug wurde wurde mit Ihrer Kundennummer verbunden.');
                    return $this->redirect(['action' => 'offer']);
                } else {
                    $this->set('errors', $customer->errors());
                    $this->Flash->error('Die eingegebenen Daten sind leider nicht korrekt');
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
        $this->Flash->success('Die Reservierung wurde aufgehoben.');
        return $this->redirect(['action' => 'order']);
    }

    public function offer(){

        $this->Flights->setFlight($this->request->session()->read('flight'));
        $this->Flights->calculateCosts();

        $this->set('data', $this->Flights->getFlight());

        if($this->request->is('post')){ // buchung abgeschlossen

            $this->Flights->setActiveFlight(); // kein Dummy Flight mehr
            $this->Flights->setActiveCustomer(); // kein Dummy Flight mehr
            $flight = $this->Flights->getFlight();

            if($this->request->data('payed')){ // direkt bezahlt, PRE
                $invoice = $this->Flights->writeInvoice(PAYED, false);
                $this->Flights->writeFlightInfoMail(); // sendet Flugdatensmail

                $this->redirect(['action'=>'payed','invoice_number' => $invoice->invoice_number,'flight_number' => $flight['flightDatabaseObject']['flight_number']]);

            }else{ // noch nicht bezahlt
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

        $flight = $this->request->session()->read('flight');
        $this->request->session()->delete('flight');

        // Flugreservierung löschen
        $flightEntity = $this->Flights->get($flight['flightDatabaseObject']->id);
        $this->Flights->delete( $flightEntity);
        // nur die Kunden aufräumen die noch keinen Flug haben
        $this->Customers->deleteAll(['id' => $flight['flightDatabaseObject']->customer_id, 'status' => CUSTOMER_DUMMY] );

        $this->Flash->success('Das angefragte Angebot wurde zurückgezogen.');
        $this->redirect(['controller' => 'RejectReasons','action' => 'survey']);
    }

    public function getAirportsByCountry(){
        $this->autoRender = false;
        $airportNames = $this->Airports->getAirportsByCountry($this->request->data('country'));
        echo json_encode( $airportNames );
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {

        $today = date('Y-m-d H:i:s');

        if($this->Flights->exists(['end_date <' => $today])){
            $statusDone = ['status' => FLIGHT_DONE];
            $statusFlying =['status' => FLIGHT_FLYING];
            foreach($flightOver = $this->Flights->find()->where(['start_date <=' => $today, 'end_date >=' => $today])->all() as $flight){
                $flight = $this->Flights->patchEntity($flight, $statusFlying);
                $this->Flights->save($flight);
            }
            foreach($flightOver = $this->Flights->find()->where(['end_date <' => $today])->all() as $flight){
                $flight = $this->Flights->patchEntity($flight, $statusDone);
                $this->Flights->save($flight);
            }
        }

        $this->set('flightStatus', ['Flug erledigt','Flug bald', '','Unterwegs']);

        $todayMorning = (new \DateTime())->format('Y-m-d')." 00:00:00";
        $todayNight = (new \DateTime())->format('Y-m-d')." 23:59:59";

        $todayFlights = $this->Flights->find()->where(['start_date >' => $todayMorning, 'start_date <' => $todayNight ])->orWhere(['Flights.status' => FLIGHT_FLYING])->contain(['Customers', 'Planes','Users'])->all();

        $this->set('todayFlights', $todayFlights);
        $condition = [];

        if( $this->request->data('startDate') && $this->request->data('endDate') ){
            $startDate = (new \DateTime($this->request->data('startDate')))->format('Y-m-d H:i:s');
            $endDate = (new \DateTime($this->request->data('endDate')))->format('Y-m-d H:i:s');

            if($startDate > $endDate){

                $this->set('inputErrors','Das eingegebene Von-Datum liegt nach dem Bis-Datum!');
                $this->Flash->error('Die eingegebenen Daten sind nicht korrekt.');
            }else{
                $condition = ['start_date >=' => $startDate, 'start_date <=' => $endDate ];
                $this->Flash->success('Die Suche wurde eingegrenzt');
            }

        }

        $this->paginate = [
            'conditions' => $condition,
            'contain' => ['Customers', 'Planes', 'Users'],
            'limit' => 5,
        ];

        $this->set('userID', $this->Auth->user('id'));
        $this->set('groupID', $this->Auth->user('group_id'));

        $this->set('flights', $this->paginate($this->Flights));
        $this->set('_serialize', ['flights']);
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

        $this->set('groupNames', $this->Groups->find()->all()->toArray());

        $this->set('flightStatus', ['Flug erledigt','Flug bald', '','Unterwegs']);
        $flight = $this->Flights->get($id, [
            'contain' => ['Customers', 'Planes', 'Airports', 'Users', 'Invoices']
        ]);
        $this->set('flight', $flight);
        $this->set('_serialize', ['flight']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Flight id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {

        $flight = $this->Flights->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $flight = $this->Flights->patchEntity($flight, $this->request->data);
            $flight->catering = $this->request->data('catering');
            if ($this->Flights->save($flight)) {

                $this->Flash->success('The flight has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The flight could not be saved. Please, try again.');
            }
        }
        $this->set('catering', ['','Economy','Vegan','VIP']);
        $this->set(compact('flight'));
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
