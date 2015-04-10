</div>
<footer class="main-footer">
<div class="c-form">
	<h2 class="btn">Contacta</h2>
	
	<div class="c-form__items">
	<?php echo do_shortcode('[contact-form-7 id="13" title="Formulario de contacto 1"]' ); ?>
	</div>
</div>
<div class="social">
	<nav>
		<ul>
			<li><a href="#">Facebook</a></li>
		</ul>
	</nav>
</div>
<div class="main-footer__credits">
	<?php bloginfo('name'); ?>&copy; <?php the_date('Y'); ?>
	<?php wp_loginout(); ?>
	<?php edit_post_link(); ?>
</div>
</footer>
</div>
<!-- Audio -->
<audio autoplay preload="auto">
<source src="<?php echo content_url(); ?>/uploads/sound2.ogg" type="audio/ogg" />
<source src="<?php echo content_url(); ?>/uploads/sound2.mp3" type="audio/mp3" />
Your browser does not support the audio tag.
</audio>

<?php //do_shortcode('[audio src="sound2.mp3"]' ); ?>
<script>
	// Warning, global variable =/
var base = '<?php echo home_url(); ?>';
</script>
<?php wp_footer(); ?>
</body>
</html>