<?php
require_once 'lib/Model.class.php';
class Comment extends Model {
    public static function getAll (){
        self::_query('SELECT * FROM comments');
    }
}