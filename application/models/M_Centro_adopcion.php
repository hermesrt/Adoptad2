<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Centro_adopcion extends CI_Model {
    
    //------> atributos
    public $id_centro;
    public $nombre_ca;
    public $direccion_ca;
    public $telefono_ca;
    public $email_ca;
    public $ciudad_ca;
    public $estado_ca;
    public $animales;          //----> array de objeto M_Animal
    public $periodos_seguimientos; //-----> el centro de adopcion tiene muchos periodos de seguimiento
    public $adopciones;
    public $denuncias;
    
    function init($row)
    {
        //----> Cargo los modelos que voy a usar
        $this -> load -> model('M_Animal','animal');
        $this -> load -> model('M_Periodo_seguimiento','periodo');
        $this -> load -> model('M_Adopcion','adopcion');
        $this -> load -> model('M_Denuncia','denuncia');
        
        $this -> id_centro = $row -> id_centro;
        $this -> nombre_ca = $row -> nombre_ca;
        $this -> direccion_ca = $row -> direccion_ca;
        $this -> telefono_ca = $row -> telefono_ca;
        $this -> email_ca = $row -> email_ca;
        $this -> ciudad_ca = $row -> ciudad_ca;
        $this -> estado_ca = $row -> estado_ca;
        //-------> obtengo todos los animales para un centro de adopcion
        $this -> animales = $this -> animal -> obtenerPorCentro($this -> id_centro);
        //------> obtengo todos los periodos de seguimiento para un centro de adopcion
        $this -> periodos_seguimientos = $this ->  periodo -> obtenerPorCentro($this -> id_centro);
        //-----> obtengo todas las adopciones para ese centro de adopcion
        $this -> adopciones = $this -> adopcion -> obtenerAdopcionesPorCentro($this -> id_centro);
        //---->  obtengo todas las denuncias por centro
        $this -> denuncias = $this -> denuncia -> obtenerDenunciasPorCentro($this -> id_centro);
    }
    
    
    //-----> Obtiene un centro de adopcion
    function obtenerUno($id_centro)
    {
        $this->db->from("centro_adopcion") -> where('id_centro',$id_centro);
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
    
    //-----> funcion que devuelve el objeto M_Centro_Adopcion
    public function getCentro()
    {
        return $this;
    }
    
    
    //-----> esta funcion trae todas las adopciones relacionadas a los animales que estan este centro de adopcion
    public function getAdopciones()
    {
        return $this -> adopciones;
    }
    
    //------> funcion que obtiene un array de denuncias registradas a adoptantes que pertenecen en ese centro
    public function getDenuncias()
    {
        return $this -> denuncias;
    }
    
    //----- get Animales, devuelve el array de animales asociado a ese centro
    function getAnimales()
    {
        return $this -> animales;
    }
    
}

/* End of file M_Centro_adopcion.php */
/* Location: ./application/models/M_Centro_adopcion.php */