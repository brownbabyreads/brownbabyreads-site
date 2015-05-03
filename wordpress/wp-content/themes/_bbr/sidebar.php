<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package brownbabyreads
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="widget sidebar-widget box-style1">
  <?php dynamic_sidebar( 'sidebar-1' ); ?>

<!-- 	<h3 class="widget-title">Categories</h3>
	<ul>
		<?php
			$args = [
				'title_li' => null,
			];
			wp_list_categories( $args );
		?>

	</ul> -->
</div>