<?php get_header(); ?>


<?php
$id = get_the_ID();

$miCover = get_field('video_cover',$id);
$miLink = get_field( 'youtube_link',$id);
$miBanner = get_field('home_banner',$id);
$miBannerLink = get_field('link_banner',$id);

if ( $miCover != null){
	// estoy en el home traigo template correspondinete
	require ('page-home.php');


}else{ 
	//traigo el generico
 	require ('page-generic.php');

}

?>


<?php get_footer(); ?>
