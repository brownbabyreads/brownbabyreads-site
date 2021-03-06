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
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon">

<!-- Mobile Specific Meta  -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">

<?php wp_head(); ?>
<script type="text/javascript" src="http://fast.fonts.net/jsapi/c0a8a970-01e4-4469-b503-c47e8679a75c.js"></script>
</head>
<?php if ( is_front_page() ) { ?>
  <body <?php body_class('home header-style3'); ?>>
<?php } else { ?>
  <body <?php body_class('header-style3'); ?>>
<?php } ?>
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
          <h1>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <?php
                if($_bbr_admin['opt-main-logo']){
                  echo '<img src="'.$_bbr_admin['opt-main-logo']['url'].'" alt="'.get_bloginfo('name').'">';
                }
              ?>
            </a>
          </h1>
        </div>

        <?php
          // if($_bbr_admin['opt-header-button-callout-url'] && $_bbr_admin['opt-header-button-callout-text']){
          //   echo '<a href="'.$_bbr_admin['opt-header-button-callout-url'].'" class="btn btn-primary pull-right push-top hidden-xs hidden-sm">'.$_bbr_admin['opt-header-button-callout-text'].'</a>';
          // }
        ?>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class=" pull-right push-top hidden-xs hidden-sm">
          <input type="hidden" name="cmd" value="_donations">
          <input type="hidden" name="business" value="paypal@brownbabyreads.com">
          <input type="hidden" name="lc" value="US">
          <input type="hidden" name="item_name" value="Brown Baby Reads">
          <input type="hidden" name="no_note" value="0">
          <input type="hidden" name="currency_code" value="USD">
          <input type="hidden" name="bn" value="PP-DonationsBF:btn-donate.svg:NonHostedGuest">
          <input type="submit" name="submit" class="btn btn-success" value="Donate">
          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
          </form>

          <?php
            if (!is_user_logged_in()) {
              wp_nav_menu([
                'theme_location' => 'login_nav',
                'menu_class' => 'hidden-xs hidden-sm',
                'menu_id' => 'utility-menu',
                'container' => false
              ]);
            } else {
              wp_nav_menu([
                'theme_location' => 'profile_nav',
                'menu_class' => 'hidden-xs hidden-sm',
                'menu_id' => 'utility-menu',
                'container' => false
              ]);
            }
          ?>
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
  <!-- Start Hero Slider -->
  <div class="hero-area">
    <?php if ( is_front_page() ) { ?>
      <div class="slider-rev-cont">
        <div class="tp-banner-container">
          <div class="tp-banner">
            <?php while (have_posts() ) : the_post(); ?>
              <ul style="display:none;">
                <?php
                  // check if the repeater field has rows of data
                  if( have_rows('home_page_slideshow') ):
                    // loop through the rows of data
                    while ( have_rows('home_page_slideshow') ) : the_row();
                      $i = 1;
                      $image = get_sub_field('image');
                      $title = get_sub_field('title');
                      $subtitle = get_sub_field('subtitle');
                    ?>
                      <!-- SLIDE  -->
                      <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="">
                        <!-- MAIN IMAGE -->
                        <img src="<?php echo $image['url']; ?>" alt="fullslide1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <div class="tp-caption light_heavy_60 sfb rtt tp-resizeme" data-x="left" data-hoffset="20" data-y="center" data-voffset="0" data-speed="600" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.1" data-endspeed="500" data-endeasing="Power4.easeIn" style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;"><?php echo $title; ?></div>
                        <div class="tp-caption light_medium_30_shadowed sfb rtt tp-resizeme" data-x="left" data-hoffset="20" data-y="center" data-voffset="70" data-speed="600" data-start="900" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.1" data-endspeed="500" data-endeasing="Power4.easeIn" style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;"><?php echo $subtitle; ?></div>
                      </li>
                    <?php
                    $i++;
                    endwhile;
                  endif;
                ?>
              </ul>
            <?php endwhile; // end of the loop. ?>
            <div class="tp-bannertimer" style="display:none;"></div>
          </div>
        </div>
      </div>
    <?php } else if ( is_post_type_archive() ) { ?>
      <div class="page-header parallax">
        <div><div>
          <span> <?php post_type_archive_title(); ?></span>
        </div></div>
      </div>
    <?php } else if ( is_archive()|| is_category() ) { ?>
      <div class="page-header parallax">
        <div><div>
          <span> <?php the_archive_title(); ?></span>
        </div></div>
      </div>
    <?php } else if ( is_single() ) { ?>
      <?php if( have_posts() ): ?>
      <?php while( have_posts() ): the_post(); ?>
        <div class="page-header parallax darken-page-header" style="background-image:url('<?php if ( has_post_thumbnail() ) { ?><?php $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ); echo $image_attributes[0]; ?><?php } ?>')">
          <div><div>
            <span> <?php the_title(); ?></span>
          </div></div>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
    <?php } else { ?>
      <div class="page-header parallax">
        <div><div>
          <span> <?php the_title(); ?></span>
        </div></div>
      </div>
    <?php } ?>
  </div>
  <!-- Breadcrumbs -->
  <?php if (!is_front_page()): ?>
    <?php the_breadcrumb(); ?>
  <?php endif; ?>