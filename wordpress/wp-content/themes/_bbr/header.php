<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package brownbabyreads
 */
?><!DOCTYPE HTML>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- Mobile Specific Meta  -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">

<?php wp_head(); ?>
</head>
<body <?php body_class('home header-style3'); ?>>
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
	<div class="topbar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6  col-sm-6">
                	<p><?php bloginfo( 'description' ); ?></p>
                </div>
                <div class="col-md-6 col-sm-6">
                	<ul class="pull-right social-icons-colored">
                    	<li class="facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                    	<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    	<li class="instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                    	<li class="flickr"><a href="#"><i class="fa fa-flickr"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
	<!-- Start Site Header -->
	<div class="site-header-wrapper">
        <header class="site-header">
            <div class="container sp-cont">
                <div class="site-logo">
                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="images/logow.png" alt="<?php bloginfo( 'name' ); ?>"></a></h1>
                </div>
                <a href="#" class="btn btn-primary pull-right push-top hidden-xs hidden-sm">Support your history</a>
                <a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
            </div>
        </header>
        <!-- End Site Header -->
        <!-- Nav Bar -->
        <div class="main-navbar">
        	<div class="container">
                <!-- Main Navigation -->
                <nav class="main-navigation dd-menu toggle-menu" role="navigation">
					<?php
						wp_nav_menu([
							'theme_location' => 'primary',
							'menu_id' => 'primary-menu',
							'container' => false,
							'menu_class' => 'sf-menu',
							'fallback_cb' => 'wp_page_menu',
							//Process nav menu using our custom nav walker
							'walker' => new wp_bootstrap_navwalker()
						]);
					?>
                </nav>
           	</div>
        </div>
   	</div>