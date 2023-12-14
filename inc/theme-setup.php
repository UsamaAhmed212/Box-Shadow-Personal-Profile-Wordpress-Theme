<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//Theme Title
add_theme_support( 'title-tag' );

// Theme Thumbnails
add_theme_support( 'post-thumbnails', array( 'page', 'post', 'portfolio' ) );

// Register Nav Menus
require_once BOXSHADOW_THEME_DIR . 'inc/theme-setup/register-nav-menus.php';
