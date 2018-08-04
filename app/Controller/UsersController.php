<?php
class UsersController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login','register','forgot_password','reset_password');
	}
	public function isAuthorized($user) {
		return true;
	}

	public function index(){
		$this->layout = "backend_template";
		$users = $this->User->find('all');
		$this->set('users',$users);
	}

	public function edit($id) {
		$this->layout = "backend_template";
		$user = $this->User->find('first', array('conditions'=>array('User.id'=>$id)));
		$this->request->data = $user;
		$options = $this->user_group();
		$this->set('options', $options);
	}

	public function login() {
		$this->layout = "login_backend";
		if($this->request->is('post')) {
			if($this->Auth->login()) {
				$this->Session->setFlash('Login successfully!', '', array(), 'Success');
				$this->redirect($this->Auth->redirect());
			}
			else {
				$this->Session->setFlash('Username or Password do not Match', '', array(), 'fail');
			}
		}
	}

	public function register() {
		$this->layout = "login_backend";
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	public function logout() {
		if ($this->Auth->user('group_id') == 4) {
			$this->Auth->logout();
			$this->redirect(array('controller'=>'vendors', 'action' => 'login'));
		}else{
			$this->redirect($this->Auth->logout());
		}
	}

	public function profile() {
		$this->layout = "backend_template";
		$id = $this->Auth->user('id');
		if ($this->request->is(array('post','put'))) {
			$this->request->data['User']['id'] = $id;
			
			if ($this->User->save($this->request->data)) {
				$this->Session->write('Auth.User.f_name',$this->request->data['User']['f_name']);
				$this->Session->write('Auth.User.l_name',$this->request->data['User']['l_name']);
				if ($this->Auth->user('group_id') == '1' || $this->Auth->user('group_id') == '2') {
					$this->loadModel('Group');
					$group_id = $this->request->data['User']['group_id'];
					$group = $this->Group->find('first', array('conditions' => array('id'=> $group_id)));
					$this->Session->write('Auth.User.Group',$group['Group']);
				}
				$this->Session->setFlash('Your profile saved successfully.', '', array(), 'success');
			} else {
				$this->Session->setFlash('Unable to update your profile. Please, try again.', '', array(), 'fail');
			}
		}
		$this->request->data = $this->User->find('first', array('conditions'=>array('User.id' =>$id)));
		
		$options = $this->user_group();
		$this->set('options', $options);

	}

	public function user_type() {
		$this->layout = "backend_template";
		$this->loadModel('Group');
		$groups = $this->Group->find('all');
		$this->set('groups', $groups);
	}
	public function add_user_type(){
		$this->loadModel('Group');

		if ($this->request->is('post')) {
			$this->request->data['Group']['created'] = date('Y-m-d h:i:s a');
			$this->request->data['Group']['modified'] = date('Y-m-d h:i:s a');
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash('New user type created.', '', array(), 'success');
			} else {
				$this->Session->setFlash('User type could not be saved. Please, try again.', '', array(), 'fail');
			}
		}
		$this->redirect(array('action'=>'user_type'));
	}

	public function edit_user_type(){
		$this->loadModel('Group');

		if ($this->request->is('post')) {
			$this->request->data['Group']['modified'] = date('Y-m-d h:i:s a');
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash('Updated successfully.', '', array(), 'success');
			} else {
				$this->Session->setFlash('User type could not be saved. Please, try again.', '', array(), 'fail');
			}
		}
		$this->redirect(array('action'=>'user_type'));
	}

	public function delete_user_type($id){
		$this->loadModel('Group');

		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid Group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Group->delete()) {
			$this->Session->setFlash('The user type has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The user type could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'user_type'));
	}

	public function change_password() {
		$this->layout = "backend_template";
		if ($this->request->is(array('post','put'))) {
			$this->request->data['User']['id'] = $this->Auth->user('id');
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Password updated successfully.', '', array(), 'success');
			} else {
				$this->Session->setFlash('The passwords you entered do not match.', '', array(), 'fail');
			}
			$this->redirect(array('controller'=>'users', 'action'=>'change_password'));
		}
	}

	public function add_new_user(){
		$this->layout = "backend_template";
		if ($this->request->is('post')) {
			$Component = $this->Components->load('General');
			$random = $Component->generateRandomString();
			$this->request->data['User']['password'] = $random;
			$this->request->data['User']['temp_password'] = $random;
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$options = $this->user_group();
		$this->set('options', $options);
	}


	public function forgot_password() {
		$this->layout = "login_backend";
		if ($this->request->is('post')) {
			$PostData = $this->request->data;
			$this->User->recursive = -1;
			$user = $this->User->find('first',array('conditions'=> array('User.email' => $PostData['User']['email'], 'User.group_id'=>array('1','2'))));
			if($user){
				$Component = $this->Components->load('General');
				$tokenKey = $Component->generateRandomString();
				$this->User->id = $user['User']['id'];
				$this->request->data['User']['temp_password'] = $tokenKey;
				if ($this->User->save($this->request->data)) {
					$Component = $this->Components->load('Email');

					$this->loadModel('Setting');
					$company_details = $this->Setting->find('first', array('conditions'=>array('name'=>'company_name')));
					$contact_email_id = $this->Setting->find('first', array('conditions'=>array('name'=>'contact_email_id')));

					$return = $Component->sendForgotPasswordMail($user,$tokenKey,$company_details['Setting'], 'users', $contact_email_id['Setting']['value']);

					$this->Session->setFlash('The mail has been sent, please check your mail.', '', array(), 'success');
				}else{
					$this->Session->setFlash('This reset email could not send. Please try again.', '', array(), 'fail');
				}
			}else{
				$this->Session->setFlash('This email does not exist in system.', '', array(), 'fail');
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
			$this->redirect(array('controller'=>'users', 'action' => 'login'));
		}
		if ($this->request->is('post')) {
				if ($this->request->data['User']['password'] == $this->request->data['User']['confirm_password']) {
					$this->request->data['User']['id'] = $user['User']['id'];
					$this->request->data['User']['temp_password'] = "";
					if ($this->User->save($this->request->data)) {
						$this->Session->setFlash('Your password updated successfully', '', array(), 'success');
						$this->redirect(array('controller'=>'users', 'action'=>'login'));
					} else {
						$this->Session->setFlash('The password could not be saved. Please, try again.', '', array(), 'fail');
					}
				}else{
					$this->Session->setFlash('Password do not match.', '', array(), 'fail');
				}
		}
	}
}