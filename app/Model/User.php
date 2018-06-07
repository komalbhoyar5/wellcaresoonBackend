<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $displayField = 'email';

	public $belongsTo = array(
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id'
        )
    );

	public $validate = array(
		'f_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'First name Cannot be Empty',
			)
		),
		'l_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Last name Cannot be Empty',
			)
		),
		'email' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Email ID Cannot be Empty',
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Enter a Valid Email ID',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'This email id Already Exists'
			)
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Password Cannot be Empty',
			)
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Password Cannot be Empty',
			),
			'length' => array(
		        'rule'      => array('between', 6, 40),
		        'message'   => 'Your password must be between 6 and 40 characters.'
		    )
		),
		'confirm_password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Password Cannot be Empty',
	
			),
			'length' => array(
		        'rule'      => array('between', 6, 40),
		        'message'   => 'Your password must be between 6 and 40 characters.'
		    ),
		    'compare'    => array(
		        'rule'      => array('validate_respasswords'),
		        'message' => 'The passwords you entered do not match.'
		    )
		)
	);
	
	public function validate_respasswords() {
		if ($this->data[$this->alias]['password'] != $this->data[$this->alias]['confirm_password']) {
	    	return "Password do not match";
	    }else{
	    	return true;
	    }
	}

	/* Check For API Login access*/
	public function login_Api_Rest($data = NULL){
		if($data == NULL)
			return false;
		 
		if((!$data->email) || (!$data->password))
			return false;
		
		$email	= $data->email; 
		$password	= AuthComponent::password($data->password);
		$this->recursive = -1;
		$result = $this->find('first', 
									array("conditions" => array(
															"email LIKE "	=> trim($email), 
															"password LIKE "=> trim($password)
														)
										)
								);
		
		return $result;  
	}

	public function beforeSave($options = array()) {
		if(isset($this->data['User']['password'])) {
			$pwhash = new SimplePasswordHasher();
			$this->data['User']['password'] = $pwhash->hash(
				$this->data['User']['password']
			);
			return true;
		}
		return true;
	}
}
