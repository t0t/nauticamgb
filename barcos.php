<?php
/*
Template Name: Barcos
*/
?>
<?php get_header(); ?>
<div id="main-content" class="main">
	<div id="inside">
		<h1><?php the_title(); ?></h1>
		
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
		
		<div class="pagination">
			<span class="older"><?php next_posts_link('&laquo; Older Entries') ?></span>
			<span class="newer"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
		</div>
	</div>
</div>
<?php //echo do_shortcode('[mappress mapid="1" width="100%"]'); ?>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>