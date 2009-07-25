<?php
abstract class View{
	protected $filename;
	/**
	 * Default View constructor
	 * 
	 * @param string $filename
	 */
	public function __construct($filename){
		$this->filename = $filename;
	}
	/**
	 * Abstract show method 
	 */
	abstract public function show();
	/**
	 * When View is printed, excecutes show method
	 * @return 
	 */
	protected function __toString(){
		return $this->show();
	}
}