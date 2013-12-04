<?php
App::uses('PositionsBook', 'Model');

/**
 * PositionsBook Test Case
 *
 */
class PositionsBookTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.positions_book',
		'app.position',
		'app.book',
		'app.location',
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
		$this->PositionsBook = ClassRegistry::init('PositionsBook');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PositionsBook);

		parent::tearDown();
	}

}
