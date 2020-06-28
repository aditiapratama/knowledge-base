<?php
/**
 * PressApps includes
 *
 * The $pa_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */

/**
 * Core files
 */
$pa_includes = array(
  'lib/metaboxes.php',              // Metaboxes
  'lib/utils.php',                  // Utility functions
  'lib/init.php',                   // Initial theme setup and constants
  'lib/widgets.php',                // Widgets
  'lib/wrapper.php',                // Theme wrapper class
  'lib/sidebar.php',                // Sidebar class
  'lib/config.php',                 // Configuration
  'lib/titles.php',                 // Page titles
  'lib/nav.php',                    // Custom nav modifications
  'lib/scripts.php',                // Scripts and stylesheets
  'lib/extras.php',                 // Custom functions
  'lib/breadcrumbs.php',            // Breadcrumbs
  'lib/dynamic-css.php',            // Custom CSS
);

foreach ($pa_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'knowledge-base'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

class Pressapps_Knowledge_Base_Theme {
 var $x = 0;
}
$pressapps_knowledge_base_theme = new Pressapps_Knowledge_Base_Theme;