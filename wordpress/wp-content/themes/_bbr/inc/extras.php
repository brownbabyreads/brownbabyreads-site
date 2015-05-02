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

// Breadcrumbs
function the_breadcrumb() {
  
  // Settings
  $separator  = '&gt;';
  $id     = 'breadcrumbs';
  $class    = 'breadcrumbs';
  $home_title = 'Homepage';
  
    // Get the query & post information
  global $post,$wp_query;
  $category = get_the_category();
  
  // Build the breadcrums
    echo '<ul id="' . $id . '" class="' . $class . '">';
  
  // Do not display on the homepage
    if ( !is_front_page() ) {
    
    // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
    
        if ( is_single() ) {
      
      // Single post (Only display the first category)
      echo '<li class="item-cat item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><a class="bread-cat bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '" href="' . get_category_link($category[0]->term_id ) . '" title="' . $category[0]->cat_name . '">' . $category[0]->cat_name . '</a></li>';
      echo '<li class="separator separator-' . $category[0]->term_id . '"> ' . $separator . ' </li>';
      echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
      
        } else if ( is_category() ) {
      
      // Category page
      echo '<li class="item-current item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><strong class="bread-current bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '">' . $category[0]->cat_name . '</strong></li>';
      
        } else if ( is_page() ) {
      
      // Standard page
            if( $post->post_parent ){
        
        // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
        
        // Get parents in the right order
        $anc = array_reverse($anc);
        
        // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
          $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
        
        // Display parent pages
                echo $parents;
        
        // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
        
            } else {
        
        // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
        
            }
      
        } else if ( is_tag() ) {
      
      // Tag page
      
      // Get tag information
      $term_id = get_query_var('tag_id');
      $taxonomy = 'post_tag';
      $args ='include=' . $term_id;
      $terms = get_terms( $taxonomy, $args );
      
      // Display the tag name
      echo '<li class="item-current item-tag-' . $terms[0]->term_id . ' item-tag-' . $terms[0]->slug . '"><strong class="bread-current bread-tag-' . $terms[0]->term_id . ' bread-tag-' . $terms[0]->slug . '">' . $terms[0]->name . '</strong></li>';
    
    } elseif ( is_day() ) {
      
      // Day archive
      
      // Year link
      echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
      echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
      
      // Month link
      echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
      echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
      
      // Day display
      echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
      
    } else if ( is_month() ) {
      
      // Month Archive
      
      // Year link
      echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
      echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
      
      // Month display
      echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
      
    } else if ( is_year() ) {
      
      // Display year archive
      echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
      
    } else if ( is_author() ) {
      
      // Auhor archive
      
      // Get the author information
      global $author;
            $userdata = get_userdata( $author );
      
      // Display author name
      echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
    
    } else if ( get_query_var('paged') ) {
      
      // Paginated archives
      echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
      
    } else if ( is_search() ) {
    
      // Search results page
      echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
    
    } elseif ( is_404() ) {
      
      // 404 page
      echo '<li>' . 'Error 404' . '</li>';
    }
    
    }
    
    echo '</ul>';
  
}

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
