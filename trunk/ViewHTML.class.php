<?php
require_once 'lib/ViewXML.class.php';
class ViewHTML extends ViewXML {
	public function show(){
		return $this->domdoc->saveHTML();
	}
}