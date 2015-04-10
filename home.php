<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>
<div id="main-content" class="main">
	<div id="inside">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/barco1.svg" />
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<?php endwhile; ?>
		<div class="pagination">
			<span class="older"><?php next_posts_link('&laquo; Older Entries') ?></span>
			<span class="newer"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
		</div>
		<?php else : ?>
		<h1>Uh oh...</h1>
		<?php endif; ?>
	</div>
</div>
<?php //echo do_shortcode('[mappress mapid="1" width="100%"]'); ?>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>