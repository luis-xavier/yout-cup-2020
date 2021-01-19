<?php
include "header.php";
function actual_date ()  
{  
    $week_days = array ("domingo", "lunes", "martes", "miercoles", "jueves", "viernes", "sabado");  
    $months = array ("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");  
    $year_now = date ("Y");  
    $month_now = date ("n");  
    $day_now = date ("j");  
    $week_day_now = date ("w");  
    $date = $week_days[$week_day_now] . " " . $day_now . " de " . $months[$month_now] . " de " . $year_now;   
    return $date;    
}
?>

<div class="overlay-black"></div>

<div id='overlay-video'>
    <div class='modal-video'>
        <div class='cerrar-modal'></div>
        <iframe id='iframe-yc' width='100%' height='1' src='video-full.html' frameborder='0' allowfullscreen></iframe>
    </div>
</div>

<div class="overlay-black ob-one"></div>

<section class="first-section-home section-white">
    <div class="section-video">
        <h1>FC Bayern Youth Cup México</h1>
        <div class="video-overlay"></div>
        <video playsinline autoplay muted loop width="100%" height="auto">
            <source src="videos/yc-video-hero.mp4" type="video/mp4">
        </video>
        <button id="abrir-modal" class="abrir-modal"><img src="img/expand.svg" alt=""></button>
    </div>
    <article>
        <h1>FC Bayern Youth Cup Mexico</h1>
        <p>El torneo que te brindará la oportunidad de mostrar tu talento enfrente de representantes del FC Bayern Munich que te permitirán representar a México en la<strong class="strong-red"> final Mundial en Munich, Alemania</strong></p>
    </article>
    <a href="" class="boton">INSCRÍBETE AQUÍ</a>
</section>
<section class="second-section-home">
    <div class="banner-tvcuatro">
        <img src="img/banner-desktop.jpg" alt="" class="tv-cuatro-desktop">
        <img src="img/banner-mobile.jpg" alt="" class="tv-cuatro-mobile">
    </div>
</section>
<section class="third-section-home noticias section-gray">
    <h2>Noticias</h2>
    <span>Actualización: <?= actual_date(); ?></span>
    <div class="noticias-wrapper">
        <div class="noticia">
            <img src="img/twit-noticia.jpg" alt="">
            <h3>La FC Bayern Youth Cup llega a México</h3>
            <p>FC Bayern y Curveball Sports se han unido para llevar a cabo en México el prestigioso torneo juvenil.</p>
            <a href="curveball-youth-cup.php">LEER MÁS</a>
        </div>
        <div class="noticia">
            <img src="img/freestyle.jpg" alt="">
            <h3>México participará en la FC Bayern Youth Cup Freestyle 2021</h3>
            <p>Como parte de la FC Bayern Youth Cup 2021, México participará en la edición Freestyle del mismo torneo a través de las plataformas oficiales del club alemán.</p>
            <a href="bayern-freestyle.php">LEER MÁS</a>
        </div>
        <!-- <div class="noticia">
            <img src="img/noticia.jpg" alt="">
            <h3>Título de la Noticia 3</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</p>
            <a href="">LEER MÁS</a>
        </div> -->
    </div>

    <section class="container">
        <!-- SWIPER -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="noticia">
                        <img src="img/twit-noticia.jpg" alt="">
                        <h3>La FC Bayern Youth Cup llega a México</h3>
                        <p>FC Bayern y Curveball Sports se han unido para llevar a cabo en México el prestigioso torneo juvenil.</p>
                        <a href="curveball-youth-cup.php">LEER MÁS</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="noticia">
                        <img src="img/freestyle.jpg" alt="">
                        <h3>México participará en la FC Bayern Youth Cup Freestyle 2021</h3>
                        <p>Como parte de la FC Bayern Youth Cup 2021, México participará en la edición Freestyle del mismo torneo a través de las plataformas oficiales del club alemán.</p>
                        <a href="bayern-freestyle.php">LEER MÁS</a>
                    </div>
                </div>
                <!-- <div class="swiper-slide">
                    <div class="noticia">
                        <img src="img/noticia.jpg" alt="">
                        <h3>Título de la Noticia 1</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</p>
                        <a href="">LEER MÁS</a>
                    </div>
                </div> -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <a href="" class="boton boton-reverse">MÁS NOTICIAS</a>
</section>

<?php include "modal.php" ?>

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
            spaceBetween: 30,
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

<?php include "newsletter.php" ?>

<?php include "footer.php" ?>

