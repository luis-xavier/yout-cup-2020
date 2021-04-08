<?php get_header(); ?>

<div class="noticia-curveball">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<?php 

$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'large', true);
$url_imagen=$thumb_url[0];

?>
    <!--img src="<?= $url_imagen ?>" class="first-image" alt=""-->
    <h2><?php the_title(); ?></h2>
    <?php  the_content(); ?>
	
</div>

<?php endwhile; ?>

<?php else : ?>

	<article id="post-not-found" class="hentry cf">
			<header class="article-header">
				<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
			</header>
			<section class="entry-content">
				<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
			</section>
			<footer class="article-footer">
					<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
			</footer>
	</article>

<?php endif; ?>


<?php get_footer(); ?>
