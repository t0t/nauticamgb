<?php // All AJAX custom functions
$themename = "Mi tema";
$shortname = "lab";
$options = array (
	array(
		"name" => "Opciones de " . $themename,
		"type" => "title"),
	array(
		"type" => "open"),
	array(
		"name" => "Footer Text",
		"desc" => "This text will display in the footer of your site",
		"id"   => $shortname . "_footer_text",
		"type" => "textarea"),
	array(
		"name" => "Use for main navigation",
		"desc" => "What do you want in the main navigation bar?",
		"id"   => $shortname . "_nav_choice",
		"options" => array("Pages" => "Pages", "Categories" => "Categories"),
		"type" => "select"),
	array(
		"type" => "close")
);
// add theme page
function mytheme_add_admin() {
	global $themename, $shortname, $options;
	if ($_GET['page'] == basename(__FILE__)) {
		if ('save' == $_REQUEST['action']) {
			foreach ($options as $value) {
				update_option($value['id'], $_REQUEST[$value['id']]);
			}
			foreach ($options as $value) {
				if (isset($_REQUEST[$value['id']])) {
					update_option($value['id'], $_REQUEST[$value['id']]);
				} else {
					delete_option($value['id']);
				}
			}
			header("Location: themes.php?page=functions.php&saved=true");
			die;
		} else if ('reset' == $_REQUEST['action']) {
			foreach ($options as $value) {
				delete_option($value['id']);
			}
			header("Location: themes.php?page=functions.php&reset=true");
			die;
		}
	}
	add_theme_page($themename." Opciones", "Opciones de ".$themename."", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
// display theme page
function mytheme_admin() {
	global $themename, $shortname, $options;
	if ($_REQUEST['saved']) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ($_REQUEST['reset']) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<div class="wrap">
	<h2><?php echo $themename; ?> settings</h2>
	<form method="post">
		<?php foreach ($options as $value) {
			switch ($value['type']) {
		case "open": ?>
		<table width="100%" border="0" style="padding:10px;">
			<?php break; case "close": ?>
		</table>
		<br />
		<?php break; case "title": ?>
		<table width="100%" border="0" style="padding:5px 10px;">
			<tr><td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td></tr>
			<?php break; case 'text': ?>
			<tr>
				<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
				<td width="80%">
					<input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if (get_option($value['id']) != "") { echo get_option($value['id']); } else { echo $value['std']; } ?>" />
				</td>
			</tr>
			<tr><td><small><?php echo $value['desc']; ?></small></td></tr>
			<tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<?php break; case 'textarea': ?>
			<tr>
				<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
				<td width="80%">
					<textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if (get_option($value['id']) != "") { echo get_option($value['id']); } else { echo $value['std']; } ?></textarea>
				</td>
			</tr>
			<tr><td><small><?php echo $value['desc']; ?></small></td></tr>
			<tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<?php break; case 'select': ?>
			<tr>
				<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
				<td width="80%">
					<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
						<?php foreach ($value['options'] as $option) { ?>
						<option<?php if (get_option($value['id']) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr><td><small><?php echo $value['desc']; ?></small></td></tr>
			<tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<?php break; case "checkbox": ?>
			<tr>
				<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
				<td width="80%"><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
					<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
				</td>
			</tr>
			<tr><td><small><?php echo $value['desc']; ?></small></td></tr>
			<tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<?php break; }
			} ?>
			<p class="submit">
				<input name="save" type="submit" value="Save changes" />
				<input type="hidden" name="action" value="save" />
			</p>
		</form>
		<form method="post">
			<p class="submit">
				<input name="reset" type="submit" value="Reset" />
				<input type="hidden" name="action" value="reset" />
			</p>
		</form>
		<?php }
		add_action('admin_menu', 'mytheme_add_admin');
		// theme support
		//add_theme_support('automatic-feed-links');
		add_theme_support('html5', array('search-form'));
		add_theme_support( 'post-thumbnails' );
		add_image_size('mini', 75, 75, true);
		// register sidebar
		if (function_exists('register_sidebar')) {
			register_sidebar(array(
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
			));
			register_sidebar( array(
			'name' => 'Barra lateral derechar',
			'id' => 'sidebar-custom',
			'description'   => 'Barra lateral para que pongas lo que te de la gana',
		'class'         => 'clase-1',
			'before_widget' => '<div class="widget widget--wp">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
		}
		// enQueue jQuery
		function all_ajax_enqueue_scripts() {
			if (!is_admin()) {
				wp_deregister_script('jquery');
				wp_register_script('jquery', ('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'), false);
				wp_enqueue_script('jquery');
			}
		}
		add_action('wp_enqueue_scripts', 'all_ajax_enqueue_scripts');
		// Ponme el lightbox2.js en el footer y sólo en los single
		function lightbox_js() {
		if (is_single()) {
				wp_enqueue_script( 'lightbox2', get_template_directory_uri() . '/assets/bower_components/lightbox2/js/lightbox.min.js', true );
			}
		}
		add_action('wp_footer', 'lightbox_js');
		// quita admin bar
		//add_filter('show_admin_bar', '__return_false');
		// wpautop
		remove_filter( 'the_content', 'wpautop' );
		// CPT's
		add_action( 'init', 'create_post_type' );
		function create_post_type() {
			register_post_type( 'cpt', array(
					'labels' => array( 'name' => __( 'Barcos' ), 'singular_name' => __( 'Barco' )),
					'public' => true,
					'has_archive' => true,
					'rewrite' => array( 'slug' => 'barco' ),
					'taxonomies' => array( 'category' ),
					'supports' => array( 'title', 'editor', 'thumbnail' ),
					)
				);
		}
		// http://wordpress.stackexchange.com/questions/6731/if-is-custom-post-type
		function is_post_type($type){
		global $wp_query;
		if($type == get_post_type($wp_query->post->ID)) return true;
		return false;
		}
		// Quitame los metaboxes que me sobran
		function quita_metaboxes_inutiles() {
			remove_meta_box('postexcerpt' , 'page' , 'normal' );
			remove_meta_box('authordiv', 'page', 'normal');
			remove_meta_box('commentsdiv', 'page', 'normal');
			remove_meta_box('commentstatusdiv', 'page', 'normal');
			remove_meta_box('trackbacksdiv', 'page', 'normal');
			remove_meta_box('postexcerpt', 'page', 'normal');
			remove_meta_box('revisionsdiv', 'page', 'normal');
			remove_meta_box('postcustom', 'page', 'normal');
		}
		add_action( 'admin_menu' , 'quita_metaboxes_inutiles' );
		/*
		* Scripts and stylesheets
		*
		* Enqueue stylesheets in the following order:
		* 1. /theme/assets/css/main.css
		*
		* Enqueue scripts in the following order:
		* 1. jquery-1.11.1.min.js via Google CDN
		* 3. /theme/assets/js/scripts.js (in footer)
		*/
		function roots_scripts() {
			$assets = array( 
				'css'       => '/style.css',
				'js'        => '/assets/js/main.min.js',
		'jquery'    => '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js'
		);
		wp_enqueue_style(
			't0theme_css',
			get_template_directory_uri() . $assets['css'],
			false,
			null
		);
		if (!is_admin() && current_theme_supports('jquery-cdn')) {
			wp_deregister_script('jquery');
			wp_register_script(
				'jquery',
				$assets['jquery'],
				array(),
				null,
				false
				
			);
			add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
		}
		wp_enqueue_script('jquery');
		wp_enqueue_script(
				't0theme_js',
				get_template_directory_uri() . $assets['js'],
				array(),
				null,
				true
			);
		}
		add_action('wp_enqueue_scripts', 'roots_scripts', 100);
		// http://wordpress.stackexchange.com/a/12450
		function roots_jquery_local_fallback($src, $handle = null) {
		static $add_jquery_fallback = false;
		if ($add_jquery_fallback) {
		echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/vendor/jquery/dist/jquery.min.js?1.11.1"><\/script>\')</script>' . "\n";
		$add_jquery_fallback = false;
		}
		if ($handle === 'jquery') {
		$add_jquery_fallback = true;
		}
		return $src;
		}
		add_action('wp_head', 'roots_jquery_local_fallback');
		// Allows svg load into media uploader
		http://css-tricks.com/snippets/wordpress/allow-svg-through-wordpress-media-uploader
		function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
		}
		add_filter('upload_mimes', 'cc_mime_types');
		/* No me carges los scripts de cf7, los cargare luego solo para contacto */
		add_filter( 'wpcf7_load_js', '__return_false' );
		add_filter( 'wpcf7_load_css', '__return_false' );
		// not used in this version
		if (!isset( $content_width)) $content_width = 960;
		?>