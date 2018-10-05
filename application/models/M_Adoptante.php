<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Adoptante extends CI_Model {
    
    //------> atributos
    public $id_adoptante;
    public $dni_adoptante;
    public $nombre_adoptante;
    public $apellido_adoptante;
    public $direccion_adoptante;
    public $telefono_adoptante;
    public $email_adoptante;
    public $ciudad_adoptante;
    public $estado_adoptante;
    
    
    //-------> iniciliza el objeto M_Adopcion con todos los valores de la columna que trae de la bd
    function init($row)
    {
        $this -> id_adoptante = $row -> id_adoptante;
        $this -> dni_adoptante = $row -> dni_adoptante;
        $this -> nombre_adoptante = $row -> nombre_adoptante;
        $this -> apellido_adoptante = $row -> apellido_adoptante;
        $this -> direccion_adoptante = $row -> direccion_adoptante;
        $this -> telefono_adoptante = $row -> telefono_adoptante;
        $this -> email_adoptante = $row -> email_adoptante;
        $this -> ciudad_adoptante = $row -> ciudad_adoptante;
        $this -> estado_adoptante = $row -> estado_adoptante;
    }

    //-----> obtiene un Adoptante
    function obtenerUno($id)
    {
        $this->db->from("adoptante")->where('id_adoptante',$id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->result();
            $new_object = new self();
            $new_object->init($row[0]);
            return $new_object;
        }else {
            return false;
        }
    }
    
    //---> obtiene todos los adoptantes
    function obtenerTodos()
    {
        $result = array();
        $this->db->from("adoptante");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $new_object = new self();
                $new_object->init($row);
                $result[] = $new_object;  //----> el resultado seria un array de objetos M_Adoptante
            }
            return $result;
        }else {
            return false;
        }
    }
    
    
    function getAdoptantePorDni($dni)
    {
        
    }
    
    
    function registrarAdoptante()
    {
        
    }
    
    function validaDatosAdoptante()
    {
        
    }

    function creaAdoptante()
    {
        
    }
    
    
    function buscarPorDomicilio()
    {
        
    }
    
    
}