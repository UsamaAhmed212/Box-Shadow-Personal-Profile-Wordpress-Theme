<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//Theme Css and Js File Enqueue
function boxshadow_css_js_enqueue() {
    // Fonts Enqueue
    wp_register_style( 'boxshadow-google-fonts', boxshadow_fonts_url(), array(), null);
    wp_enqueue_style( 'boxshadow-google-fonts' );

    // Alisandra Font Css Enqueue
    wp_register_style( 'boxshadow-alisandra', BOXSHADOW_THEME_DIR_URI . 'assets/fonts/alisandra/alisandra.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-alisandra' );

    // Inheritance Font Css Enqueue
    wp_register_style( 'boxshadow-inheritance', BOXSHADOW_THEME_DIR_URI . 'assets/fonts/inheritance/inheritance.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-inheritance' );


    // Bootstrap Css Enqueue
    wp_register_style( 'boxshadow-bootstrap-min', BOXSHADOW_THEME_DIR_URI . 'assets/css/bootstrap.min.css', array(), '5.0.2', 'all' );
    wp_enqueue_style( 'boxshadow-bootstrap-min' );

    // Theme Css Enqueue Start
    wp_enqueue_style( 'boxshadow-style', get_stylesheet_uri() );
    
    // Common Css Enqueue
    wp_register_style( 'boxshadow-common', BOXSHADOW_THEME_DIR_URI . 'assets/css/common.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-common' );








    // Style Css Enqueue
    wp_register_style( 'boxshadow-index-style', BOXSHADOW_THEME_DIR_URI . 'assets/css/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-index-style' );


    // Portfolio Css Enqueue
    wp_register_style( 'boxshadow-portfolio', BOXSHADOW_THEME_DIR_URI . 'assets/css/portfolio.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-portfolio' );


    // portfolio-single Css Enqueue
    wp_register_style( 'boxshadow-portfolio-single', BOXSHADOW_THEME_DIR_URI . 'assets/css/portfolio-single.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-portfolio-single' );







    // Scroll To Top And Draw On Scroll Css Enqueue
    wp_register_style( 'boxshadow-scroll-to-top-and-draw-on-scroll', BOXSHADOW_THEME_DIR_URI . 'assets/plugins/scroll-to-top-and-draw-on-scroll/scroll-to-top-and-draw-on-scroll.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-scroll-to-top-and-draw-on-scroll' );

    // Sticky Navigation Menu Css Enqueue
    wp_register_style( 'boxshadow-sticky-navigation-menu', BOXSHADOW_THEME_DIR_URI . 'assets/plugins/sticky-navigation-menu/sticky-navigation-menu.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-sticky-navigation-menu' );





    

    // Responsive Css Enqueue
    wp_register_style( 'boxshadow-responsive', BOXSHADOW_THEME_DIR_URI . 'assets/css/responsive.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-responsive' );


    // Portfolio Responsive Css Enqueue
    wp_register_style( 'boxshadow-portfolio-responsive', BOXSHADOW_THEME_DIR_URI . 'assets/css/portfolio-responsive.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-portfolio-responsive' );





    // Aso Plugin Css Enqueue
    wp_register_style( 'boxshadow-aso-plugin', BOXSHADOW_THEME_DIR_URI . 'assets/plugins/aos/css/aos.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-aso-plugin' );
    // Theme Css Enqueue End


    // Theme Js Enqueue Start

    // SVG Loader Js Enqueue
    wp_register_script( 'boxshadow-svg-loader', BOXSHADOW_THEME_DIR_URI . 'assets/js/svg-loader.js', array(), '1.0.0', true );
    wp_enqueue_script( 'boxshadow-svg-loader' );
    
    // jQuery CDN Enqueue
    wp_register_script( 'jquery-core', false, array(), false, true );
    wp_enqueue_script( 'jquery-core' );
    
    // Enable Disable Scrolling Js Enqueue
    wp_register_script( 'boxshadow-enable-disable-scrolling', BOXSHADOW_THEME_DIR_URI . 'assets/js/enable-disable-scrolling.js', array(), '1.0.0', true );
    wp_enqueue_script( 'boxshadow-enable-disable-scrolling' );

    // Scroll To Top And Draw On Scroll Js Enqueue
    wp_register_script( 'boxshadow-scroll-to-top-and-draw-on-scroll', BOXSHADOW_THEME_DIR_URI . 'assets/plugins/scroll-to-top-and-draw-on-scroll/scroll-to-top-and-draw-on-scroll.js', array(), '1.0.0', true );
    wp_enqueue_script( 'boxshadow-scroll-to-top-and-draw-on-scroll' );

    // Sticky Navigation Menu Js Enqueue
    wp_register_script( 'boxshadow-sticky-navigation-menu', BOXSHADOW_THEME_DIR_URI . 'assets/plugins/sticky-navigation-menu/sticky-navigation-menu.js', array(), '1.0.0', true );
    wp_enqueue_script( 'boxshadow-sticky-navigation-menu' );
    



    // Typed Js Enqueue
    wp_register_script( 'boxshadow-typed', BOXSHADOW_THEME_DIR_URI . 'assets/js/typed.js', array(), '1.0.0', true );
    wp_enqueue_script( 'boxshadow-typed' );





    
    // Custom Js Enqueue
    wp_register_script( 'boxshadow-custom', BOXSHADOW_THEME_DIR_URI . 'assets/js/custom.js', array(), '1.0.0', true );
    wp_enqueue_script( 'boxshadow-custom' );

    // Aso Plugin Js Enqueue
    wp_register_script( 'boxshadow-aos', BOXSHADOW_THEME_DIR_URI . 'assets/plugins/aos/js/aos.js', array(), '1.0.0', true );
    wp_enqueue_script( 'boxshadow-aos' );

    wp_register_script( 'boxshadow-aos-init', BOXSHADOW_THEME_DIR_URI . 'assets/plugins/aos/aos-init.js', array(), '1.0.0', true );
    wp_enqueue_script( 'boxshadow-aos-init' );
    // Theme Js Enqueue End

}
add_action( 'wp_enqueue_scripts', 'boxshadow_css_js_enqueue');

// Fonts Enqueue Function
function boxshadow_fonts_url() {
    $fonts_url = '';

    $NunitoSans = _x( 'on', 'NunitoSans font: on or off', 'boxshadow' );
    $Poppins = _x( 'on', 'Poppins font: on or off', 'boxshadow' );
    $Roboto = _x( 'on', 'Roboto font: on or off', 'boxshadow' );

    if ( 'off' !== $NunitoSans || 'off' !== $Poppins || 'off' !== $Roboto ) {
        $font_families = array();

        if ( 'off' !== $NunitoSans ) {
            $font_families[] = 'Nunito+Sans';
        }

        if ( 'off' !== $Poppins ) {
            $font_families[] = 'Poppins';
        }

        if ( 'off' !== $Roboto ) {
            $font_families[] = 'Roboto:wght@400;500;700';
        }

        $query_args = array(
            'family' => implode( '&family=', $font_families ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
    }

    return esc_url_raw( $fonts_url );
}
