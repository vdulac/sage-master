<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  //add_theme_support('soil-relative-urls');
  //add_theme_support('soil-google-analytics', 'UA-12345-Y');
  add_theme_support('soil-js-to-footer');
  add_theme_support('soil-disable-trackbacks');
  add_theme_support('soil-disable-asset-versioning');

  show_admin_bar( false );

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Custom stylesheet for visual editor -> TinyMCE
  add_editor_style(Assets\asset_path('styles/main.css'));

  //load_theme_textdomain( 'sage', get_template_directory(). '/lang' );
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');



// function custom_revisions_number($num, $post) {
//     $num = 1;
//     return $num; 
// }
// add_filter('wp_revisions_to_keep', 'custom_revisions_number', 10, 2);

/**
 * Show WPML flag + language in Primary Menu
 */
// function new_nav_menu_items($items,$args) {
//   if (function_exists('icl_get_languages')) {
//     $languages = icl_get_languages('skip_missing=0');
//     if(1 < count($languages)) {
//       foreach($languages as $l) {
//         if(!$l['active']) {
//           $items = $items.'<li class="menu-item"><a href="'.$l['url'].'"><img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" /> '.$l['native_name'].'</a></li>';
//         }
//       }
//     }
//   }
//   return $items;
// }
// add_filter( 'wp_nav_menu_items', __NAMESPACE__ . '\\new_nav_menu_items', 10, 2 );





/**
 * Theme assets
 */
function assets() {
  // wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  if (is_page('gmaps')) {
    wp_enqueue_script('alert/js', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', ['jquery'], null, true);
  }

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);

  // if (is_page('gmaps')) {
  //   wp_enqueue_script('alert/js', Assets\asset_path('scripts/vendor/alert.js'), ['jquery'], null, true);
  // }
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);


/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page_template('template-custom.php'),
    is_page('about')
  ]);

  return apply_filters('sage/display_sidebar', $display);
}


/**
 * Determine which pages should display the sidebar EVEN IF blocked from display_sidebar()
 */
function sage_sidebar_on_special_page($sidebar) {
  if (is_page('special-page')) {
    return true;
  }
  return $sidebar;
}
add_filter('sage/display_sidebar', __NAMESPACE__ . '\\sage_sidebar_on_special_page');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'description'   => 'These will be shown in the footer.',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');




