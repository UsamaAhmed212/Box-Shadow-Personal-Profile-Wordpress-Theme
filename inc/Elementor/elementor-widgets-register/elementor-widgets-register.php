<?php 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// We check if the Elementor plugin has been installed / activated.
if ( defined( 'ELEMENTOR_PATH' ) && class_exists( 'Elementor\Widget_Base' ) ) {

    require_once( __DIR__ . '/elementor-widgets/contact-section-widget/contact-section-widget.php' );

    require_once( __DIR__ . '/elementor-widgets/contact-form-widget/contact-form-widget.php' );
    
}