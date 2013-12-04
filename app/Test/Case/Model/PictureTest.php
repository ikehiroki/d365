<?php
App::uses('Picture', 'Model');

/**
 * Picture Test Case
 *
 */
class PictureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.picture',
		'app.book',
		'app.location',
		'app.position',
		'app.positions_book',
		'app.section',
		'app.sections_book'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Picture = ClassRegistry::init('Picture');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Picture);

		parent::tearDown();
	}

}
