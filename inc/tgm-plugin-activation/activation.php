<?php 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once BOXSHADOW_THEME_DIR . 'inc/tgm-plugin-activation/class-tgm-plugin-activation.php';

function plugins_activation() {
    $plugins = array(
		array(
			'name'               => 'Elementor Website Builder',
			'slug'               => 'elementor',
			'required'           => true,
			'force_activation'   => true,
            'force_deactivation' => true,
        ),
		array(
			'name'               => 'Contact Form 7',
			'slug'               => 'contact-form-7',
			'required'           => false,
			'force_activation'   => false,
            'force_deactivation' => true,
        ),
    );

	$config = array(
        'id'           => 'box-shadow',
		'default_path' => '',
		'menu'         => 'box-shadow-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
    );

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'plugins_activation' );