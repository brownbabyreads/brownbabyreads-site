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

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->


<div class="widget sidebar-widget box-style1">
	<h3 class="widget-title">Top categories</h3>
	<ul>
		<li><a href="books-single.html">Baby books</a></li>
		<li><a href="books-single.html">Baby books</a></li>
		<li><a href="books-single.html">Baby books</a></li>
	</ul>
</div>

	<div class="widget sidebar-widget box-style1">
	<h3 class="widget-title">Categories</h3>
	<ul>
		<li><a href="books-single.html">Baby books</a></li>
		<li><a href="books-single.html">Baby books</a></li>
		<li><a href="books-single.html">Baby books</a></li>
		<li><a href="books-single.html">Baby books</a></li>
		<li><a href="books-single.html">Baby books</a></li>
	</ul>
</div>