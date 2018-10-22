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
        $datos['id_centro'] = $id_centro;
        //-----> aca se debe verificar que las las fechas que uno obtiene no se pisen con las guardadas en la bd
        $periodo_valido = $this -> periodo -> verificarPeriodo($fechaDesde,$fechaHasta,$tipoPeriodo);
        $datos['periodo_valido'] = $periodo_valido;
        if ($periodo_valido){
            //-----> guarda el periodo nuevo en la base de datos
            $this -> periodo -> registrarPeriodo($tipoPeriodo,$fechaDesde,$fechaHasta,$id_centro);
            
            //-----> falta enviar el mail a todos los adoptantes a los que los animales les falte lo del periodo de castracion
        }
        
        echo json_encode($datos);   //---> devuelve los datos en json para la vista
    }
    
}

/* End of file C_Seguimiento.php */
/* Location: ./application/controllers/C_Seguimiento.php */