<?php
/**
 * Created by PhpStorm.
 * User: Luis Miguel Torrico
 * Date: 24-10-13
 * Time: 05:26 PM
 */

class Language extends AppModel {
    public $name = 'Language';
    var $useTable = 'languages';
    var $displayField = 'name';
    public $primaryKey = 'id';
}