<?php
App::uses('Brandmaster', 'Model');

/**
 * Brandmaster Test Case
 *
 */
class BrandmasterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.brandmaster'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Brandmaster = ClassRegistry::init('Brandmaster');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Brandmaster);

		parent::tearDown();
	}

}
