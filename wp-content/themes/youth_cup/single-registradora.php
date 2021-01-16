<?php

if(isset($_POST['enviado'])) {

        //aqui tengo que vbolver a validor todos los campos 


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

        //var_dump($my_id);

        //$wpdb->print_error();
        //var_dump($wpdb);



}

get_header(); 

?>


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
<h1>Gracias por tu registro </h1>
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

        <button type="submit" name="enviar" onclick="validacion()" class="boton" id="enviador">ENVIAR</button>

        <input type="hidden" name="enviado" value="true" />

    </form>

</section>
</div>



<?php get_footer(); ?>
