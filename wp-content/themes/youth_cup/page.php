<?php get_header(); ?>


<?php
$id = get_the_ID();

$miCover = get_field('video_cover',$id);
$miLink = get_field( 'youtube_link',$id);
$miBanner = get_field('home_banner',$id);

if ( $miCover != null){
	// estoy en el home traigo template correspondinete
	include ('page-home.php');


}else{ 
	//traigo el generico
 	include ('page-generic.php');

}

?>


<?php get_footer(); ?>
