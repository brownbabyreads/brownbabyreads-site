<?php
remove_filter ('the_content', 'wpautop');

get_header();

the_post(); ?>

<div class="container">
  <div class="spacer-30"></div>
  <div class="row">

    <div class="col-md-3">
      <div class="spacer-20"></div>
      <img src="http://overnight-website.s3.amazonaws.com/wp-uploads<?php the_field('picture'); ?>" />
      <div class="spacer-20"></div>
      <?php if ( get_field('google_book_preview') ) : ?>
      <p><a href="<?php the_field('google_book_preview'); ?>">Google Book Preview</a></p>
      <?php endif; ?>
    </div>

    <div class="col-md-6">
      <h1 class="post-title"><?php the_title(); ?></h1>
      <div class="post-content">
        <strong><?php if (has_term('', 'authors')): ?>by <?php the_terms($post->ID, 'authors'); if ( get_field('illustrator') ) : ?>, <?php the_field('illustrator'); ?> (Illustrator)<?php endif; endif; ?></strong>
        <h3 class="overview-title">Overview</h3>
        <p><?php the_content(); ?></p>
      </div>
      <div class="spacer-20"></div>
      <table class="table table-striped">
        <?php
          $biography_person     = get_field('biography_person');
          $pages                = get_field('pages');
          $age_group            = get_terms('grad_levels');
          $guided_reading_level = get_field('guided_reading_level');
          $series               = get_field('series');
          $publish_date         = get_field('publish_date');
        ?>
        <tbody>
          <?php if ($biography_person): ?>
          <tr>
            <td><strong>Biography Person:</strong></td>
            <td><?php echo $biography_person; ?></td>
          </tr>
          <?php endif; ?>
          <?php if ($pages): ?>
          <tr>
            <td><strong>Page Count:</strong></td>
            <td><?php echo $pages; ?></td>
          </tr>
          <?php endif; ?>
          <?php if ($age_group): ?>
          <tr>
            <td><strong>Age Group:</strong></td>
            <td><?php echo get_the_term_list($post->ID, 'age_groups', '', ', '); ?> </td>
          </tr>
          <?php endif; ?>
          <?php if ($guided_reading_level): ?>
          <tr>
            <td><strong>Reading Level:</strong></td>
            <td><?php echo $guided_reading_level; ?></td>
          </tr>
          <?php endif; ?>
          <?php if ($series): ?>
          <tr>
            <td><strong>Series:</strong></td>
            <td><?php echo $series; ?></td>
          </tr>
          <?php endif; ?>
          <?php if ($publish_date): ?>
          <tr>
            <td><strong>Publish Date:</strong></td>
            <td><?php echo $publish_date; ?></td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-3 sidebar right-sidebar">
      <?php if ( get_field('bbr_estore_link') ) : ?>
      <div class="widget sidebar-widget widget_next_exhibitions box-style1">
        <a class="btn btn-primary btn-lg" href="<?php the_field('bbr_estore_link'); ?>">$ Purchase Book</a>
      </div>
      <?php else : ?>
      <div class="widget sidebar-widget widget_next_exhibitions box-style1">
        <p>This book is not currently available in our store.</p>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="spacer-30"></div>
</div>

<?php get_footer(); ?>