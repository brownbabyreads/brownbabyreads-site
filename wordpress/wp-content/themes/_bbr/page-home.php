<?php
/*
Template Name: Home
*/

get_header();

while (have_posts() ) : the_post();
?>

<!-- Notive Bar -->
<div class="notice-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8">
                <p class="lead"><?php echo the_field('newsletter_callout_text'); ?></p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
                <a href="<?php echo the_field('newsletter_button_url'); ?>" class="btn btn-primary pull-right"><?php echo the_field('newsletter_button_text'); ?></a>
            </div>
        </div>
    </div>
</div>
<!-- Start Body Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h3 class="widget-title"><?php echo the_field('info_module_title'); ?></h3>
                    <p><?php echo the_field('info_module_text'); ?></p>
                </div>
                <?php
                  // check if the repeater field has rows of data
                  if( have_rows('info_module_featured_bloc') ):
                    // loop through the rows of data
                    while ( have_rows('info_module_featured_bloc') ) : the_row();
                      $i = 1;
                      $image = get_sub_field('image');
                      $caption = get_sub_field('caption');
                      $text = get_sub_field('text');
                      $link_url = get_sub_field('link_url');
                      $link_text = get_sub_field('link_text');
                    ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="featured-block">
                                <figure>
                                    <a href="<?php echo $link_url; ?>">
                                        <img src="<?php echo $image['sizes']['home-info-featured']; ?>" alt="<?php echo $caption; ?>">
                                        <span class="caption"><?php echo $caption; ?></span>
                                    </a>
                                </figure>
                                <p><?php echo $text; ?></p>
                                <a href="<?php echo $link_url; ?>" class="basic-link"><?php echo $link_text; ?></a>
                            </div>
                        </div>
                    <?php
                    $i++;
                    endwhile;
                  endif;
                ?>
            </div>
        </div>
        <div class="spacer-50"></div>
        <div class="dgray-bg">
            <div class="skewed-title-bar">
                <div class="container">
                    <h4>
                        <span>Featured content</span>
                    </h4>
                </div>
            </div>
            <div class="padding-tb45">
                <div class="container">
                    <div class="carousel-wrapper">
                        <div class="row">
                            <ul class="owl-carousel carousel-fw" id="venues-slider" data-columns="3" data-autoplay="" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="3" data-items-desktop-small="2" data-items-tablet="1" data-items-mobile="1">
                                <li class="item">
                                    <div class="featured-block featured-block-secondary format-standard">
                                        <figure>
                                            <a href="#" class="media-box">
                                                <img src="http://placehold.it/600x300&amp;text=IMAGE+PLACEHOLDER" alt="">
                                            </a>
                                        </figure>
                                        <div class="featured-block-in">
                                            <h3><a href="#">Accrue Homestead</a></h3>
                                            <p>This hitoric house was built way back in 1700 and since then it's been awarded several time for its extraordinary beauty...</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="featured-block featured-block-secondary format-standard">
                                        <figure>
                                            <a href="#" class="media-box">
                                                <img src="http://placehold.it/600x300&amp;text=IMAGE+PLACEHOLDER" alt="">
                                            </a>
                                        </figure>
                                        <div class="featured-block-in">
                                            <h3><a href="#">Mehar Mansion</a></h3>
                                            <p>Mansion with 14 historical building is the place to visit in Vestige, the architecture behind the buildings...</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="featured-block featured-block-secondary format-standard">
                                        <figure>
                                            <a href="#" class="media-box">
                                                <img src="http://placehold.it/600x300&amp;text=IMAGE+PLACEHOLDER" alt="">
                                            </a>
                                        </figure>
                                        <div class="featured-block-in">
                                            <h3><a href="#">Shop pleu</a></h3>
                                            <p>The Vestige, new museum of antiquity has a variety of year-round internship programs available for students of all ages.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="featured-block featured-block-secondary format-standard">
                                        <figure>
                                            <a href="#" class="media-box">
                                                <img src="http://placehold.it/600x300&amp;text=IMAGE+PLACEHOLDER" alt="">
                                            </a>
                                        </figure>
                                        <div class="featured-block-in">
                                            <h3><a href="#">Mehar Mansion</a></h3>
                                            <p>The Vestige, new museum of antiquity has a variety of year-round internship programs available for students of all ages.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Latest Blog Posts -->
        <div class="padding-tb45">
            <div class="container">
                <h3 class="widget-title text-align-center"><?php echo the_field('blog_section_title'); ?></h3>
                <div class="carousel-wrapper">
                    <div class="row">
                        <ul class="owl-carousel carousel-fw" id="news-slider" data-columns="4" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="3" data-items-desktop-small="2" data-items-tablet="2" data-items-mobile="1">
                            <?php
                            // Args
                            $args = array(
                                'category_name' => blog,
                                'order' => 'ASC'
                            );

                            // The Query
                            query_posts( $args );

                            // The Loop
                            while ( have_posts() ) : the_post(); ?>
                                <!-- BLOG ITEM -->
                                <li class="item">
                                    <div class="grid-item format-standard">
                                        <?php if ( has_post_thumbnail() ) { ?>
                                            <a href="<?php the_permalink(); ?>" class="media-box grid-featured-img">
                                                <?php the_post_thumbnail(); ?>
                                                <span class="grid-item-date">
                                                    <span class="grid-item-day"><?php echo get_the_date('d'); ?></span>
                                                    <span class="grid-item-month"><?php echo get_the_date('M'); ?></span>
                                                </span>
                                            </a>
                                        <?php } ?>
                                        <div class="grid-item-content">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <div class="grid-item-excerpt">
                                                <p><?php the_excerpt(); ?></p>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="pull-right basic-link">Read more</a>
                                            <div class="meta-data grid-item-meta">
                                                <a href="<?php the_permalink(); ?>"><i class="fa fa-comments-o"></i> <?php comments_number( 'No Comments', '1 Comments', '% Comments' ); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile;

                            // Reset Query
                            wp_reset_query();
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Body Content -->

<?php endwhile; // end of the loop.
get_footer(); ?>
