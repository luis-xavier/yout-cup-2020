<?php get_header(); ?>

<section class="first-section-home section-white">
    <div class="section-video">
        <h1>FC Bayern Youth Cup Mexico</h1>
        <img src="<?= get_stylesheet_directory_uri() ?>/library/img/still-video 1.jpg" alt="">
        <video src=""></video>
        <button class="muted"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/mute.svg" alt=""></button>
    </div>
    <article>
        <h1>FC Bayern Youth Cup Mexico</h1>
        <p>El torneo que te brindará la oportunidad de mostrar tu talento enfrente de representantes del FC Bayern Munich que te permitirán representar a México en la<strong class="strong-red"> final Mundial en Munich, Alemania</strong></p>
    </article>
    <a href="" class="boton">INSCRÍBETE AQUÍ</a>
</section>


<section class="second-section-home">
    <div class="banner-tvcuatro">
        <img src="<?= get_stylesheet_directory_uri() ?>/library/img/banner-desktop.jpg" alt="" class="tv-cuatro-desktop">
        <img src="<?= get_stylesheet_directory_uri() ?>/library/img/banner-mobile.jpg" alt="" class="tv-cuatro-mobile">
    </div>
</section>

<section class="third-section-home noticias section-gray">
    <h2>Noticias</h2>
    <!--span>Actualización al 29 de dicembre</span-->
    <div class="noticias-wrapper">
    <?php 

        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                ?>
                <div class="noticia">
                <?php (has_post_thumbnail() ? the_post_thumbnail() : false) ?>
            <h3><?php the_title(); ?></h3>
            <p><?php the_excerpt(); ?></p>
            <a href="<?= esc_url( get_permalink( )) ?>">LEER MÁS</a>
        </div>




                <?php
            endwhile;
        else :
            _e( 'Sorry, no posts were found.', 'textdomain' );
        endif;

    ?>

    </div>
</section>    


<section class="container">
        <!-- SWIPER -->
        <div class="swiper-container">
            <div class="swiper-wrapper">

<?php 

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        // Your loop code
        ?>

        <div class="swiper-slide">
                    <div class="noticia">
                        <?php (has_post_thumbnail() ? the_post_thumbnail() : false) ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php get_permalink() ?>">LEER MÁS</a>
                    </div>
        </div>


        <?php
    endwhile;
else :
    _e( 'Sorry, no posts were found.', 'textdomain' );
endif;

?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
</section>

<!-- Swiper JS -->
<script src="js/swiper-6.4.5.min.js"></script>

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


<?php get_footer(); ?>
