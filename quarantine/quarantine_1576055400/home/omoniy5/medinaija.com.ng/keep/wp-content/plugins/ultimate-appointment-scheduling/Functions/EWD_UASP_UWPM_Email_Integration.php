<?php

function EWD_UASP_Add_UWPM_Element_Sections() {
	if (function_exists('uwpm_register_custom_element_section')) {
		uwpm_register_custom_element_section('ewd_uasp_uwpm_elements', array('label' => 'Appointment Scheduling Tags'));
	}
}
add_action('uwpm_register_custom_element_section', 'EWD_UASP_Add_UWPM_Element_Sections');

function EWD_UASP_Add_UWPM_Elements() {
	global $wpdb;
	global $ewd_uasp_fields_table_name;

	if (function_exists('uwpm_register_custom_element')) {
		uwpm_register_custom_element('ewd_uasp_appointment_time', 
			array(
				'label' => 'Appointment Time',
				'callback_function' => 'EWD_UASP_UWPM_Appointment_Time',
				'section' => 'ewd_uasp_uwpm_elements'
			)
		);
		uwpm_register_custom_element('ewd_uasp_client_name', 
			array(
				'label' => 'Client Name',
				'callback_function' => 'EWD_UASP_UWPM_Client_Name',
				'section' => 'ewd_uasp_uwpm_elements'
			)
		);
		uwpm_register_custom_element('ewd_uasp_client_phone', 
			array(
				'label' => 'Client Phone',
				'callback_function' => 'EWD_UASP_UWPM_Client_Phone',
				'section' => 'ewd_uasp_uwpm_elements'
			)
		);
		uwpm_register_custom_element('ewd_uasp_client_email', 
			array(
				'label' => 'Client Email',
				'callback_function' => 'EWD_UASP_UWPM_Client_Email',
				'section' => 'ewd_uasp_uwpm_elements'
			)
		);
		uwpm_register_custom_element('ewd_uasp_location', 
			array(
				'label' => 'Location',
				'callback_function' => 'EWD_UASP_UWPM_Location',
				'section' => 'ewd_uasp_uwpm_elements'
			)
		);
		uwpm_register_custom_element('ewd_uasp_service', 
			array(
				'label' => 'Service',
				'callback_function' => 'EWD_UASP_UWPM_Service',
				'section' => 'ewd_uasp_uwpm_elements'
			)
		);
		uwpm_register_custom_element('ewd_uasp_service_provider', 
			array(
				'label' => 'Service Provider',
				'callback_function' => 'EWD_UASP_UWPM_Service_Provider',
				'section' => 'ewd_uasp_uwpm_elements'
			)
		);

		uwpm_register_custom_element('ewd_uasp_confirmation_link', 
			array(
				'label' => 'Confirmation Link',
				'callback_function' => 'EWD_UASP_UWPM_Confirmation_Link',
				'section' => 'ewd_uasp_uwpm_elements'
			)
		);

		uwpm_register_custom_element('ewd_uasp_cancellation_link', 
			array(
				'label' => 'Cancellation Link',
				'callback_function' => 'EWD_UASP_UWPM_Cancellation_Link',
				'section' => 'ewd_uasp_uwpm_elements'
			)
		);

		uwpm_register_custom_element('ewd_uasp_admin_appointment_link', 
			array(
				'label' => 'Admin Appointment Link',
				'callback_function' => 'EWD_UASP_UWPM_Admin_Appointment_Link',
				'section' => 'ewd_uasp_uwpm_elements'
			)
		);

		$Fields = $wpdb->get_results("SELECT Field_Name, Field_Slug FROM $ewd_uasp_fields_table_name");
		foreach ($Fields as $Field) {
			uwpm_register_custom_element('ewd_uasp_' . $Field->Field_Slug, 
				array(
					'label' => $Field->Field_Name,
					'callback_function' => 'EWD_UASP_UWPM_Field_Replace_Function',
					'section' => 'ewd_uasp_uwpm_elements'
				)
			);
		}
	}
}
add_action('uwpm_register_custom_element', 'EWD_UASP_Add_UWPM_Elements');

