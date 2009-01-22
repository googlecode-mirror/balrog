<?php
require_once 'lib/Controller.class.php';
class Home extends Controller
{
    public function index()
    {
    	$this->_setData('title', 'Examples Collection');
        $this->_setView('index');
    }
    public function printing()
    {
        $this->_setData('title', 'Printing Examples');
        $this->_setView('print');
    }
    public function tooltips1()
    {
        $this->_setData('title', 'Tooltips using jQuery');
        $this->_setView('tooltips1');
    }
    public function tooltips2()
    {
        $this->_setData('title', 'Tooltips as a jQuery plugin');
        $this->_setView('tooltips2');
    }
    public function xml()
    {
        $this->_setData('title', 'Autoloading XML');
        $this->_setView('xml');
    }
}
