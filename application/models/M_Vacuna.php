<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Vacuna extends CI_Model {
    
    //------> Atributos
    private $id_vacuna;
    private $nombre_vacuna;

    
    //-------> iniciliza el objeto M_Adopcion con todos los valores de la columna que trae de la bd
    function init($row)
    {
        $this -> id_vacuna = $row -> id_vacuna;
        $this -> nombre_vacuna = $row -> nombre_vacuna;
    }
    
    
    //-----> obtiene una vacuna
    function obtenerUno($id_vacuna)
    {
        $result = array();
        $this->db->from("vacuna")->where('id_vacuna',$id_vacuna);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result();
            $new_object = new self();
            $new_object->init($row[0]);
            $result = $new_object;  //----> el resultado es un objeto M_Vacuna
            return $result;
        }else {
            return false;
        }
    }
    
    //---> obtiene todas las vacunas
    function obtenerTodos()
    {
        $result = array();
        $this->db->from("vacuna");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $new_object = new self();
                $new_object->init($row);
                $result[] = $new_object;  //----> el resultado seria un array de objetos M_Animal
            }
            return $result;
        }else {
            return false;
        }
    }
    
    
    function buscarVacuna()
    {
        
    }
    
    function newVacuna()
    {
        
    }
    
    
    
}