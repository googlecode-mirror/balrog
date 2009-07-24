<?php
abstract class View{
	protected $filename;
	public function __construct($filename){
		$this->filename = $filename;
	}
	abstract public function show();
	protected function __toString(){
		return $this->show();
	}
}