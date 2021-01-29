<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('/Users/babas/proyectos/xochimaco/fucho/wp-includes/PHPMailer/Exception.php');
require_once('/Users/babas/proyectos/xochimaco/fucho/wp-includes/PHPMailer/PHPMailer.php');
require_once('/Users/babas/proyectos/xochimaco/fucho/wp-includes/PHPMailer/SMTP.php');

//require_once(ABSPATH . WPINC . '/PHPMailer/Exception.php');
//require_once(ABSPATH . WPINC . '/PHPMailer/PHPMailer.php');
//require_once(ABSPATH . WPINC . '/PHPMailer/SMTP.php');

//$phpmailer = new PHPMailer\PHPMailer\PHPMailer();

$mail = new PHPMailer(true);


try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.google.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'contacto@curveball.mx';                     // SMTP username
    $mail->Password   = 'Contacto2021?';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('contacto@curveball.mx', 'Contacto Curveball ');
    $mail->addAddress('miguel.adrian.trejo@gmail.com', 'El babas');     // Add a recipient
    $mail->addReplyTo('contacto@curveball.mx', 'Contacto Curveball');


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>