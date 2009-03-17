<?php
abstract class Model implements Config
{
    protected $conn;
    public function __construct(){
        $this->conn = new mysqli(self::DBHOST, self::DBUSER, self::DBPASS, self::DBNAME);
    }
    protected function _query($sql){
        return $this->conn->query($sql);
    }
    public function __destruct(){
        $this->conn->close();
    }
}