<?php
App::uses('Slidermaster', 'Model');

/**
 * Slidermaster Test Case
 *
 */
class SlidermasterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.slidermaster'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Slidermaster = ClassRegistry::init('Slidermaster');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Slidermaster);

		parent::tearDown();
	}

}
