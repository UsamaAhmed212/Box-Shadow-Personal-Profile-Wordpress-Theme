<?php 
    get_header();

    // Preloader
    get_template_part( 'template-parts/header/preloader' );

    // Image Loading Before Animations Element
    get_template_part( 'template-parts/header/image', 'loading-before-animations-element' );

    // Scroll to top Button
    get_template_part( 'template-parts/header/scroll', 'to-top-button' );

    // Header Area
    get_template_part( 'template-parts/header/header', 'layout-1' );

    // Background Image Overlay Area
    get_template_part( 'template-parts/header/background', 'image-layout-2' );

    // Breadcrumb Section
    get_template_part( 'template-parts/breadcrumb' );

    // Start the loop
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
    endif;

    // Footer Section
    get_template_part( 'template-parts/footer/footer', 'layout-1' );
        
    get_footer(); ?>
