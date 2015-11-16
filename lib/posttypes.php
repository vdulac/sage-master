<?php

// To update the post_type, simply edit the array below (no need to unregister).

function slides_cpt() {
  register_post_type( 'slides', // wordpress/swm_slider/slide-1/
    array(
      'labels' => array(
        'name' => __( 'Slides' ),
        'singular_name' => __( 'Slide' )
      ),
      'description' => 'Slides for the Top Slider.',
      'public' => true,
      'has_archive' => false,
      'exclude_from_search' => true,
      'show_in_nav_menus' => false,
      'show_in_menu' => true,
      'menu_position' => 20,
      'menu_icon'   => 'dashicons-format-image',
      'supports' => array('title', 'custom-fields')
    )
  );
}
add_action( 'init', 'slides_cpt' );


// Only unregister the post_type if you want to remove it. 
// To update the post_type, simply edit the create_post_type function above.

// if ( ! function_exists( 'unregister_post_type' ) ) :
// function unregister_post_type() {
//     global $wp_post_types;
//     if ( isset( $wp_post_types[ 'Slides' ] ) ) {
//         unset( $wp_post_types[ 'Slides' ] );
//         return true;
//     }
//     return false;
// }
// endif;

// add_action('init', 'unregister_post_type');