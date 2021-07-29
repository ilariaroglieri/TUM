 <!doctype html>
	<!--[if !IE]>
	<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 7 ]>
	<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 8 ]>
	<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 9 ]>
	<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
	<!--[if gt IE 9]><!-->
<html> <!--<![endif]-->
	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '—', true, 'left' ); ?></title>

		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
		<link rel="shortcut icon" href="<?php echo home_url( '/favicon.ico' ); ?>">


		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">	

		<!-- <?php wp_enqueue_script("jquery"); ?>	 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

		<?php wp_head(); ?>
	
	</head>

	<body <?php body_class(); ?>>
		<div class="container-fluid">
			<div id="header">
				<div id="logo">
					<h2 class="site-name">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="100%" height="100%" viewBox="0 0 645.21 105" style="enable-background:new 0 0 645.21 103.68;"
								 xml:space="preserve">
							<style type="text/css">
								.st0{fill:#43454A;}
								.st1{fill:none;stroke:#3F89FF;stroke-width:5;stroke-linejoin:round;stroke-miterlimit:10;}
							</style>
							<text class="st0" x="0" y="43px">Festival del</text>
							<text class="st0" x="0" y="103px">Tu</text>
							<text class="st0 el" x="77px" y="103px">rismo</text>

							<path class="st1" d="M278.74,81.84c1.92-9.67,3.85-19.34,7.7-19.34c7.7,0,7.7,38.68,15.4,38.68c7.7,0,7.7-38.68,15.4-38.68
								c7.7,0,7.7,38.68,15.4,38.68c7.7,0,7.7-38.68,15.4-38.68c7.7,0,7.7,38.68,15.4,38.68c7.7,0,7.7-38.68,15.4-38.68
								c7.7,0,7.7,38.68,15.4,38.68c3.85,0,5.78-9.67,7.7-19.34"/>

							<text class="st0" x="405px" y="103px">usicale</text>
							</svg>

						</a>
					</h2>
				</div>

				<button class="menu-toggle d-none">menu
					<span></span>
					<span></span>
					<span></span>
				</button>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
			</div>
