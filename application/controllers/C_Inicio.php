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
        $data['animales'] = $this -> animal -> obtenerPorCentro(1);
 		$this->load->view('Plantillas/V_Header',$data);
 		$this->load->view('V_Inicio');
 		$this->load->view('Plantillas/V_Footer');		
 	}
 
 }

 ?>