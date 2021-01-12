<?php include "header.php" ?>
<link rel="stylesheet" type="text/css" href="css/formulario.css">
<script type="text/javascript" src="js/login.js"></script>

<div id="back-stadium">
    
<section id="form-wrapper">
	<h1>Ingresa con tus datos</h1>
    <form action="" method="POST" id="formulario" class="formulario login">            
        <ul>
            <li>
                <input id="email" maxlength="80" name="email" size="20" type="text" required="" class="sinvalidar" onBlur="validarCorreo('email')" oninput="validarCorreo('email')" />
                <label for="email">Correo electrónico</label>
            </li>

            <li>
                <input id="pass" maxlength="50" name="pass" size="20" type="password" required="" class="sinvalidar" onBlur="validarPass('pass')" oninput="validarPass('pass')"/>
                <label for="pass">Contraseña</label>
            </li>

            <li style="text-align: left;" class="half-columnA columA-login">
                <input type="checkbox" class="checkbox-estilizado" name="aviso" id="aviso" onchange="validarCheckAviso('aviso')">
                <label for="aviso">Recordarme</label>
            </li>

            <li style="text-align: left;" class="half-columnB columB-login">
                <a href="" class="contraseña">Olvidé mi contraseña</a>
            </li>
        </ul>

        <button type="submit" name="enviar" onclick="validacion()" class="boton boton-login">INGRESAR</button>
    </form>
    <p id="registro">No tienes usuario regístrate <a href="formulario.php">aquí</a></p>

</section>

</div>

<?php include "footer.php" ?>