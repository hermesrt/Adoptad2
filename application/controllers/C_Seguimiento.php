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

    public function validaFechas(){
        $datos = $this->input->post();
        $fechaDesde = $datos['fechaDesde'];
        $fechaHasta = $datos['fechaHasta'];
        $tipoPeriodo = $datos['tipoPeriodo'];
        $id_centro = $this->session->userdata('id_centro');
        //-----> aca se debe verificar que las las fechas que uno obtiene no se pisen con las guardadas en la bd
        /* 
        if ($this -> periodo -> verificarPeriodo($fechaDesde, $fechaHasta, $tipoPeriodo)){
            //----> si las fechas son validas entonces se registra
            registarPeriodo($tipo,$fecha_inicio,$fecha_fin,$id_centro);    
        } else {
            return false;
        }
        */
        echo json_encode($datos);
    }
    
}

/* End of file C_Seguimiento.php */
/* Location: ./application/controllers/C_Seguimiento.php */