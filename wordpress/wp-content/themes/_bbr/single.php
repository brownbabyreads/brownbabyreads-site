<?php
/**
 * The template for displaying all single posts.
 *
 * @package brownbabyreads
 */

get_header(); ?>
<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">
      <div class="row">
        <div class="col-md-3 sidebar right-sidebar">
          <?php get_sidebar(); ?>
        </div>
        <div class="col-md-9">
          <div class="posts-listing">
            <?php if( have_posts() ): ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'single' ); ?>
					<?php
						// If comments are open or we have at least one comment, load up the comment template
						// if ( comments_open() || get_comments_number() ) :
						// 	comments_template();
						// endif;
					?>
				<?php endwhile; ?>
            <?php else : ?>
              <?php get_template_part( 'template-parts/content', 'none' ); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>