<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Setting extends AppModel {
	public $displayField = 'email';

	public $validate = array(
		'pincode' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		)
	);
	public function getcurrency(){
		$currency = $this->find('first', array('conditions'=>array('name'=>'currency')));
		return $currency;
	}
	public function beforeSave($options = array()) {
		
	}
}
