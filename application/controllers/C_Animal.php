<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Animal extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this -> load -> model('M_Animal','animal');
    }
    
	public function index($id_animal)
	{
        $data['animal'] = $this -> animal -> obtenerUno($id_animal);
		$this->load->view('Plantillas/V_Header');
		$this->load->view('V_Animal',$data);
		$this->load->view('Plantillas/V_Footer');
	}

}

/* End of file C_Animal.php */
/* Location: ./application/controllers/C_Animal.php */