<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Animal extends CI_Model {

    //----- Atributos de la tabla animal 
    private $id_animal;
    private $nombre_animal;
    private $raza_animal;
    private $especie_animal;
    private $sexo_animal;
    private $edad_animal;
    private $descripcion_animal;
    private $estado_animal;
    private $castrado;
    private $adoptado;
    private $nombre_imagen_animal;
    private $id_centro;
    private $revisiones;       //------->  es un array de muchos objetos revision    
    private $vacunas;          //------->  es un array de muchos objetos vacuna
    
    //-------> iniciliza el objeto M_Animal con todos los valores de la columna que trae de la bd
    function init($row)
    {
        $this -> load -> model('M_Revision','revision'); //---> cargo el modelo M_Revision 
        $this -> id_animal = $row -> id_animal;
        $this -> nombre_animal = $row -> nombre_animal;
        $this -> raza_animal = $row -> raza_animal;
        $this -> especie_animal = $row -> especie_animal;
        $this -> sexo_animal = $row -> sexo_animal;
        $this -> edad_animal = $row -> edad_animal;
        $this -> castrado = $row -> castrado;
        $this -> adoptado = $row -> adoptado;
        $this -> nombre_imagen_animal = $row -> nombre_imagen_animal;
        $this -> id_centro = $row -> id_centro;
        //-----> obtengo todas las revisiones para un animal
        $this -> revisiones = $this -> model -> revision -> obtenerRevisiones($this -> $id_animal);
    }

    
    //---------> Recupera a el animal con el id pasado como parametro de la BD
    function obtenerUno($id)
    {
        $result = array();
        $this->db->from("animal");
        $this->db->where("id_animal", $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->result();
            $new_object = new self();
            $new_object->init($row[0]);
            $result = $new_object;  //----> el resultado seria un array de objetos M_Animal
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
    function obtenerPorCentro($id_centro)
    {
        $result = array();
        $this->db->from("animal")->where('id_centro',$id_centro);
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
    
    //----> Cambia el estado del animal, el estado es un string $estado
    //----> $estado puede ser -> 'Activo','Inactivo',
    function cambiarEstado($estado)
    {
        $this->db->set('estado_animal', $estado);
        $this->db->where('id',$this -> id_animal);
        $this->db->update('animal'); 
    }
    
    function agregarVacunaAnimal()
    {
        
    }
    
    //--> Cambia estado "castrado" de 0 a 1
    //--> Si esta castrado = 1
    //--> Si no esta castrado = 0
    function estaCastrado()
    {
        if ($this -> castrado == 0) {
            return false;   //--> castrado ==0 devuelve false
        } else {
            return true;   //--> castrado ==1 devuelve true
        }
    }
    
    function getEspecie()
    {
        return $this -> especie_animal;
    }
    
    function getSexo()
    {
        return $this -> sexo_animal;
    }
    
    function getEdad()
    {
        return $this -> edad_animal;
    }
    
    //--> Cambia estado "castrado" del animal de 0 a 1
    function castrar()
    {
        if ($this -> castrado == 0) {
            $this->db->set('castrado',1);
            $this->db->where('id',$this -> id_animal);
            $this->db->update('animal'); 
        }
    }
    
    //--> Funcion que devuelve true o false si el animal esta adoptado o no esta adoptado
    function estaAdoptado()
    {
        if ($this -> adoptado == 0) {
            return false; //--> si adoptado == 0 no esta adoptado
        } else {
            return true;  //--> si adoptado == 1 esta adoptado
        }
    }
    
}

/* End of file M_Animal.php */
/* Location: ./application/models/M_Animal.php */