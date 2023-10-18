<?php

// Custom widgets must be defined in the Elementor namespace
namespace Elementor; 


/**
 * Elementor currency control.
 *
 * A control for displaying a select field with the ability to choose currencies.
 *
 * @since 1.0.0
 */
class Contact_form_Control extends Base_Data_Control {

	// Control Dependencies Styles Enqueue
	public function enqueue() {
        // Styles
		wp_register_style( 'contact-form-control', ELEMENTOR_DIR_URI . '/elementor-controls-register/elementor-controls/contact-form-control/assets/css/contact-form-control.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'contact-form-control' );
		
        // Scripts
		wp_register_script( 'contact-form-control', ELEMENTOR_DIR_URI . '/elementor-controls-register/elementor-controls/contact-form-control/assets/js/contact-form-control.js', array(), '1.0.0', 'all' );
		wp_enqueue_script( 'contact-form-control' );
	}

	// Get Boxshadow Contact Form Control type
	public function get_type() {
		return 'BOXSHADOW_CONTACT_FORM';
	}

	// Get Boxshadow Contact Form Control Default Settings
	protected function get_default_settings() {
		return [
			'label_block' => true,
		];
	}
	
	// The Default Settings While Initializing the Boxshadow Contact Form Control
	public function get_default_value() {
		return [
			'user_define_email' => get_option( "admin_email", false ), // get_option( "admin_email" ) is a Wordpress function 
			'label' => 'true',
			'name' => 'true',
			'email' => 'true',
			'phone' => 'true',
			'message' => 'true',
		];
	}

	// Render Contact Form 7 Control Output in the Editor
	public function content_template() { ?>
		<div class="elementor-control-field">
			
			<div class="boxshadow-user-define-email-control boxshadow-label-block">
				<label class="elementor-control-title">Send To Email Address</label>
				<div class="boxshadow-control-input-wrapper">
					<# if ( data.controlValue.user_define_email === '<?php echo get_option( "admin_email", false ); ?>' ) { #>
						<input class="boxshadow-contact-form-user-define-email" type="email" name="contact_form_user_define_email" default-value="{{{ data.default_value.user_define_email }}}" value="[wp_admin_email]"/>
					<# } else { #> 
						<input class="boxshadow-contact-form-user-define-email" type="email" name="contact_form_user_define_email" default-value="{{{ data.default_value.user_define_email }}}" value="{{{ data.controlValue.user_define_email }}}"/>
					<# } #>
				</div>
				<div class="elementor-control-field-description">Enter email address where email will be Sent</div>
			</div>
			
			<# if ( data.label ) {#>
			<label class="elementor-control-title">{{{ data.label }}}</label>
			<# } #>

			<div class="elementor-control-input-wrapper">
				
                <div class="boxshadow-checkbox-wrapper-7">
                    <span class="title"><?php echo esc_html__( 'Form Label Show/Hide', 'boxshadow' ); ?></span>
                    <span>
						<# if ( data.controlValue.label === 'false' ) { #>
							<input id="cb-7" class="boxshadow-contact-form" type="checkbox" name="label"/>
						<# } else { #>
							<input id="cb-7" class="boxshadow-contact-form" type="checkbox" name="label" checked/>
						<# } #>
                        <label for="cb-7"></label>
                    </span>
                </div>

                <div class="boxshadow-checkbox-wrapper-55">
                    <span class="title"><?php echo esc_html__( 'Name Visible', 'boxshadow' ); ?></span>
                    <label>
						<# if ( data.controlValue.name === 'false' ) {#>
							<input class="boxshadow-contact-form" type="checkbox" name="name">
						<# } else { #>
							<input class="boxshadow-contact-form" type="checkbox" name="name" checked>
						<# } #>
                        <span class="switch-left"><?php echo esc_html__( 'No', 'boxshadow' ); ?></span>
                        <span class="switch-right"><?php echo esc_html__( 'Yes', 'boxshadow' ); ?></span>
                    </label>
                </div>

                <div class="boxshadow-checkbox-wrapper-55">
                    <span class="title"><?php echo esc_html__( 'Email Visible', 'boxshadow' ); ?></span>
                    <label>
						<# if ( data.controlValue.email === 'false' ) {#>
							<input class="boxshadow-contact-form" type="checkbox" name="email">
						<# } else { #>
							<input class="boxshadow-contact-form" type="checkbox" name="email" checked>
						<# } #>
                        <span class="switch-left"><?php echo esc_html__( 'No', 'boxshadow' ); ?></span>
                        <span class="switch-right"><?php echo esc_html__( 'Yes', 'boxshadow' ); ?></span>
                    </label>
                </div>

                <div class="boxshadow-checkbox-wrapper-55">
                    <span class="title"><?php echo esc_html__( 'Phone Visible', 'boxshadow' ); ?></span>
                    <label>
						<# if ( data.controlValue.phone === 'false' ) {#>
							<input class="boxshadow-contact-form" type="checkbox" name="phone">
						<# } else { #>
							<input class="boxshadow-contact-form" type="checkbox" name="phone" checked>
						<# } #>
                        <span class="switch-left"><?php echo esc_html__( 'No', 'boxshadow' ); ?></span>
                        <span class="switch-right"><?php echo esc_html__( 'Yes', 'boxshadow' ); ?></span>
                    </label>
                </div>
				
                <div class="boxshadow-checkbox-wrapper-55">
                    <span class="title"><?php echo esc_html__( 'Message Visible', 'boxshadow' ); ?></span>
                    <label>
						<# if ( data.controlValue.message === 'false' ) {#>
							<input class="boxshadow-contact-form" type="checkbox" name="message">
						<# } else { #>
							<input class="boxshadow-contact-form" type="checkbox" name="message" checked>
						<# } #>
                        <span class="switch-left"><?php echo esc_html__( 'No', 'boxshadow' ); ?></span>
                        <span class="switch-right"><?php echo esc_html__( 'Yes', 'boxshadow' ); ?></span>
                    </label>
                </div>

			</div>

		</div>

		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
	<?php
	}

}
Plugin::instance()->controls_manager->register_control( 'BOXSHADOW_CONTACT_FORM', new Contact_form_Control() );