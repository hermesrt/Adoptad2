<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_InicioSesion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
 		$this->load->model('M_Usuario');

	}

	public function index()
	{
		$this->load->view('Plantillas/V_Header');
		$this->load->view('V_InicioSesion');
		$this->load->view('Plantillas/V_Footer');
		
	}

	public function InicioSesion(){

		$this->form_validation->set_rules('usuario', 'usuario', 'required');
		$this->form_validation->set_rules('contraseña', 'contraseña', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->M_Usuario->IniciarSesion($this->input->post('usuario'), $this->input->post('contraseña'));
			//var_dump($this->session->userdata());
			#falta comprobar que el usuario y pass sean correctos
			redirect('C_Inicio','refresh');
		}
	}



}

/* End of file C_InicioSesion.php */
/* Location: ./application/controllers/C_InicioSesion.php */