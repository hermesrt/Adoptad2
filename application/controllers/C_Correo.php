<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Correo extends CI_Controller {

    //--> Constructor del controlador
    public function __construct()
	{
		parent::__construct();
        $this -> load -> model('M_Correo','correo');
	}
	
	//--> funcion index
	public function index()
	{
        $var = $this -> correo -> enviarCorreo('lucasficus@gmail.com',"Prueba de envio de mail jeje","Este mensaje ta re loco");
        if ($var){
            echo 'EL MAIL ANDUVO';
        } else {
            echo 'EL MAIL NO SE ENVIO';
        }
       /* $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.googlemail.com', //'smtp.googlemail.com',
            'smtp_user' => 'lucasficus@gmail.com', //Su Correo de Gmail Aqui
            'smtp_pass' => 'xxxxx', // Su Password de Gmail aqui
            'smtp_port' => '465',
            'smtp_crypto' => 'ssl',
            'mailtype' => 'html',
            'wordwrap' => TRUE,
            'charset' => 'utf-8',
        );
        $this->load->library('email');//, $config);
        $this -> email -> initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('lucasficus@gmail.com','Lucas Vejar');
        $this->email->to('lucasficus@gmail.com');
        $this->email->subject('Prueba envio mail');
        $this->email->message('Se envio todo perfecto!!');
        
        if($this->email->send(FALSE)){
            echo "enviado<br/>";
            echo $this->email->print_debugger(array('headers'));
        }else {
            echo "fallo <br/>";
            echo "error: ".$this->email->print_debugger(array('headers'));
        }*/
        
	}
    
  
    

}

?> 