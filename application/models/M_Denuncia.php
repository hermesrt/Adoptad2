<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Denuncia extends CI_Model {
    
    //------> atributos
    private $id_denuncia;
    private $fecha_denuncia;
    private $id_adoptante;
    private $id_motivo;
    
    
    //-------> iniciliza el objeto M_Denuncia con todos los valores de la columna que trae de la bd
    function init($row)
    {
        $this -> id_denuncia = $row -> id_denuncia;
        $this -> fecha_denuncia = $row -> fecha_denuncia;
        $this -> id_adoptante = $row -> id_adoptante;
        $this -> id_motivo = $row -> id_motivo;
    }

    
    //-----> obtiene una Denuncia
    function obtenerUno($id)
    {
        $result = array();
        $this->db->from("denuncia")->where('id_denuncia',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result();
            $new_object = new self();
            $new_object->init($row[0]);
            $result = $new_object;  //----> el resultado es un objeto M_Denuncia
            return $result;
        }else {
            return false;
        }
    }
    
    
    //---> obtiene todas las Denuncias
    function obtenerTodos()
    {
        $result = array();
        $this->db->from("denuncia");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $new_object = new self();
                $new_object->init($row);
                $result[] = $new_object;  //----> el resultado seria un array de objetos M_Denuncia
            }
            return $result;
        }else {
            return false;
        }
    }
    
    function registrarDenuncia()
    {
        
    }
    
    
    //-----> funcion que devuelve el objeto M_Denuncia
    function getDenuncia()
    {
        return $this;
    }
    
    
    //-------> Funcion que devuelve el motivo de la denuncia
    function getMotivo()
    {
        $this->db->select('motivo_denuncia.id_motivo,motivo');
        $this->db->from('motivo_denuncia');
        $this->db->join('denuncia', 'motivo_denuncia.id_motivo = denuncia.id_motivo');
        $query = $this->db->get();
        if ($query -> num_rows() > 0){
            return $query;   //----> devuelve un array con el id_motivo y el motivo_denuncia
        }else{
            return false;
        }
    }
    
    
    
    
    
    
}