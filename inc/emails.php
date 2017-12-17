<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    class emails{
        
        // =========================================================
        public function EnviarEmailRecuperacaoPW($nova_password){
            require 'phpmailer/src/Exception.php';
            require 'phpmailer/src/PHPMailer.php';
            require 'phpmailer/src/SMTP.php';
		
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPOptions = array(
                    'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                    )
                );
            $mail->isHTML();
            $mail->SMTPDebug = 0;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'spacetprojectap@gmail.com';
            $mail->Password = 'spacetap';
            $mail->setFrom ('spacetprojectap@gmail.com', 'SPACET');
            $mail->addAddress('spacetprojectap@gmail.com', 'Mensagem de teste');
            $mail->CharSet = "UTF-8";
            //assunto
            $mail->Subject = 'Mensagem de teste';
            //mensagem
            $mail->Body = 'Nova password: '.$nova_password;               
            //envio da mensagem
            $enviada = false;
            if($mail->send()){ $enviada = true; }
            return $enviada;
        }
    }
?>