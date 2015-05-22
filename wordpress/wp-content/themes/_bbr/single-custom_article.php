<?php
remove_filter ('the_content', 'wpautop');

get_header();

the_post(); ?>

<div class="container">
  <div class="spacer-30"></div>
  <div class="row">

    <div class="col-md-3">
      <div class="spacer-20"></div>
      <img src="http://overnight-website.s3.amazonaws.com/wp-uploads<?php echo get_field('picture') ?: '/2015/05/book.png' ; ?>" />
      <div class="spacer-20"></div>
      <?php if ( get_field('google_book_preview') ) : ?>
      <p><a href="<?php the_field('google_book_preview'); ?>">Google Book Preview</a></p>
      <?php endif; ?>
    </div>

    <div class="col-md-6">
      <h1 class="post-title"><?php the_title(); ?></h1>
      <div class="post-content">
        <strong><?php if (get_field('authors')): ?>by <?php the_field('authors'); ?><?php else: ?>&nbsp;<?php endif; ?></strong>
        <h3 class="overview-title">Overview</h3>
        <p><?php the_content(); ?></p>
      </div>
      <div class="spacer-20"></div>
      <table class="table table-striped">
        <?php
          $academic_journal         = get_field('academic_journal');
          $publisher_journal        = get_field('publisher_journal');
          $volume_page              = get_field('volume_page');
          $year                     = get_field('year');
          $article_linkarticle_link = get_field('article_linkarticle_link');
          $summary_link             = get_field('summary_link');
          $subject                  = get_field('subject');
        ?>
        <tbody>
          <?php if ($academic_journal): ?>
          <tr>
            <td><strong>Academic Journal:</strong></td>
            <td><?php echo $academic_journal; ?></td>
          </tr>
          <?php endif; ?>
          <?php if ($publisher_journal): ?>
          <tr>
            <td><strong>Publisher Journal:</strong></td>
            <td><?php echo $publisher_journal; ?></td>
          </tr>
          <?php endif; ?>
          <?php if ($volume_page): ?>
          <tr>
            <td><strong>Volume Page:</strong></td>
            <td><?php echo $volume_page; ?></td>
          </tr>
          <?php endif; ?>
          <?php if ($year): ?>
          <tr>
            <td><strong>Year:</strong></td>
            <td><?php echo $year; ?></td>
          </tr>
          <?php endif; ?>
          <?php if ($article_linkarticle_link): ?>
          <tr>
            <td><strong>Article Link:</strong></td>
            <td><?php echo $article_linkarticle_link; ?></td>
          </tr>
          <?php endif; ?>
          <?php if ($summary_link): ?>
          <tr>
            <td><a href="<?php echo $summary_link; ?>"><strong>Read a summary</strong></a></td>
            <td></td>
          </tr>
          <?php endif; ?>
          <?php if ($subject): ?>
          <tr>
            <td><strong>Subject:</strong></td>
            <td><?php echo $subject; ?></td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-3 sidebar right-sidebar">
      <?php /* Probably nothing goes here */ ?>
      <?php /* if ( get_field('bbr_estore_link') ) : ?>
      <div class="widget sidebar-widget widget_next_exhibitions box-style1">
        <a class="btn btn-primary btn-lg" href="<?php the_field('bbr_estore_link'); ?>">$ Purchase Book</a>
      </div>
      <?php else : ?>
      <div class="widget sidebar-widget widget_next_exhibitions box-style1">
        <p>This book is not currently available in our store.</p>
      </div>
      <?php endif; */ ?>
    </div>
  </div>
  <div class="spacer-30"></div>
</div>

<?php get_footer(); ?>