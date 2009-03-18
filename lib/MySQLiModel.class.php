<?php
abstract class MySQLiModel extends Model implements Config
{
    protected $conn;
    public function __construct(){
        $this->conn = new mysqli(self::DBHOST, self::DBUSER, self::DBPASS, self::DBNAME);
    }
    protected static function _query($sql){
        return $this->conn->query($sql);
    }
    public function __destruct(){
        $this->conn->close();
    }
}