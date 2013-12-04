<?php
/**
 * SectionsBookFixture
 *
 */
class SectionsBookFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'section_id' => array('type' => 'biginteger', 'null' => true),
		'book_id' => array('type' => 'biginteger', 'null' => true),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id')
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '',
			'section_id' => '',
			'book_id' => ''
		),
	);

}
