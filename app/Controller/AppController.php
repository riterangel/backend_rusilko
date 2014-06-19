<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

session_start();
require_once("facebook/facebook.php");


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $ext = '.php';

    public $like=true;

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'index', 'admin' => true),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login', 'admin' => true),
            'authorize' => array('Controller')
        )
    );

    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        // Default deny
        return false;
    }

    public function beforeFilter() {

        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            $this->Auth->deny();
        } else {
            $this->Auth->allow();
        }
    }

    function beforeRender() {
        if($this->name == 'CakeError') {
            $this->layout = 'error';
        }
    }

    //***********  Mi Metodos de Ayuda
    public  function getConfigFacebook() {
        /* Configuracion de el AppFacebook cambiar el appId y secret por los codigos que proporsiona Facebook*/
        $config = array('appId' => '559917344092598','secret'=>'6d7ec7106bca1dcc0765bd9c226b5ad3',
            'fileUpload' => false, 'cookie' => true);

        /* Codigos de Prueba en modo testing*/
        /*$config = array('appId' => '771893319494562','secret'=>'b64a0254bd94949c1efb533797c893fa',
            'fileUpload' => false, 'cookie' => true);*/

        return $config;
    }

    public  function getUrlATab() {
        /* Cambiar la direccion por la direccion de la app que proporsiona Facebook*/
        $direccionTabFacebook='http://www.facebook.com/unileverweb/app_559917344092598';

        /* Direccion de Prueba en modo testing*/
        //$direccionTabFacebook='http://www.facebook.com/unileverweb/app_771893319494562';

        return $direccionTabFacebook;
    }

    public function getIdLike(){
        /*Cambiar por el codigo de la FanPage que desean utilizar*/
        $codigoFanPage='519504951472584';
        return $codigoFanPage;
    }

    public function configEmail() {
        $gmail = array(
            'transport' => 'Smtp',
            'from' => array('riter.angelito@gmail.com' => 'VITE'),
            'host' => 'ssl://smtp.gmail.com',
            'port' => 465,
            'timeout' => 10,
            'username' => 'riter.cordova@gmail.com',
            'password' => 'riter123angel',
            'client' => null,
            'log' => true,
            //'charset' => 'utf-8',
            //'headerCharset' => 'utf-8',
            'emailFormat' => 'html'
        );
        return $gmail;
    }
    public function sendEmail($template, $from, $to, $subject, $params = null) {
        try{
            App::uses('CakeEmail', 'Network/Email');
            $Email = new CakeEmail();
            $Email->config($this->configEmail());
            $Email->template($template);
            $Email->emailFormat('html');
            $Email->from($from);
            $Email->to($to);
            $Email->subject($subject);
            if($params != null){
                $Email->viewVars($params);
            }
            $Email->send();
        }catch (Exception $e){

        }
    }
}
