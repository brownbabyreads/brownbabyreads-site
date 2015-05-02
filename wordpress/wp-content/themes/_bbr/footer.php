<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package brownbabyreads
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', '_bbr' ) ); ?>"><?php printf( __( 'Proudly powered by %s', '_bbr' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', '_bbr' ), 'brownbabyreads', '<a href="http://sproutsocial.com/" rel="designer">Sprout Social</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
