<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

<main class="main">
<div>
    <figure>
      <img src="http://www.barcos-alquiler.com/imagenes/alquiler_barcos/alquiler_barcos.jpg" alt="">
      <figcaption>
      <p><strong>Main</strong> aphhon dje la imagen</p>
      </figcaption>
    </figure>
</div>
<div>
	<figure>
		<img src="http://www.barcos-alquiler.com/imagenes/alquiler_barcos/alquiler_barcos.jpg" alt="">
		<figcaption>
		<p><strong>Main</strong> aption de la imagen</p>
		</figcaption>
	</figure>
</div>
<div>
	<figure>
		<img src="http://www.barcos-alquiler.com/imagenes/alquiler_barcos/alquiler_barcos.jpg" alt="">
		<figcaption>
		<p><strong>Main</strong> caiomagen</p>
		</figcaption>
	</figure>
</div>
<div>
	<figure>
		<img src="http://www.barcos-alquiler.com/imagenes/alquiler_barcos/alquiler_barcos.jpg" alt="">
		<figcaption>
		<p><strong>Main</strong> caption de la imagen</p>
		<a href="#">button</a>
		</figcaption>
	</figure>
</div>
<div>
	<figure>
		<img src="http://www.barcos-alquiler.com/imagenes/alquiler_barcos/alquiler_barcos.jpg" alt="">
		<figcaption>
		<p><strong>Main</strong> caption de la imagen</p>
		</figcaption>
	</figure>
</div>
<div>
	<figure>
		<img src="http://www.barcos-alquiler.com/imagenes/alquiler_barcos/alquiler_barcos.jpg" alt="">
		<figcaption>
		<p><strong>Main</strong> captikjon de laen</p>
		</figcaption>
	</figure>
</div>
<section>
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
	$casarural_query = new WP_Query( $args );
	?>
	<?php if ( $casarural_query->have_posts() ) : while ( $casarural_query->have_posts() ) : $casarural_query->the_post(); ?>
	<article>
		<header>
			<h2><?php the_title(); ?></h2>
		</header>
		<p><?php the_content(); ?></p>
		<div class="features">
			<?php if (get_field('plazas')): ?>
			Plazas:<?php the_field('plazas'); ?>
			<?php endif ?>
			<?php if (get_field('habitaciones')): ?>
			Habitaciones:<?php the_field('habitaciones'); ?>
			<?php endif ?>
			<?php if (get_field('admite_animales')): ?>
			Admite animales:<?php the_field('admite_animales'); ?>
			<?php endif ?>
			<?php if (get_field('camas')): ?>
			Camas:<?php the_field('camas'); ?>
			<?php endif ?>
			<?php if (get_field('superficie')): ?>
			Superfície:<?php the_field('superficie'); ?>
			<?php endif ?>
			<?php if (get_field('vistas')): ?>
			Vistas:<?php the_field('vistas'); ?>
			<?php endif ?>
			<?php if (get_field('opciones')): ?>
			Opciones:<?php the_field('opciones'); ?>
			<?php endif ?>
			<?php if (get_field('reservado')): ?>
			Ocupado de <?php the_field('reservado'); ?> a <?php the_field('reservado_fin'); ?>
			<?php endif ?>
			<?php if (get_field('precio')): ?>
		</div>
		<div class="precio">
			<p class="precio__cantidad">
				<?php the_field('precio'); ?>€
			</p>
			<small>Precio de 2 a 7 noches</small>
		</div>
		<?php endif ?>
		
	</article>
	<?php endwhile; endif; ?>
</section>

</main>
	<?php //echo do_shortcode('[mappress mapid="1" width="100%"]'); ?>
<?php get_footer(); ?>