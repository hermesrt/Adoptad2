<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller {

	public function index()
	{
		$this->load->library('pdf');
		$this->pdf = new Pdf();
		$this->pdf->AddPage();
		$this->pdf->SetFont('Arial','B',16);
		$this->pdf->Cell(40,10,'Hola, Mundo!');
		$this->pdf->Output();
	}

}

/* End of file Pdf.php */
/* Location: ./application/controllers/Pdf.php */