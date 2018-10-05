<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Revision extends CI_Model {
    
    //------> atributos
    private $id_revision;
    private $fecha_revision;
    private $tipo_revision;
    private $detalle_revision;
    private $id_animal;
    private $id_usuario;
    
    
    //-------> iniciliza el objeto M_Revision con todos los valores de la columna que trae de la bd
    function init($row)
    {
        $this -> id_revision = $row -> id_revision;
        $this -> fecha_revision = $row -> fecha_revision;
        $this -> tipo_revision = $row -> tipo_revision;
        $this -> detalle_revision = $row -> detalle_revision;
        $this -> id_animal = $row -> id_animal;
        $this -> id_usuario = $row -> id_usuario;
    }

    
    
    //-----> obtiene una Revision
    function obtenerUno($id)
    {
        $result = array();
        $this->db->from("revision")->where('id_revision',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result();
            $new_object = new self();
            $new_object->init($row[0]);
            $result = $new_object;  //----> el resultado es un objeto M_Revision
            return $result;
        }else {
            return false;
        }
    }
    
    
    //---> obtiene todas las Revisiones
    function obtenerTodos()
    {
        $result = array();
        $this->db->from("revision");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $new_object = new self();
                $new_object->init($row);
                $result[] = $new_object;  //----> el resultado seria un array de objetos M_Revision
            }
            return $result;
        }else {
            return false;
        }
    }
    
    
    function fechaUltimaRevision()
    {
        
    }
    
    
    function getFecha()
    {
        
    }
    
    function registrarRevision()
    {
        
    }
    
    function crearRevision()
    {
        
    }
    

    
}