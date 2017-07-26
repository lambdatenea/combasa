<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require('../../Model/MailModel.php');
    
    class MailController{
        private $mail_modelo;


        public function __construct(){
          $this->mail_modelo = new MailModel();  
        }
 
        public function enviar_correo($email_dest, $nombre_dest = null, $tipo_msg, $password = null)
        {
            switch($tipo_msg)
            {
                case 1: 
                    require('Templates/bienvenido.php');
                    $asunto = "Bienvenida";
                    $ids = array(":nombre", ":email", ":key");
                    $values = array($nombre_dest, $email_dest, $password);
                    $msg_html = $this->sustituir_contenido($msg_html, $ids, $values);
                    break;
                case 2:
                    require('Templates/forgotPassword.php');
                    require('RandomPassword.php');
                    require('../../Model/ClienteModel.php');
                    $pwd = new RandomPassword();
                    $usuario = new ClienteModel();

                    $pass = $pwd->generaPass();
                    $usuario->cambiar_password($email_dest, $pass);

                    $asunto = "Reinicio contraseña Delux Car";
                    $ids = array(":nombre", ":email", ":key");
                    $values = array($nombre_dest, $email_dest, $pass);
                    $msg_html = $this->sustituir_contenido($msg_html, $ids, $values);
                    break;
                default: 
                    break;
            }
            $this->mail_modelo->enviar_correo($email_dest, $nombre_dest, $asunto, $msg_html);
        }
        
        private function sustituir_contenido($msg_html, $ids, $values)
        {
            $i = 0;
            // Orden del reemplazo
            $str     = $msg_html;
            foreach ($ids as &$id){   
                $order   = $id;
                $replace = $values[$i];
                $str = str_replace($order, $replace, $str);
                $i++;
            }
            
            unset($id);
            return $str;
        }
    }
?>

