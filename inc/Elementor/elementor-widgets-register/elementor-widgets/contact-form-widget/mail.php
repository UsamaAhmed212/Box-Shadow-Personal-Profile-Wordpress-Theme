<?php 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


// Add action for logged-in users
add_action( 'wp_ajax_sand_mail', 'sand_mail' );

// Add action for non-logged-in users (public)
add_action( 'wp_ajax_nopriv_sand_mail', 'sand_mail' );

function sand_mail() {
    
    $data = [];
    
    // Parse the data and populate the $data array.
    wp_parse_str($_POST['sand_mail'], $data);
    
    // Remove spaces, tabs, and newlines from the recipient email address.
    $to = preg_replace('/\s/', '', $data['to_email']);

    // Validate the recipient email address.
    $to = ( filter_var( $to, FILTER_VALIDATE_EMAIL ) ) ? $to : get_option( "admin_email", false );
    
    // Check if the validated recipient email is still a valid email address.
    if ( filter_var($to, FILTER_VALIDATE_EMAIL) ) {

        // Function to send the email
        function sendMail($data, $to) {

            // Subject: Use the provided subject or the site name.
            $subject = ( !empty($data['subject']) ) ? $data['subject'] : esc_html( get_bloginfo( 'name' ) );
            

            // Construct the email body by reading it from an HTML template file.
            $emailTemplate = file_get_contents( __DIR__ . '/../../../../contact-form-7/email-templates/contact-us.html' );
            
            
            // Get the site Url and replace the placeholder [current_directory_uri] in the email template.
            $replacement = esc_url( trailingslashit( get_template_directory_uri() . '/inc/contact-form-7' ) );
            $emailTemplate = str_replace('[current_directory_uri]', $replacement, $emailTemplate);
            
            // Get the site name and replace the placeholder [_site_title] in the email template.
            $replacement = get_bloginfo('name');
            $emailTemplate = str_replace('[_site_title]', $replacement, $emailTemplate);
            
            // Get the site URL and extract the domain (removing 'http://', 'https://', 'www.', and any trailing slashes).
            $url = get_bloginfo('url');
		    $replacement = preg_replace("~^(https?:\/\/)?(www\.)?(.*?)(\/*)?$~", "$3", $url);
            // Replace the placeholder [current_site_url] in the email template with the extracted domain.
            $emailTemplate = str_replace('[current_site_url]', $replacement, $emailTemplate);
            
            
            /*
            * Replace placeholders in the email template with data from the parsed form fields.
            * Start
            */
            $replacement = $data['name'] ?? '[your-name]';
            $emailTemplate = str_replace('[your-name]', $replacement, $emailTemplate);

            $replacement = $data['email'] ?? '[your-email]';
            $emailTemplate = str_replace('[your-email]', $replacement, $emailTemplate);

            $replacement = $data['phone'] ?? '[your-phone]';
            $emailTemplate = str_replace('[your-phone]', $replacement, $emailTemplate);

            $replacement = $data['subject'] ?? '[your-subject]';
            $emailTemplate = str_replace('[your-subject]', $replacement, $emailTemplate);

            $replacement = $data['message'] ?? '[your-message]';
            $emailTemplate = str_replace('[your-message]', $replacement, $emailTemplate);
            /*
            * Replace placeholders in the email template with data from the parsed form fields.
            * End
            */


            $dateTime = new DateTime('now', new DateTimezone('UTC'));
            // $dateTime = new DateTime('now', new DateTimezone('Asia/Dhaka'));

            // Replace the placeholder [current_date] in the email template with the current date.
            $replacement = esc_html( $dateTime->format('d F Y') );
            $emailTemplate = str_replace('[current_date]', $replacement, $emailTemplate);

            // Replace the placeholder [current_time] in the email template with the current time and timezone.
            $replacement = esc_html( $dateTime->format('H:i') .' '. $dateTime->getTimezone()->getName() );
            $emailTemplate = str_replace('[current_time]', $replacement, $emailTemplate);

            // Replace the placeholder [current_year] in the email template with the current year.
            $replacement = esc_html( $dateTime->format('Y') );
            $emailTemplate = str_replace('[current_year]', $replacement, $emailTemplate);
            
            /*
            * Set the email body as the modified email template.
            * Assign the modified email template to the $body variable.
            */
            $body = $emailTemplate;

            // Define the email headers
            // $headers = array(
            //     "Content-Type: text/html; charset=UTF-8",
            //     "Reply-To: {$data['name']} <{$data['email']}>"
            // );
            // $headers = implode("\r\n", $headers); // optional
            
            // Define the email headers
            $headers .= "Content-Type: text/html; charset=UTF-8\n";
            $headers .= "Reply-To: {$data['name']} <{$data['email']}>\n";
            
            // display message based on the result.
            if ( wp_mail( $to, $subject, $body , $headers ) ) {

                // The message was sent successfully.
                wp_send_json_success("Thank you for your message. It has been sent.");

            } else {

                // There was an error sending the message.
                wp_send_json_error("There was an error trying to send your message. It hasn't been sent.");
            
            }
            
        }
        
        // Check if the 'email' key exists in the $data array.
        if ( isset($data['email']) && $data['email'] !== '' ) {

            // Check if the provided email is valid.
            if ( filter_var($data['email'], FILTER_VALIDATE_EMAIL) ) {

                // Send the email with validation.
                sendMail($data, $to);

            } else {

                // The provided email is invalid.
                wp_send_json_error("One or more fields have an error. Please check and try again.");
            
            }

        } else {

            // 'email' key does not exist; send the email without email validation.
            sendMail($data, $to);

        }

    } else {

        // The recipient email address is invalid.
        wp_send_json_error("There was an server error trying to send your message. Please try again later.");
    
    }

}
