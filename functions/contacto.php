<?php
if(isset($_POST) ){
    session_start();
    require_once '../includes/conecta.php';
    //GAURDAR LOS DATOS EN VARIABLES,
    //se usa la ternaria y la función de escapar caracteres para forzar todo lo que se envía a un string y evitar código malicioso en la base de datos
    var_dump($_POST);
    echo "<br>";

    $nombre_equipo = isset($_POST['nombre_equipo']) ? mysqli_real_escape_string($db, $_POST['nombre_equipo']) : false;

    echo $nombre_equipo;
    
    $afiliacion = isset($_POST['afiliacion']) ? mysqli_real_escape_string($db, $_POST['afiliacion']) : false;
    $direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($db, $_POST['direccion']) : false;
    $pais = isset($_POST['pais']) ? mysqli_real_escape_string($db, $_POST['pais']) : false;
    $ciudad = isset($_POST['ciudad']) ? mysqli_real_escape_string($db, $_POST['ciudad']) : false;
    $cp = isset($_POST['cp']) ? mysqli_real_escape_string($db, $_POST['cp']) : false;
    $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($db, $_POST['telefono']) : false;
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $yourrelation = isset($_POST['yourrelation']) ? mysqli_real_escape_string($db, $_POST['yourrelation']) : false;
    $enteraste = isset($_POST['enteraste']) ? mysqli_real_escape_string($db, $_POST['enteraste']) : false;
    $reasontoregister = isset($_POST['reasontoregister']) ? mysqli_real_escape_string($db, $_POST['reasontoregister']) : false;
    $aviso = isset($_POST['aviso']) ? mysqli_real_escape_string($db, $_POST['aviso']) : false;

    

    $guardar = mysqli_query($db, "INSERT INTO leads VALUES(null, '$nombre_equipo', '$afiliacion', '$direccion', '$pais', '$ciudad', '$cp', '$telefono', '$nombre', '$email', '$yourrelation', '$enteraste', '$reasontoregister', '$aviso', CURDATE() );");

    if($guardar){
        $_SESSION['completado'] = 'Te has registrado exitosamente';
        header('Location: ../index.php');
    } else {
        $_SESSION['fallo'] = 'Ha fallado el registro';
    }
}

/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../includes/Exception.php';
require '../includes/PHPMailer.php';
require '../includes/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'localhost';
    $mail->SMTPAuth   = false;
	$mail->SMTPAutoTLS = false; 
    $mail->Port       = 25;

    //Recipients
    $mail->setFrom('xavier.fernandez.mx@gmail.com', 'Curveball Sports');
	$mail->addAddress('xavier.fernandez.mx@gmail.com');

    // Content
    $mail->isHTML(true);
	$mail->CharSet = 'UTF-8';
    $mail->Subject = $nombre.' ha llenado un registro en el sitio';
    $mail->Body    = "<!doctype html><html><head><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'> <meta http-equiv='X-UA-Compatible' content='IE=edge'><title>Formulario de Contacto - Weil & Co.</title><style type='text/css'>html, body{margin: 0 !important;padding: 0 !important;height: 100% !important;width: 100% !important;}*{-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;}.ExternalClass{width: 100%;}div[style*='margin: 16px 0']{margin: 0 !important;}table, td{mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;}table{border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;}table table table{table-layout: auto;}img{-ms-interpolation-mode: bicubic;}.yshortcuts a{border-bottom: none !important;}a[x-apple-data-detectors]{color: inherit !important;}</style> <style type='text/css'> .button-td, .button-a{transition: all 100ms ease-in;}.button-td:hover, .button-a:hover{background: #555555 !important; border-color: #555555 !important;}@media screen and (max-width: 600px){.email-container{width: 100% !important;}.fluid, .fluid-centered{max-width: 100% !important; height: auto !important; margin-left: auto !important; margin-right: auto !important;}.fluid-centered{margin-left: auto !important; margin-right: auto !important;}.stack-column, .stack-column-center{display: block !important; width: 100% !important; max-width: 100% !important; direction: ltr !important;}.stack-column-center{text-align: center !important;}.center-on-narrow{text-align: center !important; display: block !important; margin-left: auto !important; margin-right: auto !important; float: none !important;}table.center-on-narrow{display: inline-block !important;}}</style> </head> <body bgcolor='#e0e0e0' width='100%' style='margin: 0;' yahoo='yahoo'> <table bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0' height='100%' width='100%' style='border-collapse:collapse;'> <tr> <td><center style='width: 100%;'> <div style='display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;'> Han llenado un registro en el sitio weil.com.mx </div><table align='center' width='600' class='email-container' style='background:#000;'> <tr> <td style='padding: 20px 0; text-align: center'><img src='http://weil.com.mx/img/logo-weil-mail.png' width='220' height='41' alt='alt_text' border='0'></td></tr></table> <table cellspacing='0' cellpadding='0' border='0' align='center' bgcolor='#ffffff' width='600' class='email-container'> <tr> <td style='padding: 40px; text-align: left; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;'> <h1>Datos del interesado:</h1><hr><p>Nombre: <strong>$nombre</strong></p><p>Teléfono: <strong>$telefono</strong></p><p>Correo electrónico: <strong>$email</strong></p><p>Mensaje: <strong>$mensaje</strong></p><br></td></tr><table align='center' width='600' class='email-container' style='background: #000000;'> <tr> <td style='padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: center; color: #888888;'> <br><br><span class='mobile-link--footer'>Weil & Co.</span> <br><br></tr></table> </center></td></tr></table></body></html>";
    $mail->AltBody = "Datos del interesado -- Nombre: $nombre -- Teléfono: $telefono -- Correo electrónico: $email -- Mensaje: $mensaje";
    $mail->send();
    $_SESSION['enviado'] = 'Nos pondremos en contacto contigo muy pronto';
	header('Location: ../index.php');
} catch (Exception $e) {
    $_SESSION['error_mensaje'] = "Ha habido un error en el envío: {$mail->ErrorInfo}";
}*/

var_dump($_SESSION);
echo '<br>';
echo $_SESSION['error_mensaje'];
//header('Location: ../index.php');
?>