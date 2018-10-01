<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Seguimiento extends CI_Controller {

	public function index()
	{
		$this->load->view('Plantillas/V_Header');
		$this->load->view('V_Seguimiento');
		$this->load->view('Plantillas/V_Footer');
	}

}

/* End of file C_Seguimiento.php */
/* Location: ./application/controllers/C_Seguimiento.php */