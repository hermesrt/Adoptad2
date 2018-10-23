<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_correo extends CI_Model {
    
    
    //--------- funcion para enviar el mail
    public function enviarCorreo ($email_destino,$encabezado,$mensaje)
    {
        $configGmail = array(
            'protocol' => 'smtp',
            'smt_host' => 'ssl://smtp.googlemail.com',  // El servidor de correo que utilizaremos
            'smtp_port' => '465',  //---> el puertoque utilizara el servidor smtp
            'smtp_user' => 'nombre_email_que_creamos@gmail.com', // aca colocamos el mail que creamos para enviar
            'smtp_pass' => 'password',   // aca va la contraseña que le puse al mail de arriba
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
            'validate' => TRUE   ///----> El email debe ser valido
        );
        try{
            //---> inicializo el mail con la configuracion de arriba
            $this-> email -> initialize($configGmail);
            
            $this->email->from('nombre_email_que_creamos');
            $this->email->to($email_destino);
            $this->email->cc('another@another-example.com'); 
            $this->email->bcc('them@their-example.com');  

            $this->email->subject($encabezado);   //--------> titulo 
            $this->email->message($mensaje);   //----> mensaje 

            //----> si se pudo enviar devuelve true 
            if ($this->email->send())  //---> se envia
            {
                return true;
            } else {
                return false;
            }
        }catch(Exception $e){
            //-----> Si algo anda mal devuelve false
            $e -> getMessage();  //----> obtiene el error de la excepcion
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