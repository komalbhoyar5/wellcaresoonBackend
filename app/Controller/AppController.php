<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
	public $components = array(
		'Cookie',
		'Session',
		'Auth' => array(
			'loginRedirect' => array(
				'controller' => 'dashboard',
				'action' => 'index'
			),

			'logoutRedirect' => array(
				'controller' => 'users',
				'action' => 'login'
			),

			'authError' => 'Access Denied',
			
			'authorize' => array('Controller'),
			'loginError' => 'Invalid Username or Password entered, please try again.',
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'email')
				)
			)
		)
	);

	public function isAuthorized($user) {
		return true;
	}

	public function beforeFilter() {
		$this->Auth->allow('login');
		$this->loadModel('Setting');
		$company_details = $this->Setting->find('first', array('conditions'=>array('name'=>'company_name')));
		$this->set('company_name',$company_details['Setting']['value']);
        $this->set('company_logo',$company_details['Setting']['other']);

		$company_curr = $this->Setting->find('first', array('conditions'=>array('name'=>'currency')));
		$this->set('currency', $company_curr['Setting']['other']);
	}

	public function user_group(){
		$this->loadModel('Group');
		$group = $this->Group->find('all');
		$options = Set::combine($group, '{n}.Group.id', '{n}.Group.name');
		return $options;
	}

}