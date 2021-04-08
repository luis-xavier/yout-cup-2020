<?php  $language = explode('/', $_SERVER['REQUEST_URI']);
        $language = $language[1];

if ($language == 'en'){
    $titleNesletter = 'Find out about the news before anyone else in our Newsletter';
    $buttonNewsletter = 'SUSCRIBE';
    $placeNewsletter = 'Write your email';
    
}else{
    $titleNesletter = 'Entérate de las noticias antes que nadie en nuestro Newsletter';
    $buttonNewsletter = 'SUSCRÍBETE';
    $placeNewsletter = 'Escribe tu correo electrónico';
}
?>
<section class="newsletter">
    <div>
        <p><?= $titleNesletter; ?></p>
        <form action="">
            <input type="text" name="usuario" id="usuario" placeholder="<?= $placeNewsletter; ?>">
            <button class=""><?= $buttonNewsletter; ?></button>
        </form>
    </div>
</section>