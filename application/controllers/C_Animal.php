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

        $config['upload_path']          = 'assets/img/animales';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('imagenAlta')) {
            $datos['imagen']=$this->upload->data('file_name');
        } else {
          echo $this->upload->display_errors();  
            $datos['imagen']='dalmata.jpg';            //setear direccion de una imagen estandar
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

    
    function comprobarAdoptado()
    {
        $animal = $this->animal->obtenerUno($this->input->post('id'));
        echo $animal->estaAdoptado();
    }
    
    
    function deshabilitarAnimal()
    {
        $animal = $this->animal->obtenerUno($this->input->post('id'));
        echo $animal->deshabilitar($this->input->post('motivo'));
    }
    
    
    function habilitarAnimal()
    {
        $animal = $this->animal->obtenerUno($this->input->post('id'));
        echo $animal->activar();
    }
    
    
    function buscarAdoptante()
    {
        $this->load->model('M_Adoptante');
        $adoptante = $this->M_Adoptante->getAdoptantePorDni($this->input->post('dni'));
        if ($adoptante) {
            echo json_encode($adoptante);
        } else {
            echo false;
        }
    }
    
    
    function registrarAdopcion()
    {
        $this->load->model('M_Adoptante');
        $adoptante = $this->M_Adoptante->obtenerUno($this->input->post('id_adoptante'));
        if ($adoptante->aptoAdoptar()) {
            $this->load->model('M_Adopcion');
            if ($this->M_Adopcion->registrarAdopcion($this->input->post('id_adoptante'),$this->input->post('id_animal'),$this->session->userdata('id_centro'))) {
                $this->load->model('M_Animal');
                $animal= $this->M_Animal->obtenerUno($this->input->post('id_animal'));
                $animal->cambiarEstadoAdoptado(true);
                echo 'Adopcion registrada con exito!';
            } else {
                echo 'Error al registrar la adopcion, intente nuevamente!';
            }        
        } else {
            echo "El adoptante cuenta con 3 o mas denuncias, por lo tanto no esta apto para adoptar!";
        }
    }
    
    
    function registrarAdoptanteYAdopcion()
    {
        $datos = $this->input->post();
        $this->load->model('M_Adoptante');
        $id_adoptante = $this->M_Adoptante->registrarAdoptante($datos);
        $id_animal = $this->input->post('id_animal');

        $this->load->model('M_Adopcion');

        $this->M_Adopcion->registrarAdopcion($id_adoptante,$id_animal,$this->session->userdata('id_centro'));
        $this->load->model('M_Animal');
        $animal = $this->M_Animal->obtenerUno($id_animal);
        $animal->cambiarEstadoAdoptado(true);
        echo 'El adoptatne y la adopcion fueron registradas exitosamente!';
    }

    
    function revocarAdopcion()
    {
        $this->load->model('M_Adopcion');
        $adopcion = $this->M_Adopcion->obtenerAdopcionPorAnimal($this->input->post('id_animal'));
        if ($adopcion->cambiarEstado($this->input->post())) {
            $this->load->model('M_Animal');
            $animal = $this->M_Animal->obtenerUno($this->input->post('id_animal'));
            $animal->cambiarEstadoAdoptado();
            echo 'Revocacion exitosa!';
        } else {
            echo 'Error al revocar adopcion, intente nuevamente!';
        }
    }


}

/* End of file C_Animal.php */
/* Location: ./application/controllers/C_Animal.php */