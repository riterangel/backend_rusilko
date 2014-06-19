<?php
/**
 * Created by PhpStorm.
 * User: Luis Miguel Torrico
 * Date: 24-10-13
 * Time: 05:26 PM
 */

class Key extends AppModel {
    public $name = 'Key';
    var $useTable = 'keys';
    var $displayField = 'key';
    public $primaryKey = 'key';
}