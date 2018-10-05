<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Adoptante extends CI_Model {
    
    //------> atributos
    private $id_adoptante;
    private $dni_adoptante;
    private $nombre_adoptante;
    private $apellido_adoptante;
    private $direccion_adoptante;
    private $telefono_adoptante;
    private $email_adoptante;
    private $ciudad_adoptante;
    private $estado_adoptante;
    
    
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
        $result = array();
        $this->db->from("adoptante")->where('id_adoptante',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result();
            $new_object = new self();
            $new_object->init($row[0]);
            $result = $new_object;  //----> el resultado es un objeto M_Adoptante
            return $result;
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