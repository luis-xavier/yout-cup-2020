<?php include "header.php" ?>


<div class="overlay-black"></div>
<section class="first-section-home section-white">
    <div class="section-video">
        <h1>FC Bayern Youth Cup Mexico</h1>
        <img src="img/still-video 1.jpg" alt="">
        <video src=""></video>
        <button class="muted"><img src="img/mute.svg" alt=""></button>
    </div>
    <article>
        <h1>FC Bayern Youth Cup Mexico</h1>
        <p>El torneo que te brindará la oportunidad de mostrar tu talento enfrente de representantes del FC Bayern Munich que te permitirán representar a México en la<strong class="strong-red"> final Mundial en Munich, Alemania</strong></p>
    </article>
    <a href="" class="boton">INSCRÍBETE AQUÍ</a>
    <div class="banner-tvcuatro tv-cuatro-mobile"></div>
</section>
<section class="second-section-home">
    <div class="banner-tvcuatro">
    </div>
</section>
<section class="third-section-home noticias section-gray">
    <h2>Noticias</h2>
    <span>Actualización al 29 de dicembre</span>
    <div class="noticias-wrapper">
        <div class="noticia">
            <img src="img/noticia.jpg" alt="">
            <h3>Título de la Noticia 1</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</p>
            <a href="">LEER MÁS</a>
        </div>
        <div class="noticia">
            <img src="img/noticia.jpg" alt="">
            <h3>Título de la Noticia 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</p>
            <a href="">LEER MÁS</a>
        </div>
        <div class="noticia">
            <img src="img/noticia.jpg" alt="">
            <h3>Título de la Noticia 3</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</p>
            <a href="">LEER MÁS</a>
        </div>
    </div>
    <section class="container">
        <!-- SWIPER -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="noticia">
                        <img src="img/noticia.jpg" alt="">
                        <h3>Título de la Noticia 1</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</p>
                        <a href="">LEER MÁS</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="noticia">
                        <img src="img/noticia.jpg" alt="">
                        <h3>Título de la Noticia 1</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</p>
                        <a href="">LEER MÁS</a>
                    </div class="noticia">
                </div>
                <div class="swiper-slide">
                    <div class="noticia">
                        <img src="img/noticia.jpg" alt="">
                        <h3>Título de la Noticia 1</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</p>
                        <a href="">LEER MÁS</a>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <a href="" class="boton boton-reverse">MÁS NOTICIAS</a>
</section>

<div class="overlay-confirmacion">
	<div class="modal">
		<div class="cerrar-modal"></div>
        <section id="modal-wrapper">
            <h2>Suscríbete al newsletter y participa en la rifa de un jersey</h2>
            <form action="">
                <input type="text" placeholder="Nombre">
                <input type="text" placeholder="Correo electrónico">
                <input type="checkbox" class="checkbox-estilizado" name="aviso" id="aviso" onchange="validarCheckAviso('aviso')">
                    <label for="aviso">Acepto términos y condiciones contenidos en el <a href="" class="inline-link">Aviso de privacidad</a></label>
            </form>
            <button type="submit" name="enviar" onclick="validacion()" class="boton">ENVIAR</button>
            <p>Conoce las reglas <a href="">aquí</a></p>
        </section>
	</div>
</div>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

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

<?php include "newsletter.php" ?>

<?php include "footer.php" ?>

