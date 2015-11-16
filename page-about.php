<h1 class="alert-blue">Uses page-about.php</h1>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php if (get_field('custom_field_1')): ?>

	<h1 class="alert-blue">Custom Field 1 set to TRUE!</h1>

	<?php
	$image = get_field('custom_field_2');
	//var_dump($image);
	if( !empty($image) ): ?>
		<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>">
	<?php endif; ?>

	<?php the_field('custom_field_3'); ?>
	
	<?php 
	$location = get_field('custom_field_3');
	//var_dump($location);
	if( !empty($location) ): ?>
		<div class="acf-map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
		</div>
	<?php endif; ?>


	<p><?php the_field('custom_field_4'); ?></p>

<?php endif; ?>
