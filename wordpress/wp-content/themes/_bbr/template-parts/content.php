<?php
/**
 * @package brownbabyreads
 */
?>
<!-- List Item -->
<article id="post-<?php the_ID(); ?>" class="list-item blog-list-item format-standard">
  <div class="row">
    <div class="col-md-4 col-sm-4">
      <div class="post-media">
        <a href="blog-single.html" class="img-thumbnail"><img src="http://placehold.it/600x500&amp;text=IMAGE+PLACEHOLDER" alt="" class="post-thumb"></a>
      </div>
    </div>

    <div class="col-md-8 col-sm-8">
      <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

      <div class="meta-data alt">
        <div><i class="fa fa-clock-o"></i> <?php _bbr_posted_on(); ?></div>
        <div><i class="fa fa-archive"></i> <a href="#">Conservation</a>, <a href="#">Exhibitions</a></div>
      </div>

      <div class="list-item-excerpt">
        <?php the_content(); ?>
      </div>

      <div class="post-actions">
        <a href="<?php esc_url( get_permalink() ); ?>" class="btn btn-primary">Continue reading</a>
      </div>
    </div>
  </div>
</article>

<?php
  wp_link_pages( array(
    'before' => '<div class="page-links">' . __( 'Pages:', '_bbr' ),
    'after'  => '</div>',
  ) );
?>
