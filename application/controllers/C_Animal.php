<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Animal extends CI_Controller {

	public function index()
	{
		$this->load->view('Plantillas/V_Header');
		$this->load->view('V_Animal');
		$this->load->view('Plantillas/V_Footer');
	}

}

/* End of file C_Animal.php */
/* Location: ./application/controllers/C_Animal.php */