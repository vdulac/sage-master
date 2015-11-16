<?php
/**
 * Template Name: Home Template
 */
?>

<h1 class="alert-blue">Dashboard > Home Template => template-home.php</h1>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>