<?php
App::uses('SectionsBook', 'Model');

/**
 * SectionsBook Test Case
 *
 */
class SectionsBookTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sections_book',
		'app.section',
		'app.book',
		'app.location',
		'app.position',
		'app.positions_book'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SectionsBook = ClassRegistry::init('SectionsBook');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SectionsBook);

		parent::tearDown();
	}

}
