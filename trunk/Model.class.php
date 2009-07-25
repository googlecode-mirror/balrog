<?php
require_once 'lib/Connection.class.php';
abstract class Model
{
	private $result;
	/**
	 * Default Model constructor
	 * 
	 * @return 
	 */
	public function __construct(){
		$this->result = NULL;
	}
	/**
	 * Excecutes the given query
	 * 
	 * @param string $sql
	 * @return 
	 */
	public function query($sql){
		$this->result = Connection::getInstance()->query($sql);
	}
	/**
	 * Fetches the next record from the current recordset
	 * 
	 * @return 
	 */
	public function next(){
		return $this->result->fetch(PDO::FETCH_INTO, $this);
	}
}