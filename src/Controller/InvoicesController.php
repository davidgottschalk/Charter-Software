<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 */
class InvoicesController extends AppController{

    public function initialize() {
        parent::initialize();

        $this->set('invoiceStatus',['','bezahlt','warte auf Zahlung','1. Erinnerung', '2. Erinnerung', '1. Mahnung', '2. Mahnung', 'Inkassoverfahren möglich', 'Inkasso Büro beauftragt']);
        $this->set('automaticStatus',['deaktiviert', 'aktiviert']);
    }

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

        if( $this->Auth->user() ){ //eingelogget
            if( (in_array($this->Auth->user('group_id'), ['4']) && in_array($this->request->action, ['index', 'view', 'edit', 'deactivateAutomaticWarnings', 'inkasso']) ) ){
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
            'contain' => ['Flights' => ['Customers']]
        ];
        $this->set('invoices', $this->paginate($this->Invoices));
        $this->set('_serialize', ['invoices']);


        $this->set('test',$this->Invoices->checkPayment());
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => ['Flights']
        ]);
        $this->set('invoice', $invoice);
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => ['Flights']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->data);
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success('Die Rechnung wurde erfolgreich gespeichert.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Beim speichern der Rechnung ist ein Fehler aufgetreten.');
            }
        }
        $flights = $this->Invoices->Flights->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'flights'));
        $this->set('_serialize', ['invoice']);
    }


    public function deactivateAutomaticWarnings($id){

        if ($this->request->is(['get'])) {
            $invoice = $this->Invoices->get($id, [
                'contain' => []
            ]);
            $invoice->automatic = 0;

            if ($this->Invoices->save($invoice)) {
                $this->Flash->success('Mahnwesen wurde für Rechnungsnummer:'.$id.' erfolgreich abgeschalten.');
                return $this->redirect(['action' => 'edit', $id]);
            } else {
                $this->Flash->error('Ein Fehler bei der Deaktivierung des Mahnwesens ist aufgetreten.');
                return $this->redirect(['action' => 'edit', $id]);
            }
        }
    }

    public function inkasso($id){

        if ($this->request->is(['get'])) {

            $this->Invoices->setInkasso($id);
            $this->Flash->success('Inkassoverfahren für Rechnungsnummer:'.$id.' erfolgreich eröffnet.');
            return $this->redirect(['action' => 'edit', $id]);
        }
    }
}
