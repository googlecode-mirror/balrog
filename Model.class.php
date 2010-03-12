<?php
require_once './core/Connection.class.php';
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
	public function fetch(){
		$this->result->setFetchMode(PDO::FETCH_INTO, $this);
		return $this->result->fetch(PDO::FETCH_INTO);
	}
	/**
	 * Default getter
	 * 
	 * @param string $key
	 */
	public function __get($key){
		$method = 'get'.ucfirst($key);
		return $this->$method();
	}
	/**
	 * Default setter
	 * 
	 * @param string $key
	 */
	public function __set($key, $value){
		$method = 'set'.ucfirst($key);
		return $this->$method($value);
	}
}