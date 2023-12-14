<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/* 
*Theme Functions 
*/


/**
 * Define constants
 */
// Root path/URI.
define( 'BOXSHADOW_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'BOXSHADOW_THEME_DIR_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );


// Detect plugin. For Frontend Only
require_once ABSPATH . 'wp-admin/includes/plugin.php';

// Files Enqueue
require_once BOXSHADOW_THEME_DIR . 'inc/enqueue.php';
require_once BOXSHADOW_THEME_DIR . 'inc/theme-setup.php';
require_once BOXSHADOW_THEME_DIR . 'inc/theme-options.php';
require_once BOXSHADOW_THEME_DIR . 'inc/customizer/customize.php';
require_once BOXSHADOW_THEME_DIR . 'inc/tgm-plugin-activation/activation.php';
require_once BOXSHADOW_THEME_DIR . 'inc/breadcrumb.php';

// Custom Post Type ( Integration ) Init
require_once BOXSHADOW_THEME_DIR . 'inc/custom-post-type/custom-post-type.php';

// If the Elementor plugin is active
if ( is_plugin_active( 'elementor/elementor.php' ) ) {
    // Elementor ( Integration ) Init
    require_once BOXSHADOW_THEME_DIR . 'inc/elementor/elementor.php';
}

// If the Contact Form 7 plugin is active
if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
    // Contact Form 7 ( Integration ) Init
    require_once BOXSHADOW_THEME_DIR . 'inc/contact-form-7/contact-form-7.php';
}
