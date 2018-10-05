<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Periodo_seguimiento extends CI_Model {
    
    //------> Atributos
    private $id_periodo;
    private $tipo_periodo;
    private $fecha_inicio_periodo;
    private $fecha_fin_periodo;
    private $id_centro;
    private $adopciones[];
    
    
    function init($row)
    {
        $this -> id_periodo = $row -> id_periodo;
        $this -> tipo_periodo = $row -> tipo_periodo;
        $this -> fecha_inicio_periodo = row -> $fecha_inicio_periodo;
        $this -> fecha_fin_periodo = row -> $fecha_fin_periodo;
        $this -> id_centro = $row -> id_centro;
        
        //---> cargo el modelo M_Centro_adopcion  y obtengo las adopciones de ese centro de adopcion
        $this -> load -> model('M_Centro_adopcion','centro');
        $this -> adopciones = $this -> model -> centro -> getAdopciones();
    }
    
    
    //-----> Obtiene un periodo de seguimiento
    function obtenerUno($id_seguimiento)
    {
        $result = array();
        $this->db->from("periodo_seguimiento")->where('id_seguimiento',$id_seguimiento);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result();
            $new_object = new self();
            $new_object->init($row[0]);
            $result[] = $new_object;  //----> el resultado seria un array de objetos 
            return $result;
        }else {
            return false;
        }
    }
    
    
    //-------> Obtiene todos los periodos de seguimiento para un centro de adopcion
    function obtenerPorCentro($id_centro)
    {
        $result = array();
        $this->db->from("periodo_seguimiento")->where('id_seguimiento',$id_seguimiento);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $new_object = new self();
                $new_object->init($row);
                $result[] = $new_object;  //----> el resultado seria un array de objetos 
            }
            return $result;
        }else {
            return false;
        }
    }
    
    
    
    //-----> Obtiene todas los periodos de seguimiento
    function obtenerTodos()
    {
        $result = array();
        $this->db->from("periodo_seguimiento");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $new_object = new self();
                $new_object->init($row);
                $result[] = $new_object;  //----> el resultado seria un array de objetos 
            }
            return $result;
        }else {
            return false;
        }
    }
    
    
    //--------> NO SE QUE HACE ESTA FUNCION CHABOOOOOOON O_O
    function verificarPeriodo()
    {
        
    }
    
    
    //----> Genera un listado con objetos M_Adoptante y lo devuelve como parametro
    function generarListaEmail()
    {
        if ($this -> adopcinoes -> sizeof() > 0) {
            foreach ($this -> adopciones as $adopcion){
                $listado[] = $adopcion -> getAdopante() ;
            }
            return $listado;
        }else{
            return false;
        }
    }
    
    
    //------> Inserta en la tabla periodo un nuevo periodo de seguimiento
    function registarPeriodo($tipo,$fecha_inicio,$fecha_fin,$id_centro)
    {
        $data = array(
            'id_periodo' => null;   //---> es autoincremental asi que el id se setea solo en la BD
            'tipo_periodo'  => $tipo;
            'fecha_inicio_periodo' => $fecha_inicio;
            'fecha_fin_periodo' => $fecha_fin;
            'id_centro' => $id_centro;
        );
        $this -> db -> insert('periodo_seguimiento',$data);
    }
    
}

/* End of file M_Periodo_seguimiento.php */
/* Location: ./application/models/M_Periodo_seguimiento.php */