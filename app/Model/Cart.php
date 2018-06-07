<?php
App::uses('AppModel', 'Model');
/**
 * Brandmaster Model
 *
 */
class Cart extends AppModel {

	public $useTable = 'cart';

	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}