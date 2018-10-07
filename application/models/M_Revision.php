<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Revision extends CI_Model {
    
    //------> atributos
    public $id_revision;
    public $fecha_revision;
    public $tipo_revision;
    public $detalle_revision;
    public $id_animal;
    public $id_usuario;
    
    
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
        $this->db->from("revision")->where('id_revision',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result();
            $new_object = new self();
            $new_object->init($row[0]);
            return $new_object;
        }else {
            return false;
        }
    }
    
    
    //---> obtiene todas las Revisiones para un animal
    function obtenerRevisiones($id_animal)
    {
        $result = array();
        $this->db->from("revision")->where('id_animal',$id_animal);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $new_object = new self();
                $new_object->init($row);
                $result[] = $new_object;  //----> el resultado seria un array de objetos M_Revision para el animal $id_animal
            }
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
    
    
    //-----> Esta funcion fue un intento fallido de traer todas las cosas
    ///----> necesarias para llenar la tabla en la vista V_Revision
    //-----> NO anduvo no se porque...
    function obtenerDatosAdoptanteAnimalRevisado()
    {
        $this -> db -> from('revision');
        $this -> db -> select('revision.tipo_revision,revision.fecha_revision,adopcion.id_adoptante,revision.id_animal');
        $this -> db -> join('adopcion','revision.id_animal = adopcion.id_animal','inner');
        $query = $this -> db -> get();
        if ($query -> num_rows() > 0) {
            $data = array();
            $this -> load -> model('M_Adoptante','adoptante');
            foreach ($query as $obj){
                $adoptante = $this -> adoptante -> obtenerUno($obj->id_adoptante);
                $data[] = ['tipo_revision' => $obj -> tipo_revision,
                          'fecha_revision' => $obj-> fecha_revision,
                          'nombre_adoptante' => $adoptante -> nombre_adoptante,
                           'apellido_adoptante' => $adoptante -> apellido_adoptante,
                           'id_animal' => $obj -> id_animal
                          ]; 
            }
            return $data;  //----> devuelve un array asociativo con todos los datos necesarios para armar la tabla Revisiones
        } else {
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