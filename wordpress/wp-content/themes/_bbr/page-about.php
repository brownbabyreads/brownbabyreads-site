<?php
/*
Template Name: About Page
*/

get_header();

the_post(); ?>

<!-- Start Body Content -->
<div class="main" role="main" id="mission_vision">
  <div id="content" class="content full">
    <div class="container">
      <div class="row">
        <div class="col-md-4 sidebar right-sidebar">
          <div class="widget sidebar-widget widget_upcoming_events box-style1">
              <h3 class="widget-title">About Brown Baby Reads</h3>
                <ul>
                  <li>
                    <a href="#mission_vision"><?php echo the_field('mission_vision_title'); ?></a>
                  </li>
                  <li>
                    <a href="#values"><?php echo the_field('values_title'); ?></a>
                  </li>
                  <li>
                    <a href="#what_we_do"><?php echo the_field('what_we_do_title'); ?></a>
                  </li>
                  <li>
                    <a href="#who_we_are"><?php echo the_field('who_we_are_title'); ?></a>
                  </li>
                  <li>
                    <a href="#leadership">Leadership</a>
                  </li>
                  <li>
                    <a href="#advisory_board"><?php echo the_field('advisory_board_title'); ?></a>
                  </li>
                  <li>
                    <a href="#request_brochures"><?php echo the_field('request_brochures_title'); ?></a>
                  </li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
          <h2><?php echo the_field('mission_vision_title'); ?></h2>
          <?php echo the_field('mission_vision_content'); ?>
          <hr id="values" class="fw">
          <h2><?php echo the_field('values_title'); ?></h2>
          <?php echo the_field('values'); ?>
          <hr class="fw" id="what_we_do">
          <h2><?php echo the_field('what_we_do_title'); ?></h2>
          <?php echo the_field('what_we_do_content'); ?>
          <hr class="fw" id="who_we_are">
          <h2><?php echo the_field('who_we_are_title'); ?></h2>
          <?php echo the_field('who_we_are_content'); ?>
          <hr class="fw" id="leadership">
          <h2>Leadership</h2>
          <div class="carousel-wrapper">
            <div class="row">
              <ul class="owl-carousel carousel-fw" id="team-slider" data-columns="4" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="4" data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                <?php
                  // check if the repeater field has rows of data
                  if( have_rows('board_members') ):
                    // loop through the rows of data
                    while ( have_rows('board_members') ) : the_row();
                      $i = 1;
                      $photo = get_sub_field('photo');
                      $name = get_sub_field('name');
                      $position = get_sub_field('position');
                      $facebook_url = get_sub_field('facebook_url');
                      $twitter_url = get_sub_field('twitter_url');
                      $email = get_sub_field('email');
                    ?>
                      <!-- STAFF ITEM -->
                      <li class="item">
                        <div class="grid-item staff-item format-image">
                          <?php if($photo['url']) { ?>
                            <a href="<?php echo $photo['url']; ?>" data-rel="prettyPhoto" class="media-box grid-featured-img">
                              <img src="<?php echo $photo['url']; ?>" alt="<?php echo $name; ?>">
                            </a>
                          <?php } ?>
                          <div class="grid-item-content">
                            <h3><?php echo $name; ?></h3>
                            <span class="meta-data"><?php echo $position; ?></span>
                            <?php if($facebook_url || $twitter_url || $email) { ?>
                              <ul class="social-icons-colored">
                                <?php if($facebook_url) { ?>
                                  <li class="facebook"><a href="<?php echo $facebook_url; ?>"><i class="fa fa-facebook-f"></i></a></li>
                                <?php } if($twitter_url) { ?>
                                  <li class="twitter"><a href="<?php echo $twitter_url; ?>"><i class="fa fa-twitter"></i></a></li>
                                <?php } if($email) { ?>
                                  <li class="google"><a href="mailto:<?php echo $email; ?>"><i class="fa fa-envelope"></i></a></li>
                                <?php } ?>
                              </ul>
                            <?php } ?>
                          </div>
                        </div>
                      </li>
                    <?php
                    $i++;
                    endwhile;
                  endif;
                ?>
              </ul>
            </div>
          </div>
          <hr class="fw" id="advisory_board">
          <h2><?php echo the_field('advisory_board_title'); ?></h2>
          <ul>
            <?php
              // check if the repeater field has rows of data
              if( have_rows('advisory_board') ):
                // loop through the rows of data
                while ( have_rows('advisory_board') ) : the_row();
                ?>
                  <li><?php echo get_sub_field('member'); ?></li>
                <?php
                endwhile;
              endif;
            ?>
          </ul>
          <hr class="fw" id="request_brochures">
          <h2><?php echo the_field('request_brochures_title'); ?></h2>
          <?php echo the_field('request_brochures_content'); ?>
          <div class="carousel-wrapper">
            <div class="row">
              <ul class="owl-carousel carousel-fw" id="team-slider" data-columns="2" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="2" data-items-desktop-small="2" data-items-tablet="2" data-items-mobile="1">
                <?php
                  // check if the repeater field has rows of data
                  if( have_rows('brochures') ):
                    // loop through the rows of data
                    while ( have_rows('brochures') ) : the_row();
                      $i = 1;
                      $image = get_sub_field('image');
                      $name = get_sub_field('name');
                      $pdfurl = get_sub_field('pdf-url');
                    ?>
                      <!-- STAFF ITEM -->
                      <li class="item">
                        <div class="grid-item staff-item format-image">
                          <?php if($image['url']) { ?>
                            <a href="<?php echo $pdfurl; ?>" class="media-box grid-featured-img">
                              <img src="<?php echo $image['url']; ?>" alt="<?php echo $name; ?>">
                            </a>
                          <?php } ?>
                          <div class="grid-item-content">
                            <h3><a href="<?php echo $pdfurl; ?>"><?php echo $name; ?></a></h3>
                          </div>
                        </div>
                      </li>
                    <?php
                    $i++;
                    endwhile;
                  endif;
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Body Content -->

<?php get_footer(); ?>