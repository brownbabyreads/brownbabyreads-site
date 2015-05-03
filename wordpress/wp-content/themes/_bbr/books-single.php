<?php
/*
Template Name: Single Book
*/

get_header();

the_post(); ?>

<!-- Start Body Content -->
<div class="main" role="main">
  <div id="books" class="content full single-post">

  </div>
</div>
<!-- End Body Content -->

<script src="<?= get_template_directory_uri() ?>/js/react-0.13.2.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/books.js"></script>

<?php get_footer(); ?>