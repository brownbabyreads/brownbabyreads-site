<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package brownbabyreads
 */

global $_bbr_admin;
?>
<!-- Start site footer -->
<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php
            if($_bbr_admin['opt-main-logo']){
              echo '<img src="'.$_bbr_admin['opt-footer-logo']['url'].'" alt="'.get_bloginfo('name').'">';
            }
          ?>
        </a>
      </div>

      <div class="col-md-5 col-sm-6">
        <div class="widget footer-widget">
          <?php echo '<h4 class="widget-title">'.$_bbr_admin['opt-footer-about-text'].'</h4>'; ?>
          <?php echo '<p>'.$_bbr_admin['opt-footer-about-content'].'</p>'; ?>
          <?php echo '<p><a class="btn btn-primary" href="'.$_bbr_admin['opt-footer-about-donate-url'].'">'.$_bbr_admin['opt-footer-about-donate-text'].'</a></p>'; ?>
        </div>
      </div>
      <div class="col-md-2 col-sm-6">
        <div class="widget footer-widget">
          <h4 class="widget-title">Resources</h4>
          <?php
            wp_nav_menu([
              'theme_location' => 'footer_resources',
              'menu_id' => 'footer-menu',
              'container' => false
            ]);
          ?>
        </div>
      </div>
      <div class="col-md-2 col-sm-6">
        <div class="widget footer-widget">
          <h4 class="widget-title">Participate</h4>
          <?php
            wp_nav_menu([
              'theme_location' => 'footer_participate',
              'menu_id' => 'footer-menu',
              'container' => false
            ]);
          ?>
        </div>
      </div>
    </div>
  </div>
</footer>
    <footer class="site-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9 copyrights-left">
                  <?php
                    if($_bbr_admin['opt-footer-copyright-text']){
                      echo '<p>'.$_bbr_admin['opt-footer-copyright-text'].'</p>';
                    }
                  ?>
                  <?php
                    wp_nav_menu([
                      'theme_location' => 'footer_contact',
                      'menu_id' => 'footer-menu',
                      'container' => false
                    ]);
                  ?>
                </div>
                <div class="col-md-3 col-sm-3 copyrights-right">
                    <ul class="pull-right social-icons-colored">
                        <?php
                            if($top_networks = $_bbr_admin['opt-topnav-social-icons']){
                                if ( in_array("twitter", $top_networks) && !empty($_bbr_admin['topnav-twitter-url']) ) {
                                    echo '<li class="twitter"><a href="'.$_bbr_admin['topnav-twitter-url'].'" title="Twitter"><i class="fa fa-twitter"></i></a></li>';
                                }
                                if ( in_array("facebook", $top_networks) && !empty($_bbr_admin['topnav-facebook-url']) ) {
                                    echo '<li class="facebook"><a href="'.$_bbr_admin['topnav-facebook-url'].'" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>';
                                }
                                if ( in_array("instagram", $top_networks) && !empty($_bbr_admin['topnav-instagram-url']) ) {
                                    echo '<li class="instagram"><a href="'.$_bbr_admin['topnav-instagram-url'].'" title="Instagram"><i class="fa fa-instagram"></i></a></li>';
                                }
                                if ( in_array("flickr", $top_networks) && !empty($_bbr_admin['topnav-flickr-url']) ) {
                                    echo '<li class="flickr"><a href="'.$_bbr_admin['topnav-flickr-url'].'" title="Flickr"><i class="fa fa-flickr"></i></a></li>';
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End site footer -->
    <a id="back-to-top"><i class="fa fa-chevron-up"></i></a>
</div><!-- .body -->
<?php wp_footer(); ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.tp-banner').show().revolution({
            dottedOverlay:"none",
            delay:9000,
            startwidth:1100,
            startheight:500,
            hideThumbs:200,

            thumbWidth:100,
            thumbHeight:50,
            thumbAmount:5,

            navigationType:"none",
            navigationArrows:"solo",
            navigationStyle:"preview2",

            touchenabled:"on",
            onHoverStop:"on",

            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,

            keyboardNavigation:"on",

            navigationHAlign:"center",
            navigationVAlign:"bottom",
            navigationHOffset:0,
            navigationVOffset:20,

            soloArrowLeftHalign:"left",
            soloArrowLeftValign:"center",
            soloArrowLeftHOffset:20,
            soloArrowLeftVOffset:0,

            soloArrowRightHalign:"right",
            soloArrowRightValign:"center",
            soloArrowRightHOffset:20,
            soloArrowRightVOffset:0,

            shadow:0,
            fullWidth:"on",
            fullScreen:"off",

            spinner:"spinner0",

            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,

            shuffle:"off",

            autoHeight:"off",
            forceFullWidth:"off",



            hideThumbsOnMobile:"off",
            hideNavDelayOnMobile:1500,
            hideBulletsOnMobile:"off",
            hideArrowsOnMobile:"off",
            hideThumbsUnderResolution:0,

            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            startWithSlide:0
        });
    });
</script>
<?php
  // echo '<pre>';
  // print_r ($_bbr_admin);
  // echo '</pre>';
?>
<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 ga('create', 'UA-49907447-1', 'auto');
 ga('send', 'pageview');

</script>
</body>
</html>
