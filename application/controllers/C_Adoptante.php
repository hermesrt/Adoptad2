<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Adoptante extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('tipo_usuario')) {
			redirect(base_url());
		}
	}

	public function index($idAdoptante)
	{
		$this->load->model('M_Adoptante');
		$data['adoptante'] = $this->M_Adoptante->obtenerUno($idAdoptante);
		$this->load->model('M_Adopcion');
		$data['adopciones'] = $this->M_Adopcion->obtenerAdopcionesPorAdoptante($idAdoptante);
		$this->load->model('M_Vacuna');
		$data['vacunas'] = $this->M_Vacuna->obtenerTodos();
		$this->load->view('Plantillas/V_Header');	
		$this->load->view('V_NuevaRevision',$data);	
		$this->load->view('Plantillas/V_Footer');	
	}
	
	function registrarRevision()
	{
		$this->load->model('M_Revision');
		$datos=$this->input->post();
		$datos["id_usuario"] = $this->session->userdata('id_usuario');
		if ($this->M_Revision->registrarRevision($datos)) {
			echo 'Revision registrada correctamente';
		} else {
			echo 'Error al registrar la revision';
		}
	}


}

/* End of file C_Adoptante.php */
/* Location: ./application/controllers/C_Adoptante.php */