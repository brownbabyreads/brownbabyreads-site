<?php
/*
Template Name: Volunteer Page
*/

get_header();

//the_post();
?>

<!-- Start Body Content -->
<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <?php
              // check if the repeater field has rows of data
              if( have_rows('icon_box') ):
                // loop through the rows of data
                while ( have_rows('icon_box') ) : the_row();
                  $i = 1;
                  $name = get_sub_field('name');
                  $content = get_sub_field('content');
                  $icon = get_sub_field('icon');
                ?>
                  <div class="col-md-3 col-md-offset-1">
                    <div class="icon-box" style="text-align: center;">
                      <div class="ibox-icon center-block">
                        <i class="fa <?php echo $icon; ?>"></i>
                      </div>
                      <h3><?php echo $name; ?></h3>
                      <p><?php echo $content; ?></p>
                    </div>
                  </div>
                <?php
                $i++;
                endwhile;
              endif;
            ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="spacer-60"></div>
          <?php if( function_exists( 'ninja_forms_display_form' ) ){
            ninja_forms_display_form( 2 );
            } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Body Content -->

<?php get_footer(); ?>