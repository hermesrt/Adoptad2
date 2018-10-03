<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Usuario extends CI_Model {

	public function IniciarSesion($email_usuario,$password)
	{
		$consulta = $this->db->get_where('usuario', array('email_usuario' => $email_usuario, 'password' => md5($password)));
		if ($consulta->num_rows()>0) {
			$usuario = $consulta->result()[0];
			$this->session->set_userdata(array(
				"nombre_usuario" => $usuario->nombre_usuario,
				"apellido_usuario" => $usuario->apellido_usuario
			));
			return true;
		} else {
			return false;
		}
	}

}

/* End of file M_Usuario.php */
/* Location: ./application/models/M_Usuario.php */