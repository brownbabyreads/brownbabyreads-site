<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package brownbabyreads
 */

get_header(); ?>

    <?php if ( have_posts() ) : ?>

    <div class="hero-area">
      <div class="page-header">
      <?php
        the_archive_title( '<h1 class="page-title">', '</h1>' );
        the_archive_description( '<div class="taxonomy-description">', '</div>' );
      ?>
      </div>
    </div>
    <!-- Notive Bar -->
    <div class="notice-bar">
        <div class="container">
          <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
                <li class="active">Classic Blog</li>
            </ol>
        </div>
    </div>
    <!-- Start Body Content -->
    <div class="main" role="main">
      <div id="content" class="content full">
            <div class="container">
              <div class="row">
                    <div class="col-md-8">
                        <div class="posts-listing">

                            <!-- List Item -->
                            <div class="list-item blog-list-item format-standard">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="post-media">
                                            <a href="blog-single.html" class="img-thumbnail"><img src="http://placehold.it/600x500&amp;text=IMAGE+PLACEHOLDER" alt="" class="post-thumb"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <h3><a href="blog-single.html">Standard Post Format</a></h3>
                                        <div class="meta-data alt">
                                          <div><i class="fa fa-clock-o"></i> April 20, 2015</div>
                                          <div><i class="fa fa-archive"></i> <a href="#">Conservation</a>, <a href="#">Exhibitions</a></div>
                                        </div>
                                        <div class="list-item-excerpt">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem...</p>
                                        </div>
                                        <div class="post-actions">
                                            <a href="blog-single.html" class="btn btn-primary">Continue reading</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- List Item -->
                            <div class="list-item blog-list-item format-audio">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="post-media">
                                            <iframe width="100%" height="170" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/2678309&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <h3><a href="blog-single.html">Soundcloud audio post</a></h3>
                                        <div class="meta-data alt">
                                          <div><i class="fa fa-clock-o"></i> April 19, 2015</div>
                                          <div><i class="fa fa-archive"></i> <a href="#">Concert</a>, <a href="#">Exhibitions</a></div>
                                        </div>
                                        <div class="list-item-excerpt">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem...</p>
                                        </div>
                                        <div class="post-actions">
                                            <a href="blog-single.html" class="btn btn-primary">Continue reading</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- List Item -->
                            <div class="list-item blog-list-item format-video">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="post-media">
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/KKNZozVqHNI?rel=0" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <h3><a href="blog-single.html">A Youtube video post</a></h3>
                                        <div class="meta-data alt">
                                          <div><i class="fa fa-clock-o"></i> April 19, 2015</div>
                                          <div><i class="fa fa-archive"></i> <a href="#">Concert</a>, <a href="#">Exhibitions</a></div>
                                        </div>
                                        <div class="list-item-excerpt">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem...</p>
                                        </div>
                                        <div class="post-actions">
                                            <a href="blog-single.html" class="btn btn-primary">Continue reading</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- List Item -->
                            <div class="list-item blog-list-item format-gallery">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="post-media">
                                            <div class="flexslider galleryflex" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="slide" data-pause="yes">
                                                <ul class="slides">
                                                    <li class="item"><a href="http://placehold.it/800x500&amp;text=IMAGE+PLACEHOLDER" data-rel="prettyPhoto[postname]"><img src="http://placehold.it/800x500&amp;text=IMAGE+PLACEHOLDER" alt=""></a></li>
                                                    <li class="item"><a href="http://placehold.it/800x500&amp;text=IMAGE+PLACEHOLDER" data-rel="prettyPhoto[postname]"><img src="http://placehold.it/800x500&amp;text=IMAGE+PLACEHOLDER" alt=""></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <h3><a href="blog-single.html">A Gallery post</a></h3>
                                        <div class="meta-data alt">
                                          <div><i class="fa fa-clock-o"></i> April 19, 2015</div>
                                          <div><i class="fa fa-archive"></i> <a href="#">Concert</a>, <a href="#">Exhibitions</a></div>
                                        </div>
                                        <div class="list-item-excerpt">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem...</p>
                                        </div>
                                        <div class="post-actions">
                                            <a href="blog-single.html" class="btn btn-primary">Continue reading</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- List Item -->
                            <div class="list-item blog-list-item format-video">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="post-media">
                                            <iframe src="https://player.vimeo.com/video/22382844?color=9bc8ce&title=0&byline=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <h3><a href="blog-single.html">A Vimeo video post</a></h3>
                                        <div class="meta-data alt">
                                          <div><i class="fa fa-clock-o"></i> April 19, 2015</div>
                                          <div><i class="fa fa-archive"></i> <a href="#">Concert</a>, <a href="#">Exhibitions</a></div>
                                        </div>
                                        <div class="list-item-excerpt">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem...</p>
                                        </div>
                                        <div class="post-actions">
                                            <a href="blog-single.html" class="btn btn-primary">Continue reading</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <ul class="pagination">
                            <li><a href="#" title="First"><i class="fa fa-chevron-left"></i></a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#" class="">2</a></li>
                            <li><a href="#" class="">3</a></li>
                            <li><a href="#" title="Last"><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 sidebar right-sidebar">
                      <div class="widget sidebar-widget widget_upcoming_events box-style1">
                          <h3 class="widget-title">Upcoming Events</h3>
                            <ul>
                              <li>
                                  <a href="event-single.html">An Artist Combing the Shores of Time</a>
                                    <span class="meta-data"><i class="fa fa-calendar"></i> Wednesday(20 May, 2015), 05:00pm - 08:00pm</span>
                                </li>
                              <li>
                                  <a href="event-single.html">We Come This Far by Faith</a>
                                    <span class="meta-data"><i class="fa fa-calendar"></i> Monday(01 June, 2015), 10:00am - 01:00pm</span>
                                </li>
                              <li>
                                  <a href="event-single.html">Metal and Wire: Ancient Adornment</a>
                                    <span class="meta-data"><i class="fa fa-calendar"></i> Thursday(23 July, 2015), 11:00am - 02:00pm</span>
                                </li>
                            </ul>
                        </div>

                      <div class="widget sidebar-widget widget_recent_posts box-style1">
                          <h3 class="widget-title">Recent News</h3>
                            <ul>
                              <li>
                                  <a href="blog-single.html"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail"></a>
                                  <a href="blog-single.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a>
                                    <span class="meta-data">Posted on April 14, 2015</span>
                                </li>
                              <li>
                                  <a href="blog-single.html"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail"></a>
                                  <a href="blog-single.html">Happy holidays to everyone!</a>
                                    <span class="meta-data">Posted on April 11, 2015</span>
                                </li>
                              <li>
                                  <a href="blog-single.html"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail"></a>
                                  <a href="blog-single.html">Potter working a piece of clay</a>
                                    <span class="meta-data">Posted on April 09, 2015</span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <?php
          /* Include the Post-Format-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */
          get_template_part( 'template-parts/content', get_post_format() );
        ?>

      <?php endwhile; ?>

      <?php the_posts_navigation(); ?>

    <?php else : ?>

      <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>

<?php get_footer(); ?>
