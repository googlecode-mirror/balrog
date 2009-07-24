<?php
require_once 'lib/View.class.php';
class ViewPHP extends View {
	private $data;
	public function __construct($filename){
		parent::__construct($filename);
		$this->data = array();
	}
	public function assign($label, $value){
		$this->data[$label] = $value;
	}
	public function show(){
		extract($this->data);
		ob_start();
		if(!empty($this->filename)){
			include $this->filename;
		}
		return ob_get_clean();
	}
}