<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Vacuna_aplicada extends CI_Model {
    
    //------> Atributos
    public $id_revision;
    public $id_vacuna;
    public $fecha_aplicacion_vacuna;
    
    //-------> iniciliza el objeto M_Vacuna aplicada con todos los valores de la columna que trae de la bd
    function init($row)
    {
        $this -> fecha_aplicacion_vacuna = $row -> fecha_aplicacion_vacuna;
        $this -> id_revision = $row -> id_revision;
        $this -> id_vacuna = $row -> id_vacuna;
    }
    
    
   
    function obtenerUno($id_revision)
    {
        $this->db->from("vacuna_aplicada")->where('id_revision',$id_revision);
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
    
    
    function obtenerTodos($id_revision)
    {
        $result = array();
        $this->db->from("vacuna_aplicada");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $new_object = new self();
                $new_object->init($row);
                $result[] = $new_object;  //----> el resultado seria un array de objetos M_Vacuna_aplicada
            }
            return $result;
        }else {
            return false;
        }
    }
    
    
}