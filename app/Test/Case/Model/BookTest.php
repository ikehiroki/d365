<?php
App::uses('Book', 'Model');

/**
 * Book Test Case
 *
 */
class BookTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Book = ClassRegistry::init('Book');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Book);

		parent::tearDown();
	}

}
