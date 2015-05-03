<?php
/*
Template Name: Single Book
*/

get_header();

the_post(); ?>

<!-- Start Body Content -->
<div class="main" role="main">
  <div id="content" class="content full single-post">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <img src="http://placehold.it/300x400&amp;text=Book Cover" />
          <a href="#">Google Book Preview</a>
        </div>
        <div class="col-md-6">
          <h1 class="post-title">Joe Louis: America’s Fighter</h1>
          <div class="post-content">
            <strong>by David A. Adler, Terry Widener (Illustrator)</strong>
            <h3>Overview</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
          </div>
          <div class="spacer-20"></div>
          <table class="table table-striped">
            <tbody>
              <tr>
                <td><strong>ISBN:</strong></td>
                <td>32</td>
              </tr>
              <tr>
                <td><strong>Biography Person:</strong></td>
                <td>Joe Louis</td>
              </tr>
              <tr>
                <td><strong>Page Count:</strong></td>
                <td>32</td>
              </tr>
              <tr>
                <td><strong>Age Group:</strong></td>
                <td>6-10</td>
              </tr>
              <tr>
                <td><strong>Reading Level:</strong></td>
                <td>C</td>
              </tr>
              <tr>
                <td><strong>Series:</strong></td>
                <td>N/A</td>
              </tr>
              <tr>
                <td><strong>Publish Date:</strong></td>
                <td>1998</td>
              </tr>
              <tr>
                <td><strong>Extra:</strong></td>
                <td>?</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-3 sidebar right-sidebar">
          <div class="widget sidebar-widget widget_next_exhibitions box-style1">
            <button type="submit" class="btn btn-primary btn-lg">$ Purchase Book</button>
            <a href="#">Download PDF</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Body Content -->

<?php get_footer(); ?>