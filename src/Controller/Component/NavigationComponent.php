<?php

/**
 *
 * contains the Navigation Component-Class
 *
 * @pagage bancosprint
 * @author David Gottschalk
*/

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;

/**
 *
 * encapsulate the navigation functionalities
 *
 * @pagage bancosprint
 * @author David Gottschalk
*/

class NavigationComponent extends Component {

    public $components = ['Auth'];

    private $navItems = [];
    private $controller = null;
    private $groupAro = null;
    private $userAro = null;

    public function initialize(array $config){
        $this->controller = $this->_registry->getController();
        $this->navItems = [];

        $this->navItems['Flüge'] = [
            [ "title" => "Übersicht", "controller" => "Flights", "action" => "index" ],
            [ "title" => "Flug anlegen", "controller" => "Flights", "action" => "order" ],
        ];

        if( in_array($this->Auth->user('group_id'), ['4']) ){
            $this->navItems['Kunden'] = [
                [ "title" => "Übersicht", "controller" => "Customers", "action" => "index" ],
                [ "title" => "Kunde hinzufügen", "controller" => "Customers", "action" => "add" ],
                [ "title" => "Kundengruppen", "controller" => "CustomerTypes", "action" => "index" ]
            ];

            $this->navItems[] = [ "title" => "Mahnwesen", "controller" => "Invoices", "action" => "index" ];
        }

        $this->navItems['Flugzeuge'] = [
            [ "title" => "Übersicht", "controller" => "Planes", "action" => "index" ],
            [ "title" => "Flugzeugtypen", "controller" => "PlaneTypes", "action" => "index" ]
        ];

        if( in_array($this->Auth->user('group_id'), ['4']) ){
            $this->navItems['Mitarbeiter'] = [
                [ "title" => "Übersicht", "controller" => "Users", "action" => "index" ],
                [ "title" => "Mitarbeiter hinzufügen", "controller" => "Users", "action" => "add" ],
                // [ "title" => "Arbeitszeitkonto", "controller" => "Workinghours", "action" => "index" ],
                [ "title" => "Mitarbeitergruppen", "controller" => "Groups", "action" => "index" ],
            ];
            $this->navItems[] = [ "title" => "Auswertungen","controller" => "Reportings", "action" => "index" ];
        }

        if( !in_array($this->Auth->user('group_id'), ['4']) ){
            unset($this->navItems['Flugzeuge'][1]);
            unset($this->navItems['Flüge'][1]);
        }

    }

    public function startup( $event ){
        // if( $this->controller->Auth->isAuthorized() ){
            // $this->setAroObjects();

            $this->controller->set( 'navItems', $this->navItems );
            // $this->controller->set( 'userData', $this->controller->Auth->user() );
        // }
    }

    // private function filterByAuthorization( $navItems ){
    //     foreach($navItems as $key => &$navItem){

    //         if(isset($navItem['title'])){
    //             if(!$this->controller->Acl->check($this->groupAro, $this->createControllerActionPair($navItem)) &&
    //                !$this->controller->Acl->check($this->userAro, $this->createControllerActionPair($navItem))    ){
    //                 unset($navItems[$key]);
    //             }
    //         }else{
    //             $navItem = $this->filterByAuthorization( $navItem );

    //             if(empty($navItems[$key])){
    //                 unset($navItems[$key]);
    //             }
    //         }
    //     }

    //     return $navItems;
    // }

    // private function createControllerActionPair( $navItem ){
    //     return $navItem['controller'].'/'.$navItem['action'];
    // }

    // private function setAroObjects(){
    //     $this->groupAro = ['model' => 'Groups', 'foreign_key' => $this->controller->Auth->user('group_id')];
    //     $this->userAro = ['model' => 'Users', 'foreign_key' => $this->controller->Auth->user('id')];
    // }
}

?>
