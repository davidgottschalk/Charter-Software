<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\LogTrait;

/**
 * RejectReasons Controller
 *
 * @property \App\Model\Table\RejectReasonsTable $RejectReasons
 */
class RejectReasonsController extends AppController
{
    use LogTrait;
    /**
     * Index method
     *
     * @return void
     */
    // public function index()
    // {
    //     $this->set('rejectReasons', $this->paginate($this->RejectReasons));
    //     $this->set('_serialize', ['rejectReasons']);

    //     $reasonText = [
    //         '',
    //         'Flug nicht Verfügbar',
    //         'Angebot nicht zurückerhalten',
    //
    //     ];

    //     $this->set('reasonText', $reasonText);
    // }


    public function survey(){

        $reasons = ['<Bitte wählen Sie einen Grund aus.>',
                    'Konditionen ungenügend',
                    'Preis zu hoch',
                    'Ich habe es mir anders überlegt.',
                    'etwas anderes',
                    ];

        $this->set('reasons', $reasons);

        if($this->request->is('post')){

            if($this->request->data('reason_id') != 0){

                $rejectReason = $this->RejectReasons->newEntity();
                $rejectReason = $this->RejectReasons->patchEntity($rejectReason, $this->request->data);

                if($this->RejectReasons->save($rejectReason)){

                    $this->Flash->success('Die Umfrage wurde erfolgreich aufgenommen.');
                    return $this->redirect(['action' => 'thankYou']);
                }else{
                    $this->Flash->error('Bei der Verarbeitung ist ein Fehler aufgetreten');
                }
            }
        }
    }

    public function thankYou(){}

}
