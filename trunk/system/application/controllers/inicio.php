<?php
class Inicio extends Controller {
    public function __construct(){        
        parent::Controller();
    }
    public function index(){
        $data = array();
        $data['colizq'] = $this->load->view('menunav',NULL,TRUE);
        $data['cuerpo'] = 'Cuerpo...';
        $data['colder'] = 'Columna Derecha';        
        $this->load->view('inicio', $data);
    }
}