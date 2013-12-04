<?php
/**
 * PictureFixture
 *
 */
class PictureFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'book_id' => array('type' => 'biginteger', 'null' => true),
		'image_file_name' => array('type' => 'string', 'null' => true, 'length' => 256),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id'),
			'pictures_book_id_key' => array('unique' => true, 'column' => 'book_id')
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
			'book_id' => '',
			'image_file_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
