<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Motivo_denuncia extends CI_Model {
    
    //------> atributos
    public $id_motivo;
    public $motivo_denuncia;  
    
    //-------> iniciliza el objeto 
    function init($row)
    {
        $this -> id_motivo = $row -> id_motivo;
        $this -> motivo_denuncia = $row -> motivo_denuncia;
    }
    
    //-------------> Obtengo un motivo de denuncia especifico
    public function obtenerUno ($id_motivo)
    {
        $this -> db -> from('motivo_denuncia');
        $this -> db -> where('id_motivo',$id_motivo);
        $query = $this -> db -> get();
        
        if ($query->num_rows() == 1) {
            $row = $query->result();
            $new_object = new self();
            $new_object->init($row[0]);
            return $new_object;
        }else {
            return false;
        }
        
    }
    
    
}


?>