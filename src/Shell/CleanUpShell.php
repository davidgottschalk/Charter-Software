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

class CleanUpShell extends Shell {

    use LogTrait;

    public function start(){

        $this->loadModel('Flights');
        $this->loadModel('Customers');

        foreach( $this->Flights->find()->where(['status' => FLIGHT_DUMMY])->all() as $flight ){// status = 2

            $this->log($flight,'debug');

            $this->Flights->delete( $this->Flights->get($flight->id) );
            $customer = $this->Customers->get($flight->customer_id);
            if($customer->status == CUSTOMER_DUMMY){
                $this->Customers->delete( $this->Customers->get($flight->customer_id) );
            }
        }

        // $this->Customers->deleteAll(['status' => CUSTOMER_DUMMY]); // status = 0

        //users flights
    }
}

