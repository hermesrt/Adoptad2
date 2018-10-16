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
        $this -> load -> model('M_Denuncia','denuncia');
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
        $motivo = $this -> motivo -> obtenerUno($datos('tipoDenuncia')); 
    
        $adoptante = $this -> adoptante -> obtenerUno($datos['id_adoptante']);
        $datos['cantidad_denuncias'] = $adoptante -> countDenuncias();
        $datos['adoptante'] = $adoptante; 
        //-----> guarda en la base de datos
        $this -> denuncia -> registrarDenuncia(    //----> registra la denuncia a ese adoptante
            $datos['nombre']." ".$datos['apellido'],
            $datos['tipoDenuncia'],
            $datos['descripcionDenuncia'],
            $datos['id_adoptante']
            ); 
        
        $datos['tipoDenuncia'] = $motivo -> motivo_denuncia;    //---> le asigna el string a el array
        
        echo json_encode($datos);   
    }
    

}

/* End of file C_Denuncia.php */
/* Location: ./application/controllers/C_Denuncia.php */