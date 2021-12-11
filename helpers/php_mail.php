<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function php_mail($email,$subject,$body) {
   //Create an instance; passing `true` enables exceptions
   $mail = new PHPMailer(true);

   try {
       //Server settings
       //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
       $mail->isSMTP();                                            //Send using SMTP
       $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
       $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
       $mail->Username   = 'eduthrift@gmail.com';                //SMTP username
       $mail->Password   = 'EduThrift@728285';                               //SMTP password
       $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
       $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

       //Recipients2
       $mail->setFrom('eduthrift@gmail.com', 'EduThrift');
       $mail->addAddress($email, 'New User');     //Add a recipient
       //$mail->addAddress('ellen@example.com');               //Name is optional
       //$mail->addReplyTo('info@example.com', 'Information');
       //$mail->addCC('cc@example.com');
       //$mail->addBCC('bcc@example.com');

       //Attachments
       //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

       //Content
       $mail->isHTML(true);                                  //Set email format to HTML
       $mail->Subject = $subject;
       $mail->Body    = $body;
       //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

       $mail->send();
       //echo 'Message has been sent';
   } catch (Exception $e) {
       echo "Verification mail could not be sent.";
   }
}

?>