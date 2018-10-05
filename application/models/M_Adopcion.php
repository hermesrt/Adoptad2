<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Adopcion extends CI_Model {
    
    //------> atributos
    public $id_adopcion;
    public $fecha_adopcion;
    public $detalle_adopcion;
    public $id_adoptante;
    public $id_animal;
    
    
    //-------> iniciliza el objeto M_Adopcion con todos los valores de la columna que trae de la bd
    function init($row)
    {
        $this -> id_adopcion = $row -> id_adopcion;
        $this -> fecha_adopcion = $row -> fecha_adopcion;
        $this -> detalle_adopcion = $row -> detalle_adopcion;
        $this -> id_adoptante = $row -> id_adoptante;
        $this -> id_animal = $row -> id_animal;
    }

    
    //---------> Recupera la adopcion con el id pasado como parametro de la BD
    function obtenerUno($id)
    {
        $this->db->from("adopcion");
        $this->db->where("id_adopcion", $id);
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
    
    
    //---------> Recupera la adopcion con el id del animal pasado como parametro de la BD
    function obtenerAdopcionPorAnimal($id_animal)
    {
        $result = array();
        $this->db->from("adopcion");
        $this->db->where("id_animal", $id_animal);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $row = $query->result();
            $new_object = new self();
            $new_object->init($row[0]);
            $result = $new_object;  //----> el resultado seria un objeto M_Adopcion
            return $result;
        }else {
            return false;
        }
    }
    
    
    //---------> Recupera todos los animales de la bd
    function obtenerTodos()
    {
        $result = array();
        $this->db->from("adopcion");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $new_object = new self();
                $new_object->init($row);
                $result[] = $new_object;  //----> el resultado seria un array de objetos M_Adopcion
            }
            return $result;
        }else {
            return false;
        }
    }
    
    
    
    //----> Este metodo devuelve el animal asociado a esta adopcion
    function getAnimal()
    {
        $this -> load -> model('M_Animal','animal');
        return $this -> animal -> obtenerUno($this -> id_animal);  //---> esto devuelve un objeto M_Animal
    }
    
    
    //----> Este metodo devuelve el adoptante asociado a esta adopcion
    function getAdoptante()
    {
        $this -> load -> model('M_Adoptante','adoptante');
        return $this -> adoptante -> obtenerUno($this -> id_adoptante); //---> esto devuelve un objeto M_Adoptante
    }
    
    
    function registrar()
    {
        
    }
    
    function registrarAdopcion()
    {
        
    }
    
    function listarAdopciones()
    {
        
    }
    
   
    function fechaAdopcion()
    {
        
    }
    
    
    //-----> Devuelve el objeto M_Adopcion
    function getAdopcion()
    {
        return $this;
    }
    
    
    
}

/* End of file M_Adopcion.php */
/* Location: ./application/models/M_Adopcion.php */