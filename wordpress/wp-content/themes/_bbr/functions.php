<?php
/**
 * brownbabyreads functions and definitions
 *
 * @package brownbabyreads
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

// Register Custom Navigation Walker
require_once('inc/wp_bootstrap_navwalker.php');
require_once (dirname(__FILE__) . '/admin-config.php');

if ( ! function_exists( '_bbr_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _bbr_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on brownbabyreads, use a find and replace
	 * to change '_bbr' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_bbr', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus([
		'primary' => __( 'Primary Menu', '_bbr' ),
		'footer_resources' => __( 'Footer Resources', '_bbr' ),
    'footer_participate' => __( 'Footer Participate', '_bbr' ),
    'footer_contact' => __( 'Footer Contact', '_bbr' ),

	]);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside', 'image', 'video', 'quote', 'link',
	// ) );
}
endif; // _bbr_setup
add_action( 'after_setup_theme', '_bbr_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function _bbr_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_bbr' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', '_bbr_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _bbr_scripts() {
	// wp_enqueue_style( '_bbr-style', get_stylesheet_uri() );
	wp_enqueue_style( '_bbr-opensans-2', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');
	wp_enqueue_style( '_bbr-opensans-3', '//fonts.googleapis.com/css?family=Raleway:100,200,300,700,800,900');
	wp_enqueue_style( '_bbr-bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( '_bbr-bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.css');
	wp_enqueue_style( '_bbr-style', get_template_directory_uri() . '/css/style.css');
	wp_enqueue_style( '_bbr-prettyphoto', get_template_directory_uri() . '/vendor/prettyphoto/css/prettyPhoto.css');
	wp_enqueue_style( '_bbr-owl-carousel', get_template_directory_uri() . '/vendor/owl-carousel/css/owl.carousel.css');
	wp_enqueue_style( '_bbr-owl-theme', get_template_directory_uri() . '/vendor/owl-carousel/css/owl.theme.css');
	wp_enqueue_style( '_bbr-custom', get_template_directory_uri() . '/css/custom.css');
	wp_enqueue_style( '_bbr-extralayers', get_template_directory_uri() . '/css/extralayers.css');
	wp_enqueue_style( '_bbr-revslider', get_template_directory_uri() . '/vendor/revslider/css/settings.css');
	wp_enqueue_style( '_bbr-colorstylesheet', get_template_directory_uri() . '/css/colors/color1.css');

	wp_enqueue_script( '_bbr-jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', array(), '2.1.3', true );
	wp_enqueue_script( '_bbr-prettyphoto', get_template_directory_uri() . '/vendor/prettyphoto/js/prettyphoto.js', array(), '', true );
	wp_enqueue_script( '_bbr-ui-plugins', get_template_directory_uri() . '/js/ui-plugins.js', array(), '', true );
	wp_enqueue_script( '_bbr-helper-plugins', get_template_directory_uri() . '/js/helper-plugins.js', array(), '', true );
	wp_enqueue_script( '_bbr-owl-carousel', get_template_directory_uri() . '/vendor/owl-carousel/js/owl.carousel.min.js', array(), '', true );
	wp_enqueue_script( '_bbr-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '', true );
	wp_enqueue_script( '_bbr-init', get_template_directory_uri() . '/js/init.js', array(), '', true );
	wp_enqueue_script( '_bbr-flexslider', get_template_directory_uri() . '/vendor/flexslider/js/jquery.flexslider.js', array(), '', true );
	wp_enqueue_script( '_bbr-themepunch-tools', get_template_directory_uri() . '/vendor/revslider/js/jquery.themepunch.tools.min.js', array(), '', true );
	wp_enqueue_script( '_bbr-themepunch-revolution', get_template_directory_uri() . '/vendor/revslider/js/jquery.themepunch.revolution.min.js', array(), '', true );

	// wp_enqueue_script( '_bbr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( '_bbr-modernizr', get_template_directory_uri() . '/js/modernizr.js', array());
	wp_enqueue_script( '_bbr-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_bbr_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';