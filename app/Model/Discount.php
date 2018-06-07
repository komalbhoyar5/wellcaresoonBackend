<?php
App::uses('AppModel', 'Model');
/**
 * Discount Model
 *
 */
class Discount extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'discount_code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Discount code should not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'This discount code is Already Exists'
			)
		),
		'discount_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Discount name should not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'discount_desc' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Discount description should not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'discount_rate' => array(
			// 'numeric' => array(
			// 	'rule' => array('numeric'),
			// 	//'message' => 'Your custom message here',
			// 	//'allowEmpty' => false,
			// 	//'required' => false,
			// 	//'last' => false, // Stop validation after this rule
			// 	//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
			'checkcoupentype'    => array(
		        'rule'      => array('checkcoupentype'),
		        'message' => 'test.'
		    )
		),
		// 'discount_amount' => array(
		// 	'numeric' => array(
		// 		'rule' => array('numeric'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	)
		// ),
		// 'discount_img' => array(
		// 	'notEmpty' => array(
		// 		'rule' => array('notEmpty'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		// 'discount_max_user' => array(
		// 	'notEmpty' => array(
		// 		'rule' => array('notEmpty'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// 	'numeric' => array(
		// 		'rule' => array('numeric'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		// 'discount_max_usage' => array(
		// 	'notEmpty' => array(
		// 		'rule' => array('notEmpty'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// 	'numeric' => array(
		// 		'rule' => array('numeric'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		'discount_start_date' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Date fields should not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'discount_end_date' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Date fields should not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		// 'discount_min_order_value' => array(
		// 	'notEmpty' => array(
		// 		'rule' => array('notEmpty'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		// 'discount_num_times_used' => array(
		// 	'notEmpty' => array(
		// 		'rule' => array('notEmpty'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		// 'discount_first_order_only' => array(
		// 	'notEmpty' => array(
		// 		'rule' => array('notEmpty'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
	);
	public function checkcoupentype() {
		if ($this->data['Discount']['discount_rate'] ==""  && $this->data['Discount']['discount_amount']=="") {
	    	return "Please enter discount rate or amount";
	    }
	    else if($this->data['Discount']['discount_rate'] !=""  && $this->data['Discount']['discount_amount']!=""){
	    	return "Please enter discount rate or amount, do not enter both type.";
	    }
	    else{
	    	return true;
	    }
	}
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'created_by',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
