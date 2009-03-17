<?php
require_once 'lib/Model.class.php';
class Comment extends Model {
    public function getAll (){
        $this->_query('SELECT * FROM comments');
    }
}