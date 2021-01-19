<?php get_header(); ?>

<?php 
    $latest = new WP_Query(
        array(
            'post_type' => 'car',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'orderby' => 'modified',
            'order' => 'DESC'
        )
    );

    if($latest->have_posts()){
        $modified_date = $latest->posts[0]->post_modified;
    }
?>

<section class="np-wrapper">
    <div class="noticia-principal noticia">
	<?php (has_post_thumbnail() ? the_post_thumbnail() : false) ?>
        <article>
            <h2><?php the_title(); ?></h2>
			<p><?php the_excerpt(); ?></p>
			<a href="<?= esc_url( get_permalink( )) ?>" class="boton boton-reverse">leer más</a>
        </article>
    </div>

<section class="noticias">
<div id="display-noticia" class="noticias-wrapper nw-noticia">
	<?php 
	$contador = 1;
	if (have_posts()) : while (have_posts()) : the_post(); ?>

    
        
            <div id="noticia-<?= $contador?>" class="noticia">
			<?php (has_post_thumbnail() ? the_post_thumbnail('thumbnail', array('class' => 'img-np')) : false) ?>
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">LEER MÁS</a>
            </div>

			<?php
					$contador ++; 
				endwhile; ?>



<?php else : ?>

<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>

<?php endif; ?>
</div>
</div>
    </section>
</section>

<?php get_footer(); ?>
