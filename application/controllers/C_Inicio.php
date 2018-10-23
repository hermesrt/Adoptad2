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
 		$this->load->view('Plantillas/V_Header',$data);
 		$this->load->view('V_Inicio');
 		$this->load->view('Plantillas/V_Footer');		
 	}
 
 }

 ?>