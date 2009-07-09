<?php
require_once '../lib/Connection.class.php';
abstract class Model implements Iterator
{
	protected $conn;
	public function __construct(){
		$this->conn = Connection::getInstance();
	}
	abstract function map($obj);
}