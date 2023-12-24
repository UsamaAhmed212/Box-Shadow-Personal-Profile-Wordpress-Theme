<?php 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Define constants
 */
// Elementor Templates Library path/URI.
$portfolio_directory_end_path = str_replace( '\\', '/', str_replace( str_replace( '/', '\\', get_template_directory() ), '', str_replace( '/', '\\', __DIR__ ) ) );

define( 'PORTFOLIO_DIR', get_template_directory() . $portfolio_directory_end_path );
define( 'PORTFOLIO_DIR_URI', esc_url( get_template_directory_uri() ) . $portfolio_directory_end_path );

// Register Custom Post type (Portfolio)
require_once( __DIR__ . '/portfolio/portfolio.php' );
