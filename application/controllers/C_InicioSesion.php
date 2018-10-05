<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_InicioSesion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_Usuario');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
	}

	public function index($mensajeError=null)
	{
		$data['mensajeError'] = $mensajeError;
		$this->load->view('Plantillas/V_Header');
		$this->load->view('V_InicioSesion',$data);
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
			$usuario = $this->M_Usuario->IniciarSesion($this->input->post('usuario'), $this->input->post('contraseña'));
			if ($usuario) {
				$this->session->set_userdata($usuario);
				redirect(base_url());
			} else {				
				$this->index("Usuario o contraseña incorrecta. Intente nuevamente!");
			}
		}
	}
	
	function cerrarSesion()
	{
		foreach ($this->session->all_userdata() as $key => $value) {
			$this->session->unset_userdata($key);
		}
		redirect(base_url());
	}



}

/* End of file C_InicioSesion.php */
/* Location: ./application/controllers/C_InicioSesion.php */