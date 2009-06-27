<?php
require_once '../lib/View.class.php';
class ViewPHP extends View {	
	private $data;
	public function __construct($filename){
		parent::__construct($filename);
		$this->data = array();
	}
	public function assign($label, $value){
		$this->data[$label] = $value;
	}
	protected function process(){
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
}