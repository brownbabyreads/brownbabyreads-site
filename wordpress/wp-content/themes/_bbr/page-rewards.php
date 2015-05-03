<?php
/*
Template Name: Rewards Page
*/

get_header();

the_post();
?>

<!-- Start Body Content -->
<div class="main" role="main">
  <div id="content" class="content full">
    <div class="row">
      <div class="container">
        <?php the_content(); ?>
      </div>
    </div>
    <div class="spacer-20"></div>
    <div class="container">
      <div class="row">
        <?php
          // check if the repeater field has rows of data
          if( have_rows('rewards_programs') ):
            // loop through the rows of data
            while ( have_rows('rewards_programs') ) : the_row();
              $i = 1;
              $image = get_sub_field('image');
              $name = get_sub_field('name');
              $url = get_sub_field('url');
              $content = get_sub_field('content');
            ?>
              <div class="col-md-6">
                <img src="<?php echo $image['url']; ?>" />
                <h3><?php echo $name; ?></h3>
                <p><?php echo $content; ?></p>
                <a href="<?php echo $pdfurl; ?>">Detailed Instructions</a>
              </div>
            <?php
            $i++;
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </div>
</div>
<!-- End Body Content -->

<?php get_footer(); ?>