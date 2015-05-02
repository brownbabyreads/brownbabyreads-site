<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package brownbabyreads
 */

global $_bbr_admin;

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
                    	<?php
							if($top_networks = $_bbr_admin['opt-topnav-social-icons']){
								if ( in_array("twitter", $top_networks) && !empty($_bbr_admin['topnav-twitter-url']) ) {
                    				echo '<li class="twitter"><a href="'.$_bbr_admin['topnav-twitter-url'].'" title="Twitter"><i class="fa fa-twitter"></i></a></li>';
								}
								if ( in_array("facebook", $top_networks) && !empty($_bbr_admin['topnav-facebook-url']) ) {
                    				echo '<li class="facebook"><a href="'.$_bbr_admin['topnav-facebook-url'].'" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>';
								}
								if ( in_array("instagram", $top_networks) && !empty($_bbr_admin['topnav-instagram-url']) ) {
                    				echo '<li class="instagram"><a href="'.$_bbr_admin['topnav-instagram-url'].'" title="Instagram"><i class="fa fa-instagram"></i></a></li>';
								}
								if ( in_array("flickr", $top_networks) && !empty($_bbr_admin['topnav-flickr-url']) ) {
                    				echo '<li class="flickr"><a href="'.$_bbr_admin['topnav-flickr-url'].'" title="Flickr"><i class="fa fa-flickr"></i></a></li>';
								}
							}
                    	?>
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