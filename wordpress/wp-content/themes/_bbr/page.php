<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package brownbabyreads
 */

get_header(); ?>

<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <?php if ( have_posts() ) : ?>
          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>
              <?php the_content(); ?>
          <?php endwhile; ?>
          <?php the_posts_navigation(); ?>
          <?php else : ?>
          <?php get_template_part( 'template-parts/content', 'none' ); ?>
          <?php endif; ?>
        </div>
        <div class="col-md-3 sidebar right-sidebar">
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>
