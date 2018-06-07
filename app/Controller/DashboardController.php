<?php
class DashboardController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();

	    $this->loadModel('Setting');
		$company_details = $this->Setting->find('first', array('conditions'=>array('name'=>'company_name')));
		$this->Session->write('company_name',$company_details['Setting']['value']);
        $this->Session->write('company_logo',$company_details['Setting']['other']);

	}
	public function isAuthorized($user) {
		return true;
	}

	public function index() {
		$this->layout = "backend_template";
		
	}
}