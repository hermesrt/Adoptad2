<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Denuncia extends CI_Controller {

	public function index()
	{
		$this->load->view('Plantillas/V_Header');		
		$this->load->view('V_Denuncia');		
		$this->load->view('Plantillas/V_Footer');		
	}

}

/* End of file C_Denuncia.php */
/* Location: ./application/controllers/C_Denuncia.php */