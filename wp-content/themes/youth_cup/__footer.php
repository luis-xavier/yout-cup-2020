<?php  $language = explode('/', $_SERVER['REQUEST_URI']);
        $language = $language[1]; ?>
<footer>
    <section class="second-section-footer">
        <div class="subsections-footer">
            <div class="first-subsection-footer subsection-footer">
                <a href="https://fcbayern.com/es" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/logo-footer.svg" alt=""></a>
                <div class="footer-item"></div>
                <a href="" class="curveball"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/logo-curveball.svg" alt=""></a>
            </div>
            <div class="second-subsection-footer subsection-footer">
                <?php if($lang == 'es'){ ?>
        <p>Contáctanos:</p>
        <?php }else{ ?>
        <p>Contact us:</p>
        <?php } ?>
                
                <p>+52 461104 3805</p>
                <a href="mailto:contacto@curveball.mx">contacto@curveball.mx</a>
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
    <section class="third-section-footer">
        
        <?php if($language == 'en'){ ?>
        <p>Youth Cup Friends</p>
        <?php }else{ ?>
        <p>Amigos de la Youth Cup</p>
        <?php } ?>
        <div class="amigos-yc">
            
            <?php

  rewind_posts();

  // Get all items in slider post type
  $query = new WP_Query( array(
    'post_type' => 'Amigos',
    'posts_per_page' => -1 ) );

    while($query->have_posts()) : $query->the_post();
    
    // Get desktop image banner
    $amigosImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
    $amigosImage = $amigosImage[0];

?>
            <a href="<?php echo get_the_content(); ?>" target="_blank" class="tv4"><img src="<?= $amigosImage; ?>" alt=""></a>
            <!-- <a href=""><img src="<?= get_stylesheet_directory_uri() ?>/library/img/embajada.svg" alt=""></a>
            <a href=""><img src="<?= get_stylesheet_directory_uri() ?>/library/img/estado.svg" alt=""></a>            -->
            <?php endwhile; ?>
        </div>
    </section>
    <?php
        if($language == 'en'){
    ?>
    <address><?php bloginfo( 'name' ); ?> <?= date('Y'); ?> &copy; All rights reserved |<a href="https://youthcup.mx/?page_id=118"> Notice of privacy</a></address>
    
    <?php }else{ ?>
    <address><?php bloginfo( 'name' ); ?> <?= date('Y'); ?> &copy; Derechos reservados |<a href="https://youthcup.mx/?page_id=118&lang=es"> Aviso de Privacidad</a></address>
    <?php } ?>


    
</footer>
<?php if ( is_front_page() || is_home() ) { 

if($language == 'en'){
    $modalClick = 'Click <a onclick="window.open("https://youthcup.mx/que-sea-mi-equipo/")" href="https://youthcup.mx/que-sea-mi-equipo/">HERE</a> to fill in your data to become one of the two teams FC Bayern and Tigres will put through the Youth Cup México';
}else{
    $modalClick = 'Haz click <a onclick="window.open("https://youthcup.mx/que-sea-mi-equipo/")" href="https://youthcup.mx/que-sea-mi-equipo/">aquí</a> y llena el formulario para que tu equipo sea uno de los 2 becados por FC Bayern y Tigres';
}
?>
<div class="overlay-confirmacion" style="display: block;">
	<div class="modal">
        <div class="cerrar-modal"></div>
        <section id="modal-wrapper" style="
    padding: 0;
    margin: 0;
    height: auto;
    width: 100%;
">
    <div id="back_form_login" style="
    margin: 0;
    padding: 90px 90px 0 90px;
    box-sizing: border-box;
">
        <div class="modal-content" style="flex-wrap: wrap;justify-content: center;align-items: center;">

        <?php include ("modal-registro.php"); ?>
            
        </div>
    </div>
            
        </section>
	</div>
</div>

<?php } ?>


</style>

<?php //include 'modal-registro.php' ?>

<?php wp_footer(); ?>

	</body>


</html> <!-- end of site. what a ride! -->
