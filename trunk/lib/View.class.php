<?php
require_once 'View.interface.php';
class View implements IView{
	protected $filename;
	protected $output;
	protected $data;
	public function __construct($filename){
		$this->filename = $filename;
		$this->data = array();
	}
	public function assign($label, $value){
		$this->data[$label] = $value;
	}
	private function process(){
		extract($this->data);
		ob_start();
		if(!empty($this->filename)){
			include $this->filename;
		}
		$this->output = ob_get_clean();				
	}
	public function show(){
		$this->process();
		return $this->output;
	}
	public function __toString(){
		return $this->show();
	}	
}