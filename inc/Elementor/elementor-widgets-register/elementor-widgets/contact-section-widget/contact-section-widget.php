<?php 

// Custom widgets must be defined in the Elementor namespace
namespace Elementor; 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Contact_Section_Widget extends Widget_Base {

	// Widget Dependencies Styles Enqueue
	public function get_style_depends() {

		// Font Awesome V6.1.2 Enqueue
		wp_register_style( 'font-awesome-free', '//use.fontawesome.com/releases/v6.1.2/css/all.css', array(), '6.1.2', 'all' );
		
		// Contact Section Widget Enqueue
		wp_register_style( 'contact-section-widget', ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-section-widget/assets/css/contact-section-widget.css', array(), '1.0.0', 'all' );
		
		return array(
			'font-awesome-free',

			'contact-section-widget',
		);
	}
	
	// Widget Dependencies Scripts Enqueue
	public function get_script_depends() {
		
		// Svg Loader Js Enqueue
		wp_register_script( 'boxshadow-svg-loader', BOXSHADOW_THEME_DIR_URI . 'assets/js/svg-loader.js', array(), '1.0.0', true );

		return array(
			'boxshadow-svg-loader',
		);
	}
 

	// Machine Name or "handle" For the Widget
	public function get_name() {
		return __( 'contact-section-widget', 'boxshadow' );
	}

	// Widget boxshadow_title Which is Displayed in the Elementor Editor's "widget gallery"
	public function get_title() {
		return __( 'Contact Section', 'boxshadow' );
	}

	// Icon Which is Sisplayed Next to boxshadow_title in "widget gallery"
	public function get_icon() {
		return 'boxshadow-icon fa-solid fa-address-card';
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
		return [ ' bx ', ' custom ', ' boxshadow ', ' box shadow ', ' box-shadow ', ' box_shadow ', ' contact ', ' contactsection', ' contact section', ' contact-section', ' contact_section', ];
	}

	// Register the Widget Controls (data fields) in this Function.
	protected function register_controls() {

		//  Controls Section Start
		$this->start_controls_section( 'contact_heading', array (
			'label'		=> esc_html__( 'Contact Heading', 'boxshadow' ),
			'type' 		=> Controls_Manager::SECTION, 
			'tab' 		=> Controls_Manager::TAB_CONTENT,
		) );

		$this->add_control( 'boxshadow_subtitle_title', array(
			'label' 		=> esc_html__( 'Contact Subtitle boxshadow_title', 'boxshadow' ),
			'type'			=> Controls_Manager::TEXT,
			'label_block' 	=> true,
			'default' 		=> esc_html__( 'contact', 'boxshadow' ),
		) );

		$this->add_control( 'boxshadow_title', array(
			'label' 		=> esc_html__( 'Contact boxshadow_title', 'boxshadow' ),
			'type' 			=> Controls_Manager::TEXTAREA,
			'label_block' 	=> true,
			'rows' 			=> 3,
			'default' 		=> __( 'Have You Any Project?<br/>Please Drop a Message', 'boxshadow' ),
		) );
		
		$this->add_control( 'boxshadow_description', array(
			'label' 		=> esc_html__( 'Contact boxshadow_description', 'boxshadow' ),
			'type' 			=> Controls_Manager::TEXTAREA,
			'label_block' 	=> true,
			'rows' 			=> 4,
			'default' 		=> __( 'Get in touch and let me know how i can help. Fill out the form and i’ll be in touch as soon as possible.', 'boxshadow' ),
		) );

		//  Controls Section End
		$this->end_controls_section();
		
		//  Controls Section Start
		$this->start_controls_section( 'contact_info', array (
			'label' 	=> esc_html__( 'Contact Info', 'boxshadow' ),
			'type' 		=> Controls_Manager::SECTION, 
			'tab' 		=> Controls_Manager::TAB_CONTENT,
		) );

		$this->add_control( 'boxshadow_contact_info_switcher', array(
			'label' 		=> esc_html__( 'Contact Info Show/Hide', 'boxshadow' ),
			'type' 			=> Controls_Manager::SWITCHER,
			'label_on' 		=> esc_html__( 'Show', 'boxshadow' ),
			'label_off' 	=> esc_html__( 'Hide', 'boxshadow' ),
			'return_value' 	=> 'yes',
			'default' 		=> 'yes',
		) );

		$repeater = new Repeater();

		$repeater->add_control( 'boxshadow_contact_info_icon', array( 
			'label' 	=> esc_html__( 'Contact Info Icon', 'boxshadow' ),
			'type' 		=> Controls_Manager::ICONS,
		) );

		$repeater->add_control( 'boxshadow_contact_info_title', array(
			'label' 		=> esc_html__( 'Contact Info boxshadow_title', 'boxshadow' ),
			'type' 			=> Controls_Manager::TEXT,
			'label_block' 	=> true,
			'default' 		=> esc_html__( 'Contact Info boxshadow_title', 'boxshadow' ),
		) );

		$repeater->add_control( 'boxshadow_contact_info_description', array(
			'label' 		=> esc_html__( 'Contact Info boxshadow_description', 'boxshadow' ),
			'type' 			=> Controls_Manager::WYSIWYG,
		) );

		$this->add_control( 'boxshadow_contact_info_repeater', array(
			'label' 		=> esc_html__( 'Contact Info', 'boxshadow' ),
			'type' 			=> Controls_Manager::REPEATER,
			'fields' 		=> $repeater->get_controls(),
			'default' 		=> array(
				array(
					'boxshadow_contact_info_icon'			=> array(
						'value'   =>  array( 
							'url' 	=> ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-section-widget/images/svg/location-dot.svg',
						 ),
						'library' => 'svg',
					),
					'boxshadow_contact_info_title'		=> esc_html__( 'Address:', 'boxshadow' ),
					'boxshadow_contact_info_description'	=> __( '644 N Lake Shore Dr, Chicago, Indiana, 47602-7594', 'boxshadow' )
				),
				array(
					'boxshadow_contact_info_icon'			=> array(
						'value'   =>  array( 
							'url'	=> ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-section-widget/images/svg/phone.svg',
						 ),
						'library' => 'svg',
					),
					'boxshadow_contact_info_title'		=> esc_html__( 'Phone:', 'boxshadow' ),
					'boxshadow_contact_info_description'	=> __( '<ul><li><a href="tel:02966920290">(02) 966 920 290</a></li><li><a href="tel:02966212851">(02) 966 212 851</a></li></ul>', 'boxshadow' )
				),
				array(
					'boxshadow_contact_info_icon'			=> array(
						'value'   =>  array( 
							'url'	=> ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-section-widget/images/svg/envelope-o.svg',
						 ),
						'library' => 'svg',
					),
					'boxshadow_contact_info_title'		=> esc_html__( 'Email:', 'boxshadow' ),
					'boxshadow_contact_info_description'	=> __( '<ul><li><a href="mailto:info@gmail.com">info@gmail.com</a></li><li><a href="mailto:support@gmail.com">support@gmail.com</a></li></ul>', 'boxshadow' )
				),
			),
			'title_field' 	=> '{{{ elementor.helpers.renderIcon( this, boxshadow_contact_info_icon, {}, "i", "panel" ) }}} {{{ boxshadow_contact_info_title }}}',
			'condition' 	=> array( 
				'boxshadow_contact_info_switcher' => 'yes'
			 ),
		) );
			
		//  Controls Section End
		$this->end_controls_section();

		//  Controls Section Start
		$this->start_controls_section( 'social_icons', array (
			'label' 	=> esc_html__( 'Social Icons', 'boxshadow' ),
			'type' 		=> Controls_Manager::SECTION, 
			'tab' 		=> Controls_Manager::TAB_CONTENT,
		) );

		$this->add_control( 'boxshadow_social_icons_switcher', array(
			'label'	 		=> esc_html__( 'Social Icons Show/Hide', 'boxshadow' ),
			'type' 			=> Controls_Manager::SWITCHER,
			'label_on' 		=> esc_html__( 'Show', 'boxshadow' ),
			'label_off' 	=> esc_html__( 'Hide', 'boxshadow' ),
			'return_value' 	=> 'yes',
			'default' 		=> 'yes',
		) );

		$repeater = new Repeater();

		$repeater->add_control( 'boxshadow_social_icon_link', array( 
			'label' 		=> esc_html__( 'Social Link', 'boxshadow' ),
			'type' 			=> Controls_Manager::URL,
			'options' 		=> array( 'url', 'is_external', 'nofollow' ),
		) );

		$repeater->add_control( 'boxshadow_social_icon', array(
			'label' 	=> esc_html__( 'Social Icon', 'boxshadow' ),
			'type' 		=> Controls_Manager::ICONS,
		) );

		$this->add_control( 'boxshadow_social_icons_repeater', array(
			'label' 		=> esc_html__( 'Socia Icons', 'boxshadow' ),
			'type' 			=> Controls_Manager::REPEATER,
			'fields' 		=> $repeater->get_controls(),
			'default' 		=> array(
				array(
					'boxshadow_social_icon_link' 			=> array(
						'url' 				=> 'https://twitter.com/',
						'is_external'		=> true,
						'nofollow' 			=> true,
					),
					'boxshadow_social_icon'				=> array(
						'value'   =>  array( 
							'url' 	=> ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-section-widget/images/svg/twitter.svg',
						 ),
						'library' => 'svg',
					),
				),
				array(
					'boxshadow_social_icon_link' 			=> array(
						'url' 				=> 'https://www.facebook.com/',
						'is_external'		=> true,
						'nofollow' 			=> true,
					),
					'boxshadow_social_icon'				=> array(
						'value'   =>  array( 
							'url' 	=> ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-section-widget/images/svg/facebook-f.svg',
						 ),
						'library' => 'svg',
					),
				),
				array(
					'boxshadow_social_icon_link' 			=> array(
						'url' 				=> 'https://www.instagram.com/',
						'is_external'		=> true,
						'nofollow' 			=> true,
					),
					'boxshadow_social_icon'				=> array(
						'value'   =>  array( 
							'url' 	=> ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-section-widget/images/svg/instagram.svg',
						 ),
						'library' => 'svg',
					),
				),
				array(
					'boxshadow_social_icon_link' 			=> array(
						'url' 				=> 'https://www.linkedin.com/',
						'is_external'		=> true,
						'nofollow' 			=> true,
					),
					'boxshadow_social_icon'				=> array(
						'value'   =>  array( 
							'url' 	=> ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-section-widget/images/svg/linkedin-in.svg',
						 ),
						'library' => 'svg',
					),
				),
				array(
					'boxshadow_social_icon_link' 			=> array(
						'url' 				=> 'https://dribbble.com/',
						'is_external'		=> true,
						'nofollow' 			=> true,
					),
					'boxshadow_social_icon'				=> array(
						'value'   =>  array( 
							'url' 	=> ELEMENTOR_DIR_URI . '/elementor-widgets-register/elementor-widgets/contact-section-widget/images/svg/dribbble.svg',
						 ),
						'library' => 'svg',
					),
				),
			),
			'title_field'	=> '{{{ elementor.helpers.renderIcon( this, boxshadow_social_icon, {}, "i", "panel" ) }}}',
			'condition'		=> array( 
				'boxshadow_social_icons_switcher' => 'yes'
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
						<div class="contact-text">
							<div class="text-box-inline">
								<span data-aos="zoom-in" <?php echo $this->get_render_attribute_string( 'boxshadow_subtitle_title' ); ?>><?php echo $settings['boxshadow_subtitle_title']; ?></span>
								<h2 data-aos="fade-up" <?php echo $this->get_render_attribute_string( 'boxshadow_title' ); ?>><?php echo $settings['boxshadow_title'] ?></h2>
								<p data-aos="fade-up" data-aos-delay="100" <?php echo $this->get_render_attribute_string( 'boxshadow_description' ); ?>><?php echo $settings['boxshadow_description']; ?></p>
							</div>
							
							<?php
							if ( $settings['boxshadow_contact_info_switcher'] === 'yes' ) {
								if ( $settings['boxshadow_contact_info_repeater'] ) {
							?>
								<ul class="contact-info">
									<?php 
									foreach ( $settings['boxshadow_contact_info_repeater'] as $item ) { ?>
									
									<li data-aos="fade-up">
										<span>
										<?php 
										if ( is_array( $item['boxshadow_contact_info_icon']['value'] ) && !empty( $item['boxshadow_contact_info_icon']['value']['url'] ) ) {
										
											echo '<img class="svg" src="' . $item['boxshadow_contact_info_icon']['value']['url'] . '" />';
											
										} elseif ( !is_array( $item['boxshadow_contact_info_icon']['value'] ) && !empty( $item['boxshadow_contact_info_icon']['value'] ) ) {
											
											Icons_Manager::render_icon( $item['boxshadow_contact_info_icon'], [ 'aria-hidden' => 'true' ] );
		
										}
										?>
										</span>
										<div><strong><?php echo $item['boxshadow_contact_info_title']; ?></strong><?php echo $item['boxshadow_contact_info_description']; ?></div>
									</li>
									
									<?php
									}
									?>
								</ul>
							<?php
								}
							}

							if ( $settings['boxshadow_social_icons_switcher'] === 'yes' ) {
								if ( $settings['boxshadow_social_icons_repeater'] ) {
							?>
								<ul class="social">
									<?php
									foreach ( $settings['boxshadow_social_icons_repeater'] as $item ) { ?>
									<li data-aos="zoom-in-up" data-aos-delay="100">
										<?php 
										$url =  ( ! empty( $item['boxshadow_social_icon_link']['url'] ) ) ? 'href="' . $item['boxshadow_social_icon_link']['url'] . '"' : '';	// href
										$is_external =  ( $item['boxshadow_social_icon_link']['is_external'] === true ) ? 'target="_blank"' : '';	// target
										$nofollow =  ( $item['boxshadow_social_icon_link']['nofollow'] === true ) ? 'rel="nofollow"' : '';	// rel
										?>
										<a <?php echo $url; echo $is_external; echo $nofollow; ?> >
											<span>
											<?php 
											if ( is_array( $item['boxshadow_social_icon']['value'] ) && !empty( $item['boxshadow_social_icon']['value']['url'] ) ) {
											
												echo '<img class="svg" src="' . $item['boxshadow_social_icon']['value']['url'] . '" />';
												
											} elseif ( !is_array( $item['boxshadow_social_icon']['value'] ) && !empty( $item['boxshadow_social_icon']['value'] ) ) {
												
												Icons_Manager::render_icon( $item['boxshadow_social_icon'], [ 'aria-hidden' => 'true' ] );
			
											}
											?>
											</span>
										</a>
									</li>
									<?php 
									}
									?>
								</ul>
							<?php 
								}
							}
							?>
						</div>
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

	// Elementor Editor When Something Causes the Preview to be Reloaded
	protected function content_template() { ?>
		<# 
		view.addInlineEditingAttributes( 'boxshadow_subtitle_title', 'basic' );
		view.addInlineEditingAttributes( 'boxshadow_title', 'basic' );
		view.addInlineEditingAttributes( 'boxshadow_description', 'basic' );
		#>
		
		<!-- Contact Section -->
		<section id="contact-section-wrapper">
			<div class="container-md">
				<div class="row m-0 contact-section">
					<div class="col-lg-12 p-0">
						<div class="contact-text">
							<div class="text-box-inline">
								<span {{{ view.getRenderAttributeString( 'boxshadow_subtitle_title' ) }}}>{{{ settings.boxshadow_subtitle_title }}}</span>
								<h2 {{{ view.getRenderAttributeString( 'boxshadow_title' ) }}}>{{{ settings.boxshadow_title }}}</h2>
								<p {{{ view.getRenderAttributeString( 'boxshadow_description' ) }}}>{{{ settings.boxshadow_description }}}</p>
							</div>
							<# 
							if ( settings.boxshadow_contact_info_switcher === 'yes' ) {

								if ( settings.boxshadow_contact_info_repeater.length ) { #>
									<ul class="contact-info">
										<# _.each( settings.boxshadow_contact_info_repeater, function( item ) { #>

										<li>
										<# if ( _.isObject( item.boxshadow_contact_info_icon.value ) && item.boxshadow_contact_info_icon.value.url.length ) { #>
                                            
                                            <span><img class="svg" src="{{{ item.boxshadow_contact_info_icon.value.url }}}" /></span>
                                        
                                        <#  } else {

                                                if ( item.boxshadow_contact_info_icon.value.length ) { #>
                                                
                                                    <span>{{{ elementor.helpers.renderIcon( view, item.boxshadow_contact_info_icon, { 'aria-hidden': true }, 'i' , 'object' ).value }}}</span>
                                            
                                                <# }

                                        } #>
                                            <div><strong>{{{ item.boxshadow_contact_info_title }}}</strong>{{{ item.boxshadow_contact_info_description }}}</div>
                                        </li>
											
										<# } ); #>
									</ul>
							<#  }

							}

							if ( settings.boxshadow_social_icons_switcher === 'yes' ) {  
								if ( settings.boxshadow_social_icons_repeater.length ) { #>
									<ul class="social">
										<# _.each( settings.boxshadow_social_icons_repeater, function( item ) { #>
										<li>
											<#
											var url = ( item.boxshadow_social_icon_link.url.length ) ? 'href="'+item.boxshadow_social_icon_link.url+'"' : '';	<!-- href -->
											var is_external = ( item.boxshadow_social_icon_link.is_external === true ) ? 'target="_blank"' : '';	<!-- target -->
											var nofollow = ( item.boxshadow_social_icon_link.nofollow === true ) ? 'rel="nofollow"' : '';	<!-- rel -->
											#>
											<a {{{ url }}} {{{ is_external }}} {{{ nofollow }}} >
												<# if ( _.isObject( item.boxshadow_social_icon.value ) && item.boxshadow_social_icon.value.url.length ) { #>

													<span><img class="svg" src="{{{ item.boxshadow_social_icon.value.url }}}" /></span>

												<#  } else {

													if ( item.boxshadow_social_icon.value.length ) { #>

														<span>{{{ elementor.helpers.renderIcon( view, item.boxshadow_social_icon, { 'aria-hidden': true }, 'i' , 'object' ).value }}}</span>

													<# }

												} #>
											</a>
										</li>
										<#
										} ); #>
									</ul>
							<#	}
							} #>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script type="text/javascript">
			if ( typeof svgLoader == 'function' ) {
				svgLoader();
			}
		</script>
	<?php
	}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Contact_Section_Widget() );