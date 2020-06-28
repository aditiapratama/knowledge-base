<?php
/**
 * Clean up the_excerpt()
 */
function pa_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'knowledge-base') . '</a>';
}
add_filter('excerpt_more', 'pa_excerpt_more');

/**
 * Custom excerpt lenghth
 */
function pa_excerpt($excerpt_length = 55, $echo = true) {

  $text = '';
  global $post;
  $text = ($post->post_excerpt) ? $post->post_excerpt : get_the_content('');
  $text = strip_shortcodes( $text );
  $text = apply_filters('the_content', $text);
  $text = str_replace(']]>', ']]&gt;', $text);
  $text = strip_tags($text);

  $excerpt_more = ' ' . '';
  $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
  if ( count($words) > $excerpt_length ) {
    array_pop($words);
    $text = implode(' ', $words);
    $text = $text . $excerpt_more;
  } else {
    $text = implode(' ', $words);
  }
  if($echo)
    echo apply_filters('the_content', $text);
  else
    return $text;
}

function get_pa_excerpt($excerpt_length = 55, $echo = false) {
 return pa_excerpt($excerpt_length, $id, $echo);
}

/**
 * Manage output of wp_title()
 */
function pa_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'pa_wp_title', 10);

/**
 * Redirects search results from /?s=query to /search/query/, converts %20 to +
 */
function pa_nice_search_redirect() {
  global $wp_rewrite;
  if (!isset($wp_rewrite) || !is_object($wp_rewrite) || !$wp_rewrite->using_permalinks()) {
    return;
  }
  $search_base = $wp_rewrite->search_base;
  if (is_search() && !is_admin() && strpos($_SERVER['REQUEST_URI'], "/{$search_base}/") === false) {
    wp_redirect(home_url("/{$search_base}/" . urlencode(get_query_var('s'))));
    exit();
  }
}
add_action('template_redirect', 'pa_nice_search_redirect');

/**
 * Hide sidebar on one column layout
 */
add_filter('roots/display_sidebar', 'pa_sidebars');

function pa_sidebars($sidebar) {
  $page_layout = get_post_meta( get_the_ID(), 'pakb_sidebar', true );
  $layout = !is_null( get_field( 'pakb_sidebar', 'option' ) ) ? get_field( 'pakb_sidebar', 'option' ) : 1;

  if ( isset( $page_layout ) && $page_layout == 1 ) {
    return false;
  } else if ( isset( $page_layout ) && ( $page_layout == 2 || $page_layout == 3 ) ) {
    return true;
  } else if ( $layout == 1 ){
    return false;
  }
  return $sidebar;
}

/**
 * Add custom favicon to head
 */
function pa_add_favicon(){
  ?>
  <!-- Custom Favicons -->
  <link rel="shortcut icon" href="<?php echo wp_get_attachment_url( get_option('options_pakb_favicon') ); ?>"/>
  <?php }
add_action('wp_head','pa_add_favicon');

/**
 * Pagination
 */
function page_navi($before = '', $after = '') {
  global $wpdb, $wp_query;
  $request = $wp_query->request;
  $posts_per_page = intval(get_query_var('posts_per_page'));
  $paged = intval(get_query_var('paged'));
  $numposts = $wp_query->found_posts;
  $max_page = $wp_query->max_num_pages;
  if ( $numposts <= $posts_per_page ) { return; }
  if(empty($paged) || $paged == 0) {
    $paged = 1;
  }
  $pages_to_show = 7;
  $pages_to_show_minus_1 = $pages_to_show-1;
  $half_page_start = floor($pages_to_show_minus_1/2);
  $half_page_end = ceil($pages_to_show_minus_1/2);
  $start_page = $paged - $half_page_start;
  if($start_page <= 0) {
    $start_page = 1;
  }
  $end_page = $paged + $half_page_end;
  if(($end_page - $start_page) != $pages_to_show_minus_1) {
    $end_page = $start_page + $pages_to_show_minus_1;
  }
  if($end_page > $max_page) {
    $start_page = $max_page - $pages_to_show_minus_1;
    $end_page = $max_page;
  }
  if($start_page <= 0) {
    $start_page = 1;
  }

  echo $before.'<ul class="uk-pagination uk-flex-center uk-margin-large-top">'."";

  $prevposts = get_previous_posts_link('&larr;');
  if($prevposts) { echo '<li>' . $prevposts  . '</li>'; }

  for($i = $start_page; $i  <= $end_page; $i++) {
    if($i == $paged) {
      echo '<li class="active"><a href="#">'.$i.'</a></li>';
    } else {
      echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
    }
  }
  echo '<li class="">';
  next_posts_link('&rarr;');
  echo '</li>';
  echo '</ul>'.$after;
}

/**
 * Comments
 */
function pa_comments() {
  comment_form();
}

/**
 * Return an array of the social links the user has entered.
 * This is simply a helper function for other functions.
 */
function pa_social_links() {
  // An array of the available networks
  $networks   = array();

  // Started on the new stuff, not done yet.
  $networks[] = array( 'url' => get_option('options_pakb_social_dribbble'),     'icon' => 'dribbble',   'fullname' => 'Dribbble' );
  $networks[] = array( 'url' => get_option('options_pakb_social_facebook'),     'icon' => 'facebook',   'fullname' => 'Facebook' );
  $networks[] = array( 'url' => get_option('options_pakb_social_github'),       'icon' => 'github',     'fullname' => 'GitHub' );
  $networks[] = array( 'url' => get_option('options_pakb_social_instagram'),    'icon' => 'instagram',  'fullname' => 'Instagram' );
  $networks[] = array( 'url' => get_option('options_pakb_social_linkedin'),     'icon' => 'linkedin',   'fullname' => 'LinkedIn' );
  $networks[] = array( 'url' => get_option('options_pakb_social_pinterest'),    'icon' => 'pinterest',  'fullname' => 'Pinterest' );
  $networks[] = array( 'url' => get_option('options_pakb_social_reddit'),       'icon' => 'reddit',     'fullname' => 'Reddit' );
  $networks[] = array( 'url' => get_option('options_pakb_social_rss'),          'icon' => 'rss',        'fullname' => 'RSS' );
  $networks[] = array( 'url' => get_option('options_pakb_social_soundcloud'),   'icon' => 'soundcloud', 'fullname' => 'SoundCloud' );
  $networks[] = array( 'url' => get_option('options_pakb_social_twitter'),      'icon' => 'twitter',    'fullname' => 'Twitter' );
  $networks[] = array( 'url' => get_option('options_pakb_social_vimeo'),        'icon' => 'vimeo',      'fullname' => 'Vimeo' );
  $networks[] = array( 'url' => get_option('options_pakb_social_youtube'),      'icon' => 'youtube',    'fullname' => 'YouTube' );

  return $networks;
}

function get_social_bar() {
  $networks = pa_social_links();

  $html = '';
  if ( ! is_null( $networks ) && count( $networks ) > 0 ) {
    $html .= '<div data-uk-grid class="uk-child-width-auto uk-grid-small social-icons">';

    foreach ( $networks as $network ) {
      // Check if the social network URL has been defined
      if ( isset( $network['url'] ) && ! empty( $network['url'] ) && strlen( $network['url'] ) > 7 ) {
        $html .= '<a class="uk-icon-link uk-icon" href="' . $network['url'] . '" title="' . $network['fullname'] . '" target="_blank">' . file_get_contents( get_template_directory_uri() . '/assets/icons/' . $network['icon'] . '.svg' ) . '</a>';
      }
    }

    $html .= '</div>';
    return $html;
  }
}
