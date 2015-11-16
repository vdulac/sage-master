<?php

// NameSpaces
use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->

    <h1 class="alert-blue">base-template-home.php - wrapper</h1>

    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap" role="document">
      <div class="content row">
        <main class="main">

        <button type="button" class="btn btn-danger btn-lg">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
        </button>
        <br><br>
        <div class="progress" style="width: 80%">
            <div class="progress-bar" style="width: 40%;"></div>
            <div class="progress-bar progress-bar-warning" style="width: 10%;"></div>
            <div class="progress-bar progress-bar-danger" style="width: 10%;"></div>
            <div class="progress-bar progress-bar-success" style="width: 10%;"></div>
            <div class="progress-bar progress-bar-info" style="width: 10%;"></div>
          </div>
        <br><br>
        
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>