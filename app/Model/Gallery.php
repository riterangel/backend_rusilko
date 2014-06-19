<?php
/**
 * Created by PhpStorm.
 * User: Luis Miguel Torrico
 * Date: 24-10-13
 * Time: 05:26 PM
 */

class Gallery extends AppModel {
    public $name = 'Gallery';
    var $useTable = 'galleries';
    //var $displayField = 'name';
    public $primaryKey = 'id';
}