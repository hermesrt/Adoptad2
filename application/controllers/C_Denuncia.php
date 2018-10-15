<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Denuncia extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('tipo_usuario')!="veterinario") {
			redirect(base_url());
		}
        $this -> load -> model('M_Adoptante','adoptante');
	}

	public function index()
	{
        $data['adoptantes'] = $this -> adoptante -> obtenerTodos();
		$this->load->view('Plantillas/V_Header');
		$this->load->view('V_Denuncia',$data);
		$this->load->view('Plantillas/V_Footer');
	}
    
    public function registraDenuncia()
    {
        $datos['nombreApellido'] = $this -> input -> post('nombreApellido');
        $datos['motivo'] = $this -> input -> post('selectMotivoDenuncia');
        $datos['descripcion'] = $this -> input -> post('descripcionDenuncia');
        $data['datos_denuncia'] = $datos;
        $data['adoptantes'] = $this -> adoptante -> obtenerTodos();
        $this -> load -> view('Plantillas/V_Header');
        $this->load->view('V_Denuncia',$data);
		$this->load->view('Plantillas/V_Footer');
    }
    

}

/* End of file C_Denuncia.php */
/* Location: ./application/controllers/C_Denuncia.php */