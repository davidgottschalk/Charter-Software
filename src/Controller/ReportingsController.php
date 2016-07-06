<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;
use App\Controller\AppController;
use Cake\Log\LogTrait;


class ReportingsController extends AppController {
	 use LogTrait;

	 public function initialize() {
        parent::initialize();
        $this->loadModel('CustomerSatisfactions');
		$this->loadModel('Reportings');
		$this->loadModel('Invoices');
		$this->loadModel('Airports');
        $this->loadModel('Planes');
		$this->loadModel('PlaneTypes');
		$this->loadModel('Flights');
		$this->loadModel('RejectReasons');
		$this->loadModel('IncomeByPlaneTypes');
    }

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

        if( $this->Auth->user() ){ //eingelogget
            if( in_array($this->Auth->user('group_id'), ['4']) && in_array($this->request->action, ['index', 'rejectionreport', 'customersatisfaction', 'costreporting'])){ // admin
                // ok
            }else{
                throw new UnauthorizedException();
            }
        }
    }


	public function index(){

		$planes = $this->Planes->PlaneTypes->find('list', [
			'keyField' => 'id',
			'valueField' => 'type',
			'limit' => 200]);
        $this->set(compact('planes'));

		$this->set('rejectReasons', $this->paginate($this->RejectReasons));
        $this->set('_serialize', ['rejectReasons']);
        $this->loadModel('planeTypes');


        $reasonText = [
            '',
            'Konditionen ungenügend',
            'Preis zu hoch',
            'Ich habe es mir anders überlegt',
            'etwas anderes',
        ];

        $this->set('reasonText', $reasonText);


        $planetypesdata = $this->planeTypes->find('all');
        $this->set('planetypes', $planetypesdata);
    }

	public function rejectionreport(){

		$this->set('rejectReasons', $this->paginate($this->RejectReasons));
        $this->set('_serialize', ['rejectReasons']);

		$data = $this->RejectReasons->find('all');
		$this->set('data', $data);

		$data3 = $this->RejectReasons->find();
		$this->set('data3', $data3);

	}


	public function customersatisfaction(){

		$startdate = $this->request->data('beginn');
		$von = (new \DateTime($startdate))->format('Y-m-d H:i:s');


		$enddate = $this->request->data('ende');
		$bis = (new \DateTime($enddate))->format('Y-m-d H:i:s');

		/* Select all customer ratings created $von bis $bis*/
		$this->set('satisfactions', $this->CustomerSatisfactions->find('all')->where(['created >' => $von, 'created <' => $bis]));
	}

	public function costreporting(){

		/*Umsatzanalyse: Hilfsvariablen aus index Beginn, Ende Filter und Flugzeugtypwahl**/
		$startdate = $this->request->data('beginn');
		$von = (new \DateTime($startdate))->format('Y-m-d H:i:s');

		$enddate = $this->request->data('ende');
		$bis = (new \DateTime($enddate))->format('Y-m-d H:i:s');

		$flugzeug = $this->request->data('flugzeugauswahl');
		$this->set('flugzeug', $flugzeug);

		$query = $this->IncomeByPlaneTypes->find();

		/*Umsatzanalyse: Select für einen bestimmten Flugzeugtyp oder alle***/

		if ($flugzeug == 'allplanes'){
			$incomeByPlaneType = $this->IncomeByPlaneTypes->find()
			->select([
				'id',
				'plane_type_id',
				'invoice_id',
				'created'
			])
			->where(['IncomeByPlaneTypes.created >' => $von, 'IncomeByPlaneTypes.created <' => $bis])
			->contain([
				'Invoices' => function ($q) {
				   return $q
						->select(['id', 'value']);
				}])
			->contain([
				'PlaneTypes' => function ($q) {
				return $q
					->select(['id', 'type']);
				}])
			->select(['summe' => $query->func()->sum('value')])
			->group('IncomeByPlaneTypes.created');

		} else{
			$incomeByPlaneType = $this->IncomeByPlaneTypes->find()
			->select([
				'id',
				'plane_type_id',
				'invoice_id',
				'created'
			])
			->where(['IncomeByPlaneTypes.created >' => $von, 'IncomeByPlaneTypes.created <' => $bis])
			->andWhere([
				'plane_type_id' => $flugzeug,
			])
			->contain([
				'Invoices' => function ($q) {
				   return $q
						->select(['id', 'value']);
				}])
			->contain([
				'PlaneTypes' => function ($q) {
				return $q
					->select(['id', 'type']);
				}])
			->select(['summe' => $query->func()->sum('value')])
			->group('IncomeByPlaneTypes.created');
		}

		$this->set('incomeByPlaneType', $incomeByPlaneType);
        $this->set('_serialize', ['incomeByPlaneType']);

    }
}


?>
