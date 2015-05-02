<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package brownbabyreads
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function _bbr_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => '_bbr_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function _bbr_jetpack_setup
add_action( 'after_setup_theme', '_bbr_jetpack_setup' );

function _bbr_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function _bbr_infinite_scroll_render