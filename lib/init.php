<?php
/**
 * Theme initial setup and constants
 */
function pa_theme_setup() {
  // Make theme available for translation
  load_theme_textdomain('knowledge-base', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'knowledge-base'),
    'offcanvas_navigation' => __('Mobile Navigation', 'knowledge-base'),
    // 'footer_navigation' => __('Footer Navigation', 'knowledge-base'),
  ));

  // Add post thumbnails
  add_theme_support('post-thumbnails');

  // Add post formats
  add_theme_support('post-formats', array('image', 'video', 'audio'));

  // Add HTML5 markup for captions
  add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));
  add_theme_support( 'automatic-feed-links' );

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');

  // When the theme is activated, all of the active widgets are deactived.
  if ( ! get_option( 'pa_cleared_widgets' ) ) {
    update_option( 'sidebars_widgets', array() );
    update_option( 'pa_cleared_widgets', true );
  }

}
add_action('after_setup_theme', 'pa_theme_setup');

/**
 * Register sidebars
 */
function pa_sidebars_init() {
  register_sidebar(array(
    'name'          => __('Primary', 'knowledge-base'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<div class="widget %1$s %2$s uk-margin-large-bottom">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer', 'knowledge-base'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<div><div class="widget %1$s %2$s">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));

}
add_action('widgets_init', 'pa_sidebars_init');

add_filter( 'body_class','body_classes' );
function body_classes( $classes ) {

    $classes[] = 'theme-knowledgebase';

    return $classes;

}
