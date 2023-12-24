<?php 
    // Exit if accessed directly.
    defined( 'ABSPATH' ) || exit;
    
    get_header();

    // Preloader
    get_template_part( 'template-parts/header/preloader' );

    // Image Loading Before Animations Element
    get_template_part( 'template-parts/header/image', 'loading-before-animations-element' );

    // Scroll to top Button
    get_template_part( 'template-parts/header/scroll', 'to-top-button' );

    // Header Area
    get_template_part( 'template-parts/header/header', 'layout-2' );

   
   // Start the loop
   if ( have_posts() ) :
        while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <style>
                body.single-<?php echo esc_attr($post_type); ?> {
                    background: unset;
                }
                .post-1618 {
                    padding-top: 50px;
                }
            </style>
            <?php
                // Retrieve the media data
                $media_data = get_post_meta(get_the_ID(), '_media_data', true);
                $media_data = json_decode($media_data, true);
                
                echo '<pre>';
                print_r($media_data);
                echo '</pre>';
            ?>
            
            <?php
            // Display the media gallery
            if ($media_data) { ?>
                    <!-- Screenshots Section -->
                    <section id="screenshots-section">
                        <!-- Screenshots List -->
                        <div class="screenshots-list">
                            <?php 
                            foreach ($media_data as $media_item) { ?>
                            <!-- <?php //if ( $media_item['type'] === 'image' ) { ?> -->
                            <div class="screenshots-thumbnail">
                                <a href="#" data-aos="fade-up">
                                    <img src="<?php echo esc_url( $media_item['url'] ); ?>" alt="Image">
                                </a>
                            </div>
                            <?php 
                            } ?>
                        </div>

                        <!-- Screenshots Title -->
                        <div class="screenshots-title" data-aos="fade-up" data-aos-delay="100">
                            <h1>Screenshot 1</h1>
                        </div>

                        <!-- Screenshots fullsize -->
                        <div class="screenshots-fullsize" data-aos="fade-up" data-aos-delay="300">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'portfolio'); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                        </div>
                    </section>
            <?php
            } ?>
        </div>
        <?php
        endwhile;
    endif;

    get_footer();
 ?>