<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WTQFHJ');</script>
	<!-- End Google Tag Manager -->

	<?php wp_head(); ?>
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Raleway:300, 400, 500, 700" rel="stylesheet">
	<script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0049/3242.js" async="async"></script>
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTQFHJ"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php do_action('lcoh_bodyopen'); ?>

	<div id="wrapper" class="hfeed">
        <div class="covid-banner" style=""><a href="/covid-19-updates-and-resources/">COVID-19 Related Information</a> </div>
		<header id="header" role="banner" class="container-fluid">
			<div id="logo">
				<a href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/images/lcoh-logo.svg" alt="Lindner Center of HOPE Logo"/></a>
			</div>

			<!-- Desktop Menu -->
			<div class="pull-right hidden-md hidden-xs hidden-sm" id="desktop-menu">
				<div class="row">
					<div class="col-sm-8">
						<!-- Utility Menu -->
						<?php wp_nav_menu(array('theme_location'=>'utility-menu', 'depth'=>1,'container_id'=>'utilitylinks','menu_class'=>'nav nav-justified')); ?>
					</div>
					<div class="col-sm-4">
						<div class="pull-right">
							<!-- Phone Number -->
							<a href="tel:<?php echo lcoh_get_phone(true); ?>" class="phonelink mainphonelink"><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo lcoh_get_phone(false); ?></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<!-- Key Menu -->
						<?php wp_nav_menu(array('theme_location'=>'main-menu', 'depth'=>1, 'container_id'=>'mainlinks')); ?>
					</div>
				</div>
			</div>

			<!-- Mobile Menu -->
			<div class="pull-right mobile-menu hidden-lg" id="mobile-menu">

				<a href="tel:<?php echo lcoh_get_phone(true); ?>" class="phonelink mainphonelink"><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo lcoh_get_phone(false); ?></a>

				<a id="btn-menu" class="btn btn-menu" alt="Open Menu"><i class="fa fa-bars" aria-hidden="true"></i></a>
				<div id="mobile-nav">
					<?php wp_nav_menu(array('theme_location'=>'main-menu', 'depth'=>1,'container'=>'','menu_class'=>'main','link_after'=>'<i class="pull-right fa fa-chevron-circle-right" aria-hidden="true"></i>')); ?>
					<?php wp_nav_menu(array('theme_location'=>'utility-menu', 'depth'=>1,'container'=>'','menu_class'=>'utility','link_after'=>'<i class="pull-right fa fa-chevron-circle-right" aria-hidden="true"></i>')); ?>
				</div>
			</div>
			<!-- TO DO -->

		</header>

		<div id="wrapper">
