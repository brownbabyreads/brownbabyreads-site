<?php
/*
Template Name: Donate Page
*/

get_header();

while (have_posts() ) : the_post();
?>

<!-- Start Body Content -->
<div class="main" role="main">
  <div id="content" class="content full  lgray-bg">
    <div class="container">
      <div class="row text-align-center">
        <div class="col-md-6 col-md-offset-3">
          <h2>We appreciate you!</h2>
          <p>Our financial support from foundations, organizations and individuals allows Brown Bay Reads to maintain it’s website and expand programming.</p>
          <a href="#" class="btn btn-primary btn-lg">Donate Now</a>
        </div>
      </div>
    </div>
  </div>

  <div id="content" class="content full">
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