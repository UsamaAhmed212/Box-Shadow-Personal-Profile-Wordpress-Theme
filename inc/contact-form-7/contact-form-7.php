<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/* Custom Contact Form 7 Default Form Template */
function custom_contact_form_7_default_form_template($template, $prop) {

    if ('form' == $prop) {

    $template =
'<label> Name
    [text* your-name placeholder "e.g. John Doe"] </label>

<label> Email
    [email* your-email placeholder "e.g. john.doe@gmail.com"] </label>
         
<label> Phone <span class="optional">(Optional)</span>
    [tel your-phone placeholder "Phone Number"] </label>
         
<label> Message
    [textarea your-message placeholder "Write message..."] </label>
         
[submit "Send Message"]';

        return trim( $template );
    
    } else {
        return $template;
    }

}
add_filter('wpcf7_default_template', 'custom_contact_form_7_default_form_template', 10, 2);


/* Custom Contact Form 7 Default Mail Template */
function custom_contact_form_7_default_mail_template($template, $prop) {

    if ('mail' == $prop) {
		
        $template = array(
			'recipient' => '[_site_admin_email]',
            'sender' => '[_site_title] <[_site_admin_email]>',
			'subject' => '[_site_title] "[your-subject]"',
			'additional_headers' => 'Reply-To: [your-email]',
			'body' => file_get_contents( __DIR__ . '/email-templates/contact-us.html' ),
            'exclude_blank' => 0,
			'use_html' => 1,
			'attachments' => '',
		);

        return $template;

    } else {
        return $template;
    }
    
}
add_filter('wpcf7_default_template', 'custom_contact_form_7_default_mail_template', 10, 2);


/**
 * Shortcode [current_datetime]  
 * Custom Contact Form 7 Special Mail (Tag/shortcode).
 * This function returns the current date and time in the specified format.
 * ('d F Y H:i:s' stands for Day Month Year Hour:Minute:Second).
 */
function custom_contact_form_7_special_mail_tag( $output, $name) {

    if ( 'current_date' === $name || 'current_year' === $name || 'current_time' === $name ) {

        $dateTime = new DateTime('now', new DateTimezone('UTC'));
        // $dateTime = new DateTime('now', new DateTimezone('Asia/Dhaka'));

		if ( 'current_date' === $name ) {
            $output = esc_html( $dateTime->format('d F Y') );
        }

		if ( 'current_year' === $name ) {
            $output = esc_html( $dateTime->format('Y') );
        }
        
        if ( 'current_time' === $name ) {
            $output = esc_html( $dateTime->format('H:i') .' '. $dateTime->getTimezone()->getName() );
            // $output = esc_html( $dateTime->format('h:i A') );
        }
	}

    if ( 'current_directory_uri' === $name ) {
        $current_directory_end_path = str_replace( '\\', '/', str_replace( str_replace( '/', '\\', get_template_directory() ), '', str_replace( '/', '\\', __DIR__ ) ) );

		$output = esc_url( trailingslashit( get_template_directory_uri() . $current_directory_end_path ) );
	}

    if ( 'current_site_url' === $name ) {
        $url = get_bloginfo('url');
        
		$output = preg_replace("~^(https?:\/\/)?(www\.)?(.*?)(\/*)?$~", "$3", $url);
	}

    return $output;
}
add_filter( 'wpcf7_special_mail_tags', 'custom_contact_form_7_special_mail_tag', 10, 2 );
