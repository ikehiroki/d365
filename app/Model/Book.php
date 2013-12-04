<?php

App::uses('AppModel', 'Model');

/**
 * Book Model
 *
 * @property Location $Location
 * @property Picture $Picture
 * @property Position $Position
 * @property Section $Section
 */
class Book extends AppModel {

    public $actsAs = array('Search.Searchable');
    public $filterArgs = array(
        'name' => array('type' => 'like', 'field' => array('Book.name', 'Book.kana_name', 'Book.email', 'Book.phone')),
        'Location' => array('type' => 'value', 'field' => 'Book.location_id'),
        'Section' => array('type' => 'value', 'field' => 'SectionsBook.section_id'),
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'first_name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'last_name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'kana_first_name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'kana_last_name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    /**
     * virtualFields
     * 
     * @var array 
     */
    public $virtualFields = array(
        'name' => 'Book.last_name||\' \'|| Book.first_name',
        'kana_name' => 'Book.kana_last_name||\' \'|| Book.kana_first_name',
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Location' => array(
            'className' => 'Location',
            'foreignKey' => 'location_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Picture' => array(
            'className' => 'Picture',
            'foreignKey' => 'picture_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'SectionsBook' => array(
            'className' => 'SectionsBook',
            'foreignKey' => '',
            'conditions' => 'Book.id = SectionsBook.book_id',
            'fields' => '',
            'order' => ''
        ),
    );

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Position' => array(
            'className' => 'Position',
            'joinTable' => 'positions_books',
            'foreignKey' => 'book_id',
            'associationForeignKey' => 'position_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
        'Section' => array(
            'className' => 'Section',
            'joinTable' => 'sections_books',
            'foreignKey' => 'book_id',
            'associationForeignKey' => 'section_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );

}
