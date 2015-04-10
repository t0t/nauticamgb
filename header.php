<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
		<!--iOS -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php // load required scripts
		wp_head();
		// load theme options
		global $options;
		foreach ($options as $value) {
			if (get_option($value['id']) === FALSE) {
				$$value['id'] = $value['std'];
			} else {
				$$value['id'] = get_option($value['id']);
			}
		} ?>
	</head>
	
	<body>
		<div class="page-header">
			<header>
				<div class="brand">
					<a href="#">
						<svg class="brand__logo" xmlns="http://www.w3.org/2000/svg" width="100px" height="50px" viewBox="0 0 680 210" version="1.1">
							<path class="agua" d="M126.995117 192 C126.995117 192 151.2 178.1 179.2 164.6 C207.097656 151.2 230.7 142.7 283.4 146.1 C336.058594 149.5 397.7 160.6 437.4 169.7 C477.129883 178.8 509.1 183.1 544.5 180.8 C579.982422 178.4 639.6 171.2 653.9 167.9 C668.263672 164.6 679.7 161.7 679.7 161.7 C679.667969 161.7 636.8 190.1 595.5 201 C554.197266 212 521 211.3 483.2 206.2 C445.364258 201 373.2 183.7 343.9 180.6 C314.604492 177.6 250 165.8 215.9 170.6 C181.703125 175.4 127 192 127 192 Z"/>
							<path class="barco" d="M206.207031 36.5 C206.207031 36.5 246 3.5 273.7 1.4 C301.354492 -0.7 320.1 1.9 349.4 21.6 C378.644531 41.4 410.8 65.2 445.5 99.2 C500.435547 154.3 524.2 169.3 524.2 169.3 C524.205078 169.3 496.9 170 439 158.3 C381.133789 146.7 339.3 139.3 305 136.2 C270.729492 133.2 201.4 134.3 178.9 134.3 C156.396484 134.3 111.9 131.7 83.1 120.5 C54.3544922 109.4 32.4 92 21.6 78.9 C10.7373047 65.9 1.9 45.9 0.2 28.4 C17.28125 44.4 34 64.9 66.9 76.7 C99.8300781 88.4 132.7 94.1 177.2 94.1 C221.609375 94.1 306.7 101.9 324.3 105.4 C341.951172 108.8 394.7 117.6 409.5 122.9 C390.492188 108.3 387 105.9 366.1 82.7 C345.244141 59.6 329 38.6 309.1 26.7 C289.181641 14.8 276.5 17.1 261.6 20 C246.782227 22.9 206.2 36.5 206.2 36.5 Z"/>
						</svg>
					</a>
					<h1 class="brand__name">Náutica MGB</h1>
				</div>
			</header>
			
			<div class="team">
				<h2 class="btn team__title">Quienes Somos</h2>
				<h3 class="team__description">Lorem ipsum dolor sit ameonsectetur adipiimpe offis porro reprehenderit quaerat.</h3>
				<div class="team__list">
					<figure class="team__figure">
						<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/98095/logo.svg" alt="">
						<figcaption class="team__caption">Gerentde</figcaption>
					</figure>
					<figure class="team__figure">
						<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/98095/logo.svg" alt="">
						<figcaption class="team__caption">Management</figcaption>
					</figure>
					<figure class="team__figure">
						<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/98095/logo.svg" alt="">
						<figcaption class="team__caption">Tecnico</figcaption>
					</figure>
				</div>
			</div>
			
			<ul>
				<?php if (get_option('show_on_front') == 'posts') { ?>

				<li class="home"><a href="/">Home</a></li>

				<?php } // list categories and pages
				if ($lab_nav_choice == "Categories") {
					wp_list_categories("title_li=");
				} else {
					wp_list_pages("title_li=&depth=1"); 
				} ?>

			</ul>
		</div>
		<?php //echo do_shortcode('[gtranslate]'); ?>