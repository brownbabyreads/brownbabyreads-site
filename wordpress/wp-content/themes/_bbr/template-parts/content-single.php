<?php
/**
 * @package brownbabyreads
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-sm-12">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<div class="meta-data alt">
				<div><i class="fa fa-clock-o"></i> <?php _bbr_posted_on(); ?></div>
			</div>
	        <hr class="fw">
	        <?php the_content(); ?>
	        <hr class="fw">
			<?php _bbr_entry_footer(); ?>
	      </div>
		</div>
	</div>
</article><!-- #post-## -->
