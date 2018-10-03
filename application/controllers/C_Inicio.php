<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class C_Inicio extends CI_Controller {
 
 

 	public function index()
 	{
 		$this->load->view('Plantillas/V_Header');		
 		$this->load->view('V_Inicio');
 		$this->load->view('Plantillas/V_Footer');		
 	}
 
 }

 ?>