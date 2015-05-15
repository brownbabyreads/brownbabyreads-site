<?php
/*
Template Name: Single Book
*/

get_header(); ?>

<div class="container">
  <div class="spacer-30"></div>
  <div class="row">
    <div class="col-md-3">
      <!-- TODO: left this in here, but we can get rid of it if everything else is working -->
      <button class="btn btn-default">Back to Browse Books</button>
      <div class="spacer-20"></div>
      <img src="http://overnight-website.s3.amazonaws.com/wp-uploads/CelestesHarlemRenaissance.jpg" />
      <div class="spacer-20"></div>
      <!-- TODO: only show if google book preview link exists -->
      <p><a href="#">Google Book Preview</a></p>
    </div>
    <div class="col-md-6">
      <h1 class="post-title">book.title</h1>
      <div class="post-content">
        <strong>by book.author, Terry Widener (Illustrator)</strong>
        <h3>Overview</h3>
        <p>book.description</p>
      </div>
      <div class="spacer-20"></div>
      <table class="table table-striped">
        <tbody>
          <!-- TODO: wire each field up, not sure if that’s it -->
          <tr>
            <td><strong>ISBN:</strong></td>
            <td>book.isbn || 'N/A'</td>
          </tr>
          <tr>
            <td><strong>Biography Person:</strong></td>
            <td>book.biography_person || 'N/A'</td>
          </tr>
          <tr>
            <td><strong>Page Count:</strong></td>
            <td>book.pages || 'N/A'</td>
          </tr>
          <tr>
            <td><strong>Age Group:</strong></td>
            <td>book.age_group || 'N/A'</td>
          </tr>
          <tr>
            <td><strong>Reading Level:</strong></td>
            <td>book.guided_reading_level || 'N/A'</td>
          </tr>
          <tr>
            <td><strong>Series:</strong></td>
            <td>book.series || 'N/A'</td>
          </tr>
          <tr>
            <td><strong>Publish Date:</strong></td>
            <td>book.publish_date || 'N/A'</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-3 sidebar right-sidebar">
      <!-- TODO: only show if store link exists -->
      <div class="widget sidebar-widget widget_next_exhibitions box-style1">
        <a class="btn btn-primary btn-lg" href={store_link}>$ Purchase Book</a>
      </div>
    </div>
  </div>
  <div class="spacer-30"></div>
</div>

<?php get_footer(); ?>
