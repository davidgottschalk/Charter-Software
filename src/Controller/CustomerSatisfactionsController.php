<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Email\Email;
use Cake\Log\LogTrait;


/**
 * AirportsFlights Controller
 *
 * @property \App\Model\Table\AirportsFlightsTable $AirportsFlights
 */
class CustomerSatisfactionsController extends AppController {

    use LogTrait;

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->log($this->request->data,'debug');
        $customerSatisfaction = $this->CustomerSatisfactions->newEntity();
        if ($this->request->is('post')) {
            $customerSatisfaction = $this->CustomerSatisfactions->patchEntity($customerSatisfaction, $this->request->data);
            if ($this->CustomerSatisfactions->save($customerSatisfaction)) {
                $this->Flash->success('Die Daten wurden erfolgreich gesendet. Vielen Dank für Ihre Teilnahme.');
                return $this->redirect(['action' => 'checkout']);
            } else {
                $this->Flash->error('Die Umfrage konnte nicht gespeichert werden. Bitte beantworten Sie alle Fragen.');
            }
        }

        $customerSatisfactions = $this->CustomerSatisfactions->find('list', ['limit' => 10]);
        $this->set(compact('customerSatisfactions'));
        $this->set('_serialize', ['customerSatisfactions']);


        $questionText = [
            '',
            'Wie hat Ihnen unser Flugzeug gefallen?',
            'Wie zufrieden waren Sie mit dem Service?',
            'Wie hat Ihnen das Bordmenü geschmeckt?',
            'Wie beurteilen Sie unser Preis-/Leistungsverhältnis?',
            'Welche Gesamtnote geben Sie dem Flug?',
        ];

        $this->set('questionText', $questionText);

    }

     public function checkout()
    {

    }


}
