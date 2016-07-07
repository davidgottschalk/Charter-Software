<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Log\LogTrait;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    use LogTrait;
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize(){

        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Navigation');

        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Flights',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
            ]
        ]);
        $this->set('authUser', $this->Auth->user());
    }

    public function beforeFilter(Event $event){

        // if(  ){
        //     if( $this->request->action != 'login' && $this->request->action != 'logout' ){
        //         $this->Flash->error('Der Benutzer konnte gefunden werden.');
        //         return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        //     }
        // }

        if($this->Auth->user() && $this->request->action == 'login' && $this->Auth->user('status') != USER_PASSWORD_CHANGE ){ // wenn auf login redirect aber bereits eingeloggt dann auf flights/index
            return $this->redirect(['controller' => 'Flights', 'action' => 'index']);
        }

        if( $this->Auth->user('status') == USER_PASSWORD_CHANGE) {
            if( $this->request->action != 'passwordChange' && $this->request->action != 'login' && $this->request->action != 'logout'){
                return $this->redirect(['controller' => 'users', 'action' => 'passwordChange', $this->Auth->user('id') ]);
            }
        }
    }
}
