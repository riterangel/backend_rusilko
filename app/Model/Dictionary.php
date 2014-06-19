<?php
/**
 * Created by PhpStorm.
 * User: Luis Miguel Torrico
 * Date: 24-10-13
 * Time: 05:26 PM
 */

class Dictionary extends AppModel {
    public $name = 'Dictionary';
    var $useTable = 'dictionary';
    //var $displayField = 'descripcion';
    public $primaryKey = 'id';

    public $belongsTo = array(
        'Language' => array(
            'className' => 'Language',
            'foreignKey' => 'language_id'
        ),
        'Key' => array(
            'className' => 'Key',
            'foreignKey' => 'key'
        )
    );
} 