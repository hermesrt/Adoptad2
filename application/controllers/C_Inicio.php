<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Inicio extends CI_Controller {

   public function __construct()
   {
       parent::__construct();
       $this -> load -> model ('M_Animal','animal');
   }

   public function index()
   {
    if ($this->session->userdata('id_centro')){
        $data['animales'] = $this -> animal -> obtenerPorCentro($this->session->userdata('id_centro')); 
    } else {
        $data['animales'] = $this -> animal -> obtenerTodos();
    }
    $this->load->model('M_Centro_adopcion','CA');
    $data['centros']=$this->CA->obtenerTodos();
    $data['especies'] = $this->animal->especieDistinct();
    $data['razas'] = $this->animal->razaDistinct();

    $this->load->view('Plantillas/V_Header',$data);
    $this->load->view('V_Inicio');
    $this->load->view('Plantillas/V_Footer');		
}

public function getAnimales()
{
    if ($this->input->post()) {
        echo json_encode($this -> animal -> obtenerTodos($this->input->post()));

    } else {
       echo json_encode($this -> animal -> obtenerTodos());
   }

}

}

?>