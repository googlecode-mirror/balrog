<?php
class View{
	protected $view;
	protected $data;
	public function __construct($view = NULL){
		$this->data = array ();
		$this->setView($view);
	}
	private function setView($path)
	{
		$this->view = $path;
	}
	public function setData($key, $value)
	{
		$this->data[$key] = $value;
	}
	public function process(){
		extract($this->data);
		ob_start();
		if(!empty($this->view)){
			include $this->view;
		}
		$this->view = ob_get_clean();
		ob_end_clean();
	}
	public function render(){
		echo $this->view;
	}
}