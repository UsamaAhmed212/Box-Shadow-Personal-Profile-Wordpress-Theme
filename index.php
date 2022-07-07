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
    <!-- Preloader -->
    <div class="loader"></div>
    
    <!-- Image Loading Before Animations Element -->
    <div style="display: none;" class="stage">
        <div class="dot-pulse"></div>
    </div>

    <!-- scroll to top button -->
    <button class="scroll-to-top">
        <svg width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </button>
    
    <!-- Background Image Area -->
    <section id="background-image">
        <img src="<?php echo get_template_directory_uri(); ?> ./images/background-image.jpg" alt="Background Image">
    </section>

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
                                <?php }?>

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
    
    <!-- About Box Shadow Section -->
    <section id="about-box-shadow-wrapper">
        <div class="container-md p-0">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="about-box-shadow-section">
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
                                                <a href="#" data-aos="zoom-in-up" data-aos-delay="100"><img src="<?php echo get_template_directory_uri(); ?> ./images/svg/twitter.svg" alt="SVG" class="svg"/></a>
                                                <a href="#" data-aos="zoom-in-up" data-aos-delay="200"><img src="<?php echo get_template_directory_uri(); ?> ./images/svg/facebook-f.svg" alt="SVG" class="svg"/></a>
                                                <a href="#" data-aos="zoom-in-up" data-aos-delay="300"><img src="<?php echo get_template_directory_uri(); ?> ./images/svg/instagram.svg" alt="SVG" class="svg"/></a>
                                                <a href="#" data-aos="zoom-in-up" data-aos-delay="400"><img src="<?php echo get_template_directory_uri(); ?> ./images/svg/linkedin-in.svg" alt="SVG" class="svg"/></a>
                                                <a href="#" data-aos="zoom-in-up" data-aos-delay="500"><img src="<?php echo get_template_directory_uri(); ?> ./images/svg/dribbble.svg" alt="SVG" class="svg"/></a>                                  
                                            </div>
                                            
                                            <div class="about-btn" data-aos="zoom-in">
                                                <a href="#">Hire Me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Box Shadow Section -->
    <section id="box-shadow-wrapper">
        <div class="container-md p-0">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="box-shadow-section">
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
                                                <img data-src="<?php echo get_template_directory_uri(); ?> ./images/react.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                    
                                    <div class="col-sm-6 col-lg-4 p-0">
                                        <a href="#" target="_blank">
                                            <div class="skill-item" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?> ./images/invision.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                    
                                    <div class="col-sm-6 col-lg-4 p-0">
                                        <a href="#" target="_blank">
                                            <div class="skill-item" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?> ./images/figma.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                    
                                    <div class="col-sm-6 col-lg-4 p-0">
                                        <a href="#" target="_blank">
                                            <div class="skill-item" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?> ./images/photoshop.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                    
                                    <div class="col-sm-6 col-lg-4 p-0">
                                        <a href="#" target="_blank">
                                            <div class="skill-item" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?>./images/adobe-after-effects.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                    
                                    <div class="col-sm-6 col-lg-4 p-0">
                                        <a href="#" target="_blank">
                                            <div class="skill-item" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?> ./images/sketch.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                    
                                    <div class="col-sm-6 col-lg-4 p-0">
                                        <a href="#" target="_blank">
                                            <div class="skill-item" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?> ./images/marvel.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <hr/>
                    
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
                                                    <img src="<?php echo get_template_directory_uri(); ?> ./images/svg/web_design.svg" alt="Web Design">
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
                                                    <img src="<?php echo get_template_directory_uri(); ?> ./images/svg/web_development.svg" alt="Web Development">
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
                                                    <img src="<?php echo get_template_directory_uri(); ?> ./images/svg/responsive_design.svg" alt="Responsive Design">
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
                                                    <img src="<?php echo get_template_directory_uri(); ?> ./images/svg/wordpress.svg" alt="Wordpress">
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
                                                <img src="<?php echo get_template_directory_uri(); ?> ./images/svg/api.svg" alt="API">
                                                </div>
                                                <h4 class="service-title">API Development</h4>
                                                <p class="service-description">Build your pages in minutes easily with the worlds best page builders.</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <hr/>
                    
                        <!-- Portfolio Section -->
                        <section id="Portfolio-section">
                            <div class="container-md p-0">
                                <div class="row m-0 justify-content-around">
                                    <div class="col-12 p-0">
                                        <div class="section-title text-center">
                                            <h2 class="text-center" data-aos="fade-in">Projects</h2>
                                            <p data-aos="zoom-in">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                                            <div class="vertical-bar" data-aos="fade-up"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-2">
                                        <a href="#" target="_blank">
                                            <div class="portfolio-content" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?> ./images/thumbnail-01.png" alt="img">
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-2">
                                        <a href="#" target="_blank">
                                            <div class="portfolio-content" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?> ./images/thumbnail-02.png" alt="img">
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-2">
                                        <a href="#" target="_blank">
                                            <div class="portfolio-content" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?> ./images/thumbnail-03.png" alt="img">
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <div class="col-sm-6 col-lg-4 p-0 my-2">
                                        <a href="#" target="_blank">
                                            <div class="portfolio-content" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?> ./images/thumbnail-04.png" alt="img">
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-2">
                                        <a href="#" target="_blank">
                                            <div class="portfolio-content" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?> ./images/thumbnail-05.png" alt="img">
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 p-0 my-2">
                                        <a href="#" target="_blank">
                                            <div class="portfolio-content" data-aos="fade-up">
                                                <img data-src="<?php echo get_template_directory_uri(); ?> ./images/thumbnail-06.png" alt="img">
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
                                        <input type="text" class="form-control name" placeholder="Name" name="name">
                                        <input type="text" class="form-control email" placeholder="Email" name="email">
                                    </div>
                                    <div class="col-sm-6 col-lg-5" data-aos="zoom-in">
                                        <textarea class="form-control message" placeholder="Message" name="message"></textarea>
                                    </div>
                                    <div class="col-12 py-4">
                                        <div data-aos="zoom-in">
                                            <button type="submit" class="send-btn">
                                                <span class="submit">Send Message</span>
                                                <span class="loading"><img src="<?php echo get_template_directory_uri(); ?> ./images/svg/arrows-rotate.svg" alt="SVG" class="svg"></span>
                                                <span class="check"><img src="<?php echo get_template_directory_uri(); ?> ./images/svg/check.svg" alt="SVG" class="svg"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    
                        <!-- Footer Section -->
                        <footer id="footer-section" style="background-image: url(&quot;<?php echo get_template_directory_uri(); ?>./images/svg/patrn.svg&quot;);">
                            <div class="container-md">
                                <div class="row justify-content-center">
                                    <div class="col-md-12 p-0 text-center">
                                        <p id="copyright" data-aos="zoom-in-down">Copyright &copy;
                                            <span class="heart"></span>
                                            <a href="#">Usama Ahmed</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php wp_footer(); ?>
</body>
</html>