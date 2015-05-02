<?php
/*
Template Name: About Page
*/

get_header();

the_post(); ?>

<div class="hero-area">
  <div class="page-header parallax" style="background-image:url(http://placehold.it/1400x600&amp;text=IMAGE+PLACEHOLDER)"><div><div><span>About Us</span></div></div></div>
</div>
<!-- Notive Bar -->
<div class="notice-bar">
    <div class="container">
      <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
            <li class="active">About</li>
        </ol>
    </div>
</div>
<!-- Start Body Content -->
<div class="main" role="main">
  <div id="content" class="content full">
        <div class="container">
          <div class="row">
              <div class="col-md-7 col-sm-6">
              <h4 class="short accent-color">Our history</h4>
                    <h1>About Vestige</h1>
                    <p class="lead">Ut lobortis magna tortor, nec porttitor turpis porta in. Donec a felis sed ligula aliquet sollicitudin a in elit. Nunc at commodo erat, fringilla egestas tortor.</p>
                    <img src="http://placehold.it/600x300&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail">
                <p><?php the_content(); ?></p>
              </div>
              <div class="col-md-5 col-sm-6">
                  <!-- Widget Special Events -->
                    <div class="widget widget_special_events">
                      <h3 class="widget-title">Special Events</h3>
                        <div class="widget_special_events_in">

                          <div class="event-item format-standard">
                              <a href="#" class="media-box event-featured-img"><img src="http://placehold.it/600x300&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                              <div class="meta-data alt">
                                  <div>May 20, 2015</div>
                                    <div><a href="#">Shop Pleu</a></div>
                                </div>
                                <h3 class="post-title"><a href="#">An Artist Combing the Shores of Time</a></h3>
                                <a href="#" class="basic-link">View details</a>
                            </div>

                          <div class="event-item format-standard">
                              <div class="meta-data alt">
                                  <div>June 01, 2015</div>
                                    <div><a href="#">Shop Pleu</a></div>
                                </div>
                                <h3 class="post-title"><a href="#">We Come This Far by Faith</a></h3>
                                <a href="#" class="basic-link">View details</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <hr class="fw">
            <h1>Why you should visit Vestige</h1>
            <div class="spacer-40"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="icon-box ibox-border">
                        <div class="ibox-icon">
                            <i class="fa fa-mobile"></i>
                        </div>
                        <h3>Full Responsive Design</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box ibox-border">
                        <div class="ibox-icon">
                            <i class="fa fa-info"></i>
                        </div>
                        <h3>Lots of Icons</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box ibox-border">
                        <div class="ibox-icon">
                            <i class="fa fa-header"></i>
                        </div>
                        <h3>3 Header Styles</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                    </div>
                </div>
            </div>
            <div class="spacer-60 hidden-xs hidden-sm"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="icon-box ibox-border">
                        <div class="ibox-icon">
                            <i class="fa fa-windows"></i>
                        </div>
                        <h3>Boxed &amp; Wide Layouts</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box ibox-border">
                        <div class="ibox-icon">
                            <i class="fa fa-navicon"></i>
                        </div>
                        <h3>Megamenu</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box ibox-border">
                        <div class="ibox-icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <h3>Twitter Widget</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                    </div>
                </div>
            </div>

            <hr class="fw">
            <h1>Our Team</h1>
            <div class="spacer-20"></div>
            <div class="carousel-wrapper">
                <div class="row">
                    <ul class="owl-carousel carousel-fw" id="team-slider" data-columns="4" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="4" data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                        <!-- STAFF ITEM -->
                        <li class="item">
                            <div class="grid-item staff-item format-image">
                                <a href="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" data-rel="prettyPhoto" class="media-box grid-featured-img">
                                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                </a>
                                <div class="grid-item-content">
                                    <h3>Ralph Burton</h3>
                                    <span class="meta-data">Director</span>
                                    <ul class="social-icons-colored">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="google"><a href="#"><i class="fa fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- STAFF ITEM -->
                        <li class="item">
                            <div class="grid-item staff-item format-image">
                                <a href="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" data-rel="prettyPhoto" class="media-box grid-featured-img">
                                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                </a>
                                <div class="grid-item-content">
                                    <h3>Beverly Barnett</h3>
                                    <span class="meta-data">Education &amp; Visitors</span>
                                    <ul class="social-icons-colored">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="google"><a href="#"><i class="fa fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- STAFF ITEM -->
                        <li class="item">
                            <div class="grid-item staff-item format-image">
                                <a href="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" data-rel="prettyPhoto" class="media-box grid-featured-img">
                                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                </a>
                                <div class="grid-item-content">
                                    <h3>Judith Bailey</h3>
                                    <span class="meta-data">Estate Manager</span>
                                    <ul class="social-icons-colored">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="google"><a href="#"><i class="fa fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- STAFF ITEM -->
                        <li class="item">
                            <div class="grid-item staff-item format-image">
                                <a href="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" data-rel="prettyPhoto" class="media-box grid-featured-img">
                                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                </a>
                                <div class="grid-item-content">
                                    <h3>Tyler Wong</h3>
                                    <span class="meta-data">Director of Finance</span>
                                    <ul class="social-icons-colored">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="google"><a href="#"><i class="fa fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="spacer-20"></div>
        </div>
    </div>
</div>
<!-- End Body Content -->

<?php get_footer(); ?>