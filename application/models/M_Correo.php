<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_correo extends CI_Model {
    
    
    //--------- funcion para enviar el mail
    public function enviarCorreo ($email_destino,$encabezado,$mensaje)
    {
        $configGmail = array(
            'protocol' => 'smtp',
            'smt_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => 'nombre_email_que_creamos', // aca colocamos el mail que creamos para enviar
            'smtp_pass' => 'password'   // aca va la contraseña que le puse al mail de arriba
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        try{
            $this->email->from('nombre_email_que_creamos');
            $this->email->to($email_destino);
            $this->email->cc('another@another-example.com'); //------> ????
            $this->email->bcc('them@their-example.com');  //-----> ?????

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
    
}

?>