<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package brownbabyreads
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function _bbr_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', '_bbr_body_classes' );

// Hide default WP roles
if (!current_user_can('administrator')) {
	function exclude_role($roles) {
		//Hide Defualt Roles
		if (isset($roles['author'])) {
			unset($roles['author']);
		}
		if (isset($roles['editor'])) {
			unset($roles['editor']);
		}
		if (isset($roles['subscriber'])) {
			unset($roles['subscriber']);
		}
		if (isset($roles['contributor'])) {
			unset($roles['contributor']);
		}
		return $roles;
	}
	add_filter('editable_roles', 'exclude_role');
}

// Add IE stylesheet
add_action( 'wp_enqueue_scripts', 'enqueue_my_styles' );
function enqueue_my_styles() {
    global $wp_styles;
    /**
     * Load our IE specific stylesheet for a range of older versions:
     * <!--[if lt IE 9]> ... <![endif]-->
     * <!--[if lte IE 8]> ... <![endif]-->
     * NOTE: You can use the 'less than' or the 'less than or equal to' syntax here interchangeably.
     */
    wp_enqueue_style('my-theme-old-ie', get_stylesheet_directory_uri() . "/css/ie.css", array( 'my-theme' )  );
    $wp_styles->add_data('my-theme-old-ie', 'conditional', 'lt IE 9' );
}

// Remove WP meta nonsense
remove_action( 'wp_head', 'wp_generator' ) ;
remove_action( 'wp_head', 'wlwmanifest_link' ) ;
remove_action( 'wp_head', 'rsd_link' ) ;
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );

//  Disable HTML in WordPress comments
add_filter( 'pre_comment_content', 'esc_html' );

//  Disable WordPress Login Hints
function no_wordpress_errors(){
  return 'Nice try.';
}
add_filter( 'login_errors', 'no_wordpress_errors' );

// Stop WordPress from Guessing URLs
add_filter('redirect_canonical', 'stop_guessing');
function stop_guessing($url) {
	if (is_404()) {
		return false;
	}
	return $url;
}

// Remove Admin bar
add_filter('show_admin_bar', '__return_false');

// Stay logged in longer
add_filter( 'auth_cookie_expiration', 'stay_logged_in_for_1_year' );
function stay_logged_in_for_1_year( $expire ) {
	return 31556926; // 1 year in seconds
}

// Remove the WordPress Emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );

// Custom post types
// function custom_dog() {
//   $labels = array(
//     'name'               => _x( 'Products', 'post type general name' ),
//     'singular_name'      => _x( 'Product', 'post type singular name' ),
//     'add_new'            => _x( 'Add New', 'book' ),
//     'add_new_item'       => __( 'Add New Product' ),
//     'edit_item'          => __( 'Edit Product' ),
//     'new_item'           => __( 'New Product' ),
//     'all_items'          => __( 'All Products' ),
//     'view_item'          => __( 'View Product' ),
//     'search_items'       => __( 'Search Products' ),
//     'not_found'          => __( 'No products found' ),
//     'not_found_in_trash' => __( 'No products found in the Trash' ), 
//     'parent_item_colon'  => '',
//     'menu_name'          => 'Products'
//   );
//   $args = array(
//     'labels'        => $labels,
//     'description'   => 'Holds our products and product specific data',
//     'public'        => true,
//     'menu_position' => 5,
//     'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
//     'has_archive'   => true,
//   );
//   register_post_type( 'product', $args ); 
// }
// add_action( 'init', 'custom_dog' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function _bbr_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', '_bbr' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', '_bbr_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function _bbr_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', '_bbr_render_title' );
endif;
