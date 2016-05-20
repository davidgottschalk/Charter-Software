<?php
namespace App\Model\Table;

use App\Model\Entity\Invoice;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Log\LogTrait;
use Cake\I18n\Time;

/**
 * Invoices Model
 */
class InvoicesTable extends Table{

    use LogTrait;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('invoices');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Flights', [
            'foreignKey' => 'flight_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('due_date', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('due_date');

        $validator
            ->add('value', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('value');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['flight_id'], 'Flights'));
        return $rules;
    }


    public function checkPayment(){


        $today = date('Y-m-d H:i:s');

        $statuus = [ PAYED, AWAIT_PAYMENT, FIRST_REMINDER, SECOND_REMINDER, FIRST_WARNING, SECOND_WARNING, INKASSO_POSSIBLE ];
        $invoices = $this->find('all');

        foreach( $statuus as $key => $status ){ // bspw. PAYED = 1, FIRST_REMINDER = 3

            $this->log("bearbeite Status:".$status,'debug');

            $invoicesPerStatus = clone $invoices;

            // selektiert nur abgelaufende für den jeweiligen Status
            $invoicesPerStatus
                ->where(['Invoices.status' => $status,'Invoices.due_date <' => $today])
                ->contain(['flights.customers.customerTypes']);

            foreach( $invoicesPerStatus as $invoicePerStatus ){

                if( $invoicePerStatus['Customers']['customer_type_id'] == CORP ){
                    if(array_key_exists($key+1,$statuus)){
                        $this->setNewStatus($invoicePerStatus['id'], $statuus[$key+1]); // in den nächsten Status
                    }
                }
                if( $status == FIRST_WARNING ){
                    $this->setStrike( $invoicePerStatus['Customers']['id'] );
                }
                if( $status == INKASSO_POSSIBLE ){
                    $this->checkStrikes( $invoicePerStatus['Customers']['id'] );
                }
            }
            unset($invoicesPerStatus);
        }
        return "test";
    }

    public function setInkasso($id){ $this->setNewStatus( $id, INKASSO ); }

    private function checkStrikes($customerId){
        $customer = $this->Flights->Customers->get($customerId);

        if($customer->strike >= 2){
            $customer->customer_type_id = PRE;
        }
        $this->Flights->Customers->save($customer);
    }

    private function setStrike($customerId){
        $customer = $this->Flights->Customers->get($customerId);
        $customer->strike = $customer->strike +1;
        $this->Flights->Customers->save($customer);
    }

    private function setNewStatus( $id, $status ){

        $newDate = date('Y-m-d H:i:s', strtotime("+14 days"));
        $this->log('new Date:'.$newDate,'debug');

        $invoice = $this->get($id);
        $invoice->due_date = $newDate;
        $invoice->status = $status;
        if($this->save($invoice)){
            $this->sendNotification();
        }
        $this->log('set to Status'.$status,'debug');
    }

    private function sendNotification(){
        $this->log('sende Email');
    }
}
