<?php
/**
 * BookFixture
 *
 */
class BookFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'first_name' => array('type' => 'string', 'null' => false, 'length' => 32),
		'middle_name' => array('type' => 'string', 'null' => true, 'length' => 32),
		'last_name' => array('type' => 'string', 'null' => false, 'length' => 32),
		'kana_first_name' => array('type' => 'string', 'null' => false, 'length' => 32),
		'kana_middle_name' => array('type' => 'string', 'null' => true, 'length' => 32),
		'kana_last_name' => array('type' => 'string', 'null' => false, 'length' => 32),
		'email' => array('type' => 'string', 'null' => false, 'length' => 256),
		'phone' => array('type' => 'string', 'null' => true, 'length' => 32),
		'extension_phone' => array('type' => 'string', 'null' => true, 'length' => 32),
		'location_id' => array('type' => 'biginteger', 'null' => true),
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
			'first_name' => 'Lorem ipsum dolor sit amet',
			'middle_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'kana_first_name' => 'Lorem ipsum dolor sit amet',
			'kana_middle_name' => 'Lorem ipsum dolor sit amet',
			'kana_last_name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'phone' => 'Lorem ipsum dolor sit amet',
			'extension_phone' => 'Lorem ipsum dolor sit amet',
			'location_id' => ''
		),
	);

}
