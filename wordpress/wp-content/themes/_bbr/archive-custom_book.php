<?php

get_header(); ?>

<div class="content full">
  <div class="container">
    <div class="row">

      <div class="col-md-3 sidebar right-sidebar">
        <div class="widget sidebar-widget box-style1">
          <h3 class="widget-title">Age Groups</h3>
          <ul class="top-categories-list">
            <?php
            $args = array(
              'orderby' => 'count',
              'order'   => 'DESC'
            );
            $terms = get_terms('age_groups', $args);
            if (!empty($terms) && !is_wp_error($terms)){
               foreach ($terms as $term) {
                 echo '<li><a href="' . get_term_link( $term ) . '" title="' . sprintf('View all post filed under %s', $term->name ) . '">' . $term->name . '</a></li>';
               }
             }
             ?>
          </ul>
        </div>
        <div class="widget sidebar-widget box-style1">
          <h3 class="widget-title">Categories</h3>
          <ul class="categories-list">
            <?php
            $args = array(
              'orderby' => 'count',
              'order'   => 'DESC',
              'number'  => 32,
            );
            $terms = get_terms('keywords', $args);
            if (!empty($terms) && !is_wp_error($terms)){
               foreach ($terms as $term) {
                 echo '<li><a href="' . get_term_link( $term ) . '" title="' . sprintf('View all post filed under %s', $term->name ) . '">' . $term->name . '</a></li>';
               }
             }
             ?>
          </ul>
        </div>
      </div>
    <div class="col-md-9">
      <ul class="sort-destination isotope exhibitions-grid" data-sort-id="grid">
        <?php if( have_posts() ): ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <li class="col-md-4 col-sm-4 grid-item format-standard accrue-homestead">
          <a class="media-box grid-featured-img" href="<?php the_permalink(); ?>" style="display:block;">
            <span style="width:100%;height:225px;background:url('http://overnight-website.s3.amazonaws.com/wp-uploads<?php echo get_field('picture') ?: '/2015/05/book.png' ; ?>') top center / cover;display:inline-block;vertical-align:bottom;"></span>
          </a>
          <div class="grid-item-content">
            <!-- note: these inline styles keep the entire layout from falling apart -->
            <h3 style="height:90px;overflow:hidden;"><?php the_title(); ?></h3>
            <strong><?php if (has_term('', 'authors')): ?>by <?php the_terms($post->ID, 'authors'); ?><?php else: ?>&nbsp;<?php endif; ?></strong>
            <div class="post-actions">
              <a class="btn btn-default" href="<?php the_permalink(); ?>">Learn more</a>
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
</div>

<?php get_footer(); ?>