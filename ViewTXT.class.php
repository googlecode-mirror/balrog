<?php
require_once '../core/View.class.php';
class ViewTXT extends View {
	public function show(){
		return file_get_contents($this->filename);
	}
} 