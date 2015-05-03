<?php
/*
Template Name: Books list
*/

get_header();
?>

<div id="books" class="content full"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.8.0/lodash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/react-0.13.2.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/ReactRouter.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/books.js"></script>

<?php get_footer(); ?>
