<?php
class View{
	protected $filename;
	protected $output;
	protected $data;
	public function __construct($filename){
		$this->filename = $filename;
	}
	public function fill($dump){
		
		$this->data = is_array($dump) ? $dump : array();
	}
	public function process(){
		extract($this->data);
		ob_start();
		if(!empty($this->filename)){
			include $this->filename;
		}
		$this->output = ob_get_clean();
		ob_end_clean();
	}
	public function render(){
		echo $this->output;
	}
}