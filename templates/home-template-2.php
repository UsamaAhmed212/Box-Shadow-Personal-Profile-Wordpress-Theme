<?php

    // Exit if accessed directly.
    defined( 'ABSPATH' ) || exit;

   /*
   Template Name: Home template 2
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

   // Background Image Area
   get_template_part( 'template-parts/header/background', 'image-layout-1' );
?>

    <!-- Box Shadow Section -->
    <section id="box-shadow-wrapper">
        <div class="container-md p-0">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="box-shadow-section">
                        <!-- About Section -->
                        <section id="about-section">
                            <div class="container-md p-0">
                                <div class="row m-0">
                                    <div class="col-12 p-0">
                                        <div class="about-heading text-center">
                                            <h1 data-aos="zoom-in">UsamaAhmed</h1>
                                        </div>
                                    </div>
                                    <div class="col-12 p-0">
                                        <div class="about-content">
                                            <div class="about-heading-title">
                                                <h1 class="typed" data-aos="fade-up">
                                                    <span>i am</span>
                                                    <span class="typed-texts" Typed-type-speed="750" Typed-back-speed="750" Typed-show-cursor ="false">
                                                        <span>designer</span>
                                                        <span>developer</span>
                                                    </span>
                                                </h1>
                                            </div>

                                            <div class="about-heading-title-description">
                                                <h1 class="typed" data-aos="fade-down">
                                                    <span class="typed-texts">
                                                        <span>i make awesome web site</span>
                                                    </span>
                                                </h1>
                                            </div>

                                            <div class="about-description">
                                                <p data-aos="fade-up">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem maxime unde, itaque sit ipsum rem commodi illum officiis doloribus nobis reprehenderit quasi quae voluptatibus eveniet magnam aliquam non pariatur ab deleniti. Ea natus obcaecati voluptate commodi qui modi dignissimos voluptatum ex deleniti, voluptatem iusto vel nemo et consectetur dolores? Aliquid!</p>
                                            </div>

                                            <div class="about-heading-title_social_icons my-4">
                                                <a href="#" data-aos="zoom-in-up" data-aos-delay="100"><img src="<?php echo get_template_directory_uri(); ?>/images/svg/twitter.svg" alt="SVG" class="svg"/></a>
                                                <a href="#" data-aos="zoom-in-up" data-aos-delay="200"><img src="<?php echo get_template_directory_uri(); ?>/images/svg/facebook-f.svg" alt="SVG" class="svg"/></a>
                                                <a href="#" data-aos="zoom-in-up" data-aos-delay="300"><img src="<?php echo get_template_directory_uri(); ?>/images/svg/instagram.svg" alt="SVG" class="svg"/></a>
                                                <a href="#" data-aos="zoom-in-up" data-aos-delay="400"><img src="<?php echo get_template_directory_uri(); ?>/images/svg/linkedin-in.svg" alt="SVG" class="svg"/></a>
                                                <a href="#" data-aos="zoom-in-up" data-aos-delay="500"><img src="<?php echo get_template_directory_uri(); ?>/images/svg/dribbble.svg" alt="SVG" class="svg"/></a>                                  
                                            </div>
                                            
                                            <div class="about-btn" data-aos="zoom-in">
                                                <a href="#">Hire Me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        
                        <!-- Skills Section -->
                        <section id="skills-section">
                            <div class="container-md p-0">
                                <div class="row m-0 justify-content-around">
                                    <div class="col-12">
                                        <div class="section-title">
                                            <h2 class="text-center" data-aos="fade-down">Skills</h2>
                                            <div class="vertical-bar" data-aos="fade-up"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4 p-0">
                                        <a href="#" target="_blank">
                                            <div class="skill-item" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>/images/react.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                    
                                    <div class="col-sm-6 col-lg-4 p-0">
                                        <a href="#" target="_blank">
                                            <div class="skill-item" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>/images/invision.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                    
                                    <div class="col-sm-6 col-lg-4 p-0">
                                        <a href="#" target="_blank">
                                            <div class="skill-item" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>/images/figma.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                    
                                    <div class="col-sm-6 col-lg-4 p-0">
                                        <a href="#" target="_blank">
                                            <div class="skill-item" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>/images/photoshop.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                    
                                    <div class="col-sm-6 col-lg-4 p-0">
                                        <a href="#" target="_blank">
                                            <div class="skill-item" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>/images/adobe-after-effects.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                    
                                    <div class="col-sm-6 col-lg-4 p-0">
                                        <a href="#" target="_blank">
                                            <div class="skill-item" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>/images/sketch.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                    
                                    <div class="col-sm-6 col-lg-4 p-0">
                                        <a href="#" target="_blank">
                                            <div class="skill-item" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>/images/marvel.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="divider">
                            <span class="divider-separator"></span>
                        </div>
                        
                        <!-- Service Section -->
                        <section id="service-section">
                            <div class="container-md p-0">
                                <div class="row m-0 justify-content-around">
                                    <div class="col-12">
                                        <div class="section-title">
                                            <h2 class="text-center" data-aos="fade-down">What I Do</h2>
                                            <div class="vertical-bar" data-aos="fade-up"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-3">
                                        <a href="#" target="_blank">
                                            <div class="service-box" data-aos="fade-up">
                                                <div class="service-logo">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/svg/web_design.svg" alt="Web Design">
                                                </div>
                                                <h4 class="service-title">Web Design</h4>
                                                <p class="service-description">Build your pages in minutes easily with the worlds best page builders.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-3">
                                        <a href="#" target="_blank">
                                            <div class="service-box" data-aos="fade-up">
                                                <div class="service-logo">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/svg/web_development.svg" alt="Web Development">
                                                </div>
                                                <h4 class="service-title">Web Development</h4>
                                                <p class="service-description">Build your pages in minutes easily with the worlds best page builders.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-3">
                                        <a href="#" target="_blank">
                                            <div class="service-box" data-aos="fade-up">
                                                <div class="service-logo">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/svg/responsive_design.svg" alt="Responsive Design">
                                                </div>
                                                <h4 class="service-title">Responsive Design</h4>
                                                <p class="service-description">Build your pages in minutes easily with the worlds best page builders.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-3">
                                        <a href="#" target="_blank">
                                            <div class="service-box" data-aos="fade-up">
                                                <div class="service-logo">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/svg/wordpress.svg" alt="Wordpress">
                                                </div>
                                                <h4 class="service-title">WP Customization and Development</h4>
                                                <p class="service-description">Build your pages in minutes easily with the worlds best page builders.</p>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <div class="col-sm-6 col-lg-4 p-0 my-3">
                                        <a href="#" target="_blank">
                                            <div class="service-box" data-aos="fade-up">
                                                <div class="service-logo">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/svg/api.svg" alt="API">
                                                </div>
                                                <h4 class="service-title">API Development</h4>
                                                <p class="service-description">Build your pages in minutes easily with the worlds best page builders.</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        
                        <div class="divider">
                            <span class="divider-separator"></span>
                        </div>
                    
                        <!-- Portfolio Section -->
                        <section id="Portfolio-section">
                            <div class="container-md p-0">
                                <div class="row m-0 justify-content-around">
                                    <div class="col-12 p-0">
                                        <div class="section-title text-center">
                                            <h2 class="text-center" data-aos="fade-down">Projects</h2>
                                            <p data-aos="zoom-in">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                                            <div class="vertical-bar" data-aos="fade-up"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-2">
                                        <a href="#" target="_blank">
                                            <div class="portfolio-content" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-01.png" alt="img">
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-2">
                                        <a href="#" target="_blank">
                                            <div class="portfolio-content" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-02.png" alt="img">
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-2">
                                        <a href="#" target="_blank">
                                            <div class="portfolio-content" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-03.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <div class="col-sm-6 col-lg-4 p-0 my-2">
                                        <a href="#" target="_blank">
                                            <div class="portfolio-content" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-04.png" alt="img">
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-2">
                                        <a href="#" target="_blank">
                                            <div class="portfolio-content" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-05.png" alt="img">
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-2">
                                        <a href="#" target="_blank">
                                            <div class="portfolio-content" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-06.png" alt="img">
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-xl-12 p-0">
                                        <div class="portfolio-loader text-center">
                                            <div class="more-portfolio" data-aos="zoom-in">
                                                <a href="#">More Works</a>
                                            </div>
                                            <div class="all-portfolio" data-aos="zoom-in">
                                                <a href="#">All Works</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    
                        <!-- Contact Section -->
                        <section id="contact-section">
                            <div class="container-md p-0">
                                <form id="contact-form" class="row m-0 justify-content-center">
                                    <div class="col-sm-6 col-lg-5" data-aos="zoom-in">
                                        <div class="group name">
                                            <div class="control">
                                                <input type="text" placeholder="Name" name="name">
                                            </div>
                                        </div>
                                        <div class="group email">
                                            <div class="control">
                                                <input type="text" placeholder="Email" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-5" data-aos="zoom-in">
                                        <div class="group message">
                                            <div class="control message">
                                                <textarea  placeholder="Message" name="message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 py-4 group">
                                        <div data-aos="zoom-in" class=" control">
                                            <button type="submit" class="send-btn">
                                                <span class="submit">Send Message</span>
                                                <span class="loading"><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrows-rotate.svg" alt="SVG" class="svg"></span>
                                                <span class="check"><img src="<?php echo get_template_directory_uri(); ?>/images/svg/check.svg" alt="SVG" class="svg"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                        
                        <?php
                            // Footer Section
                            get_template_part( 'template-parts/footer/footer', 'layout-1' );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <?php
    // Footer Section
    get_template_part( 'template-parts/footer/footer', 'layout-1' );
      
    get_footer(); ?>