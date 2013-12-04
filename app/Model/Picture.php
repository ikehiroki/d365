<?php

App::uses('AppModel', 'Model');

/**
 * Picture Model
 *
 * @property Book $Book
 */
class Picture extends AppModel {

    var $actsAs = array(
        'UploadPack.Upload' => array(
            'image' => array(
                'styles' => array(
                    'thumb' => '100x125'
                )
            )
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Book' => array(
            'className' => 'Book',
            'foreignKey' => 'picture_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
