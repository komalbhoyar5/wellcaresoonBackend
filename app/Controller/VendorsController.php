<?php
class VendorsController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login','register','forgot_password','reset_password');

	}
	public function isAuthorized($user) {
		return true;
	}

	public function index() {
		$this->layout = "backend_template";
		
	}

	public function login(){
		$this->layout = "login_backend";
		if($this->request->is('post')) {
			if($this->Auth->login()) {
				$this->loadModel('Users');	
				print_r($this->Auth->user());
				if ($this->Auth->user('group_id') == 4) {
					if ($this->Auth->user('status') == 'Active') {
						$this->Session->setFlash('Login successfully!', '', array(), 'Success');
						$this->redirect($this->Auth->redirect());
					}else{
						$this->Session->setFlash('Your account has not been activated. Please check your email to verify your account or contact to our help center.', '', array(), 'fail');
						$this->redirect(array('controller'=>'vendors', 'action'=>'login'));	
					}
				}else{
					$this->Session->setFlash('You are not registered as vendor. Please contact to our team for support.', '', array(), 'fail');
					$this->redirect(array('controller'=>'vendors', 'action'=>'login'));
				}
			}
			else {
				$this->Session->setFlash('Username or Password do not Match', '', array(), 'fail');
			}
		}
	}

	public function register() {
		$this->layout = "login_backend";
		$this->loadModel('User');
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['group_id'] = 4;
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}


	public function forgot_password() {
		$this->layout = "login_backend";
		$this->loadModel('User');
		if ($this->request->is('post')) {
			$PostData = $this->request->data;
			$this->User->recursive = -1;
			$user = $this->User->find('first',array('conditions'=> array('User.email' => $PostData['User']['email'], 'User.group_id'=>'4')));
			
			if($user){
				$Component = $this->Components->load('General');
				$tokenKey = $Component->generateRandomString();
				// echo $tokenKey;
				$this->User->id = $user['User']['id'];
				$this->request->data['User']['temp_password'] = $tokenKey;
				if ($this->User->save($this->request->data)) {
					$Component = $this->Components->load('Email');

					$this->loadModel('Setting');
					$company_details = $this->Setting->find('first', array('conditions'=>array('name'=>'company_name')));

					$return = $Component->sendForgotPasswordMail($user,$tokenKey,$company_details['Setting'],'vendors');

					$this->Session->setFlash('The mail has been sent, please check your mail.', '', array(), 'success');
				}else{
					$this->Session->setFlash('This reset email could not send. Please try again.', '', array(), 'fail');
				}
			}else{
				$this->Session->setFlash('This email does not exist.', '', array(), 'fail');
			}
		}
	}

	public function reset_password($id, $tokenKey) {
		$this->layout = "login_backend";
		$this->loadModel('User');
		$this->User->recursive = -1;
		$user = $this->User->find('first', array('conditions'=>array('id'=>$id, 'temp_password' => $tokenKey)));
		if (empty($user)) {
			$this->Session->setFlash('Reset password token has been expired.', '', array(), 'fail');
			$this->redirect(array('controller'=>'vendors', 'action' => 'login'));
		}
		if ($this->request->is('post')) {
				if ($this->request->data['User']['password'] == $this->request->data['User']['confirm_password']) {
					$this->request->data['User']['id'] = $user['User']['id'];
					$this->request->data['User']['temp_password'] = "";
					if ($this->User->save($this->request->data)) {
						$this->Session->setFlash('Your password updated successfully', '', array(), 'success');
						$this->redirect(array('controller'=>'vendors', 'action'=>'login'));
					} else {
						$this->Session->setFlash('The password could not be saved. Please, try again.', '', array(), 'fail');
					}
				}else{
					$this->Session->setFlash('Password do not match.', '', array(), 'fail');
				}
		}
	}
}