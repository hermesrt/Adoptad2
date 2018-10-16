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
        $this -> load -> model('M_Motivo_denuncia','motivo');
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
        $datos = $this->input->post();
        $motivo = $this -> motivo -> obtenerUno($datos['tipoDenuncia']);
        $datos['tipoDenuncia'] = $motivo -> motivo_denuncia;
        echo json_encode($datos);   
    }
    

}

/* End of file C_Denuncia.php */
/* Location: ./application/controllers/C_Denuncia.php */