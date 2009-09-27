<?php
require_once '../core/ViewXML.class.php';
class ViewHTML extends ViewXML {
	public function show(){
		return $this->domdoc->saveHTML();
	}
}