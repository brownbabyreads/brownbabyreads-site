<?php
/**
 * @package brownbabyreads
 */
?>
<!-- List Item -->
<article id="post-<?php the_ID(); ?>" class="list-item blog-list-item format-standard">
  <div class="row">
    <?php if ( has_post_thumbnail() ) { ?>
      <div class="col-md-4 col-sm-4">
        <div class="post-media">
          <a href="<?php esc_url( the_permalink() ); ?>" class="img-thumbnail"><?php the_post_thumbnail(); ?></a>
        </div>
      </div>
      <div class="col-md-8 col-sm-8">
    <?php } else { ?>
      <div class="col-md-12">
    <?php } ?>
      <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
      <div class="meta-data alt">
        <div><i class="fa fa-clock-o"></i> <?php _bbr_posted_on(); ?></div>
      </div>
      <div class="list-item-excerpt">
        <?php the_excerpt(); ?>
      </div>
      <div class="post-actions">
        <a href="<?php esc_url( the_permalink() ); ?>" class="btn btn-primary">Continue reading</a>
      </div>
    </div>
  </div>
</article>