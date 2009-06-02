<?php
require_once '../php/facebook.php';
require_once '../lib/Controller.class.php';
abstract class FacebookController extends Controller {
	protected $facebook;
	protected $uid;
	public function __construct(){
		parent::__construct();		
		$this->facebook = new Facebook(self::APIKEY, self::SECRET);
        $this->facebook->require_frame();
        $this->uid = $this->facebook->require_login();		
	}
}