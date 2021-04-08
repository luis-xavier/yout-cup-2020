<?php
/*
 Template Name: #queSeaMiEquipo
 *
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>
<?php

if(isset($_POST['enviado'])) {
        //aqui tengo que vbolver a validor todos los campos 

        global $reg_errors;
        $reg_errors = new WP_Error;
          
          if ( empty( $_POST['nombre'] ) ) {
            $reg_errors->add("empty-name", "Por favor agrega tu nombre");
          }
          if ( empty( $_POST['nombre_equipo'] ) ) {
            $reg_errors->add("empty-name-team", "Debes agregar el nombre de tu equipo");
          }
          if ( empty( $_POST['ciudad'] ) ) {
            $reg_errors->add("empty-cd", "Escribe el nombre de tu ciudad");
          }
          if ( empty( $_POST['email'] ) ) {
            $reg_errors->add("empty-email", "Ingresa un correo válido");
          }
          if ( empty( $_POST['mobile'] ) ) {
            $reg_errors->add("empty-mob", "Ingresa tu número telefónico");
          }

          if ( empty( $_POST['aviso'] ) ) {
            $reg_errors->add("empty-aviso", "Debes términos y condiciones ");
          }
          
          if ( !is_email( $_POST['email'] ) ) {
            $reg_errors->add( "invalid-email", "El e-mail no tiene un formato válido" );
          }

          if ( is_wp_error( $reg_errors ) ) {
            if (count($reg_errors->get_error_messages()) > 0) {

                //si hay falla
                foreach ( $reg_errors->get_error_messages() as $error ) {
                  echo  "<p> ".$error."</p>";
                 }
             }else{
                  //si si si ya todo esta chido...
                  //echo "no hay";
              include 'library/mailer.php';
              global $wpdb;
              $table = $wpdb->prefix.'preregistro';
              $data = array(
                  'nombre' => $_POST['nombre'],
                  'equipo' => $_POST['nombre_equipo'], 
                  'cd' => $_POST['ciudad'], 
                  'telefono' => $_POST['mobile'],
                  'mail' => $_POST['email'], 
                  'porque' => esc_textarea($_POST['seleccionarte']), 
                  'aviso' => $_POST['aviso']
              );

              $wpdb->insert($table,$data);
              $my_id = $wpdb->insert_id;
              //var_dump($my_id);

              //$wpdb->print_error();
              //var_dump($wpdb);

              if (isset($my_id)){
                palAdminDos ($_POST['nombre'],$_POST['nombre_equipo'],$_POST['ciudad'],$_POST['mobile'],$_POST['email'],esc_textarea($_POST['seleccionarte']));
                palEquipo ($_POST['email'], $_POST['nombre']);
              }
          }
        }
}
?>
<?php get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?= get_stylesheet_directory_uri() . '/library/css/formulario.css' ?>">
<script type="text/javascript" src="<?= get_stylesheet_directory_uri() . '/library/js/formulario-b.js' ?>"></script>

<div id="back_form_login">

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
            <h2>¡Gracias tu mensaje <?= $_POST['nombre'] ?>!</h2>
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

    <?php 

(string)$lang = pll_current_language();

//echo $lang." _here";

$esp = array(
  "Nombre",
  "Nombre del equipo",
  "Ciudad",
  "Teléfono",
  "Correo electrónico",
  "¿Por qué crees que debamos seleccionarte?",
  "Mi equipo corresponde a la categoría participante (2004-06) y deberíamos ser seleccionador por...",
  "Acepto los términos y condiciones",
  "Enviar",
  );

  $ing = array(
    "Name",
    "Team name",
    "City",
    "Phone number",
    "Email",
    "Tell us why why your team can be selected",
    "My team has on category (2004-06) and can be selected because...",
    "I accept the terms and conditions",
    "Send",
    );
  
?>

</section>

<section id="form-wrapper">
    <h1><?php the_title(); ?></h1>  
    <?php  the_content(); ?>

    <form action="" method="POST" id="formulario" class="formulario">            
        <ul>
        	<li>
                <input id="nombre" maxlength="50" name="nombre" size="20" type="text" required="" class="sinvalidar" onBlur="validarNombre('nombre')" oninput="validarNombre('nombre')" <?= (isset($_POST['nombre'])) ? 'value="'.$_POST['nombre'].'"' : false ?> />
                <label for="nombre"><?= ($lang == 'en') ? $ing[0] : $esp[0]; ?> </label>
            </li>
            
            <li>
                <input id="nombre_equipo" maxlength="50" name="nombre_equipo" <?= (isset($_POST['nombre_equipo'])) ? 'value="'.$_POST['nombre_equipo'].'"' : false ?>size="20" type="text" required="" class="sinvalidar" onBlur="validarNombreEquipo('nombre_equipo')" oninput="validarNombreEquipo('nombre_equipo')"/>
                <label for="nombre_equipo"><?= ($lang == 'en') ? $ing[1] : $esp[1]; ?></label>
            </li>
			
			<li>
                <input id="ciudad" maxlength="80" name="ciudad" <?= (isset($_POST['ciudad'])) ? 'value="'.$_POST['ciudad'].'"' : false ?> size="20" type="text" required="" class="sinvalidar" onBlur="validarCiudad('ciudad')" oninput="validarCiudad('ciudad')"/>
                <label for="ciudad"><?= ($lang == 'en') ? $ing[2] : $esp[2]; ?></label>
            </li>
			
			<li>
                <input id="telefono" maxlength="13" name="mobile" <?= (isset($_POST['mobile'])) ? 'value="'.$_POST['mobile'].'"' : false ?> size="20" type="text" required="" class="sinvalidar" onBlur="validarTelefono('telefono')" oninput="validarTelefono('telefono')" onkeypress="return isNumberKey(event)"/>
                <label for="telefono"><?= ($lang == 'en') ? $ing[3] : $esp[3]; ?></label>
            </li>
            
            <li>
                <input id="email" maxlength="80" name="email" <?= (isset($_POST['email'])) ? 'value="'.$_POST['email'].'"' : false ?> size="20" type="text" required="" class="sinvalidar" onBlur="validarCorreo('email')" oninput="validarCorreo('email')" />
                <label for="email"><?= ($lang == 'en') ? $ing[4] : $esp[4]; ?></label>
            </li>

            <li>
                <label for="seleccionarte"><?= ($lang == 'en') ? $ing[5] : $esp[5]; ?></label>
                <textarea id="seleccionarte" name="seleccionarte" required="" class="sinvalidar" onBlur="validarSeleccionarte('seleccionarte')" oninput="validarSeleccionarte('seleccionarte')" />
                <?php 
                if (isset($_POST['seleccionarte'])){
                  echo $_POST['seleccionarte'];
                }else{
                 echo  ($lang == 'en') ? $ing[6] : $esp[6];
                }


                ?>
              </textarea>
            </li>

            <li style="text-align: left;">
                <input type="checkbox" class="checkbox-estilizado" name="aviso" id="aviso" onchange="validarCheckAviso('aviso')">
                <label for="aviso"><?= ($lang == 'en') ? $ing[7] : $esp[7]; ?> <a href="<?= get_permalink( get_page_by_title( 'Aviso de privacidad' ) )?>" target="_blank" class="inline-link"></a></label>
            </li>
        </ul>

        <button type="submit" name="enviar" onclick="window.validacion()" class="boton" id="enviador"><?= ($lang == 'en') ? $ing[8] : $esp[8]; ?></button>

        <input type="hidden" name="enviado" value="true" />

    </form>

</section>
</div>
<?php get_footer(); ?>