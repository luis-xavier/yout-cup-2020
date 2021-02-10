<?php

if(isset($_POST['enviado'])) {
        //aqui tengo que vbolver a validor todos los campos 

        ///// LUIS WAS HERE
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
              
            }
          }else{

             //si si si ya todo esta chido...
        global $wpdb;
        $table = $wpdb->prefix.'registro';
        $data = array(
            'contacto' => $_POST['nombre'],
            'equipo' => $_POST['nombre_equipo'], 
            'ciudad' => $_POST['ciudad'], 
            'correo' => $_POST['email'], 
            'tel' => $_POST['mobile'],
            'seleccionarte' => $_POST['seleccionarte'], 
            'aviso' => $_POST['aviso']
        );
        $format = array('%s','%s','%s','%s','%s','%d');

        ///// END OF LUIS WAS HERE

        
        $wpdb->insert($table,$data);

    
        $my_id = $wpdb->insert_id;

        //var_dump($my_id);

        //$wpdb->print_error();
        //var_dump($wpdb);



          }

}


?>
<link rel="stylesheet" type="text/css" href="<?= get_stylesheet_directory_uri() . '/library/css/formulario.css' ?>">
<script type="text/javascript" src="<?= get_stylesheet_directory_uri() . '/library/js/formulario-b.js' ?>"></script>

<div id="">

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
<h1>Gracias por tu registro </h1>
<?php
if (isset($reg_errors) && count($reg_errors->get_error_messages()) > 0) {
    foreach ( $reg_errors->get_error_messages() as $error ) {
        echo  "<h1> ".$error."</h1>";
       }
}
?>
</section>

<section id="form-wrapper">
	<h1></h1>
    <form action="" method="POST" id="formulario" class="formulario">            
        <ul>
        	<li>
                <input id="nombre" maxlength="50" name="nombre" size="20" type="text" required="" class="sinvalidar" onBlur="validarNombre('nombre')" oninput="validarNombre('nombre')"/>
                <label for="nombre">Nombre</label>
            </li>
            
            <li>
                <input id="nombre_equipo" maxlength="50" name="nombre_equipo" size="20" type="text" required="" class="sinvalidar" onBlur="validarNombreEquipo('nombre_equipo')" oninput="validarNombreEquipo('nombre_equipo')"/>
                <label for="nombre_equipo">Nombre del equipo</label>
            </li>
			
			<li>
                <input id="ciudad" maxlength="80" name="ciudad" size="20" type="text" required="" class="sinvalidar" onBlur="validarCiudad('ciudad')" oninput="validarCiudad('ciudad')"/>
                <label for="ciudad">Ciudad</label>
            </li>
			
			<li>
                <input id="telefono" maxlength="13" name="mobile" size="20" type="text" required="" class="sinvalidar" onBlur="validarTelefono('telefono')" oninput="validarTelefono('telefono')" onkeypress="return isNumberKey(event)"/>
                <label for="telefono">Teléfono</label>
            </li>
            
            <li>
                <input id="email" maxlength="80" name="email" size="20" type="text" required="" class="sinvalidar" onBlur="validarCorreo('email')" oninput="validarCorreo('email')" />
                <label for="email">Correo electrónico</label>
            </li>

            <li>
                <textarea id="seleccionarte" name="seleccionarte" required="" class="sinvalidar" onBlur="validarSeleccionarte('seleccionarte')" oninput="validarSeleccionarte('seleccionarte')" /></textarea>
                <label for="seleccionarte">¿Por qué crees que debamos seleccionarte?</label>
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
