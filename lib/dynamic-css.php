<?php
/**
 * Output dynamic CSS at bottom of HEAD
 */

add_action('wp_head','pa_output_css');

function pa_output_css() {

    $output = '';

    $output .= '.uk-navbar-nav > li > a, .uk-navbar-dropdown-nav > li > a, .uk-navbar-nav > li > a.uk-open, .uk-navbar-dropdown-nav > li.uk-active > a, .uk-navbar-toggle, .uk-navbar-item a { color: ' . sanitize_text_field( get_option( 'options_pakb_origin_secondary' ) ) . '; }';
    $output .= '.uk-navbar-nav > li > a:hover, .uk-navbar-dropdown-nav > li > a:hover, .uk-navbar-nav > li.uk-active > a, .uk-navbar-dropdown-nav > li.uk-active > a, .uk-navbar-toggle:hover, .uk-navbar-item a:hover { color: ' . get_option( 'options_pakb_origin_primary' ) . '; }';

    // $output .= '.uk-navbar-container:not(.uk-navbar-transparent), .uk-navbar-dropdown { background: ' . get_option( 'options_pakb_navbar_bg' ) . '; }';

    // if ( get_option( 'options_pakb_navbar_border' ) ) {
    //   $output .= '.uk-navbar-container .uk-navbar { border-bottom: solid 1px ' . get_option( 'options_pakb_navbar_border' ) . '; }';
    // }

    // $output .= '.uk-navbar-nav > li > a, .uk-navbar-item, .uk-navbar-toggle { height: ' . get_option( 'options_pakb_navbar_height' ) . 'px; }';

    // $output .= '.footer { background: ' . get_option( 'options_pakb_footer_bg' ) . '; }';

    // $output .= '.footer, .footer .pakb-primary-color, .footer .pakb-primary-color a, .footer .pakb-primary-color a:hover, .footer a, .footer a:hover, .footer h4, .uk-subnav > * > :first-child, .uk-subnav > .uk-active > a { color: ' . get_option( 'options_pakb_footer_color' ) . '; }';

    // $output .= '.footer hr { border-top: solid 1px ' . get_option( 'options_pakb_footer_border' ) . '; }';

    // $hero_image = get_post_meta( get_the_ID(), 'pakb_hero_image', true );
    // if ( $hero_image ) {
    //   $output .= '.hero { background-image: url(' . wp_get_attachment_url( $hero_image ) . '); }';
    //   $output .= '.hero .uk-overlay { background: rgba(34,34,34,0.6); }';
    // }

    // $hero_bg = get_post_meta( get_the_ID(), 'pakb_hero_bg', true );
    // $output .= '.hero { background-color: ' . $hero_bg . '; }';

    $hero_text = get_post_meta( get_the_ID(), 'pakb_hero_text', true );
    $output .= '.hero .uk-article-title { color: ' . $hero_text . '; }';

    if( class_exists( 'PAKB_Helper' ) ) {

      // Accent color
  		$accent_color = sanitize_text_field( get_option( 'options_pakb_accent_color' ) );
  		if ( $accent_color ) {
  			$output .= 'a, a:hover { color: ' . $accent_color . " }\n";
  		}

          // Primary color
  		$primary_color = sanitize_text_field( get_option( 'options_pakb_primary_color' ) );
  		if ( $primary_color ) {
  			//$output .= '.pakb-primary-color, .pakb-primary-color a, .pakb-primary-color a:hover { color: ' . $primary_color . " }\n";
  		}

          // Secondary color
  		$secondary_color = sanitize_text_field( get_option( 'options_pakb_secondary_color' ) );
  		if ( $secondary_color ) {
  			//$output .= '.pakb-secondary-color, .pakb-secondary-color a, .pakb-secondary-color a:hover, .uk-breadcrumb :last-child * { color: ' . $secondary_color . " }\n";
  		}

    }

    if ( ! empty( $output ) ) {
      echo '<style type="text/css" id="knowledgebase-css">' . $output . '</style>';
    }

}
