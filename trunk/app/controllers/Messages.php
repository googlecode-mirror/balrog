<?php
require_once '../lib/Controller.interface.php';
require_once '../lib/ViewFactory.class.php';
class Messages implements IController {
	public function index(){
		return 'mensaje';
	}
}
