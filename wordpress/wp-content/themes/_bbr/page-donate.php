<?php
/*
Template Name: Donate Page
*/

get_header();

the_post(); ?>

<div class="hero-area">
  <div class="page-header parallax" style="background-image:url(http://placehold.it/1200x300&amp;text=IMAGE+PLACEHOLDER)"><div><div><span>Donations</span></div></div></div>
</div>
<!-- Notive Bar -->
<div class="notice-bar">
    <div class="container">
      <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
            <li class="active">Donate</li>
        </ol>
    </div>
</div>
<!-- Start Body Content -->
<div class="main" role="main">
  <div id="content" class="content full">
        <div class="container">
          <div class="row">
                <div class="col-md-8">
                    <?php the_content(); ?>
                    <p class="lead">Donate today to double your gift and help expand access to our collection, nurture dialogue and scholarship, and introduce new generations to all the Met has to offer.</p>
                    <hr class="fw">

                    <!-- List Item -->
                    <div class="list-item">
                      <div class="row">
                          <div class="col-md-4 col-sm-4">
                              <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" class="img-thumbnail" alt="">
                            </div>
                            <div class="col-md-8 col-sm-8">
                              <h3>Exhibitions &amp; Galleries Fund</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tortor, dictum in gravida nec, aliquet non lorem. Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt elementum.</p>
                                <a href="#" class="btn btn-primary donate-paypal" data-toggle="modal" data-target="#PaymentModal">Donate Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- List Item -->
                    <div class="list-item">
                      <div class="row">
                          <div class="col-md-4 col-sm-4">
                              <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" class="img-thumbnail" alt="">
                            </div>
                            <div class="col-md-8 col-sm-8">
                              <h3>Adopt an Artifact</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tortor, dictum in gravida nec, aliquet non lorem. Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt elementum.</p>
                                <a href="#" class="btn btn-primary donate-paypal" data-toggle="modal" data-target="#PaymentModal">Donate Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- List Item -->
                    <div class="list-item">
                      <div class="row">
                          <div class="col-md-4 col-sm-4">
                              <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" class="img-thumbnail" alt="">
                            </div>
                            <div class="col-md-8 col-sm-8">
                              <h3>Sponsor an Internship Group</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tortor, dictum in gravida nec, aliquet non lorem. Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt elementum.</p>
                                <a href="#" class="btn btn-primary donate-paypal" data-toggle="modal" data-target="#PaymentModal">Donate Now</a>
                            </div>
                        </div>
                    </div>

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

                  <div class="widget sidebar-widget widget_next_exhibitions box-style1">
                      <h3 class="widget-title">Next Exhibitions</h3>
                        <ul>
                            <li class="venue1">
                                <span class="exhibition-time">04:00 pm</span>
                                <div class="exhibition-teaser">
                                    <a href="#">A new version: Modernist Photography</a>
                                    <div class="meta-data"><i class="fa fa-map-marker"></i> <a href="#">Accrue Homestead</a></div>
                                </div>
                            </li>
                            <li class="venue2">
                                <span class="exhibition-time">05:30 pm</span>
                                <div class="exhibition-teaser">
                                    <a href="#">Swedish photography from Chris until today</a>  <span class="label label-danger"><i class="fa fa-lock"></i> All booked</span>
                                    <div class="meta-data"><i class="fa fa-map-marker"></i> <a href="#">Mehar Mansion</a></div>
                                </div>
                            </li>
                            <li class="venue1">
                                <span class="exhibition-time">07:00 pm</span>
                                <div class="exhibition-teaser">
                                    <a href="#">Abstract expressionist New York</a>
                                    <div class="meta-data"><i class="fa fa-map-marker"></i> <a href="#">Accrue Homestead</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Body Content -->

<?php get_footer(); ?>