function EWD_UASP_UWPM_Appointment_Time($Params, $User) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	if (!isset($Params['appointment_id'])) {return;}

	return $wpdb->get_var($wpdb->prepare("SELECT Appointment_Start FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Params['appointment_id']));
}

function EWD_UASP_UWPM_Client_Name($Params, $User) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	if (!isset($Params['appointment_id'])) {return;}

	return $wpdb->get_var($wpdb->prepare("SELECT Appointment_Client_Name FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Params['appointment_id']));
}

function EWD_UASP_UWPM_Client_Phone($Params, $User) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	if (!isset($Params['appointment_id'])) {return;}

	return $wpdb->get_var($wpdb->prepare("SELECT Appointment_Client_Phone FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Params['appointment_id']));
}

function EWD_UASP_UWPM_Client_Email($Params, $User) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	if (!isset($Params['appointment_id'])) {return;}

	return $wpdb->get_var($wpdb->prepare("SELECT Appointment_Client_Email FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Params['appointment_id']));
}

function EWD_UASP_UWPM_Location($Params, $User) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	if (!isset($Params['appointment_id'])) {return;}

	return $wpdb->get_var($wpdb->prepare("SELECT Location_Name FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Params['appointment_id']));
}

function EWD_UASP_UWPM_Service($Params, $User) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	if (!isset($Params['appointment_id'])) {return;}

	return $wpdb->get_var($wpdb->prepare("SELECT Service_Name FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Params['appointment_id']));
}

function EWD_UASP_UWPM_Service_Provider($Params, $User) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	if (!isset($Params['appointment_id'])) {return;}

	return $wpdb->get_var($wpdb->prepare("SELECT Service_Provider_Name FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Params['appointment_id']));
}

function EWD_UASP_UWPM_Confirmation_Link($Params, $User) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	$Appointment_Confirmation_Page = get_option("EWD_UASP_Appointment_Confirmation_Page");

	if (!isset($Params['appointment_id'])) {return;}

	$Appointment = $wpdb->get_row($wpdb->prepare("SELECT Appointment_ID, Appointment_Client_Email FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Params['appointment_id']));

	if (strpos($Appointment_Confirmation_Page, "?") === false) {$Confirmation_URL = $Appointment_Confirmation_Page . "?";}
	else {$Confirmation_URL = $Appointment_Confirmation_Page . "&";}
	$Confirmation_URL .= "Appt_ID=" . $Appointment->Appointment_ID . "&Email=" . $Appointment->Appointment_Client_Email;

	$Confirmation_Button = '<table><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top"><a href="' . $Confirmation_URL . '" class="btn-primary" itemprop="url" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">' . __('Confirm Appointment', 'ultimate-appointment-scheduling') . '</a></td></tr></table>';

	return $Confirmation_Button;
}

function EWD_UASP_UWPM_Cancellation_Link($Params, $User) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	$Appointment_Confirmation_Page = get_option("EWD_UASP_Appointment_Confirmation_Page");

	if (!isset($Params['appointment_id'])) {return;}

	$Appointment = $wpdb->get_row($wpdb->prepare("SELECT Appointment_ID, Appointment_Client_Email FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Params['appointment_id']));

	if (strpos($Appointment_Confirmation_Page, "?") === false) {$Cancellation_URL = $Appointment_Confirmation_Page . "?";}
	else {$Cancellation_URL = $Appointment_Confirmation_Page . "&";}
	$Cancellation_URL .= "Appt_ID=" . $Appointment->Appointment_ID . "&Email=" . $Appointment->Appointment_Client_Email . "&Action=Cancel_Appointment";

	$Cancellation_Button = '<table><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top"><a href="' . $Cancellation_URL . '" class="btn-primary" itemprop="url" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">' . __('Cancel Appointment', 'ultimate-appointment-scheduling') . '</a></td></tr></table>';

	return $Cancellation_Button;
}

function EWD_UASP_UWPM_Admin_Appointment_Link($Params, $User) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	if (!isset($Params['appointment_id'])) {return;}

	get_site_url() . 'wp-admin/admin.php?page=EWD-UASP-options&Action=EWD_UASP_AppointmentDetails&Selected=Appointment&Appointment_ID=' . $Params['appointment_id'];

	$Admin_Appointment_Link = $wpdb->get_row($wpdb->prepare("SELECT Appointment_ID, Appointment_Client_Email FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Params['appointment_id']));

	$Admin_Appointment_Button = '<table><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top"><a href="' . $Admin_Appointment_Link . '" class="btn-primary" itemprop="url" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">' . __('View Appointment', 'ultimate-appointment-scheduling') . '</a></td></tr></table>';

	return $Admin_Appointment_Button;
}


function EWD_UASP_UWPM_Field_Replace_Function($Params, $User) {
	global $wpdb;
	global $ewd_uasp_fields_table_name;
	global $ewd_uasp_fields_meta_table_name;
	
	if (!isset($Params['appointment_id']) or !isset($Params['replace_slug'])) {return;}

	$Field = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ewd_uasp_fields_table_name WHERE Field_Slug=%s", substr($Params['replace_slug'], 9)));

	return $wpdb->get_var($wpdb->prepare("SELECT Meta_Value FROM $ewd_uasp_fields_meta_table_name WHERE Field_ID=%d AND Appointment_ID=%d", $Field->Field_ID, $Params['appointment_id']));
}
?>