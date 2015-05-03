<?php
/*
Template Name: Books list
*/

get_header();
?>

<div id="content" class="content full">
  <div class="container">
    <div class="row">
      <div class="col-md-3 sidebar right-sidebar">
        <div class="widget sidebar-widget box-style1">
          <h3 class="widget-title">Top categories</h3>
          <ul class="top-categories-list">

          </ul>
        </div>

        <div class="widget sidebar-widget box-style1">
          <h3 class="widget-title">Categories</h3>
          <ul class="categories-list">

          </ul>
        </div>
      </div>

      <div class="col-md-9">
        <ul class="sort-destination isotope exhibitions-grid" data-sort-id="grid">
          <li class="col-md-4 col-sm-4 grid-item format-standard accrue-homestead">
            <a href="exhibition-single.html" class="media-box grid-featured-img"><img src="http://placehold.it/300x300&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
            <div class="grid-item-content">
              <h3><a href="books-single.html">A new version: Modernist Photography</a></h3>
              <div class="meta-data grid-item-meta"><i class="fa fa-clock-o"></i> Availble at Overload</div>
              <div class="post-actions">
                <a href="books-single.html" class="btn btn-default">Learn more</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-9 col-sm-offset-3">
        <ul class="pagination">

        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End Body Content -->

<?php get_footer(); ?>
