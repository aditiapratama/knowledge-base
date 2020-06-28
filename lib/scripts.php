<?php
/**
 * Scripts and stylesheets
 */
//global $knowledgebase;

function pa_scripts() {
  /**
   * The build task in Grunt renames production assets with a hash
   * Read the asset names from assets-manifest.json
   */
  // global $knowledgebase;
  //
  // $assets = array(
  //   'css'       => '/assets/css/main.css',
  //   'print'  => '/assets/css/print.css',
  //   'js'        => '/assets/js/scripts.js',
  //   'modernizr' => '/assets/vendor/modernizr/modernizr.js',
  //   'fitvids' => '/assets/vendor/fitvids/jquery.fitvids.js',
  // );

  //wp_enqueue_style('roots_css', get_template_directory_uri() . $assets['css'], false, null);
  //if (is_single() && $knowledgebase['print']) {
    //wp_enqueue_style('print_css', get_template_directory_uri() . $assets['print'], false, null, 'print');
  //}
  // if (is_single() && comments_open() && get_option('thread_comments')) {
  //   wp_enqueue_script('comment-reply');
  // }

  //wp_enqueue_script('modernizr', get_template_directory_uri() . $assets['modernizr'], array(), null, true);
  //wp_enqueue_script('jquery');
  //wp_enqueue_script('roots_js', get_template_directory_uri() . $assets['js'], array(), null, true);
  //wp_enqueue_script('fitvids', get_template_directory_uri() . $assets['fitvids'], array(), null, true);
}
add_action('wp_enqueue_scripts', 'pa_scripts', 100);

/**
 * Admin scripts
 */
// function pa_admin_scripts() {
//   wp_enqueue_style('admin_css', get_template_directory_uri() . '/assets/css/admin.css', false, null);
//   wp_enqueue_script( 'admin_js', get_template_directory_uri() . '/assets/js/admin.js', array( 'jquery' ));
// }
// add_action( 'admin_enqueue_scripts', 'pa_admin_scripts' );
