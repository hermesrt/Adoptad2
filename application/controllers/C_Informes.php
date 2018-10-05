<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Informes extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('tipo_usuario')!="administrativo") {
			redirect(base_url());
		}
	}

	public function index()
	{
		//if ($this->session->userdata('tipo_usuario')=="administrativo") {
			$this->load->view('Plantillas/V_Header');
			$this->load->view('V_Informes');
			$this->load->view('Plantillas/V_Footer');
		/*} else {
			redirect(base_url());
		}	*/	
	}

}

/* End of file C_Informes.php */
/* Location: ./application/controllers/C_Informes.php */