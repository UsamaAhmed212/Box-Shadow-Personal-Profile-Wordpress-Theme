<?php 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Define constants
 */
// Elementor Templates Library path/URI.
$elementor_directory_end_path = str_replace( '\\', '/', str_replace( str_replace( '/', '\\', get_template_directory() ), '', str_replace( '/', '\\', __DIR__ ) ) );

define( 'ELEMENTOR_DIR', get_template_directory() . $elementor_directory_end_path );
define( 'ELEMENTOR_DIR_URI', esc_url( get_template_directory_uri() ) . $elementor_directory_end_path );

/**
 * Define Project Name constants
 */
// Remove Space Special Characters.
$PROJECT_NAME = trim( preg_replace( '/\s+/', '-',  preg_replace( '/[^A-Za-z0-9]/', ' ', strtolower( wp_get_theme() ) ) ), '-' );

define( 'PROJECT_NAME', $PROJECT_NAME );

// Elementor Initialize Class
class ElementorInitialization {

	private static $instance = null;

	public static function instance() {
        if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {

		add_action( 'elementor/controls/controls_registered', array( $this, 'controls_registered' ) );
		
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
		
		add_action( 'elementor/elements/categories_registered', array( $this, 'elementor_custom_categories' ) );
		
		add_action( 'elementor/editor/before_enqueue_styles', array( $this, 'elementor_editor_styles' ) );
		
		add_action( 'elementor/editor/before_enqueue_scripts', array( $this, 'elementor_editor_scripts' ) );
		
		add_action( 'init', array( $this, 'include_custom_file' ) );

	}

	// Elementor Controls Register
	public function controls_registered() {
 
        /* We look for any theme overrides for this custom Elementor element.
		If no theme overrides are found we use the default one in this plugin. */

		$widget_file = ELEMENTOR_DIR . '/elementor-controls-register/elementor-controls-register.php';
		$template_file = locate_template( $widget_file );

		if ( !$template_file || !is_readable( $template_file ) ) {
			$template_file = ELEMENTOR_DIR . '/elementor-controls-register/elementor-controls-register.php';
		}

		if ( $template_file && is_readable( $template_file  ) ) {
			require_once $template_file;
		}

	}

	// Elementor Widgets Register
	public function widgets_registered() {
 
		/* We look for any theme overrides for this custom Elementor element.
		If no theme overrides are found we use the default one in this plugin. */

		$widget_file = ELEMENTOR_DIR . '/elementor-widgets-register/elementor-widgets-register.php';
		$template_file = locate_template( $widget_file );

		if ( !$template_file || !is_readable( $template_file ) ) {
			$template_file = ELEMENTOR_DIR . '/elementor-widgets-register/elementor-widgets-register.php';
		}

		if ( $template_file && is_readable( $template_file  ) ) {
			require_once $template_file;
		}

	}

	// Elementor Custom Categories
	public function elementor_custom_categories( $elements_manager ) {

		// Elementor Custom ( box-Shadow ) Category
		$elements_manager->add_category( 'box-Shadow', array(
			'title' => esc_html__( 'Box Shadow', 'boxshadow' )
		) );
		
	}

	// Elementor Editor Styles Enqueue
	public function elementor_editor_styles() {

		// Font Awesome V6.1.2 Enqueue
		wp_register_style( 'font-awesome-free', '//use.fontawesome.com/releases/v6.1.2/css/all.css', array(), '6.1.2', 'all' );
		wp_enqueue_style( 'font-awesome-free' );
		
		// Elementor Editor Css Enqueue
		wp_register_style( 'boxshadow-elementor-editor', ELEMENTOR_DIR_URI . '/assets/css/elementor-editor.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'boxshadow-elementor-editor' );
		
		// pa-elements Font Css Enqueue 
		wp_register_style( 'pa-elements', ELEMENTOR_DIR_URI . '/assets/fonts/pa-elements/pa-elements.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'pa-elements' );
		
	}

	// Elementor Editor Scripts Enqueue
	public function elementor_editor_scripts() {
		
	}

	// Elementor Required
	public function include_custom_file() {
		
		// Include the 'mail.php' file, which is required for the (contact-form-widget).
		require_once ELEMENTOR_DIR . '/elementor-widgets-register/elementor-widgets/contact-form-widget/mail.php';

  	}
	
}

ElementorInitialization::instance();
