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
function altaAnimal()
{
    $datos= $this->input->post();
    $datos["id_centro"]= $this->session->userdata('id_centro');

    $config['upload_path']          = base_url('assets/img');
    $config['allowed_types']        = 'gif|jpg|png';

    $this->load->library('upload', $config);
    if ($this->upload->do_upload($datos['imagen'])) {
        $datos['imagen']=$this->upload->data('file_name');
    } else {
        $datos['imagen']=base_url('assets/img/animales/dalmata.jpg');            //setear direccion de una imagen estandar
    }


    $rta = array();
    if ($this->animal->guardar($datos)) {
        $rta['status'] = 'success';
    } else {
        $rta['status'] = 'error';
    }
    return json_encode($rta);
}

function getAnimales()
{
    $todos = $this->animal->getTodosJson();
    echo $todos;
}

function prueba()
{
    $this->load->view('Plantillas/V_Header');
    $this->load->view('prueba');
    $this->load->view('Plantillas/V_Footer');
}


}

/* End of file C_Animal.php */
/* Location: ./application/controllers/C_Animal.php */