<?php
/*
Template Name: Sign up
*/

get_header();

the_post();
?>

<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <h4 class="short accent-color">Join Vestige</h4>
          <h2>Members help sustain this world-class institution while enjoying many outstanding benefits throughout the year.</h2>
          <p><strong>All Members receive:</strong></p>
          <ul class="angles">
            <li>Free admission to the Main Building and The Cloisters museum and gardens</li>
            <li>Members-only emails with advance notice of events, programs, and offers</li>
            <li>Access to the exclusive Members Dining Room</li>
            <li>Discounts in The Shop Pleu (plus seasonal Double Discounts), and on Audio Guides and Museum parking</li>
            <li>Eligibility to rent elegant museum spaces for private events</li>
            <li>Special benefits and features in the Members-only section of the Museum's website</li>
          </ul>
          <hr class="fw">
          <div class="spacer-30"></div>

          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Body Content -->

<?php get_footer(); ?>
