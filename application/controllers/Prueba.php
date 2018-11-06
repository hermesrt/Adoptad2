<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller {

    
	public function index()
	{
        $arr = array(
            'assets/img/graficos/animalesXcentro.jpg',
            'assets/img/graficos/animalesXedad0.jpg',
            'assets/img/graficos/animalesXedad1.jpg',
            'assets/img/graficos/animalesXedad2.jpg',
            'assets/img/graficos/animalesXespecie1.jpg',
            'assets/img/graficos/animalesXespecie2.jpg'
        );
        
		$this->load->library('pdf');
		$this->pdf = new Pdf();
		$this->pdf->AddPage();
		$this->pdf->SetFont('Arial','B',16);
        $y = 0;
        $x = 0;
        for ($i = 0; $i < count($arr); $i++)
        {
            if ($i % 2 == 0){
                echo 'es par ....';
                $this->pdf->Image(base_url($arr[$i]),0,0, 0 , 0,'PNG');
            }else{
                echo 'es impar.....';
                $this->pdf->Image(base_url($arr[$i]),0,0, 0 , 0,'PNG');
            }
        }
       /* foreach ($arr as $imagen){
            echo 'jeje ----> ';
            $this->pdf->Image(base_url($imagen),0,50, 0 , 0,'PNG');
        }*/
		//$this->pdf->Image(base_url('assets/img/graficos/animalesXedad1.jpg') ,0,50, 0 , 0,'PNG');
        $this->pdf->Cell(40,10,'Hola, Mundo!');
        
		$this->pdf->Output();
	}
    
	public function imagen()
	{
		$this->load->view('Prueba');
	}

}

/* End of file Pdf.php */
/* Location: ./application/controllers/Pdf.php */