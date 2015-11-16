<h1 class="alert-blue">Uses page-about.php</h1>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<h1 class="alert-blue">page-gmaps.php</h1>

<!-- Single Marker -->
<?php 
$location = get_field('google_maps');

if( !empty($location) ):
?>
<div class="acf-map">
	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
		<h4>Maison Marieville</h4>
		<p class="address">31 Bruno, Marieville, QC, J3M 1P2</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	</div>
</div>
<?php endif; ?>

<!-- Multiple Markers with info -->
<?php if( have_rows('locations') ): ?>
	<div class="acf-map">
		<?php while ( have_rows('locations') ) : the_row(); 

			$location = get_sub_field('location');

			?>
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
				<h4><?php the_sub_field('title'); ?></h4>
				<p class="address"><?php echo $location['address']; ?></p>
				<p><?php the_sub_field('description'); ?></p>
			</div>
	<?php endwhile; ?>
	</div>
<?php endif; ?>