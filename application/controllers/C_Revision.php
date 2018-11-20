<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Revision extends CI_Controller {
	
    public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('tipo_usuario')) {
			redirect(base_url());
		}
        $this -> load -> model('M_Vacuna','vacuna'); //---> Cargo el modelo vacuna 
        $this -> load -> model('M_Revision','revision');  //--> Cargo el modelo revision
	}

	public function index()
	{
        $data['revisiones'] = $this -> revision -> obtenerTodos();  //---> obtiene todas las revisiones
		$this->load->view('Plantillas/V_Header.php');
		$this->load->view('V_Revision',$data);
		$this->load->view('Plantillas/V_Footer.php');
	}
	function getAdoptantes()
	{
		$this->load->model('M_Adoptante');
		echo $this->M_Adoptante->getTodosJson();
	}

	public function NuevaRevision()
	{
        $data['vacunas'] = $this -> vacuna -> obtenerTodos(); //---> Obtengo todos los tipos de vacunas que hay
		$this->load->view('Plantillas/V_Header.php');
		$this->load->view('V_NuevaRevision',$data);
		$this->load->view('Plantillas/V_Footer.php');
	}

}

/* End of file C_Revision.php */
/* Location: ./application/controllers/C_Revision.php */