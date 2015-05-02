<?php
/*
Template Name: Blog
 */

get_header(); ?>

<!-- <div class="hero-area">
  <div class="page-header">
  <?php
    the_archive_title( '<h1 class="page-title">', '</h1>' );
  ?>
  </div>
</div> -->

<!-- Start Body Content -->
<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">
      <div class="row">
        <div class="col-md-3 sidebar right-sidebar">
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
        </div>

        <div class="col-md-9">
          <div class="posts-listing">

            <?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

            <?php if( have_posts() ): ?>

              <?php while( have_posts() ): the_post(); ?>

                <?php
                  /* Include the Post-Format-specific template for the content.
                   * If you want to override this in a child theme, then include a file
                   * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                   */
                  get_template_part( 'template-parts/content', get_post_format() );
                ?>

            <?php endwhile; ?>
          </div>

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

<?php the_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

<?php get_footer(); ?>
