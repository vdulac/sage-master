<?php
	// Markup included from page.php
?>

<h1 class="alert-blue">templates/content-page.php</h1>

<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
