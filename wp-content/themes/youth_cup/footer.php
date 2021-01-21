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
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => '',            // adding custom nav class
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
                <a href="https://wa.me/+524611043805?text=Hola%20quiero%20más%20información%20de%20la%20copa%20juvenil%202021" target="_blank" class="whatsapp"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/whatsapp.svg" alt=""></a>
                <a href="https://www.youtube.com/channel/UCbnBjkUECYEqf2KNV6CoN0A" target="_blank" class="youtube"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/youtube.svg" alt=""></a>
                <a href="https://www.instagram.com/youthcupmexico/" target="_blank" class="instagram"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/instagram-gris.svg" alt=""></a>
                <a href="https://www.facebook.com/Youth-Cup-M%C3%A9xico-102079555182521" target="_blank" class="facebook"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/facebook-gris.svg" alt=""></a>
            </div>
        </div>
        <span class="span-f"><a href="">contacto@curveball.mx</a></span>
    </section>
    <address><?php bloginfo( 'name' ); ?> <?= date('Y'); ?> &copy; Derechos reservados |<a href=""> Aviso de Privacidad</a></address>
</footer>



<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
