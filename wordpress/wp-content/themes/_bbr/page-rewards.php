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
    <div class="row lgray-bg">
      <div class="container">
        <?php the_content(); ?>
      </div>
    </div>
    <div class="spacer-50"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <!-- TODO: wire up this up to the adminx0rbeamz -->
          <img src="http://placehold.it/500x300&amp;text=Kroger Logo" />
          <h3>Kroger</h3>
          <p>After you create your online account…</p>
          <a href="#">Detailed Instructions</a>
        </div>
        <div class="col-md-6">
          <!-- TODO: wire up this up to the adminx0rbeamz -->
          <img src="http://placehold.it/500x300&amp;text=Food4Less Logo" />
          <h3>Food4Less</h3>
          <p>After you create your online account…</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Body Content -->

<?php get_footer(); ?>