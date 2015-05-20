<?php

get_header(); ?>

<div class="container">
  <div class="row">

    <div class="col-md-3 sidebar right-sidebar">
      <div class="widget sidebar-widget box-style1">
        <!-- TODO: figure out what is supposed to go over here, maybe nothing? -->
        <h3 class="widget-title">Top categories</h3>
        <ul class="top-categories-list">
        </ul>
      </div>
      <div class="widget sidebar-widget box-style1">
        <h3 class="widget-title">Categories</h3>
        <ul class="categories-list">
          <!-- TODO: @cheech says this is where the keywords / book tags will go -->
        </ul>
      </div>
    </div>

    <div class="col-md-9">
      <ul class="sort-destination isotope exhibitions-grid" data-sort-id="grid">
        <?php if( have_posts() ): ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <li class="col-md-4 col-sm-4 grid-item format-standard accrue-homestead">
          <div style="width:100%;height:240px;background:url(http://overnight-website.s3.amazonaws.com/wp-uploads<?php the_field('picture'); ?>) center / cover;" />
          <div class="grid-item-content">
            <!-- note: these inline styles keep the entire layout from falling apart -->
            <h3 style="height:81px;overflow:hidden;"><?php the_title(); ?></h3>
            <div class="post-actions">
              <a class="btn btn-default" href="/single-book">Learn more</a>
            </div>
          </div>
        </li>
        <?php endwhile; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-9 col-sm-offset-3">
      <ul class="pagination">
        <?php custom_pagination(); ?>
      </ul>
    </div>
  </div>
</div>

<?php get_footer(); ?>