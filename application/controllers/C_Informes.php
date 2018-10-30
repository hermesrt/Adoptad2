<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Informes extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('tipo_usuario')!="administrativo") {
			redirect(base_url());
		}
		$this -> load -> model('M_Centro_adopcion','centro');
	}

	public function index()
	{
		$data['centros'] = $this -> centro -> obtenerTodos();
		$this->load->view('Plantillas/V_Header');
		$this->load->view('V_Informes',$data);
		$this->load->view('Plantillas/V_Footer');
		
	}

	function generarInforme()
	{
		switch ($this->input->post('informe')) {
			case 'animales':

			$this->load->model('M_Centro_adopcion');
			$centrosSeleccionados = $this->input->post('centros');
			foreach ($centrosSeleccionados as $idCentro) {
				$CA= $this->M_Centro_adopcion->obtenerUno($idCentro);
				$centroActual = new stdClass();

				$centroActual->nombreCA = $CA->nombre_ca;
				if ($CA->animales) {
					foreach ($CA->animales as $animal) {
						if (!$animal->estaCastrado()) {
							$centroActual->animales[] = $animal;
						}
					}
				} else {
					$centroActual->animales = false;	
				}
				$datos[] = $centroActual;
				
			}
			echo json_encode($datos);
			break;

			case 'denuncias':
				# code...
			break;

			case 'adopciones':
				# code...
			break;
		}
	}

}

/* End of file C_Informes.php */
/* Location: ./application/controllers/C_Informes.php */