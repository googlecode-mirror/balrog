<?php
require_once 'lib/Config.interface.php';
require_once '../lib/Url.class.php';
require_once '../lib/FrontController.class.php';
$controller = Url::get_param('c');
$action = Url::get_param('a');
$fc = new FrontController($controller, $action);
$fc->excecute();
