<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Seguimiento extends CI_Controller {

    //------> constructor donde se cargan los modelos 
    public function __construct()
    {
        parent::__construct();
        $this -> load -> model('M_Periodo_seguimiento','periodo');
        $this -> load -> model('M_Correo','correo');
    }
    
    
    //-------> carga la vista del seguimiento con sus datos
	public function index()
	{
        $data['periodos'] = $this -> periodo -> obtenerPorCentro($this->session->userdata('id_centro'));
		$this->load->view('Plantillas/V_Header');
		$this->load->view('V_Seguimiento',$data);
		$this->load->view('Plantillas/V_Footer');
	}

    
    //----> valida con bd que el periodo este bien y si es asi lo guarda y envia los emails correspondientes
    public function validaFechas(){
        
        //---> recupero los datos del arreglo post y los seteo en variables que despues uso para los metodos
        $datos = $this->input->post();
        $fechaDesde = $datos['fechaDesde'];
        $fechaHasta = $datos['fechaHasta'];
        $tipoPeriodo = $datos['tipoPeriodo'];
        $id_centro = $this->session->userdata('id_centro');
        $datos['id_centro'] = $id_centro;
        
        //-----> aca se  verifica que las las fechas que uno obtiene no se pisen con las guardadas en la bd
        $periodo_valido = $this -> periodo -> verificarPeriodo($fechaDesde,$fechaHasta,$tipoPeriodo);
        $datos['periodo_valido'] = $periodo_valido;  //---> esta es una marca que uso despues en la vista, si es valido muestro un cartel sino muestro otro
        
        if ($periodo_valido){  
            $periodos = $this -> periodo -> obtenerPorCentro($id_centro); //--> obtiene todos los periodos de ese centro
            $periodo = end($periodos); //---> obtiene el ultimo periodo del array $periodos
            
            //----> genera el listado de adoptantes para enviar el mail
            $datos['listado'] = $periodo -> generarListaEmail($tipoPeriodo);   
            
            //-----> guarda el periodo nuevo en la base de datos
            $this -> periodo -> registrarPeriodo($tipoPeriodo,$fechaDesde,$fechaHasta,$id_centro);
            
            //-----> falta enviar el mail a todos los adoptantes a los que los animales les falte lo del periodo de castracion
           // $this -> correo -> generarCorreoPeriodo($tipoPeriodo,$adop);
            //-----> $this -> correo -> enviarCorreo();
            
        }
        
        echo json_encode($datos);   //---> devuelve los datos en json para la vista
    }
    
}

/* End of file C_Seguimiento.php */
/* Location: ./application/controllers/C_Seguimiento.php */