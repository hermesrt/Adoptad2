<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Informes extends CI_Controller {

	public function index()
	{
		$this->load->view('Plantillas/V_Header');
		$this->load->view('V_Informes');
		$this->load->view('Plantillas/V_Footer');
	}

}

/* End of file C_Informes.php */
/* Location: ./application/controllers/C_Informes.php */