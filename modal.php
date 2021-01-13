<div class="overlay-confirmacion">
	<div class="modal">
		<div class="cerrar-modal"></div>
        <section id="modal-wrapper">
            <h2>Suscríbete al newsletter y participa en la rifa de un jersey</h2>
            <form action="" method="POST" id="formulario" class="formulario">
                <ul>
                    <li>
                    <input id="email" maxlength="80" name="email" size="20" type="text" required="" class="sinvalidar" onBlur="validarCorreo('email')" oninput="validarCorreo('email')" />
                    <label for="email">Nombre</label>
                    </li>

                    <li>
                    <input id="pass" maxlength="50" name="pass" size="20" type="password" required="" class="sinvalidar" onBlur="validarPass('pass')" oninput="validarPass('pass')"/>
                    <label for="pass">Correo electrónico</label>
                    </li>   
                </ul>
                <input type="checkbox" class="checkbox-estilizado" name="aviso" id="aviso" onchange="validarCheckAviso('aviso')">
                <label for="aviso">Acepto términos y condiciones contenidos en el <a href="" class="inline-link">Aviso de privacidad</a></label>
            </form>
            <button type="submit" name="enviar" onclick="validacion()" class="boton enviar">ENVIAR</button>
            <p>Conoce las reglas <a href="">aquí</a></p>
        </section>
	</div>
</div>