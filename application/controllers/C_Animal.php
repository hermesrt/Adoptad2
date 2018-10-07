<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Animal extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this -> load -> model('M_Animal','animal');
    }

    function index()
    {
        $data['animales'] = $this->animal->obtenerTodos();
    	$this->load->view('Plantillas/V_Header',$data);
		$this->load->view('V_Animal');
		$this->load->view('Plantillas/V_Footer');
    }
    
	public function verAnimal($id_animal)
	{
        $data['animal'] = $this -> animal -> obtenerUno($id_animal);
		$this->load->view('Plantillas/V_Header');
		$this->load->view('V_VerAnimal',$data);
		$this->load->view('Plantillas/V_Footer');
	}

    function guardarEdicion()
    {
       $datos=$this->input->post();
        $rta = array();
        if ($this->animal->editar($datos)) {
            $rta['status'] = 'success';
        } else {
            $rta['status'] = 'error';
        }
        return json_encode($rta);
    }

}

/* End of file C_Animal.php */
/* Location: ./application/controllers/C_Animal.php */