<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Centro_adopcion extends CI_Model {
    
    //------> atributos
    private $id_centro;
    private $nombre_ca;
    private $direccion_ca;
    private $telefono_ca;
    private $email_ca;
    private $ciudad_ca;
    private $estado_ca;
    private $animales;          //----> array de objeto M_Animal
    
    
    function init($row)
    {
        $this -> load -> model('M_Animal','animal');
        $this -> id_centro = $row -> id_centro;
        $this -> nombre_ca = $row -> nombre_ca;
        $this -> direccion_ca = $row -> direccion_ca;
        $this -> telefono_ca = $row -> telefono_ca;
        $this -> email_ca = $row -> email_ca;
        $this -> ciudad_ca = $row -> ciudad_ca;
        $this -> estado_ca = $row -> estado_ca;
        //-------> obtengo todos los animales para un centro de adopcion
        $this -> animales = $this -> model -> animal -> obtenerPorCentro($this -> id_centro);
    }
    
    //-----> Obtiene un centro de adopcion
    function obtenerUno()
    {
        $result = array();
        $this->db->from("centro_adopcion");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result();
            $new_object = new self();
            $new_object->init($row);
            $result[] = $new_object;  //----> el resultado seria un array de objetos M_Centro_adopcion
            return $result;
        }else {
            return false;
        }
    }
    
    
    //-----> Obtiene todos los centros de adopcion
    function obtenerTodos()
    {
        $result = array();
        $this->db->from("centro_adopcion");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $new_object = new self();
                $new_object->init($row);
                $result[] = $new_object;  //----> el resultado seria un array de objetos M_Centro_adopcion
            }
            return $result;
        }else {
            return false;
        }
    }
    
    public function getCentro()
    {
        return $this;
    }
    
    public function getAdopciones(){}
    public function getDenuncias(){}
    
    
}

/* End of file M_Centro_adopcion.php */
/* Location: ./application/models/M_Centro_adopcion.php */