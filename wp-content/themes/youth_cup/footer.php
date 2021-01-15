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


<section class="newsletter">
        <div>
            <p>Entérate de las noticias antes que nadie en nuestro Newsletter</p>
            <form action="">
                <input type="text" name="usuario" id="usuario" placeholder="Escribe tu correo electrónico">
                <button class="">SUSCRÍBETE</button>
            </form>
        </div>
    </section>
	
	<footer>
    <section class="second-section-footer">
        <div class="subsections-footer">
            <div class="first-subsection-footer subsection-footer">
                <a href=""><img src="<?= get_stylesheet_directory_uri() ?>/library/img/logo-footer.svg" alt=""></a>
                <div class="footer-item"></div>
                <a href="" class="curveball"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/logo-curveball.svg" alt=""></a>
            </div>
            <div class="second-subsection-footer subsection-footer">
                <p>Contáctanos:</p>
                <p>000000000</p>
                <p>contacto@curveball.mx</p>
            </div>
            <div class="third-subsection-footer subsection-footer">
            <nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
</nav>
            </div>


            <div class="fourth-section-footer subsection-footer">
                <a class="whatsapp"href=""><img src="<?= get_stylesheet_directory_uri() ?>/library/img/whatsapp.svg" alt=""></a>
                <a href=""><img src="<?= get_stylesheet_directory_uri() ?>/library/img/instagram.svg" alt=""></a>
                <a href=""><img src="<?= get_stylesheet_directory_uri() ?>/library/img/facebook.svg" alt=""></a>
            </div>
        </div>
        <span class="span-f">contacto@curveball.mx</span>
    </section>
    <address><?php bloginfo( 'name' ); ?> <?= date('Y'); ?> &copy; Derechos reservados</address>
</footer>






		<?php wp_footer(); ?>

		<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
    slidesPerView: 2,
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        // when window width is >= 640px
        800: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        
    }
   
});
</script>

	</body>

</html> <!-- end of site. what a ride! -->
