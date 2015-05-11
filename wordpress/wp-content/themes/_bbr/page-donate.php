<?php
/*
Template Name: Donate Page
*/

get_header();

while (have_posts() ) : the_post();
?>

<!-- Start Body Content -->
<div class="main" role="main">
  <div class="content full lgray-bg">
    <div class="container">
      <div class="row text-align-center">
        <div class="col-md-6 col-md-offset-3">
          <h2>We appreciate you!</h2>
          <p>Our financial support from foundations, organizations and individuals allows Brown Bay Reads to maintain it’s website and expand programming.</p>
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_donations">
            <input type="hidden" name="business" value="paypal@brownbabyreads.com">
            <input type="hidden" name="lc" value="US">
            <input type="hidden" name="item_name" value="Brown Baby Reads">
            <input type="hidden" name="no_note" value="0">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="bn" value="PP-DonationsBF:btn-donate.svg:NonHostedGuest">
            <input type="submit" name="submit" class="btn btn-success" value="Donate">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
        </div>
      </div>
    </div>
  </div>

  <div class="content full">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Body Content -->

<?php endwhile; ?>
<?php get_footer(); ?>