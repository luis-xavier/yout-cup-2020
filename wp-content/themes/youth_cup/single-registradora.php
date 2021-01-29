<?php

if(isset($_POST['enviado'])) {


        //aqui tengo que vbolver a validor todos los campos 
        global $reg_errors;
        $reg_errors = new WP_Error;

          if ( empty( $_POST['nombre_equipo'] ) ) {
              $reg_errors->add("empty-name-team", "Debes agregar el nombre de tu equipo");
            }
          if ( empty( $_POST['afiliacion'] ) ) {
            $reg_errors->add("empty-afiliacion", "Selecciona tu tipo de afiliación");
          }
          if ( empty( $_POST['direccion'] ) ) {
            $reg_errors->add("empty-dir", "Escribe la dirección de tu equipo");
          }
          if ( empty( $_POST['pais'] ) ) {
            $reg_errors->add("empty-pais", "Escribe el nombre de tu país");
          }
          if ( empty( $_POST['ciudad'] ) ) {
            $reg_errors->add("empty-cd", "Escribe el nombre de tu ciudad");
          }
          if ( empty( $_POST['cp'] ) ) {
            $reg_errors->add("empty-cp", "Ingresa tu código postal");
          }
          if ( empty( $_POST['mobile'] ) ) {
            $reg_errors->add("empty-mob", "Ingresa tu número telefónico");
          }
          if ( empty( $_POST['nombre'] ) ) {
            $reg_errors->add("empty-name", "Por favor agrega tu nombre");
          }
          if ( empty( $_POST['email'] ) ) {
            $reg_errors->add("empty-email", "Ingresa un correo válido");
          }
          if ( empty( $_POST['yourrelation'] ) ) {
            $reg_errors->add("empty-rel", "Selecciona la relación que tienes con el equipo");
          }
          if ( empty( $_POST['enteraste'] ) ) {
            $reg_errors->add("empty-enteraste", "Elige la forma en que te enteraste del torneo");
          }
          if ( empty( $_POST['reasontoregister'] ) ) {
            $reg_errors->add("empty-reason", "Elige la razón más importante por la que te registras");
          }
          if ( empty( $_POST['aviso'] ) ) {
            $reg_errors->add("empty-aviso", "Debes términos y condiciones ");
          }
          
          if ( !is_email( $_POST['email'] ) ) {
            $reg_errors->add( "invalid-email", "El e-mail no tiene un formato válido" );
          }

          if ( strlen( $_POST['cp'] ) != 5 ) {
            $reg_errors->add( "invalid-postalcode", "El Código Postal debe tener 5 caracteres" );
          }

          if ( is_wp_error( $reg_errors ) ) {
            if (count($reg_errors->get_error_messages()) > 0) {
                //si hay falla
                
            }else{
             // echo "no hay falla";

                    //si si si ya todo esta chido...
                global $wpdb;
                $table = $wpdb->prefix.'registro';
                $data = array(
                    'equipo' => $_POST['nombre_equipo'], 
                    'afilia' => $_POST['afiliacion'],
                    'dir' => $_POST['direccion'], 
                    'pais' => $_POST['pais'], 
                    'ciudad' => $_POST['ciudad'], 
                    'cp' => $_POST['cp'], 
                    'tel' => $_POST['mobile'], 
                    'contacto' => $_POST['nombre'],
                    'correo' => $_POST['email'], 
                    'relacion' => $_POST['yourrelation'], 
                    'como' => $_POST['enteraste'], 
                    'motivo' => $_POST['reasontoregister'], 
                    'aviso' => $_POST['aviso']
                );
                $format = array('%s','%s','%s','%s','%s','%d','%s','%s','%s','%s','%s','%s','%s');
                $wpdb->insert($table,$data);
                $my_id = $wpdb->insert_id;

                if (isset($my_id)){

                  mandadora ();


                }
                
            }
          }

          }

        //var_dump($my_id);
        //$wpdb->print_error();
        //var_dump($wpdb);

        function mandadora (){

          
          require_once(ABSPATH . WPINC . '/PHPMailer/PHPMailer.php');
          require_once(ABSPATH . WPINC . '/PHPMailer/SMTP.php');
          require_once(ABSPATH . WPINC . '/PHPMailer/Exception.php');
           $phpmailer = new PHPMailer\PHPMailer\PHPMailer();


          //var_dump($phpmailer);

          $phpmailer->IsSMTP();
          $phpmailer->Host = 'smtp.google.com';
          $phpmailer->Port = '587';
          $phpmailer->SMTPSecure = 'tls';
          $phpmailer->SMTPAuth = true;
          $phpmailer->Username = 'contacto@curveball.mx';
          $phpmailer->Password = 'Contacto2021?';

          $phpmailer->addAddress($_POST['email'], $_POST['nombre']);
          $phpmailer->setFrom('contacto@curveball.mx', 'Contacto Curveball ');
          $phpmailer->addReplyTo('contacto@curveball.mx', 'Contacto Curveball ');
          $phpmailer->isHTML(true);
          $phpmailer->Subject = 'Registro Bayern Youth Cup';
          $phpmailer->Body    = "<html>

          <head>
              <meta charset='UTF-8'>
              <meta name='viewport' content='width=device-width, initial-scale=1.0'>
              <meta http-equiv='X-UA-Compatible' content='IE=edge'>
              <title>Registro Bayern Youth Cup</title>
              <style type='text/css'>
                  html, body{margin: 0 !important;padding: 0 !important;height: 100% !important;width: 100% !important;}*{-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;}.ExternalClass{width: 100%;}div[style*='margin: 16px 0']{margin: 0 !important;}table, td{mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;}table{border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;}table table table{table-layout: auto;}img{-ms-interpolation-mode: bicubic;}.yshortcuts a{border-bottom: none !important;}a[x-apple-data-detectors]{color: inherit !important;}
              </style>
              <style type='text/css'>
                  .button-td, .button-a{transition: all 100ms ease-in;}.button-td:hover, .button-a:hover{background: #555555 !important; border-color: #555555 !important;}@media screen and (max-width: 600px){.email-container{width: 100% !important;}.fluid, .fluid-centered{max-width: 100% !important; height: auto !important; margin-left: auto !important; margin-right: auto !important;}.fluid-centered{margin-left: auto !important; margin-right: auto !important;}.stack-column, .stack-column-center{display: block !important; width: 100% !important; max-width: 100% !important; direction: ltr !important;}.stack-column-center{text-align: center !important;}.center-on-narrow{text-align: center !important; display: block !important; margin-left: auto !important; margin-right: auto !important; float: none !important;}table.center-on-narrow{display: inline-block !important;}}
              </style>
          </head>
          
          <body bgcolor='#FFFFFF' width='100%' style='margin: 0;' yahoo='yahoo'>
              <table bgcolor='#FFFFFF' cellpadding='0' cellspacing='0' border='0' height='100%' width='100%' style='border-collapse:collapse;'>
                  <tr>
                      <td>
                          <center style='width: 100%;'>
                              <table align='center' width='600' class='email-container' style='background:#DCE2E5;'>
                                  <tr>
                                      <td style='padding: 20px 0; text-align: center'><img src='http://xochimaco.com/youth-cup/img/logo-mail.png' width='334' height='48' alt='alt_text' border='0'></td>
                                  </tr>
                              </table>
                              <table cellspacing='0' cellpadding='0' border='0' align='center' bgcolor='#F3F5F6' width='600' class='email-container'>
                                  <tr>
                                      <td style='padding: 40px; text-align: left; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;'>
                                          <h1 style='font-size: 20px;'>Gracias por tu registro ".$_POST['nombre']."</h1>
                                          <br>
                                          <p>Hemos recibido tus datos, pronto estaremos en contacto contigo para dar seguimiento a tu proceso de inscripción</p>
                                  </tr>
                                  <table align='center' width='600' class='email-container' style='background: #001829;'>
                                      <tr>
                                          <td style='padding: 20px 10px 9px;width: 100%;font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: center; color: #F3F5F6;'><span class='mobile-link--footer'>Bayern Youth Cup 2021</span> <br><br></tr>
                                  </table>
                          </center>
                          </td>
                  </tr>
                  </table>
          </body>
          
          </html>";              
          $phpmailer->send();

        }


get_header(); 

?>

<link rel="stylesheet" type="text/css" href="<?= get_stylesheet_directory_uri() . '/library/css/formulario.css' ?>">
<script type="text/javascript" src="<?= get_stylesheet_directory_uri() . '/library/js/formulario.js' ?>"></script>

<div id="back_form">

<script type="text/javascript">
jQuery(document).ready(function($) {
    <?php 

        if (isset($my_id)){
            echo  "$('#gracias').show('slow');";
            echo  "$('#form-wrapper').hide(0);";
        }else{
            echo  "$('#form-wrapper').show('slow');";
            echo  "$('#gracias').hide(0);";
        }
    ?>

});
</script>

<section id="gracias">
<div class="agradecimiento-wrapper">
        <section>
            <h2>¡Gracias por registrare <?= $_POST['nombre'] ?>!</h2>
            <p>Hemos recibido tus datos correctamente, nos pondremos en contacto contigo muy pronto.</p>
            <a href="<?= home_url() ?>" class="boton boton-reverse">Inicio</a>
        </section>

        <?php
        if (isset($reg_errors) && count($reg_errors->get_error_messages()) > 0) {

            foreach ( $reg_errors->get_error_messages() as $error ) {
                echo  "<h1> ".$error."</h1>";
               }
          
        }
?>  
    
    </div>



</section>

<section id="form-wrapper">
	<h1>Registra a tu equipo</h1>
    <p><b>Estás a unos pasos de mostrar tu talento en Munich.</b><br>Llena el siguiente formulario para que podamos validar tu información e inscribir a tu equipo.</p>
    <form action="" method="POST" id="formulario" class="formulario">            
        <ul>
            <li>
                <input id="nombre_equipo" maxlength="50" name="nombre_equipo" size="20" type="text" required="" class="sinvalidar" onBlur="validarNombreEquipo('nombre_equipo')" oninput="validarNombreEquipo('nombre_equipo')"/>
                <label for="nombre_equipo">Nombre del equipo</label>
            </li>

            <li>
                <label for="afiliacion" class="select-label">Afiliación</label>
                <select  id="afiliacion" name="afiliacion" title="afiliacion" class="sinvalidar" onchange="validarSelectAfiliacion('afiliacion')">
                    <option value=""></option>
                    <option value="escuela">Escuela</option>
                    <option value="club">Club</option>
                    <option value="independiente">Independiente</option>
                    <option value="otro">Otro</option>
                </select>
            </li>

            <li>
                <input id="direccion" maxlength="80" name="direccion" size="20" type="text" required="" class="sinvalidar" onBlur="validarDireccion('direccion')" oninput="validarDireccion('direccion')"/>
                <label for="direccion">Dirección</label>
            </li>

            <li class="half-columnA">
                <input id="pais" maxlength="80" name="pais" size="20" type="text" required="" class="sinvalidar" onBlur="validarPais('pais')" oninput="validarPais('pais')"/>
                <label for="pais">País</label>
            </li>

            <li class="half-columnB">
                <input id="ciudad" maxlength="80" name="ciudad" size="20" type="text" required="" class="sinvalidar" onBlur="validarCiudad('ciudad')" oninput="validarCiudad('ciudad')"/>
                <label for="ciudad">Ciudad</label>
            </li>

            <li class="half-columnA">
                <input id="cp" maxlength="5" name="cp" size="20" type="text" required="" class="sinvalidar" onBlur="validarCP('cp')" oninput="validarCP('cp')" onkeypress="return isNumberKey(event)"/>
                <label for="cp">Código postal</label>
            </li>

            <li class="half-columnB">
                <input id="telefono" maxlength="13" name="mobile" size="20" type="text" required="" class="sinvalidar" onBlur="validarTelefono('telefono')" oninput="validarTelefono('telefono')" onkeypress="return isNumberKey(event)"/>
                <label for="telefono">Teléfono</label>
            </li>

            <li>
                <input id="nombre" maxlength="50" name="nombre" size="20" type="text" required="" class="sinvalidar" onBlur="validarNombre('nombre')" oninput="validarNombre('nombre')"/>
                <label for="nombre">Nombre de contacto</label>
            </li>

            <li>
                <input id="email" maxlength="80" name="email" size="20" type="text" required="" class="sinvalidar" onBlur="validarCorreo('email')" oninput="validarCorreo('email')" />
                <label for="email">Correo electrónico</label>
            </li>
        
           <li>
                <label for="yourrelation" class="select-label">Tu relación con el equipo</label>
                <select  id="yourrelation" name="yourrelation" title="yourrelation" class="sinvalidar" onchange="validarSelectTuRelacion('yourrelation')">
                    <option value=""></option>
                    <option value="coach">Coach</option>
                    <option value="coordinador">Coordinador</option>
                    <option value="director">Director</option>
                    <option value="jugador">Jugador</option>
                    <option value="familiar">Miembro de la familia</option>
                    <option value="otro">Otro</option>
                </select>
            </li>

            <li>
                <label for="enteraste" class="select-label">¿Cómo te enteraste del torneo?</label>
                <select  id="enteraste" name="enteraste" title="enteraste" class="sinvalidar" onchange="validarSelectEnteraste('enteraste')">
                    <option value=""></option>
                    <option value="television">Televisión</option>
                    <option value="internet">Internet</option>
                    <option value="amigos">Amigos</option>
                    <option value="facebook">Facebook</option>
                    <option value="otro">Otros</option>
                </select>
            </li>

            <li>
                <label for="reasontoregister" class="select-label">¿Porqué te registras en el torneo?</label>
                <select  id="reasontoregister" name="reasontoregister" title="reasontoregister" class="sinvalidar" onchange="validarSelectReasonToRegister('reasontoregister')">
                    <option value=""></option>
                    <option value="premios">Premios</option>
                    <option value="viaje">Posibilidad de viajar a Munich</option>
                    <option value="visores">Visores del Bayern Munich</option>
                    <option value="prestigio">Prestigio del torneo</option>
                    <option value="fechas">Las fechas</option>
                    <option value="otro">Otro</option>
                </select>
            </li>
            <li style="text-align: left;">
                <input type="checkbox" class="checkbox-estilizado" name="aviso" id="aviso" onchange="validarCheckAviso('aviso')">
                <label for="aviso">Acepto términos y condiciones contenidos en el <a href="" class="inline-link">Aviso de privacidad</a></label>
            </li>
        </ul>

        <button type="submit" name="enviar" onclick="window.validacion()" class="boton" id="enviador">ENVIAR</button>

        <input type="hidden" name="enviado" value="true" />

    </form>

</section>
</div>



<?php get_footer(); ?>
