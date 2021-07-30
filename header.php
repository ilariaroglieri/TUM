 <?php
	// session_start();
	
	$colors = [
		"blue", 
		"green", 
		"red",
		"yellow"
	];

	$colorsBg = [
		"blue-bg", 
		"green-bg", 
		"red-bg",
		"yellow-bg"
	];

	if (!isset($_SESSION["color"]) && !isset($_SESSION["color-bg"])) {
		$i = array_rand($colors);
		$_SESSION["color"] = $colors[$i];
		$_SESSION["color-bg"] = $colorsBg[$i];
	}


	$color = $_SESSION["color"];
	$colorBg = $_SESSION["color-bg"];
?>

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

	<body <?php body_class("$color $colorBg"); ?>>
		<div class="container-fluid">
			<div id="header">
				<div id="logo">
					<h2 class="site-name">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="100%" height="100%" viewBox="0 0 645.21 105" style="enable-background:new 0 0 645.21 103.68;"
								 xml:space="preserve">
							<style type="text/css">
								.st0{fill:#43454A;stroke:none;}
								.svg-shape{fill:none;stroke-width:5;stroke-linecap:square;stroke-miterlimit:10;}
							</style>
							<text class="st0 text" x="0" y="43px">Festival del</text>
							<text class="st0 mini-logo" x="0" y="103px">Tu</text>
							<text class="st0 text" x="77px" y="103px">rismo</text>

							<g class="svg-shape-g">
								<path class="svg-shape blue" d="M278.74,81.84c1.92-9.67,3.85-19.34,7.7-19.34c7.7,0,7.7,38.68,15.4,38.68c7.7,0,7.7-38.68,15.4-38.68
									c7.7,0,7.7,38.68,15.4,38.68c7.7,0,7.7-38.68,15.4-38.68c7.7,0,7.7,38.68,15.4,38.68c7.7,0,7.7-38.68,15.4-38.68
									c7.7,0,7.7,38.68,15.4,38.68c3.85,0,5.78-9.67,7.7-19.34"/>
							</g>

							<g class="svg-shape-g"><polyline class="svg-shape green" points="400.19,81.84 390.52,81.84 390.52,91.51 380.85,91.51 380.85,101.18 371.18,101.18 371.18,62.5 361.51,62.5 361.51,72.17 351.84,72.17 351.84,81.84 342.17,81.84 342.17,91.51 332.5,91.51 332.5,101.18 322.83,101.18 322.83,62.5 313.16,62.5 313.16,72.17 303.49,72.17 303.49,81.84 293.82,81.84 293.82,91.51 284.15,91.51 284.15,101.18 274.48,101.18 "/></g>

							<g class="svg-shape-g"><path class="svg-shape red" d="M400.19,62.5c-14.8,0-31.94,38.68-16.62,38.68c15.32,0,0-38.68-14.8-38.68c-14.8,0-31.94,38.68-16.62,38.68 c15.32,0,0-38.68-14.81-38.68c-14.8,0-31.94,38.68-16.62,38.68c15.32,0,0-38.68-14.81-38.68c-7.4,0-15.39,9.67-19.61,19.34 	 M286.3,81.84c-4.22,9.67-4.67,19.34,2.99,19.34c15.32,0,0-38.68-14.8-38.68"/></g>

	 						<g class="svg-shape-g"><polyline class="svg-shape yellow" points="400.19,81.36 395.08,101.18 387.52,101.18 379.97,101.18 369.98,62.5 362.43,62.5 354.87,62.5 344.89,101.18 337.34,101.18 329.78,101.18 319.8,62.5 312.24,62.5 304.69,62.5 294.71,101.18 287.15,101.18 279.6,101.18 274.48,81.36 "/></g>

							<text class="st0 text" x="405px" y="103px">usicale</text>
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
