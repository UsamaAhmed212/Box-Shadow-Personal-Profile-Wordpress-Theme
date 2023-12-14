<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Template Part for Displaying Footer Section page template.
 */
?>

<!-- Footer Section -->
<footer id="footer-section" style="background-image: url(&quot;<?php echo get_template_directory_uri(); ?>/images/svg/pattern.svg&quot;);">
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col-md-12 p-0 text-center">
                <p id="copyright" data-aos="zoom-in-down">
                    <span class="copyright_wrapper">
                        <?php echo do_shortcode( get_theme_mod( 'boxshadow_footer_copyright_text' ) ); ?>
                    </span>
                </p>
                <span>
            </div>
        </div>
    </div>
</footer>