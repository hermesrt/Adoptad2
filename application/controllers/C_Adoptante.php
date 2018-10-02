<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Adoptante extends CI_Controller {

	public function index()
	{
		$this->load->view('Plantillas/V_Header');	
		$this->load->view('V_AltaAdoptante');	
		$this->load->view('Plantillas/V_Footer');	
	}

}

/* End of file C_Adoptante.php */
/* Location: ./application/controllers/C_Adoptante.php */