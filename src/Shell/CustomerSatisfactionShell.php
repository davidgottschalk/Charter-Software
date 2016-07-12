<?php

/**
 *
 * contains the BancosPrint Shell-Class
 *
 * @pagage bancosprint
 * @author David Gottschalk
*/

namespace App\Shell;

use Cake\Console\Shell;
use Cake\Network\Email\Email;
use Cake\Log\LogTrait;

/**
 *
 * defines the interface to the bancosprint functionalities
 *
 * @pagage bancosprint
 * @author David Gottschalk
*/

class customerSatisfactionShell extends Shell {

    use LogTrait;

    public function send(){

        $this->loadModel('Flights');

        $yesterdayMorning = (new \DateTime())->format('Y-m-d')." 00:00:00";
        $yesterdayNight = (new \DateTime())->format('Y-m-d')." 23:59:59";

        // wenn ende des Flugs gestern zwischen 00:00:00 und 23:59:59
        $oldFlights = $this->Flights->find()->where(['end_date >=' => $yesterdayMorning, 'end_date <=' => $yesterdayNight])->contain('Customers')->all();

        foreach($oldFlights as $oldFlight){
            $this->writeDatabaseExceptionMail($oldFlight->customer->email);
        }
    }

    private function writeDatabaseExceptionMail($emailadress){

        $email = new Email('customerSatisfaction');
        $email->subject('Hinotori Exec Charter');
        $email->addTo($emailadress);
        $email->viewVars([
            'message' => 'test',
        ]);
        $email->send();

    }
}


