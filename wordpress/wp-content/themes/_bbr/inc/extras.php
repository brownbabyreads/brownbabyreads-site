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

// Redirect to home after logout
add_action('wp_logout',create_function('','wp_redirect(home_url());exit();'));

// Allow SVG upload
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_action( 'user_register', 'contstant_contact_signup', 10, 1 );

// Reduce lengeth of excerpt
function custom_excerpt_length( $length ) {
  return 18;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Custom excerpt more [...]
function custom_excerpt_more( $more ) {
  return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

function contstant_contact_signup( $user_id ) {
  if ( isset( $_POST['email'] ) ) {
    // POST to Constant Contact
  }
}

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

// Custom thumbnail
add_image_size( 'home-info-featured', 600, 400, true );

// PayPal Button
// Add Shortcode
function paypal_donation() {
  // Code
  return '<div class="spacer-10"></div><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
  <input type="hidden" name="cmd" value="_donations">
  <input type="hidden" name="business" value="paypal@brownbabyreads.com">
  <input type="hidden" name="lc" value="US">
  <input type="hidden" name="item_name" value="Brown Baby Reads">
  <input type="hidden" name="no_note" value="0">
  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="bn" value="PP-DonationsBF:btn-donate.svg:NonHostedGuest">
  <input type="submit" name="submit" class="btn btn-success" value="Donate">
  <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
  </form><div class="spacer-20"></div>
  ';
}
add_shortcode( 'paypal_donation_btn', 'paypal_donation' );

// Post Thumbs
add_theme_support( 'post-thumbnails' );

// Pagination
function custom_pagination($pages = '', $range = 1){
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo '<ul class="pagination">';
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'><i class='fa fa-chevron-left'></i></a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'><i class='fa fa-angle-double-left'></i></a></li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
              echo ($paged == $i)? "<li class='active'><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'><i class='fa fa-chevron-right'></i></a></li>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'><i class='fa fa-angle-double-right'></i></a></li>";
         echo "</ul>\n";
     }
}

// Breadcrumbs
function the_breadcrumb() {

  // Settings
  $separator  = '';
  $id = 'breadcrumbs';
  $class = 'breadcrumb';
  $home_title = 'Home';

    // Get the query & post information
  global $post,$wp_query;
  $category = get_the_category();

  // Build the breadcrums
  echo '<div class="notice-bar"><div class="container"><ol id="' . $id . '" class="' . $class . '">';

  // Do not display on the homepage
  if ( !is_front_page() ) {

    // Home page
    echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';

    if ( is_single() ) {

      // Single post (Only display the first category)
      echo '<li class="item-cat item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><a class="bread-cat bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '" href="' . get_category_link($category[0]->term_id ) . '" title="' . $category[0]->cat_name . '">' . $category[0]->cat_name . '</a></li>';
      echo '<li class="item-current active item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

    } else if ( is_category() ) {

    // Category page
    echo '<li class="item-current active item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><strong class="bread-current bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '">' . $category[0]->cat_name . '</strong></li>';

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
      }

      // Display parent pages
      echo $parents;

      // Current page
      echo '<li class="item-current active item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

     } else {

      // Just display current page if not parents
              echo '<li class="item-current active item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

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

    // Month link
    echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';

    // Day display
    echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

  } else if ( is_month() ) {

    // Month Archive

    // Year link
    echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

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

  echo '</ol></div></div>';
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

// Register Custom Post Type
function custom_books() {

    $labels = array(
        'name'                => 'Books',
        'singular_name'       => 'Book',
        'menu_name'           => 'Books',
        'name_admin_bar'      => 'Book',
        'parent_item_colon'   => 'Parent Book:',
        'all_items'           => 'All Books',
        'add_new_item'        => 'Add New Book',
        'add_new'             => 'Add New',
        'new_item'            => 'New Book',
        'edit_item'           => 'Edit Book',
        'update_item'         => 'Update Book',
        'view_item'           => 'View Book',
        'search_items'        => 'Search Book',
        'not_found'           => 'Not found',
        'not_found_in_trash'  => 'Not found in Trash',
    );
    $args = array(
        'label'               => 'custom_book',
        'description'         => 'A book',
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'revisions', 'thumbnail', ),
        'taxonomies'          => array( 'authors', 'keywords', 'links', 'types' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 15,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'rewrite' => array(
          'slug' => 'books'
        ),
    );
    register_post_type( 'custom_book', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_books', 0 );

// Register Custom Taxonomy
function book_authors() {

    $labels = array(
        'name'                       => _x( 'Authors', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Author', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Authors', 'text_domain' ),
        'all_items'                  => __( 'All Authors', 'text_domain' ),
        'parent_item'                => __( 'Parent Author', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Author:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Author', 'text_domain' ),
        'add_new_item'               => __( 'Add New Author', 'text_domain' ),
        'edit_item'                  => __( 'Edit Author', 'text_domain' ),
        'update_item'                => __( 'Update Author', 'text_domain' ),
        'view_item'                  => __( 'View Authors', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Authors', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Authors', 'text_domain' ),
        'search_items'               => __( 'Search Authors', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy('authors', array( 'custom_book' ), $args);
    register_taxonomy_for_object_type('authors', 'custom_book');
}

// Hook into the 'init' action
add_action( 'init', 'book_authors', 0 );

// Register Custom Taxonomy
function book_keywords() {

    $labels = array(
        'name'                       => _x( 'Keywords', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Keyword', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Keywords', 'text_domain' ),
        'all_items'                  => __( 'All Keywords', 'text_domain' ),
        'parent_item'                => __( 'Parent Keyword', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Keyword:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Keyword', 'text_domain' ),
        'add_new_item'               => __( 'Add New Keyword', 'text_domain' ),
        'edit_item'                  => __( 'Edit Keyword', 'text_domain' ),
        'update_item'                => __( 'Update Keyword', 'text_domain' ),
        'view_item'                  => __( 'View Keywords', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Keywords', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Keywords', 'text_domain' ),
        'search_items'               => __( 'Search Keywords', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'keywords', array( 'custom_book' ), $args );
    register_taxonomy_for_object_type('keywords', 'custom_book');
}

// Hook into the 'init' action
add_action( 'init', 'book_keywords', 0 );


// Register Custom Taxonomy
function book_links() {

    $labels = array(
        'name'                       => _x( 'Links', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Link', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Links', 'text_domain' ),
        'all_items'                  => __( 'All Links', 'text_domain' ),
        'parent_item'                => __( 'Parent Link', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Link:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Link', 'text_domain' ),
        'add_new_item'               => __( 'Add New Link', 'text_domain' ),
        'edit_item'                  => __( 'Edit Link', 'text_domain' ),
        'update_item'                => __( 'Update Link', 'text_domain' ),
        'view_item'                  => __( 'View Links', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Links', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Links', 'text_domain' ),
        'search_items'               => __( 'Search Links', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'links', array( 'custom_book' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'book_links', 0 );


// Register Custom Taxonomy
function book_types() {

    $labels = array(
        'name'                       => _x( 'Types', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Types', 'text_domain' ),
        'all_items'                  => __( 'All Types', 'text_domain' ),
        'parent_item'                => __( 'Parent Type', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Type:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Type', 'text_domain' ),
        'add_new_item'               => __( 'Add New Type', 'text_domain' ),
        'edit_item'                  => __( 'Edit Type', 'text_domain' ),
        'update_item'                => __( 'Update Type', 'text_domain' ),
        'view_item'                  => __( 'View Types', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Types', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Types', 'text_domain' ),
        'search_items'               => __( 'Search Types', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'types', array( 'custom_book' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'book_types', 0 );


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
  'key' => 'group_555aae7738f81',
  'title' => 'Book',
  'fields' => array (
    array (
      'key' => 'field_555aae80f1f77',
      'label' => 'Age Group',
      'name' => 'age_group',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aaefcf1f78',
      'label' => 'eStore Link',
      'name' => 'bbr_estore_link',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aaf09f1f79',
      'label' => 'Biography Person',
      'name' => 'biography_person',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aaf3bf1f7a',
      'label' => 'Booklists',
      'name' => 'booklists',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aaf43f1f7b',
      'label' => 'DRA',
      'name' => 'dra',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aaf4bf1f7c',
      'label' => 'Google Book Preview',
      'name' => 'google_book_preview',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aaf54f1f7d',
      'label' => 'Guided Reading Level',
      'name' => 'guided_reading_level',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aaf5cf1f7e',
      'label' => 'Illustrator',
      'name' => 'illustrator',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aaf65f1f7f',
      'label' => 'Interest Level',
      'name' => 'interest_level',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aaf6ef1f80',
      'label' => 'Lexile',
      'name' => 'lexile',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aaf76f1f81',
      'label' => 'Out Of Print',
      'name' => 'out_of_print',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
    ),
    array (
      'key' => 'field_555aaf81f1f82',
      'label' => 'Pages',
      'name' => 'pages',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aaf96f1f83',
      'label' => 'Parent Publisher',
      'name' => 'parent_publisher',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aaf9df1f84',
      'label' => 'Picture',
      'name' => 'picture',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aafaff1f85',
      'label' => 'Publish Date',
      'name' => 'publish_date',
      'type' => 'date_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'display_format' => 'm/d/Y',
      'return_format' => 'm/d/Y',
      'first_day' => 1,
    ),
    array (
      'key' => 'field_555aafcdf1f86',
      'label' => 'Publisher',
      'name' => 'publisher',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aafd5f1f87',
      'label' => 'Reading Grade Level',
      'name' => 'reading_grade_level',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_555aafddf1f88',
      'label' => 'Reading Room',
      'name' => 'reading_room',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
    ),
    array (
      'key' => 'field_555aafe1f1f89',
      'label' => 'Series',
      'name' => 'series',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'custom_book',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
));

endif;

function my_post_exists($title, $content = '', $date = '') {
    global $wpdb;

    $post_title = wp_unslash( sanitize_post_field( 'post_title', $title, 0, 'db' ) );
    $post_content = wp_unslash( sanitize_post_field( 'post_content', $content, 0, 'db' ) );
    $post_date = wp_unslash( sanitize_post_field( 'post_date', $date, 0, 'db' ) );

    $query = "SELECT ID FROM $wpdb->posts WHERE 1=1";
    $args = array();

    if ( !empty ( $date ) ) {
        $query .= ' AND post_date = %s';
        $args[] = $post_date;
    }

    if ( !empty ( $title ) ) {
        $query .= ' AND post_title = %s';
        $args[] = $post_title;
    }

    if ( !empty ( $content ) ) {
        $query .= 'AND post_content = %s';
        $args[] = $post_content;
    }

    if ( !empty ( $args ) )
        return (int) $wpdb->get_var( $wpdb->prepare($query, $args) );

    return 0;
}

function import_books() {
  $bbr_file = get_template_directory(). '/inc/brown_baby_reads_data.json';
  if (!file_exists($bbr_file)) {
    return 0;
  }
  $books_json = file_get_contents($bbr_file);

  // Parse books JSON
  // JSON must be valid: keys + values need DOUBLE quotes
  $books = json_decode($books_json, true);
  // echo var_dump($books);
  // echo count($books);

  foreach ($books as $book) {
    $id = my_post_exists($book['title']);
    if (!$id) {
      $post = array(
        'post_content'   => $book['description'],
        'post_title'     => $book['title'],
        'post_status'    => 'publish',
        'post_type'      => 'custom_book',
        'tax_input'      => array(
          'keywords'     => $book['keywords'],
          // 'authors'      => $book['author'],
          'types'        => $book['type'],
          'links'        => $book['curriculums']
        )
      );

      $id = wp_insert_post($post, true);

      // Need to call this for each custom field
      // Grad the keys from custom fields in our functions file
      $date = date_create($book['publish_date']);
      $pub_date = $date ? date_format($date, 'Ymd') : '';

      update_field('field_555aae80f1f77', $book['age_group'],  $id);
      update_field('field_555aaefcf1f78', $book['bbr_estore_link'], $id);
      update_field('field_555aaf09f1f79', $book['biography_person'], $id);
      update_field('field_555aaf3bf1f7a', $book['booklists'], $id);
      update_field('field_555aaf43f1f7b', $book['dra'], $id);
      update_field('field_555aaf4bf1f7c', $book['google_book_preview'], $id);
      update_field('field_555aaf54f1f7d', $book['guided_reading_level'], $id);
      update_field('field_555aaf5cf1f7e', $book['illustrator'], $id);
      update_field('field_555aaf65f1f7f', $book['interest_level'], $id);
      update_field('field_555aaf6ef1f80', $book['lexile'], $id);
      update_field('field_555aaf76f1f81', $book['out_of_print'], $id);
      update_field('field_555aaf81f1f82', $book['pages'], $id);
      update_field('field_555aaf96f1f83', $book['parent_publisher'], $id);
      update_field('field_555aaf9df1f84', $book['picture'], $id);
      update_field('field_555aafaff1f85', $pub_date, $id);
      update_field('field_555aafcdf1f86', $book['publisher'], $id);
      update_field('field_555aafd5f1f87', $book['reading_grade_level'], $id);
      update_field('field_555aafddf1f88', $book['reading_room'], $id);
      update_field('field_555aafe1f1f89', $book['series'], $id);
      update_post_meta($id, 'old_id', $book['id']);
    } else {
      // The book title was found in the database, so we can use $id to update it
      if ($book['author']) {
        $term = term_exists($book['author'], 'authors');
        if ($term == 0 || $term == null) {
          $term = wp_insert_term($book['author'], 'authors');
        }
        wp_set_object_terms($id, array($term['term_id']), 'authors');
      }
    }
  }
}

// add_action('init', 'import_books');
