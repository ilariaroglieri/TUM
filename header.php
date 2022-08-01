 <?php
	// session_start();
 	if (!(is_single())) {
	
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

} else {
	if (has_term( 'panel', 'event-category') || is_tax('panel')) {
    $color = 'blue';
  } else if (has_term( 'workshop', 'event-category') || is_tax('workshop') ) {
    $color = 'red';
  } else if (has_term( 'tour', 'event-category') || is_tax('tour')) {
    $color = 'yellow';
  } else if (has_term( 'film', 'event-category') || is_tax('film')) {
    $color = 'green';
  } 
}
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

		<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/assets/favicon-<?php echo $color; ?>.png">


		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">	

		<!-- <?php wp_enqueue_script("jquery"); ?>	 -->

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js"></script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-210407984-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-210407984-1');
		</script>

		<?php wp_head(); ?>
	
	</head>

	<body <?php body_class(); ?> data-color="<?php echo $color; ?>">
		<div class="container-fluid">
			<div id="header">
				<div id="logo">
					<h2 class="site-name">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="100%" height="100%" viewBox="0 0 645.21 105" style="enable-background:new 0 0 645.21 103.68;"
								 xml:space="preserve">
								<defs>
									<rect x="275" y="55" id="mask" width="125" height="50"/>
									<clipPath id="clipPath"><use xlink:href="#mask" overflow="visible"/></clipPath>
								</defs>
								<style type="text/css">
									#mask{fill:none;stroke:none; stroke-width:2px;}
									.st0{fill:#43454A;stroke:none;}
									.svg-shape{fill:none;stroke-width:5;stroke-linecap:square;stroke-miterlimit:10;}
								</style>
								<text class="st0 text" x="0" y="43px">Festival del</text>
								<g class="mini-logo">
									<text class="st0" x="0" y="103px">Tu</text>
								</g>
								<text class="st0 text" x="77px" y="103px">rismo</text>

								<g class="svg-shapes">

								<!-- grey line -->
								<g class="svg-shape-g" clip-path="url(#clipPath)">
									<path id="line" class="svg-shape first line" d="M520.5 81.6 515.6 81.6 510.8 81.6 506 81.6 501.2 81.6 496.3 81.6 491.5 81.6 486.7 81.6 481.8 81.6 477 81.6 472.2 81.6 467.3 81.6 462.5 81.6 457.7 81.6 452.8 81.6 448 81.6 443.2 81.6 438.3 81.6 433.5 81.6 428.7 81.6 423.8 81.6 419 81.6 414.2 81.6 409.3 81.6 404.5 81.6 399.7 81.6 394.8 81.6 390 81.6 385.2 81.6 380.4 81.6 375.5 81.6 370.7 81.6 365.9 81.6 361 81.6 356.2 81.6 351.4 81.6 346.5 81.6 341.7 81.6 336.9 81.6 332 81.6 327.2 81.6 322.4 81.6 317.5 81.6 312.7 81.6 307.9 81.6 303 81.6 298.2 81.6 293.3 81.6 288.5 81.6 283.6 81.6 278.7 81.6" />
									<path id="secondLine" class="svg-shape line" d="M762.2,81.6 757.4,81.6 752.6,81.6 747.7,81.6 742.9,81.6 738.1,81.6 733.2,81.6 728.4,81.6 
	723.6,81.6 718.7,81.6 713.9,81.6 709.1,81.6 704.2,81.6 699.4,81.6 694.6,81.6 689.7,81.6 684.9,81.6 680.1,81.6 675.2,81.6 
	670.4,81.6 665.6,81.6 660.7,81.6 655.9,81.6 651.1,81.6 646.3,81.6 641.4,81.6 636.6,81.6 631.8,81.6 626.9,81.6 622.1,81.6 
	617.3,81.6 612.4,81.6 607.6,81.6 602.8,81.6 597.9,81.6 593.1,81.6 588.3,81.6 583.4,81.6 578.6,81.6 573.8,81.6 568.9,81.6 
	564.1,81.6 559.3,81.6 554.4,81.6 549.6,81.6 544.8,81.6 539.9,81.6 535.1,81.6 530.2,81.6 525.3,81.6 520.5,81.6" />
								</g>

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
