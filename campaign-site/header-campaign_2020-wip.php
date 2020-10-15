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
	<?php
	//  Remove the bouncy chat
	remove_action('wp_head','lcoh_chat');
	?>
	<?php wp_head(); ?>
	<script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0049/3242.js" async="async"></script>
	<!-- Load Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i|Raleway:400,400i,700,700i" rel="stylesheet">


</head>

<body <?php body_class('campaign_2020'); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTQFHJ"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php do_action('lcoh_bodyopen'); ?>

	<div id="wrapper" class="hfeed">
		<header id="header" role="banner" class="container-fluid">

            <?php
            $postID = get_the_ID();
            if($postID == 33014 ) : ?>
            <div class="landing-pre-header">
                <div class="container">
                    <div class="col-sm-12" style="padding-left: 0">
                <h1>Lindner Center of HOPE <br> <span>is Changing the Trajectory</span> <br/> <span>of Mental Healthcare</span></h1>
                    </div>
                </div>
            </div>
            <?php else : ?>
            <div class="campaign-banner">
               <div class="container-fluid" style="padding: 0; margin: 0" >
                   <div class="row">
                       <div class="col-xs-5 left-banner" style="padding: 0; margin: 0">

                       </div>

                       <div class="col-xs-7 right-banner"  style="padding: 0; margin: 0">

                       </div>
                   </div>

               </div>
            </div>
            <? endif; ?>

                <div class="campaign-menu-bar">

                    <div class="adj-mobile">
                        <div class="row" style="margin: 0">
                            <div class="col-xs-8 col-md-4">
                        <div id="brand-logo">
                            <a href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/images/campaign-2020/uc-lindner.png" alt="Lindner Center of HOPE Logo"/></a>
                        </div>
                            </div>
                            <div class="col-xs-4 col-md-8" style="padding-left: 0">
                        <!-- Desktop Menu -->
                        <div class="hidden-xs hidden-sm" id="desktop-menu">
                                    <!-- Key Menu -->
                                    <!--						--><?php //wp_nav_menu(array('theme_location'=>'campaign-menu', 'depth'=>1, 'container_id'=>'mainlinks')); ?>
                                    <?php wp_nav_menu(array('theme_location'=>'campaign-2020', 'depth'=>1, 'container_id'=>'mainlinks')); ?>
                        </div>

                        <!-- Mobile Menu -->
                                <div class="pull-right mobile-menu hidden-md hidden-lg" id="mobile-menu">

                                    <a id="btn-menu" class="btn btn-menu" alt="Open Menu"><i class="fa fa-bars" aria-hidden="true"></i></a>

                                </div>
                            </div>
                            <div id="mobile-nav">
                                <!--					--><?php //wp_nav_menu(array('theme_location'=>'campaign-menu', 'depth'=>1,'container'=>'','menu_class'=>'main','link_after'=>'<i class="pull-right fa fa-chevron-circle-right" aria-hidden="true"></i>')); ?>
                                <?php wp_nav_menu(array('theme_location'=>'campaign-2020', 'depth'=>1,'container'=>'','menu_class'=>'main','link_after'=>'<i class="pull-right fa fa-chevron-circle-right" aria-hidden="true"></i>')); ?>
                            </div>
                        </div>
                    </div>
                </div>


		</header>

		<div id="wrapper">
