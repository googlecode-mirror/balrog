<?php
require_once 'lib/MySQLiModel.class.php';
class Comment extends MySQLiModel {
    private $id;
    private $title;
    private $body;
    public function setTitle($value){
        $this->title = $value;
    }
    public function setBody($value){
        $this->body = $value;
    }
    public function save(){
        if(!isset($id)){
            $this->query(sprintf('INSERT INTO comments (title, body) VALUES ("%s", "%s")', $this->title, $this->body));
            $this->id = $this->getLastID();
        } else {
            $this->query(sprintf('UPDATE comments SET title = "%s", body = "%s"', $this->title, $this->body));
        }
    }
}