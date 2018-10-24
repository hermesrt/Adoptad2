<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_correo extends CI_Model {
    
    
    //--------- funcion para enviar el mail
    public function enviarCorreo ($email_destino,$encabezado,$mensaje)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.googlemail.com', 
            'smtp_user' => 'XXXXXXXX', //Su Correo de Gmail Aqui
            'smtp_pass' => 'XXXXX', // Su Password de Gmail aqui
            'smtp_port' => '465',
            'smtp_crypto' => 'ssl',
            'mailtype' => 'html',
            'wordwrap' => TRUE,
            'charset' => 'utf-8',
            'validate' => TRUE
        );
       // $this->load->library('email');//, $config);
        $this -> email -> initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('correo@gmail.com','Nombre del chabon'); //----> el correo de google del que se envia
        $this->email->to($email_destino);
        $this->email->subject($encabezado);
        $this->email->message($mensaje);
        //----> Lo que esta comentado es por si falla, muestra los datos del mail y errores si es que se envio mal
        if ($this -> email -> send(FALSE)){
            /*echo "enviado<br/>";
            echo $this->email->print_debugger(array('headers'));*/
            return true;
        }else{
            /*echo "fallo <br/>";
            echo "error: ".$this->email->print_debugger(array('headers'));*/
            return false;
        }
        
        
    
    }
    
    public function generarCorreo ()
    {
        
    }
    
    
    //-------> envia por gmail
    public function sendMailGmail()
    {
        //cargamos la libreria email de ci
        $this->load->library("email");

        //configuracion para gmail
        $configGmail = array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_user' => 'correo_gmail',
        'smtp_pass' => 'password',
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'newline' => "\r\n"
        );    

        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);

        $this->email->from('nombre o correo que envia');
        $this->email->to("para quien es");
        $this->email->subject('Bienvenido/a a uno-de-piera.com');
        $this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de gmail</h2><hr><br> Bienvenido al blog');
        $this->email->send();
        //con esto podemos ver el resultado
        var_dump($this->email->print_debugger());
    }
    
 
    //---------> Envia mail para yahoo
    public function sendMailYahoo()
    {
        //cargamos la libreria email de ci
        $this->load->library("email");

        //configuracion para yahoo
        $configYahoo = array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.mail.yahoo.com',
        'smtp_port' => 587,
        'smtp_crypto' => 'tls',
        'smtp_user' => 'emaildeyahoo',
        'smtp_pass' => 'password',
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'newline' => "\r\n"
        ); 

        //cargamos la configuración para enviar con yahoo
        $this->email->initialize($configYahoo);

        $this->email->from('correo que envia los emails');//correo de yahoo o no funcionará
        $this->email->to("correo que recibe el email");
        $this->email->subject('Bienvenido/a a uno-de-piera.com');
        $this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de yahoo</h2><hr><br> Bienvenido al blog');
        $this->email->send();
        //con esto podemos ver el resultado
        var_dump($this->email->print_debugger());

    }

    
}

?>