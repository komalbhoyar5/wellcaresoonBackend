<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Category $Category
 * @property Seller $Seller
 */
class Product extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'category_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'product_UID' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Product UID should not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'This product UID is already exist, Please provide unique product UID.'
			)
		),
		'type' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'summary' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
		'price' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter numeric value.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		// 'discount' => array(
		// 	'notEmpty' => array(
		// 		// 'rule' => array('notEmpty'),
		// 	// 	//'message' => 'Your custom message here',
		// 		'allowEmpty' => true,
		// 		'required' => false,
		// 	// 	//'last' => false, // Stop validation after this rule
		// 	// 	//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// 	'numeric' => array(
		// 		'rule' => array('numeric'),
		// 		'message' => 'Please enter numeric value.',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		'MOQ' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter numeric value.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'product_count' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter numeric value.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'variant_type' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please provide variant type.',
				// 'allowEmpty' => false,
				// 'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'add', // Limit validation to 'create' or 'update' operations
			),
		),
		'product_variant' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please provide variant value.',
				// 'allowEmpty' => false,
				// 'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'add', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'seller_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Brandmaster' => array(
			'className' => 'Brandmaster',
			'foreignKey' => 'brand_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	// public $hasMany = array(
	// 	'Category' => array(
	// 		'className' => 'Category',
	// 		'foreignKey' => 'category_id',
	// 		'conditions' => '',
	// 		'fields' => '',
	// 		'order' => '',
	// 		'conditions' => array('Category.id'=>'Product.category_id')
	// 	),
	// );
}
