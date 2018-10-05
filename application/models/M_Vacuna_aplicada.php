<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Vacuna_aplicada extends CI_Model {
    
    //------> Atributos
    public $id_vacuna_aplicada;
    public $fecha_aplicacion_vacuna;
    public $id_animal;
    public $id_vacuna;

    
    //-------> iniciliza el objeto M_Vacuna aplicada con todos los valores de la columna que trae de la bd
    function init($row)
    {
        $this -> id_vacuna_aplicada = $row -> id_vacuna_aplicada;
        $this -> fecha_aplicacion_vacuna = $row -> fecha_aplicacion_vacuna;
        $this -> id_animal = $row -> id_animal;
        $this -> id_vacuna = $row -> id_vacuna;
    }
    
    
    //-----> obtiene una vacuna aplicada de el id_animal pasado como parametro
    function obtenerUno($id_animal)
    {
        $this->db->from("vacuna_aplicada")->where('id_animal',$id_animal);
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
    
    //---> obtiene todas las vacunas_aplicadas
    function obtenerTodos()
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