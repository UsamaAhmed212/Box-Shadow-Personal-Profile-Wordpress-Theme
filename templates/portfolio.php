<?php 

   // Exit if accessed directly.
   defined( 'ABSPATH' ) || exit;
   
   /*
   Template Name: Portfolio
   */

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

   $args = array(
      'post_type' => 'portfolio',
      'posts_per_page' => -1,
   );

   $query = new WP_Query($args);

   if ( $query->have_posts() ) : ?>
   
      <!-- Portfolio Section -->
      <section id="portfolio-section">
         <div class="container-fluid">
            <div class="row m-0 justify-content-around">
               <?php 
               while ( $query->have_posts() ) : 
                  $query->the_post();
                  ?>
                  <div class="col-sm-6 col-lg-4 p-0">
                     <a href="<?php echo esc_url(get_permalink()); ?>" target="_blank" data-aos="fade-up"data-aos-duration="1500">
                        <div class="portfolio-content">
                           <img data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'portfolio'); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                        </div>
                     </a>
                  </div>
               <?php 
               endwhile;
               ?>
            </div>
         </div>
      </section>

   <?php 
   else:
      echo 'No portfolio found';
   endif;

   wp_reset_postdata();

   // Footer Section
   get_template_part( 'template-parts/footer/footer', 'layout-1' );
        
   get_footer(); ?>