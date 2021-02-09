<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?= get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php 
		// wordpress head functions
		wp_head(); 
		?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

	<header <?php if(is_user_logged_in()){echo 'style="margin-top:30px"';}?> >
    <div class="first-section-header">
        <a href="<?= home_url() ?>">
		<img class="logo-header" src="<?= get_stylesheet_directory_uri() ?>/library/img/fcyouthcup-mx.svg" alt="">
        </a>
    </div>
    <div class="second-section-header">
        <div class="top-bar">
        <div class="idiomas">
                <a name="button" href="?lang=es"><span class="seleccionado idioma-desk">ES</span></a>/
                <a name="button" href="?lang=en"><span class=" idioma-desk">EN</span></a>
            </div>
            <div class="redes-sociales-header">
                <a href="https://www.instagram.com/" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/instagram-gris.svg" alt=""></a>
                <a class="facebook-header" href="https://www.facebook.com/" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/facebook-gris.svg" alt=""></a>
                <a href="https://www.youtube.com/c/fcbayern" class="youtube-header" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/youtube.svg" alt=""></a>
            </div>
            <div class="mi-equipo">
                <a href="<?php 
                if ( is_user_logged_in() ) {
                    echo esc_url( get_permalink('page_id=277') );
                }else{
                    echo esc_url( wp_login_url() );
                }
                ?>"><span>Mi equipo</span><img src="<?= get_stylesheet_directory_uri() ?>/library/img/equipo.svg" alt=""></a>
            </div>
        </div>
        <div class="header-nav">


            <nav class="menu-desktop main-menu" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">

            <?php wp_nav_menu(array(
    					         'container' => false,                           // remove nav container
    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
    					         'menu' => __( 'Main Menu', 'bonestheme' ),  // nav name
    					         'menu_class' => 'menu-desktop main-menu',               // adding custom nav class
    					         'theme_location' => 'main-nav',                 // where it's located in the theme
    					         'before' => '',                                 // before the menu
        			               'after' => '',                                  // after the menu
        			               'link_before' => '',                            // before each link
        			               'link_after' => '',                             // after each link
        			               'depth' => 0,                                   // limit the depth of the nav
    					         'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>


                <!--ul>
                    <li style="z-index: 6; width: 5%; border-bottom: none;" class="nothing"><div></div></li>
                    <li style="z-index: 5;"><a href="acerca-de.php">Acerca de</a>
                        <ul class="dropdown-menu">
                            <img src="<?= get_stylesheet_directory_uri() ?>/library/img/flecha.svg" alt="">
                            <li><a href="preguntas-frecuentes.php" id="actividades1-link">Preguntas frecuentes</a></li>
                        </ul>
                    </li>
                    <li style="z-index: 4;"><a href="torneo.php">Torneo</a></li>
                    <li style="z-index: 3;"><a href="yc.php">Youth Cup</a>
                        <ul class="dropdown-menu cup-container">
                            <img src="<?= get_stylesheet_directory_uri() ?>/library/img/flecha.svg" alt="">
                            <li><a href="" id="actividades1-link" class="yc-2020">Youth Cup 2020</a></li>
                            <li><a href="" id="actividades1-link" class="yc-2019">Youth Cup 2019</a></li>
                        </ul>
                    </li>
                    <li style="z-index: 2;"><a href="noticias.php">Noticias</a></li>
                    <li style="z-index: 1;" id="participa"><a href="formulario.php" >Participa</a></li>
                </ul-->
            </nav>


        </div>
    </div>
    <div class="menu_anvorguesa">
        <p>MENÚ</p>
        <div class="anvorguesa">
            <svg viewBox="0 0 800 600">
                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                <path d="M300,320 L540,320" id="middle"></path>
                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
            </svg>
        </div>
    </div>
    <div id="menu-container" class="">


        <ul id="menu-mobile">
            <!--li><a href="acerca-de.php" class="">Acerca de</a></li>
            <li><a href="torneo.php" class="">Torneo</a></li>
            <li><a href="yc.php" class="">Youth Cup</a></li>
            <li><a href="noticias.php" class="">Noticias</a></li>
            <li><a href="formulario.php" class="">Participa</a></li>
            <li><a href="login.php" class="">Mi equipo</a></li-->
            <?php wp_nav_menu(array(
    					         'container' => false,                           // remove nav container
    					         'container_class' => 'menu-mobile',                 // class of container (should you choose to use it)
    					         'menu' => __( 'Main Menu', 'bonestheme' ),  // nav name
    					         'menu_class' => 'menu-desktop main-menu',               // adding custom nav class
    					         'theme_location' => 'main-nav',                 // where it's located in the theme
    					         'before' => '',                                 // before the menu
        			               'after' => '',                                  // after the menu
        			               'link_before' => '',                            // before each link
        			               'link_after' => '',                             // after each link
        			               'depth' => 0,                                   // limit the depth of the nav
    					         'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>

        </ul>
        <div id="menu-mobile-bar">
            <div class="idiomas">
                <a name="button" href="?lang=es"><span class="seleccionado idioma-desk">ES</span></a>/
                <a name="button" href="?lang=en"><span class=" idioma-desk">EN</span></a>
            </div>
            <div class="redes-sociales-header">
                <a class="whatsapp" href="https://wa.me/+524611043805?text=Hola%20quiero%20más%20información%20de%20la%20copa%20juvenil%202021" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/whatsapp.svg" alt=""></a>
                <a href="https://www.instagram.com/" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/instagram-gris.svg" alt=""></a>
                <a class="facebook-header" href="https://www.facebook.com/" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/facebook-gris.svg" alt=""></a>
                <a href="https://www.youtube.com/c/fcbayern" class="youtube-header" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/library/img/youtube.svg" alt=""></a>
            </div>
        </div>
    </div>
</header>


<div class="overlay-black"></div>