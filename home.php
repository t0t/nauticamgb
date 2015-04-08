<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>
<main class="main">
<?php
$args = array(
'post_type' => 'cpt',
// 'meta_query' => array(
			// 	array(
			// 	'key' => '',
			// 	'value' => '',
			// 	'compare' => ''
			// 	)
// ),
'posts_per_page' => get_option('posts_per_page')
);
$cpt_loop = new WP_Query( $args );
?>
<?php if ( $cpt_loop->have_posts() ) : while ( $cpt_loop->have_posts() ) : $cpt_loop->the_post(); ?>
<div>
	<figure>
		<img src="http://www.barcos-alquiler.com/imagenes/alquiler_barcos/alquiler_barcos.jpg" alt="">
		<figcaption>
		<h2><?php the_title(); ?></h2>
		</figcaption>
	</figure>
</div>
<article>
	<div class="features"></div>
	<div class="precio">
		<p class="precio__cantidad">
			<?php the_field('precio'); ?>€
		</p>
		<small></small>
	</div>
</article>

<?php endwhile; endif; ?>
</main>
<?php //echo do_shortcode('[mappress mapid="1" width="100%"]'); ?>
<?php get_footer(); ?>