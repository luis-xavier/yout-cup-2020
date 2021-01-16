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

<?php get_footer(); ?>

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