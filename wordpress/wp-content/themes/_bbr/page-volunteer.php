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
        <div class="col-md-9">
          <?php the_content(); ?>
          <div class="row">
            <div class="col-md-4">
              <div class="icon-box">
                <div class="ibox-icon">
                  <i class="fa fa-calendar-o"></i>
                </div>
                <h3>Volunteer</h3>
                <p>Contribute your time to help review books, tutor students or volunteer at Brown Baby Reads events. Get started by registering as a volunteer.</p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="icon-box">
                <div class="ibox-icon">
                  <i class="fa fa-paint-brush"></i>
                </div>
                <h3>Earn Rewards</h3>
                <p>Earn rewards and support African-American students every time you go grocery shopping or fill up at the gas station. Apply for a free rewards card today.</p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="icon-box">
                <div class="ibox-icon">
                  <i class="fa fa-image"></i>
                </div>
                <h3>Donate</h3>
                <p>Individual, monthly &amp; corporate donations go directly towards promoting literacy among African-American children and youth. Contribute today.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-9">
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