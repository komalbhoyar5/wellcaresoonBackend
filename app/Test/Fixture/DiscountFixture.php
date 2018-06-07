<?php
/**
 * DiscountFixture
 *
 */
class DiscountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'discount_code' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'discount_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'discount_desc' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'discount_rate' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '10,2', 'unsigned' => false),
		'discount_amount' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '10,2', 'unsigned' => false),
		'discount_img' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'discount_max_user' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'discount_max_usage' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'discount_start_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'discount_end_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'date_created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'discount_min_order_value' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'discount_num_times_used' => array('type' => 'biginteger', 'null' => true, 'default' => '0', 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'discount_code' => 'Lorem ipsum dolor sit amet',
			'discount_name' => 'Lorem ipsum dolor sit amet',
			'discount_desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'discount_rate' => 1,
			'discount_amount' => 1,
			'discount_img' => 'Lorem ipsum dolor sit amet',
			'discount_max_user' => 'Lorem ips',
			'discount_max_usage' => 'Lorem ips',
			'discount_start_date' => '2018-01-18 19:12:03',
			'discount_end_date' => '2018-01-18 19:12:03',
			'date_created' => '2018-01-18 19:12:03',
			'discount_min_order_value' => 'Lorem ipsum dolor sit amet',
			'discount_num_times_used' => ''
		),
	);

}
