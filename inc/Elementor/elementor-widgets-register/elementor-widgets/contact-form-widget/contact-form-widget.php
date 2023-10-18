<?php 

// Custom widgets must be defined in the Elementor namespace
namespace Elementor; 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Contact_Form_Widget extends Widget_Base {

	// Widget Dependencies Styles Enqueue
	public function get_style_depends() {

		// Font Awesome V6.1.2 Enqueue
		wp_register_style( 'font-awesome-free', '//use.fontawesome.com/releases/v6.1.2/css/all.css', array(), '6.1.2', 'all' );
		
		// Contact Form Widget Css Enqueue
		wp_register_style( 'contact-form-widget', ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-form-widget/assets/css/contact-form-widget.css', array(), '1.0.0', 'all' );
		
		// Contact Form Widget Responsive Css Enqueue
		wp_register_style( 'contact-form-widget-responsive', ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-form-widget/assets/css/contact-form-widget-responsive.css', array(), '1.0.0', 'all' );

		// Contact Form 7 Widget Css Enqueue
		wp_register_style( 'contact-form-7-widget', ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-form-widget/assets/css/contact-form-7-widget.css', array(), '1.0.0', 'all' );

		return array(
			'font-awesome-free',

			'contact-form-widget',
			
			'contact-form-widget-responsive',

			'contact-form-7-widget',
		);
	}
	
	// Widget Dependencies Scripts Enqueue
	public function get_script_depends() {

		// Contact Form Widget Enqueue
		wp_register_script( 'contact-form-widget', ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-form-widget/assets/js/contact-form-widget.js', array(), '1.0.0', true );
		
		// Contact Form 7 Widget Enqueue
		wp_register_script( 'contact-form-7-widget', ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-form-widget/assets/js/contact-form-7-widget.js', array(), '1.0.0', true );

		// Svg Loader Js Enqueue
		wp_register_script( 'boxshadow-svg-loader', BOXSHADOW_THEME_DIR_URI . 'assets/js/svg-loader.js', array(), '1.0.0', true );

		return array(
			'contact-form-widget',

			'contact-form-7-widget',
			
			'boxshadow-svg-loader',
		);
	}
 

	// Machine Name or "handle" For the Widget
	public function get_name() {
		return __( 'contact-form-widget', 'boxshadow' );
	}

	// Widget Title Which is Displayed in the Elementor Editor's "widget gallery"
	public function get_title() {
		return __( 'Contact Form', 'boxshadow' );
	}

	// Icon Which is Sisplayed Next to Title in "widget gallery"
	public function get_icon() {
		return 'boxshadow-icon pa-contact-form';
	}

	// Put Widget in a Specific Category.
	public function get_categories() {
		return [ 'box-Shadow' ];
	}

	// Returns the help link in the Widget
	public function get_help_url() {
		return '';
	}

	// Widgets Can be Found on the Dashboard with this Keywords.
	public function get_keywords() {
		return [ ' bx ', ' custom ', ' boxshadow ', ' box shadow ', ' box-shadow ', ' box_shadow ', ' contact ',' contact form ', ' contactform ',' contactform ', ' contact form ', ' contact-form ', ' contact_form ', ' contact_form ', ' contact form 7 ', ' contactformseven ',' contactform7 ', ' contact form seven ', ' contact-form-seven ', ' contact_form_seven ', ' contact_form_7 ', ' box shadow contact form 7 ', ' boxshadow contact form 7 ', ' box-shadow contact form 7 ', ' box_shadow contact form 7 ', ' box shadow contactformseven ', ' box-shadow contactformseven ', ' box_shadow contactformseven ', ' box shadow contactform7 ', ' boxshadow contactform7 ', ' box-shadow contactform7 ', ' box_shadow contactform7 ', ' box shadow contactform7 ', ' box shadow contact form seven ', ' box-shadow contact-form-seven ', ' box_shadow contact_form_seven ', ' box shadow contact_form_7 ', ' boxshadow contact_form_7 ', ' box-shadow contact_form_7 ', ' box_shadow contact_form_7 ' ];
	}

	// Register the Widget Controls (data fields) in this Function.
	protected function register_controls() {
        
		//  Controls Section Start
		$this->start_controls_section( 'contact_form', array (
			'label'		=> esc_html__( 'Contact Form', 'boxshadow' ),
			'type' 		=> Controls_Manager::SECTION, 
			'tab' 		=> Controls_Manager::TAB_CONTENT,
		) );

		$this->add_control( 'boxshadow_contact_form_switcher', array(
			'label'	 		=> esc_html__( 'Boxshadow Contact Form Show/Hide', 'boxshadow' ),
			'type' 			=> Controls_Manager::SWITCHER,
			'label_on' 		=> esc_html__( 'Show', 'boxshadow' ),
			'label_off' 	=> esc_html__( 'Hide', 'boxshadow' ),
			'return_value' 	=> 'yes',
			'default' 		=> 'yes',
		) );
		
		$this->add_control( 'boxshadow_contact_form', array(
			// 'label'   	  => esc_html__( 'Boxshadow Contact Form', 'boxshadow' ),
			'description' => esc_html__( 'Boxshadow Contact Form Label & Fields Enable/Disable', 'boxshadow' ),
			'type'		  => 'BOXSHADOW_CONTACT_FORM',
			'condition'	  => array(
				'boxshadow_contact_form_switcher' => 'yes',
			),
		) );

		$this->add_control( 'contact_form_7_switcher', array(
			'label'	 		=> esc_html__( 'Contact Form 7 Show/Hide', 'boxshadow' ),
			'type' 			=> Controls_Manager::SWITCHER,
			'label_on' 		=> esc_html__( 'Show', 'boxshadow' ),
			'label_off' 	=> esc_html__( 'Hide', 'boxshadow' ),
			'return_value' 	=> 'yes',
			'default' 		=> 'yes',
		) );

		$this->add_control( 'boxshadow_contact_form_7', array(
			'label'   	  => esc_html__( 'Contact Form 7', 'boxshadow' ),
			'description' => esc_html__( 'Select Contact Form 7', 'boxshadow' ),
			'type'		  => 'BOXSHADOW_CONTACT_FORM_7',
			'condition'	  => array(
				'contact_form_7_switcher' => 'yes',
			),
		) );

		//  Controls Section End
		$this->end_controls_section();

    }

	// The Render the Widget Output on the Front End.
	protected function render() {
		// Get  Input From the Widget Settings.
      $settings = $this->get_settings_for_display();
		
		$this->add_inline_editing_attributes( 'boxshadow_subtitle_title', 'basic' );
		$this->add_inline_editing_attributes( 'boxshadow_title', 'basic' );
		$this->add_inline_editing_attributes( 'boxshadow_description', 'basic' );

		?>
		<!-- Contact Section -->
		<section id="contact-section-wrapper">
			<div class="container-md">
				<div class="row m-0 contact-section">
					<div class="col-lg-12 p-0">
						<?php
						/**
						 * Contact Form 
						 **/ 
						if ( $settings['boxshadow_contact_form_switcher'] === 'yes' ) { 
							if ( $settings['boxshadow_contact_form']['name'] === 'true' || $settings['boxshadow_contact_form']['email'] === 'true' || $settings['boxshadow_contact_form']['phone'] === 'true' || $settings['boxshadow_contact_form']['message'] === 'true' ) { 
							?>
							<form id="contact-form" class="contact-info-contact-form" data-aos="zoom-in" novalidate>
								<input type="hidden" name="to_email" value="<?php echo $settings['boxshadow_contact_form']['user_define_email']; ?>" required>

								<?php if ( $settings['boxshadow_contact_form']['name'] === 'true' ) { ?>
								<div class="group name">
									<?php if ( $settings['boxshadow_contact_form']['label'] === 'true' ) { ?>
									<label>Name</label>
									<?php } ?>
									<div class="control">
										<input type="text" inputmode="text" name="name" placeholder="e.g. John Doe" minlength="3" required>
										<span><img src="<?php echo ELEMENTOR_DIR_URI; ?>/elementor-widgets-register/elementor-widgets/contact-form-widget/images/svg/circle-user.svg" alt="SVG" class="svg"/></span>
									</div>
								</div>
								<?php } ?>

								<?php if ( $settings['boxshadow_contact_form']['email'] === 'true' ) { ?>
								<div class="group email">
									<?php if ( $settings['boxshadow_contact_form']['label'] === 'true' ) { ?>
									<label>Email</label>
									<?php } ?>
									<div class="control">
										<input type="email" inputmode="email" name="email" placeholder="e.g. john.doe@gmail.com" required>
										<span><img src="<?php echo ELEMENTOR_DIR_URI; ?>/elementor-widgets-register/elementor-widgets/contact-form-widget/images/svg/envelope.svg" alt="SVG" class="svg"/></span>
									</div>
								</div>
								<?php } ?>

								<?php if ( $settings['boxshadow_contact_form']['phone'] === 'true' ) { ?>
								<div class="group phone">
									<?php if ( $settings['boxshadow_contact_form']['label'] === 'true' ) { ?>
									<label>Phone <span class="optional">(Optional)</span></label>
									<?php } ?>
									<div class="control">
										<input type="tel" inputmode="tel" name="phone" placeholder="Phone Number">
										<span><img src="<?php echo ELEMENTOR_DIR_URI; ?>/elementor-widgets-register/elementor-widgets/contact-form-widget/images/svg/phone.svg" alt="SVG" class="svg"/></span>
									</div>
								</div>
								<?php } ?>

								<?php if ( $settings['boxshadow_contact_form']['message'] === 'true' ) { ?>
								<div class="group message">
									<?php if ( $settings['boxshadow_contact_form']['label'] === 'true' ) { ?>
									<label>Message</label>
									<?php } ?>
									<div class="control">
										<textarea name="message" placeholder="Write message..."></textarea>
										<span><img src="<?php echo ELEMENTOR_DIR_URI; ?>/elementor-widgets-register/elementor-widgets/contact-form-widget/images/svg/comments.svg" alt="SVG" class="svg"/></span>
									</div>
								</div>
								<?php } ?>

								<div class="group">
									<div class="control">
										<button class="send-btn btn-dark" type="submit">
											<span class="submit">Send Message</span>
											<span class="loading"><img src="<?php echo ELEMENTOR_DIR_URI; ?>/elementor-widgets-register/elementor-widgets/contact-form-widget/images/svg/arrows-rotate.svg" alt="SVG" class="svg"></span>
											<span class="check"><img src="<?php echo ELEMENTOR_DIR_URI; ?>/elementor-widgets-register/elementor-widgets/contact-form-widget/images/svg/check.svg" alt="SVG" class="svg"></span>
										</button>
									</div>
								</div>
							</form>
							<script>
								window.addEventListener('load', function (event) {
									var adminUrl = "<?php echo admin_url('admin-ajax.php'); ?>";
									admin_url(adminUrl);
								});
							</script>
						<?php 
							} 
						}
						
						/**
						 * Contact Form 7 
						 **/
						if ( $settings['contact_form_7_switcher'] === 'yes' ) { 
							
							if( ! empty( $settings['boxshadow_contact_form_7'] ) && get_post( $settings['boxshadow_contact_form_7'] ) ) { 
								
								echo do_shortcode( '[contact-form-7 id="'.$settings['boxshadow_contact_form_7'].'"]' );
								
							} else {
								
								if ( is_user_logged_in() ) { ?>
                           <!-- this code for logged in user  -->
									<div class="contact-form-7-no-select">Please Select Contact Form</div>
								<?php
								}

							}
							
						}
						?>
					</div>
				</div>
			</div>
    	</section>
		<script type="text/javascript" class="svg-loader">
			if ( typeof svgLoader == 'function' ) {
				svgLoader();
			}
		</script>
	<?php
	}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Contact_Form_Widget() );
