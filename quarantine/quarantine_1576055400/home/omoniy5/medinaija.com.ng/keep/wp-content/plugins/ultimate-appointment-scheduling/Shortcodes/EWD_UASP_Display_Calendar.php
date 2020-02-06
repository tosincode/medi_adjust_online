<?php
/* The function that creates the HTML on the front-end, based on the parameters
* supplied in the product-catalog shortcode */
function EWD_UASP_Display_Appointment_Scheduler($atts) {
	extract( shortcode_atts( array(
				'redirect_page' => '#',
				'appointment_selection' => ''
				),
		$atts
		)
	);
	return do_shortcode("[ultimate-appointment-dropdown display_type='Calendar' redirect_page='" . $redirect_page . "' appointment_selection='" . $appointment_selection . "']");
}
add_shortcode("ultimate-appointment-calendar", "EWD_UASP_Display_Appointment_Scheduler");
