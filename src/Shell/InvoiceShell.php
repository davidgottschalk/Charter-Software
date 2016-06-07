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

/**
 *
 * defines the interface to the bancosprint functionalities
 *
 * @pagage bancosprint
 * @author David Gottschalk
*/

class InvoiceShell extends Shell {

    public function warn(){

        $this->loadModel('Invoices');

        $this->Invoices->checkPayment();

    }
}
