<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Template Part for Displaying Header Area page template.
 */
?>
<!-- Header Area -->
<header id="header" class="<?php echo get_theme_mod( 'boxshadow_header_menu_image_radio_button' ); ?>">
        <section class="header-section">
            <div class="container-md p-0">
                <div class="row m-0">
                    <div class="col-12 p-0">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <?php 
                                    if ( get_theme_mod( 'boxshadow_logo' ) ) { ?>
                                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <img data-src="<?php echo get_theme_mod( 'boxshadow_logo' ); ?>" alt="Logo">
                                    </a>
                                <?php } ?>

                                <div id="menu-toggle">
                                    <div id="hamburger">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <div id="cross">
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>

                                <?php 
                                wp_nav_menu( array(
                                    'theme_location'            => 'header_menu',
                                    'container'                 => 'div',
                                    'container_class'           => 'collapse navbar-collapse sidebar-menu',
                                    'container_id'              => 'navbarNav',
                                    'menu_class'                => 'navbar-nav',
                                    'link_class'                => 'nav-item', //Custom boxshadow_link_class(); Function inc/theme-setup.php
                                    'anchor_class'              => 'nav-link', //Custom boxshadow_anchor_class(); Function inc/theme-setup.php
                                    'anchor_first_child_class'  => 'active', //Custom boxshadow_anchor_first_child_class(); Function inc/theme-setup.php
                                    'menu_items_before'         => '<a href="" class="sidebar-menu-close"><span></span></a>', //Custom boxshadow_prefix_menu_
                                    'depth'                     => '3',
                                ) );
                                ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
</header>