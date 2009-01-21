<?php
require_once 'lib/Controller.class.php';
class Home extends Controller
{
    public function index ()
    {
        $this->display('index.html');
    }
    public function printing(){
        $this->display('print.html');
    }
    public function tooltips1 ()
    {
        $this->display('tooltips1.html');
    }
    public function tooltips2 ()
    {
        $this->display('tooltips2.html');
    }
    public function xml ()
    {
        $this->display('xml.html');
    }
}