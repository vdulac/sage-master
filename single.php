<?php 
	// single.php => Single post page
 ?>

<h1 class="alert-blue">Uses single.php</h1>

<?php get_template_part('templates/content-single', get_post_type()); ?>
