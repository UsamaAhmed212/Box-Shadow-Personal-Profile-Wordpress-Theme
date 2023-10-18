<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Resister Menus
register_nav_menus( array(
    'header_menu' => __( 'Header', 'boxshadow' ),
) );

// wp_nav_menu() li Additional Class Add
function boxshadow_link_class( $classes, $item, $args ) {
    if( isset( $args->link_class ) ) {
        $classes['class'] = $args->link_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'boxshadow_link_class', 1, 3);

// wp_nav_menu() li >a Additional Class Add
function boxshadow_anchor_class( $classes, $item, $args ) {
    if( isset( $args->anchor_class ) ) {
        $classes['class'] = $args->anchor_class;
    }
    return $classes;
}
add_filter('nav_menu_link_attributes', 'boxshadow_anchor_class', 1, 3);


// wp_nav_menu() li >a First Child Class Add
function boxshadow_anchor_first_child_class( $classes, $item, $args ) {
    if( isset( $args->anchor_first_child_class ) ) {
        if ( in_array('current-menu-item', $classes) ) {
            $classes['class'] = $args->anchor_first_child_class;
        }
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'boxshadow_anchor_first_child_class', 1, 3 );



// wp_nav_menu() ul Afterbegin Prefix Add
function boxshadow_prefix_menu_items_afterbegin ( $items, $args ) {
    if( isset( $args->menu_items_before ) ) {
        $items = $args->menu_items_before . $items;
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'boxshadow_prefix_menu_items_afterbegin', 1, 2 );
