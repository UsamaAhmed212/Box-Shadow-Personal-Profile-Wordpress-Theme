<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no-js">   
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        if ( has_site_icon()  && get_option( 'site_icon' ) ) { ?>
        <!-- Title Bar Logo -->
        <link rel="icon" href="<?php echo get_theme_mod( 'site_icon' ); ?>" type="image/png">
    <?php }
    
    wp_head(); ?>
</head>
<body <?php body_class(); ?> >