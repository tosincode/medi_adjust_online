<?php 
/* The function that creates the HTML on the front-end, based on the parameters
* supplied in the product-catalog shortcode */
function EWD_UASP_Appointment_Confirmation($atts) {
	global  $wpdb;
	global  $ewd_usap_appointments_table_name;
		
	$Custom_CSS = get_option('EWD_UASP_Custom_CSS');
		
	// Get the attributes passed by the shortcode, and store them in new variables for processing
	extract( shortcode_atts( array(
				'cancellation_success_message' => __('Your appointment has been cancelled. Thank you for being courteous!', 'ultimate-appointment-scheduling'),
		 		'cancellation_failure_message' => __('Your appointment could not be cancelled. Please contact the site administrator.', 'ultimate-appointment-scheduling'),
		 		'confirmation_success_message' => __('Your appointment has been confirmed. Thank you!', 'ultimate-appointment-scheduling'),
		 		'confirmation_failure_message' => __('Your appointment could not be confirmed. Please contact the site administrator.', 'ultimate-appointment-scheduling')),
		$atts
		)
	);

	$Custom_CSS_String = '<style>' . $Custom_CSS . '</style>';

	$Email = $_GET['Email'];
	$Appt_ID = $_GET['Appt_ID'];

	if (isset($_GET['Action']) and $_GET['Action'] == 'Cancel_Appointment') {
		$wpdb->get_row($wpdb->prepare("SELECT Appointment_ID FROM $ewd_usap_appointments_table_name WHERE Appointment_Client_Email=%s AND Appointment_ID=%d", $Email, $Appt_ID));
		
		if ($wpdb->num_rows == 0) {return $Custom_CSS_String . $cancellation_failure_message;}

		$wpdb->query($wpdb->prepare("DELETE FROM $ewd_usap_appointments_table_name WHERE Appointment_Client_Email=%s AND Appointment_ID=%d", $Email, $Appt_ID));
		return $Custom_CSS_String . $cancellation_success_message;
	}
	else {
		$wpdb->get_results($wpdb->prepare("SELECT Appointment_ID FROM $ewd_usap_appointments_table_name WHERE Appointment_Client_Email=%s AND Appointment_ID=%d", $Email, $Appt_ID));
		if ($wpdb->num_rows == 0) {return $Custom_CSS_String . $confirmation_failure_message;}
		
		$wpdb->get_results($wpdb->prepare("UPDATE $ewd_usap_appointments_table_name SET Appointment_Confirmation_Received='Yes' WHERE Appointment_Client_Email=%s AND Appointment_ID=%d", $Email, $Appt_ID));
		return $Custom_CSS_String . $confirmation_success_message;
	}
}
add_shortcode("confirm-appointment", "EWD_UASP_Appointment_Confirmation");
