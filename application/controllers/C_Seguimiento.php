<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Seguimiento extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this -> load -> model('M_Periodo_seguimiento','periodo');
    }
    
	public function index()
	{
        $data['periodos'] = $this -> periodo -> obtenerPorCentro($this->session->userdata('id_centro'));
		$this->load->view('Plantillas/V_Header');
		$this->load->view('V_Seguimiento',$data);
		$this->load->view('Plantillas/V_Footer');
	}

}

/* End of file C_Seguimiento.php */
/* Location: ./application/controllers/C_Seguimiento.php */