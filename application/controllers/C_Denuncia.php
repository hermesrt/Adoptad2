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
        $datos = $this->input->post();   //---> traigo los datos de post 
        $id_motivo = $datos['tipoDenuncia'];   //--> recupero el id_motivo de denuncia
        $motivo = $this -> denuncia -> getMotivo($id_motivo);       //--> obtengo el array motivo denuncia con ese id_motivo
        $datos['motivo_denuncia'] = $motivo['motivo_denuncia'];    //---> le asigna el motivo_denuncia de ese objeto con ese id_motivo
        $datos['nombre'] = $this->session->userdata('nombre_usuario');
        $datos['apellido'] = $this->session->userdata('apellido_usuario');
        
        $adoptante = $this -> adoptante -> obtenerUno($datos['id_adoptante']);   //---> obtengo a el adoptante con el id_adoptante
        $datos['cantidad_denuncias'] = $adoptante -> countDenuncias();        //--> cuenta las denuncias y se las asigna al arreglo 
        $datos['adoptante'] = $adoptante;    //----> envia tambien datos del adoptante 
        //-----> guarda en la base de datos
        $this -> denuncia -> registrarDenuncia(    //----> registra la denuncia a ese adoptante
                $id_motivo,
                $datos['descripcionDenuncia'],
                $adoptante -> id_adoptante,
                $this->session->userdata('id_usuario'),
                $this->session->userdata('id_centro')
            ); 
        
        echo json_encode($datos);   
    }
    

}

/* End of file C_Denuncia.php */
/* Location: ./application/controllers/C_Denuncia.php */