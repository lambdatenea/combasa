<?php
    date_default_timezone_set('Etc/UTC');
    
    require('../../Lib/PHPMailer/PHPMailerAutoload.php');

    class MailModel{
        private $mail;
        
        public function __construct() {
            //Create a new PHPMailer instance
            $this->mail = new PHPMailer;
        }
        
        public function enviar_correo($email_dest, $nombre_dest, $asunto, $msg_html)
        {       
            //Tell PHPMailer to use SMTP
            $this->mail->isSMTP();
            $this->mail->SMTPDebug = 0;

            //Ask for HTML-friendly debug output
            $this->mail->Debugoutput = 'html';

            //Set the hostname of the mail server
            $this->mail->Host = 'smtp.gmail.com';

            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $this->mail->Port = 587; 
            $this->mail->CharSet = "UTF-8";

            //Set the encryption system to use - ssl (deprecated) or tls
            $this->mail->SMTPSecure = 'tls';

            //Whether to use SMTP authentication
            $this->mail->SMTPAuth = true;

            //Username to use for SMTP authentication - use full email address for gmail
            $this->mail->Username = "deluxcar.noreplay@gmail.com";

            //Password to use for SMTP authentication
            $this->mail->Password = "Passw0rd1234";

            //Set who the message is to be sent from
            $this->mail->setFrom('deluxcar.noreplay@gmail.com', 'Delux Car');

            //Set who the message is to be sent to
            $this->mail->addAddress($email_dest, $nombre_dest);

            //Set the subject line
            $this->mail->Subject = $asunto;

            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            $this->mail->msgHTML($msg_html);

            //Replace the plain text body with one created manually
            $this->mail->AltBody = 'This is a plain-text message body';

            return $this->mail->send();
        }
    }
?>


