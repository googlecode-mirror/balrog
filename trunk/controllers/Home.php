<?php
require_once 'lib/Controller.class.php';
class Home extends Controller
{
    public function index ()
    {
        $this->_setView('index');        
    }
    public function printing(){
        $this->_setView('print');
    }
    public function tooltips1 ()
    {
        $this->_setView('tooltips1');
    }
    public function tooltips2 ()
    {
        $this->_setView('tooltips2');
    }
    public function xml ()
    {
        $this->_setView('xml');
    }
}