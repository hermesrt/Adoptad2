<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Revision extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('tipo_usuario')) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$this->load->view('Plantillas/V_Header.php');
		$this->load->view('V_Revision');
		$this->load->view('Plantillas/V_Footer.php');
	}

	public function NuevaRevision()
	{
		$this->load->view('Plantillas/V_Header.php');
		$this->load->view('V_NuevaRevision');
		$this->load->view('Plantillas/V_Footer.php');
	}

}

/* End of file C_Revision.php */
/* Location: ./application/controllers/C_Revision.php */