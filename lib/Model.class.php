<?php
require_once '../lib/Connection.class.php';
abstract class Model implements Iterator
{
	protected $conn;
	private $result;
	public function __construct(){
		$this->conn = Connection::getInstance();
		$this->result = NULL;
	}
	abstract function map($obj);
	public function query($sql){
		$this->result = $this->conn->query($sql);
		if($this->result){
			$this->next();
		}
	}
	public function next(){
		return $this->map($this->result->fetch_object());
	}
}