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



	/*Este metodo es el que se usa para obtener la informacion necesaria para los graficos*/
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
						if (!($animal->estaAdoptado()) && $animal->estado_animal=="activo") {
							$centroActual->animales[] = $animal;
						}
					}
				} else {
					$centroActual->animales = false;	
				}
				$datos[] = $centroActual;
				
			}
			echo json_encode($datos);		// ARRAY DE OBJETOS (StdClass) con el nombre del CA y un array de sus animales
			break;

			case 'denuncias':
				# code...
			break;

			case 'adopciones':
				# code...
			break;
		}
	}

	/*Este metodo guarda los nombres de las imagenes en SESSION*/
	function salvarNombres()
	{	
		$arrayNombres = json_decode($this->input->post('nombreImagenes'));
		foreach ($arrayNombres as $key => $value) {
			$array["imagen".$key] = $value;
		}
		$this->session->set_userdata("nombresImgs",$array);
		echo 'ok';
	}


	/*Este metodo recibe el grafico en base64 y lo guarda como imagen con el nombre que se le pase*/
	function guardarImagen()
	{
		$imagenEnBase64 = $this->input->post("imagen");
		$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagenEnBase64));
		$filepath =  "./assets/img/graficos/".$this->input->post("nombre");
		file_put_contents($filepath,$data);
	}

	/*Este metodo recupera los nombres de las img's y genera el PDF*/
	function exportarPDF()
	{
		$nombres = $this->session->userdata('nombresImgs');
		$this->load->library('pdf');
		$this->pdf = new Pdf();
		$this->pdf->AddPage();
		$this->pdf->SetFont('Arial','B',16);
		$y=50;
		foreach ($nombres as $nombre) {

			$this->pdf->Image(base_url('assets/img/graficos/').$nombre , 50 ,$y, 100 , 60,'PNG');
			$y=$y+60;
		}
		$this->session->unset_userdata('nombresImgs');
		$this->pdf->Output();
	}



}
/* End of file C_Informes.php */
/* Location: ./application/controllers/C_Informes.php */