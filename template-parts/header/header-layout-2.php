<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Template Part for Displaying Header Area page template.
 */
?>
<!-- Header Area -->
<header id="preview-header">
    <div class="preview-logo">
        <?php 
            if ( get_theme_mod( 'boxshadow_logo' ) ) { ?>
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img data-src="<?php echo get_theme_mod( 'boxshadow_logo' ); ?>" alt="Logo">
            </a>
        <?php } ?>
    </div>
    <div class="preview-actions">
        <a href="#">Buy now</a>
    </div>
</header>
