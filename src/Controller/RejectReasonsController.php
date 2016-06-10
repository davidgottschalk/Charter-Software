<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RejectReasons Controller
 *
 * @property \App\Model\Table\RejectReasonsTable $RejectReasons
 */
class RejectReasonsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('rejectReasons', $this->paginate($this->RejectReasons));
        $this->set('_serialize', ['rejectReasons']);

        $reasonText = [
            '',
            'Flug nicht Verfügbar',
            'Angebot nicht zurückerhalten',
            'zu teuer',
            'Konditionen ungenügend',
        ];

        $this->set('reasonText', $reasonText);
    }
}
