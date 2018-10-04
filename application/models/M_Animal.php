<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Animal extends CI_Model {

    //----- Atributos de la tabla animal 
    public $id_animal;
    public $nombre_animal;
    public $raza_animal;
    public $especie_animal;
    public $sexo_animal;
    public $edad_animal;
    public $descripcion_animal;
    public $estado_animal;
    public $castrado;
    public $nombre_imagen_animal;
    public $id_centro;

    
    //-------> iniciliza el objeto M_Animal con todos los valores de la columna que trae de la bd
    function init($row)
    {
        $this -> id_animal = $row -> id_animal;
        $this -> nombre_animal = $row -> nombre_animal;
        $this -> raza_animal = $row -> raza_animal;
        $this -> especie_animal = $row -> especie_animal;
        $this -> sexo_animal = $row -> sexo_animal;
        $this -> edad_animal = $row -> edad_animal;
        $this -> castrado = $row -> castrado;
        $this -> nombre_imagen_animal = $row -> nombre_imagen_animal;
        $this -> id_centro = $row -> id_centro;
    }

    
    //---------> Recupera a el animal con el id pasado como parametro de la BD
    function obtenerUno($id)
    {
        $result = array();
        $this->db->from("animal");
        $this->db->where("id_animal", $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $new_object = new self();
                $new_object->init($row);
                $result = $new_object;  //----> el resultado seria un array de objetos M_Animal
            }
            return $result;
        }else {
            return false;
        }
    }
    
    //---------> Recupera todos los animales de la bd
    function obtenerTodos()
    {
        $result = array();
        $this->db->from("animal");
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
    
    //--------- Recupera todos los animales por centro de adopcion
    
    
    function cambiarEstado(){}
    function agregarVacunaAnimal(){}
    function estaCastrado(){}
    function getEspecie(){}
    function getSexo(){}
    function getEdad(){}
    function castrar(){}
    function estaAdoptado(){}
    
}

/* End of file M_Animal.php */
/* Location: ./application/models/M_Animal.php */