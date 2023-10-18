<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Shortcode Support Widget
 * Enable Shortcode Support in Widgets
 */
add_filter( 'widget_text', 'do_shortcode' );


/**
 * Shortcode [heart]
 * This function returns an HTML <span> element with the CSS class "heart" representing a heart symbol.
 * having the "heart" class, effectively displaying a heart symbol.
 */
function shortcode_heart() {

	return '<span class="heart"></span>';

}
add_shortcode( 'heart', 'shortcode_heart' );
