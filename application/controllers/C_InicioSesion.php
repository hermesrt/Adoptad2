<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_InicioSesion extends CI_Controller {

	public function index()
	{
		$this->load->view('Plantillas/V_Header');
		$this->load->view('V_InicioSesion');
		$this->load->view('Plantillas/V_Footer');
	}

}

/* End of file C_InicioSesion.php */
/* Location: ./application/controllers/C_InicioSesion.php */