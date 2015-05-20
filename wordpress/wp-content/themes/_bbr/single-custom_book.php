<?php

get_header();

the_post(); ?>

<div class="container">
  <div class="spacer-30"></div>
  <div class="row">

    <div class="col-md-3">
      <div class="spacer-20"></div>
      <img src="http://overnight-website.s3.amazonaws.com/wp-uploads/<?php the_field('picture'); ?>" />
      <div class="spacer-20"></div>
      <?php if ( get_field('google_book_preview') ) : ?>
      <p><a href="<?php the_field('google_book_preview'); ?>">Google Book Preview</a></p>
      <?php endif; ?>
    </div>

    <div class="col-md-6">
      <h1 class="post-title"><?php the_title(); ?></h1>
      <div class="post-content">
        <strong>by <?php the_terms($post->ID, 'authors'); if ( get_field('illustrator') ) : ?>, <?php the_field('illustrator'); ?> (Illustrator)<?php endif; ?></strong>
        <h3>Overview</h3>
        <p><?php the_content(); ?></p>
      </div>
      <div class="spacer-20"></div>
      <table class="table table-striped">
        <tbody>
          <tr>
            <td><strong>Biography Person:</strong></td>
            <td><?php the_field('biography_person'); ?></td>
          </tr>
          <tr>
            <td><strong>Page Count:</strong></td>
            <td><?php the_field('pages'); ?></td>
          </tr>
          <tr>
            <td><strong>Age Group:</strong></td>
            <td><?php the_field('age_group'); ?></td>
          </tr>
          <tr>
            <td><strong>Reading Level:</strong></td>
            <td><?php the_field('guided_reading_level'); ?></td>
          </tr>
          <tr>
            <td><strong>Series:</strong></td>
            <td><?php the_field('series'); ?></td>
          </tr>
          <tr>
            <td><strong>Publish Date:</strong></td>
            <td><?php the_field('publish_date'); ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-3 sidebar right-sidebar">
      <?php if ( get_field('bbr_estore_link') ) : ?>
      <div class="widget sidebar-widget widget_next_exhibitions box-style1">
        <a class="btn btn-primary btn-lg" href="<?php the_field('bbr_estore_link'); ?>">$ Purchase Book</a>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="spacer-30"></div>
</div>

<?php get_footer(); ?>