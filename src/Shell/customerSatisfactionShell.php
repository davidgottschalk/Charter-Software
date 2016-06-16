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

/**
 *
 * defines the interface to the bancosprint functionalities
 *
 * @pagage bancosprint
 * @author David Gottschalk
*/

class customerSatisfactionShell extends Shell {

    public function send(){

        $this->loadModel('Invoices');

        $this->writeDatabaseExceptionMail('');
    }

    private function writeDatabaseExceptionMail($message){
        $email = new Email('hinotorie');
        $email->subject('Hinotorie Exec Charter');
        $email->addTo('david.gottschalk@bancos.com');
        $email->viewVars([
            'message' => $message,
        ]);
        $email->send();

    }
}


