<?php
App::uses('Pincodemaster', 'Model');

/**
 * Pincodemaster Test Case
 *
 */
class PincodemasterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pincodemaster'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pincodemaster = ClassRegistry::init('Pincodemaster');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pincodemaster);

		parent::tearDown();
	}

}
