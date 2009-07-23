<?php
require_once '../lib/Connection.class.php';
abstract class Model
{
	private $result;
	public function __construct(){
		$this->result = NULL;
	}
	public function query($sql){
		$this->result = Connection::getInstance()->query($sql);
	}
	public function next(){
		return $this->result->fetch(PDO::FETCH_INTO, $this);
	}
}