<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Email\Email;

/**
 * AirportsFlights Controller
 *
 * @property \App\Model\Table\AirportsFlightsTable $AirportsFlights
 */
class CustomerSatisfactionsController

 extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {


    }

    public function send(){

        $this->autoRender = false;
        $message = '';

        $email = new Email('hinotorie');
        $email->subject('Hinotorie Exec Charter');
        $email->addTo('david.gottschalk@bancos.com');
        $email->viewVars([
            'message' => $message,
        ]);
        $email->send();

    }

}
