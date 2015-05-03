<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
                <?php
                /* Include the Post-Format-specific template for the content.
                * If you want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                */
                get_template_part( 'template-parts/content', get_post_format() );
                ?>
              <?php endwhile; ?>
            <?php else : ?>
              <?php get_template_part( 'template-parts/content', 'none' ); ?>
            <?php endif; ?>
          </div>
          <?php the_posts_navigation(); ?>
          <ul class="pagination">
              <li><a href="#" title="First"><i class="fa fa-chevron-left"></i></a></li>
              <li class="active"><span>1</span></li>
              <li><a href="#" class="">2</a></li>
              <li><a href="#" class="">3</a></li>
              <li><a href="#" title="Last"><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
