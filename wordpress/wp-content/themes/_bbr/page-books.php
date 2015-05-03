<?php
/*
Template Name: Books list
*/

get_header();
?>

<div id="books" class="content full"></div>

<script src="<?= get_template_directory_uri() ?>/js/react-0.13.2.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/books.js"></script>

<?php get_footer(); ?>
