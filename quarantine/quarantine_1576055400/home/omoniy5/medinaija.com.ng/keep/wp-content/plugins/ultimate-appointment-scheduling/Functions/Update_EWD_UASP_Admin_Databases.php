<?php
/* The file contains all of the functions which make changes to the WordPress database */

/* Adds a single new appointment to the WordPress database */
function Add_EWD_UASP_Appointment($Appointment_Start_Time, $Appointment_End_Time, $Location_Name, $Location_Post_ID, $Service_Name, $Service_Post_ID, $Service_Provider_Name, $Service_Provider_Post_ID, $Appointment_Client_Name, $Appointment_Client_Phone, $Appointment_Client_Email, $Appointment_Reminder_Email_Sent, $Appointment_Confirmation_Received) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;
	global $ewd_uasp_fields_table_name;
	global $ewd_uasp_fields_meta_table_name;
	global $EWD_UASP_Appointment_Add_Success;
	global $EWD_UASP_Appointment_ID;

	$WooCommerce_Integration = get_option("EWD_UASP_WooCommerce_Integration");
	$Allow_Paypal_Prepayment = get_option("EWD_UASP_Allow_Paypal_Prepayment");
	$Possible_Delete_Appointments = get_option("EWD_UASP_Possible_Delete_Appointments");
	if (!is_array($Possible_Delete_Appointments)) {$Possible_Delete_Appointments = array();}
	
	$wpdb->insert($ewd_usap_appointments_table_name,
		array( 'Appointment_Start' => $Appointment_Start_Time,
				'Appointment_End' => $Appointment_End_Time,
				'Location_Name' => $Location_Name,
				'Location_Post_ID' => $Location_Post_ID,
				'Service_Name' => $Service_Name,
				'Service_Post_ID' => $Service_Post_ID,
				'Service_Provider_Name' => $Service_Provider_Name,
				'Service_Provider_Post_ID' => $Service_Provider_Post_ID,
				'Appointment_Client_Name' => $Appointment_Client_Name,
				'Appointment_Client_Phone' => $Appointment_Client_Phone,
				'Appointment_Client_Email' => $Appointment_Client_Email, 
				'Appointment_Reminder_Email_Sent' => $Appointment_Reminder_Email_Sent,
				'Appointment_Confirmation_Received' => $Appointment_Confirmation_Received,
				'WC_Order_ID' => 0,
				'WC_Order_Paid' => 'No')
	);

	$Appointment_ID = $EWD_UASP_Appointment_ID = $wpdb->insert_id;

	//Add the custom fields to the meta table
	$Fields = $wpdb->get_results("SELECT Field_ID, Field_Type, Field_Name, Field_Values FROM $ewd_uasp_fields_table_name");
	if (is_array($Fields)) {
		foreach ($Fields as $Field) {
			$FieldName = str_replace(" ", "_", $Field->Field_Name);
			$Value = "";
			if (isset($_POST[$FieldName]) or isset($_FILES[$FieldName])) {
				if ($Field->Field_Type == "checkbox") {
					foreach ($_POST[$FieldName] as $SingleValue) {$Value .= trim($SingleValue) . ",";}
					$Value = substr($Value, 0, strlen($Value)-1);
				}
				else {
					$Value = stripslashes_deep(trim($_POST[$FieldName]));
					$Options = explode(",", $Field->Field_Values);
					if (sizeOf($Options) > 0 and $Options[0] != "") {
					 	array_walk($Options, create_function('&$val', '$val = trim($val);'));
						$InArray = in_array($Value, $Options);
					}
				}
				if (!isset($InArray) or $InArray) {
					$wpdb->insert($ewd_uasp_fields_meta_table_name,
						array( 'Field_ID' => $Field->Field_ID,
							'Appointment_ID' => $Appointment_ID,
							'Meta_Value' => $Value)
					);
				}
				elseif ($InArray == false) {$CustomFieldError = __(" One or more custom field values were incorrect.", 'ultimate-appointment-scheduling');}
				unset($InArray);
			}
		}
	}

	if ($WooCommerce_Integration == "Yes") {
		$_SESSION['EWD_UASP_Appointment_ID'] = $Appointment_ID;
		EWD_UASP_Add_WC_Appointment_Deletion($Appointment_ID);
	}

	if ($Allow_Paypal_Prepayment == "Required") {
		$Possible_Delete_Appointments[$Appointment_ID] = time() + 60*20;
		update_option("EWD_UASP_Possible_Delete_Appointments", $Possible_Delete_Appointments);
	}

	$update['Message'] = __("Appointment has been successfully created.", 'ultimate-appointment-scheduling');
	$update['Appointment_ID'] = $Appointment_ID;
	return $update;
}

/* Edits a single appointment with a given ID in the WordPress database */
function Edit_EWD_UASP_Appointment($Appointment_ID, $Appointment_Start_Time, $Appointment_End_Time, $Location_Name, $Location_Post_ID, $Service_Name, $Service_Post_ID, $Service_Provider_Name, $Service_Provider_Post_ID, $Appointment_Client_Name, $Appointment_Client_Phone, $Appointment_Client_Email, $Appointment_Reminder_Email_Sent, $Appointment_Confirmation_Received) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;
	global $ewd_uasp_fields_table_name;
	global $ewd_uasp_fields_meta_table_name;
	
	$wpdb->update(
		$ewd_usap_appointments_table_name,
		array( 'Appointment_Start' => $Appointment_Start_Time,
				'Appointment_End' => $Appointment_End_Time,
				'Location_Name' => $Location_Name,
				'Location_Post_ID' => $Location_Post_ID,
				'Service_Name' => $Service_Name,
				'Service_Post_ID' => $Service_Post_ID,
				'Service_Provider_Name' => $Service_Provider_Name,
				'Service_Provider_Post_ID' => $Service_Provider_Post_ID,
				'Appointment_Client_Name' => $Appointment_Client_Name,
				'Appointment_Client_Phone' => $Appointment_Client_Phone,
				'Appointment_Client_Email' => $Appointment_Client_Email,
				'Appointment_Reminder_Email_Sent' => $Appointment_Reminder_Email_Sent,
				'Appointment_Confirmation_Received' => $Appointment_Confirmation_Received),
		array( 'Appointment_ID' => $Appointment_ID)
	);

	//Delete/Add the custom fields to the meta table
	$wpdb->query($wpdb->prepare("DELETE FROM $ewd_uasp_fields_meta_table_name WHERE Appointment_ID=%d", $Appointment_ID));
	$Fields = $wpdb->get_results("SELECT Field_ID, Field_Type, Field_Name, Field_Values FROM $ewd_uasp_fields_table_name");
	if (is_array($Fields)) {
		foreach ($Fields as $Field) {
			$FieldName = str_replace(" ", "_", $Field->Field_Name);
			$Value = "";
			if (isset($_POST[$FieldName]) or isset($_FILES[$FieldName])) {
				if ($Field->Field_Type == "checkbox") {
					foreach ($_POST[$FieldName] as $SingleValue) {$Value .= trim($SingleValue) . ",";}
					$Value = substr($Value, 0, strlen($Value)-1);
				}
				else {
					$Value = stripslashes_deep(trim($_POST[$FieldName]));
					$Options = explode(",", $Field->Field_Values);
					if (sizeOf($Options) > 0 and $Options[0] != "") {
					 	array_walk($Options, create_function('&$val', '$val = trim($val);'));
						$InArray = in_array($Value, $Options);
					}
				}
				if (!isset($InArray) or $InArray) {
					$wpdb->insert($ewd_uasp_fields_meta_table_name,
						array( 'Field_ID' => $Field->Field_ID,
							'Appointment_ID' => $Appointment_ID,
							'Meta_Value' => $Value)
					);
				}
				elseif ($InArray == false) {$CustomFieldError = __(" One or more custom field values were incorrect.", 'ultimate-appointment-scheduling');}
				unset($InArray);
			}
		}
	}
	
	$update['Message'] = __("Appointment has been successfully edited.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Deletes a single appointment with a given ID in the WordPress database */
function Delete_EWD_UASP_Appointment($Appt) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;
	
	$wpdb->delete(
		$ewd_usap_appointments_table_name,
		array('Appointment_ID' => $Appt)
	);
					
	$update = __("Appointment has been successfully deleted.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Adds a single new location to the WordPress database */
function Add_EWD_UASP_Location($Location_Name, $Location_Description, $Location_Hours) {
	
	$params = array( 
		'post_title' => $Location_Name,
		'post_content' => $Location_Description,
		'post_type' => 'uasp-location',
		'post_status' => 'publish'
	);
	$post_id = wp_insert_post($params);

	foreach ($Location_Hours as $Meta_Name => $Meta_Value) {
		update_post_meta($post_id, $Meta_Name, $Meta_Value);
	}

	$update = __("Location has been successfully created.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Edits a single Location with a given ID in the WordPress database */
function Edit_EWD_UASP_Location($Location_ID, $Location_Name, $Location_Description, $Location_Hours) {

	$params = array( 
		'ID' => $Location_ID,
		'post_title' => $Location_Name,
		'post_content' => $Location_Description,
		'post_type' => 'uasp-location',
		'post_status' => 'publish'
	);
	wp_update_post($params);

	foreach ($Location_Hours as $Meta_Name => $Meta_Value) {
		update_post_meta($Location_ID, $Meta_Name, $Meta_Value);
	}

	$update = __("Location has been successfully edited.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Deletes a single location with a given ID in the WordPress database */
function Delete_EWD_UASP_Location($Location_ID) {

	wp_delete_post($Location_ID, true);
					
	$update = __("Location has been successfully deleted.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Adds a single new service to the WordPress database */
function Add_EWD_UASP_Service($Service_Name, $Service_Description, $Service_Capacity, $Service_Duration, $Service_Price) {
	$WooCommerce_Integration = get_option("EWD_UASP_WooCommerce_Integration");

	$params = array( 
		'post_title' => $Service_Name,
		'post_content' => $Service_Description,
		'post_type' => 'uasp-service',
		'post_status' => 'publish'
	);
	$post_id = wp_insert_post($params);

	update_post_meta($post_id, 'Service Capacity', $Service_Capacity);
	update_post_meta($post_id, 'Service Duration', $Service_Duration);
	update_post_meta($post_id, 'Service Price', $Service_Price);

	if ($WooCommerce_Integration == "Yes") {EWD_UASP_Create_Linked_WC_Product($post_id);}

	$update = __("Service has been successfully created.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Edits a single service with a given ID in the WordPress database */
function Edit_EWD_UASP_Service($Service_ID, $Service_Name, $Service_Description, $Service_Capacity, $Service_Duration, $Service_Price) {
	$WooCommerce_Integration = get_option("EWD_UASP_WooCommerce_Integration");

	$params = array( 
		'ID' => $Service_ID,
		'post_title' => $Service_Name,
		'post_content' => $Service_Description,
		'post_type' => 'uasp-service',
		'post_status' => 'publish'
	);
	wp_update_post($params);

	update_post_meta($Service_ID, 'Service Capacity', $Service_Capacity);
	update_post_meta($Service_ID, 'Service Duration', $Service_Duration);
	update_post_meta($Service_ID, 'Service Price', $Service_Price);

	if ($WooCommerce_Integration == "Yes") {EWD_UASP_Edit_Linked_WC_Product($Service_ID);}

	$update = __("Service has been successfully edited.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Deletes a single service with a given ID in the WordPress database */
function Delete_EWD_UASP_Service($Service_ID) {

	wp_delete_post($Service_ID, true);
					
	$update = __("Service has been successfully deleted.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Adds a single new service provider to the WordPress database */
function Add_EWD_UASP_Service_Provider($Service_Provider_Name, $Service_Provider_Description, $Service_Provider_Services, $Service_Provider_Email, $Service_Provider_Hours) {
	
	$params = array( 
		'post_title' => $Service_Provider_Name,
		'post_content' => $Service_Provider_Description,
		'post_type' => 'uasp-provider',
		'post_status' => 'publish'
	);
	$post_id = wp_insert_post($params);

	update_post_meta($post_id, 'Service Provider Services', $Service_Provider_Services);
	update_post_meta($post_id, 'Service Provider Email', $Service_Provider_Email);

	foreach ($Service_Provider_Hours as $Meta_Name => $Meta_Value) {
		update_post_meta($post_id, $Meta_Name, $Meta_Value);
	}


	$update = __("Service provider has been successfully created.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Edits a single service provider with a given ID in the WordPress database */
function Edit_EWD_UASP_Service_Provider($Service_Provider_ID, $Service_Provider_Name, $Service_Provider_Description, $Service_Provider_Services, $Service_Provider_Email, $Service_Provider_Hours) {

	$params = array( 
		'ID' => $Service_Provider_ID,
		'post_title' => $Service_Provider_Name,
		'post_content' => $Service_Provider_Description,
		'post_type' => 'uasp-provider',
		'post_status' => 'publish'
	);
	wp_update_post($params);
	
	update_post_meta($Service_Provider_ID, 'Service Provider Services', $Service_Provider_Services);
	update_post_meta($Service_Provider_ID, 'Service Provider Email', $Service_Provider_Email);

	foreach ($Service_Provider_Hours as $Meta_Name => $Meta_Value) {
		update_post_meta($Service_Provider_ID, $Meta_Name, $Meta_Value);
	}


	$update = __("Service provider has been successfully edited.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Deletes a single service provider with a given ID in the WordPress database */
function Delete_EWD_UASP_Service_Provider($Service_Provider_ID) {

	wp_delete_post($Service_Provider_ID, true);
					
	$update = __("Service provider has been successfully deleted.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Adds a single new appointment to the WordPress database */
function Add_EWD_UASP_Exception($Location_Name, $Location_Post_ID,  $Service_Provider_Name, $Service_Provider_Post_ID, $Exception_Start, $Exception_End, $Exception_Status, $Exception_Reason) {
	global $wpdb;
	global $ewd_usap_exceptions_table_name;
	$wpdb->show_errors();
	$wpdb->insert($ewd_usap_exceptions_table_name,
		array( 'Exception_Start' => $Exception_Start,
				'Exception_End' => $Exception_End,
				'Location_Name' => $Location_Name,
				'Location_Post_ID' => $Location_Post_ID,
				'Service_Provider_Name' => $Service_Provider_Name,
				'Service_Provider_Post_ID' => $Service_Provider_Post_ID,
				'Exception_Status' => $Exception_Status,
				'Exception_Reason' => $Exception_Reason)
	);
	$update = __("Exception has been successfully created.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Edits a single appointment with a given ID in the WordPress database */
function Edit_EWD_UASP_Exception($Exception_ID, $Location_Name, $Location_Post_ID,  $Service_Provider_Name, $Service_Provider_Post_ID, $Exception_Start, $Exception_End, $Exception_Status, $Exception_Reason) {
	global $wpdb;
	global $ewd_usap_exceptions_table_name;
	
	$wpdb->update(
		$ewd_usap_exceptions_table_name,
		array( 'Exception_Start' => $Exception_Start,
				'Exception_End' => $Exception_End,
				'Location_Name' => $Location_Name,
				'Location_Post_ID' => $Location_Post_ID,
				'Service_Provider_Name' => $Service_Provider_Name,
				'Service_Provider_Post_ID' => $Service_Provider_Post_ID,
				'Exception_Status' => $Exception_Status,
				'Exception_Reason' => $Exception_Reason),
		array( 'Exception_ID' => $Exception_ID)
	);
	$update = __("Exception has been successfully edited.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Deletes a single appointment with a given ID in the WordPress database */
function Delete_EWD_UASP_Exception($Exception) {
	global $wpdb;
	global $ewd_usap_exceptions_table_name;
	
	$wpdb->delete(
		$ewd_usap_exceptions_table_name,
		array('Exception_ID' => $Exception)
	);
					
	$update = __("Exception has been successfully deleted.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Adds a single new custom field to the UPCP database */
function Add_EWD_UASP_Custom_Field($Field_Name, $Field_Slug, $Field_Type, $Field_Description, $Field_Values, $Field_Display) {
	global $wpdb;
	global $ewd_uasp_fields_table_name;
	global $EWD_UASP_Full_Version;

	$Date = date("Y-m-d H:i:s");

	if ($EWD_UASP_Full_Version != "Yes") {exit();}
	$wpdb->insert($ewd_uasp_fields_table_name,
		array(
			'Field_Name' => $Field_Name,
			'Field_Slug' => $Field_Slug,
			'Field_Type' => $Field_Type,
			'Field_Description' => $Field_Description,
			'Field_Values' => $Field_Values,
			'Field_Display' => $Field_Display,
			'Field_Date_Created' => $Date
		)
	);

	$update = __("Field has been successfully created.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Edits a single custom field with a given ID in the UPCP database */
function  Edit_EWD_UASP_Custom_Field($Field_ID, $Field_Name, $Field_Slug, $Field_Type, $Field_Description, $Field_Values, $Field_Display) {
	global $wpdb;
	global $ewd_uasp_fields_table_name;
	global $EWD_UASP_Full_Version;

	if ($EWD_UASP_Full_Version != "Yes") {exit();}
	$wpdb->update(
		$ewd_uasp_fields_table_name,
		array(
			'Field_Name' => $Field_Name,
			'Field_Slug' => $Field_Slug,
			'Field_Type' => $Field_Type,
			'Field_Description' => $Field_Description,
			'Field_Values' => $Field_Values,
			'Field_Display' => $Field_Display),
		array( 'Field_ID' => $Field_ID)
	);

	$update = __("Field has been successfully edited.", 'ultimate-appointment-scheduling');
	return $update;
}

/* Deletes a single tag with a given ID in the UPCP database, and then eliminates
*  all of the occurrences of that tag from the tagged items table.  */
function Delete_EWD_UASP_Custom_Field($Field_ID) {
	global $wpdb;
	global $ewd_uasp_fields_table_name;
	global $EWD_UASP_Full_Version;

	if ($EWD_UASP_Full_Version != "Yes") {exit();}
	$wpdb->delete(
		$ewd_uasp_fields_table_name,
		array('Field_ID' => $Field_ID)
	);

	$update = __("Field has been successfully deleted.", 'ultimate-appointment-scheduling');
	return $update;
}

function EWD_UASP_UpdateOptions() {
	global $EWD_UASP_Full_Version;

	if ( ! isset( $_POST['EWD_UASP_Admin_Nonce'] ) ) {return;}

    if ( ! wp_verify_nonce( $_POST['EWD_UASP_Admin_Nonce'], 'EWD_UASP_Admin_Nonce' ) ) {return;}

	if ($_POST['woocommerce_integration'] == "Yes" and get_option("EWD_UASP_WooCommerce_Integration") == "No") {$Run_WC_Sync = "Yes";}
	else {$Run_WC_Sync = "No";}

	//use $_POST['timezone'] for write in fields
	if (isset($_POST['Options_Submit'])) {update_option("EWD_UASP_Custom_CSS", $_POST['custom_css']);}
	if (isset($_POST['multi_step_booking'])) {update_option("EWD_UASP_Multi_Step_Booking", $_POST['multi_step_booking']);}
	if (isset($_POST['time_between_appointments'])) {update_option("EWD_UASP_Time_Between_Appointments", $_POST['time_between_appointments']);}
	if (isset($_POST['Options_Submit'])) {update_option("EWD_UASP_Required_Information", $_POST['required_information']);}
	if (isset($_POST['timezone'])) {update_option("EWD_UASP_Timezone", $_POST['timezone']);}
	if (isset($_POST['localize_date_time'])) {update_option("EWD_UASP_Localize_Date_Time", $_POST['localize_date_time']);}
	if (isset($_POST['hours_format'])) {update_option("EWD_UASP_Hours_Format", $_POST['hours_format']);}
	if (isset($_POST['php_date_format'])) {update_option("EWD_UASP_PHP_Date_Format", $_POST['php_date_format']);}
	if (isset($_POST['client_email_details'])) {update_option("EWD_UASP_Client_Email_Details", $_POST['client_email_details']);}
	if (isset($_POST['minimum_days_advance'])) {update_option("EWD_UASP_Minimum_Days_Advance", $_POST['minimum_days_advance']);}
	if (isset($_POST['maximum_days_advance'])) {update_option("EWD_UASP_Maximum_Days_Advance", $_POST['maximum_days_advance']);}
	if (isset($_POST['calendar_starting_layout'])) {update_option("EWD_UASP_Calendar_Starting_Layout", $_POST['calendar_starting_layout']);}
	if (isset($_POST['calendar_starting_time'])) {update_option("EWD_UASP_Calendar_Starting_Time", $_POST['calendar_starting_time']);}
	if (isset($_POST['calendar_offset'])) {update_option("EWD_UASP_Calendar_Offset", $_POST['calendar_offset']);}
	if (isset($_POST['calendar_offset_unit'])) {update_option("EWD_UASP_Calendar_Offset_Unit", $_POST['calendar_offset_unit']);}

	if (isset($_POST['ewd_uasp_booking_form_style']) and $EWD_UASP_Full_Version == "Yes") {update_option("EWD_UASP_Booking_Form_Style", $_POST['ewd_uasp_booking_form_style']);}
	if (isset($_POST['admin_email_notification']) and $EWD_UASP_Full_Version == "Yes") {update_option("EWD_UASP_Admin_Email_Notification", $_POST['admin_email_notification']);}
	if (isset($_POST['admin_email_address']) and $EWD_UASP_Full_Version == "Yes") {update_option("EWD_UASP_Admin_Email_Address", $_POST['admin_email_address']);}
	if (isset($_POST['provider_email_notification']) and $EWD_UASP_Full_Version == "Yes") {update_option("EWD_UASP_Provider_Email_Notification", $_POST['provider_email_notification']);}
	if (isset($_POST['add_captcha']) and $EWD_UASP_Full_Version == "Yes") {update_option("EWD_UASP_Add_Captcha", $_POST['add_captcha']);}
	if (isset($_POST['calendar_language']) and $EWD_UASP_Full_Version == "Yes") {update_option("EWD_Calendar_Language", $_POST['calendar_language']);}
	if (isset($_POST['access_role']) and $EWD_UASP_Full_Version == "Yes") {update_option("EWD_UASP_Access_Role", $_POST['access_role']);}
	if (isset($_POST['require_login']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Require_Login', stripslashes_deep($_POST['require_login']));}
	if (isset($_POST['login_options']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Login_Options', stripslashes_deep($_POST['login_options']));}

	if (isset($_POST['wordpress_login_url']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_WordPress_Login_URL', stripslashes_deep($_POST['wordpress_login_url']));}
	if (isset($_POST['feup_login_url']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_FEUP_Login_URL', stripslashes_deep($_POST['feup_login_url']));}
	if (isset($_POST['facebook_app_id']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Facebook_App_ID', stripslashes_deep($_POST['facebook_app_id']));}
	if (isset($_POST['facebook_secret']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Facebook_Secret', stripslashes_deep($_POST['facebook_secret']));}
	if (isset($_POST['twitter_key']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Twitter_Key', stripslashes_deep($_POST['twitter_key']));}
	if (isset($_POST['twitter_secret']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Twitter_Secret', stripslashes_deep($_POST['twitter_secret']));}
	
	if (isset($_POST['woocommerce_integration']) and $EWD_UASP_Full_Version == "Yes") {update_option("EWD_UASP_WooCommerce_Integration", $_POST['woocommerce_integration']);}
	if (isset($_POST['allow_paypal_prepayment']) and $EWD_UASP_Full_Version == "Yes") {update_option("EWD_UASP_Allow_Paypal_Prepayment", $_POST['allow_paypal_prepayment']);}
	if (isset($_POST['pricing_currency_code']) and $EWD_UASP_Full_Version == "Yes") {update_option("EWD_UASP_Pricing_Currency_Code", $_POST['pricing_currency_code']);}
	if (isset($_POST['allow_paypal_prepayment']) and $EWD_UASP_Full_Version == "Yes") {update_option("EWD_UASP_PayPal_Email_Address", $_POST['payPal_email_address']);}
	if (isset($_POST['allow_paypal_prepayment']) and $EWD_UASP_Full_Version == "Yes") {update_option("EWD_UASP_Thank_You_URL", $_POST['thank_you_url']);}

	if (isset($_POST['appointment_confirmation'])) {update_option("EWD_UASP_Appointment_Confirmation", $_POST['appointment_confirmation']);}
	if (isset($_POST['appointment_confirmation'])) {update_option("EWD_UASP_Appointment_Confirmation_Page", $_POST['appointment_confirmation_page']);}
	if (isset($_POST['appointment_confirmation'])) {update_option("EWD_UASP_Reminders_Cache_Time", $_POST['reminders_cache_time']*60);}

	if ((get_option("EWD_UASP_Third_Party_Reminders") == "No" and $_POST['third_party_reminders'] == "Yes" and $EWD_UASP_Full_Version == "Yes") or
		(get_option("EWD_UASP_Third_Party_Reminders") == "Yes" and $_POST['third_party_reminders'] == "No" and $EWD_UASP_Full_Version == "Yes")) 
		{EWD_UASP_Third_Party_Reminders($_POST['third_party_reminders']);}
	
	//Saving reminders
	$Counter = 0;
	while ($Counter < 30) {
		if (isset($_POST['Email_Reminder_' . $Counter . '_Number'])) {
			$Prefix = 'Email_Reminder_' . $Counter;
		
			$Reminder['ID'] = $_POST[$Prefix . '_ID'];
			if ($Reminder['ID'] == "") {
				$ID = EWD_UASP_Create_Unique_ID(8);
				$Reminder['ID'] = $ID;
			}
		
			if ($_POST[$Prefix . '_Unit'] == "Minutes") {$Reminder['SecondsBeforeAppointment'] = $_POST[$Prefix . '_Number'] * 60;}
			if ($_POST[$Prefix . '_Unit'] == "Hours") {$Reminder['SecondsBeforeAppointment'] = $_POST[$Prefix . '_Number'] * 60*60;}
			if ($_POST[$Prefix . '_Unit'] == "Days") {$Reminder['SecondsBeforeAppointment'] = $_POST[$Prefix . '_Number'] * 60*60*24;}
		
			$Reminder['Email_ID'] = $_POST[$Prefix . '_Email_ID'];
			$Reminder['Conditional'] = $_POST[$Prefix . '_Conditional'];

			$Email_Reminders[] = $Reminder; 
			unset($Reminder);
		}
		$Counter++;
	}
	if (is_array($Email_Reminders)) {usort($Email_Reminders, 'EWD_UASP_Reminder_Sort');}

	$Counter = 0;
	while ($Counter < 30) {
		if (isset($_POST['Email_Message_' . $Counter . '_Name'])) {
			$Prefix = 'Email_Message_' . $Counter;

			$Email['ID'] = sanitize_text_field($_POST[$Prefix . '_ID']);
			$Email['Name'] = sanitize_text_field($_POST[$Prefix . '_Name']);
			$Email['Subject'] = sanitize_text_field($_POST[$Prefix . '_Subject']);
			$Email['Message'] = sanitize_text_field($_POST[$Prefix . '_Body']);

			$Emails[] = $Email;
			unset($Email);
		}
		$Counter++;
	}
	if (isset($_POST['Options_Submit'])) {update_option('EWD_UASP_Email_Messages_Array', $Emails);}

	if (isset($_POST['timezone'])) {update_option("EWD_UASP_Email_Reminders", $Email_Reminders);}
	if (sizeof($Email_Reminders) > 0 and isset($_POST['timezone'])) {update_option("EWD_UASP_Reminders_Scheduled", "Yes");}

	if (isset($_POST['sign_up_title_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Sign_Up_Title_Label',  $_POST['sign_up_title_label']);}
	if (isset($_POST['name_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Name_Label',  $_POST['name_label']);}
	if (isset($_POST['phone_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Phone_Label',  $_POST['phone_label']);}
	if (isset($_POST['email_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Email_Label',  $_POST['email_label']);}
	if (isset($_POST['service_title_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Service_Title_Label',  $_POST['service_title_label']);}
	if (isset($_POST['location_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Location_Label',  $_POST['location_label']);}
	if (isset($_POST['service_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Service_Label',  $_POST['service_label']);}
	if (isset($_POST['service_provider_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Service_Provider_Label',  $_POST['service_provider_label']);}
	if (isset($_POST['service_provider_any_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Service_Provider_Any_Label',  $_POST['service_provider_any_label']);}
	if (isset($_POST['appointment_title_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Appointment_Title_Label',  $_POST['appointment_title_label']);}
	if (isset($_POST['appointment_date_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Appointment_Date_Label',  $_POST['appointment_date_label']);}
	if (isset($_POST['find_appointments_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Find_Appointments_Label',  $_POST['find_appointments_label']);}
	if (isset($_POST['book_appointment_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Book_Appointment_Label',  $_POST['book_appointment_label']);}
	if (isset($_POST['pay_in_advance_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Pay_In_Advance_Label',  $_POST['pay_in_advance_label']);}
	if (isset($_POST['proceed_to_payment_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Proceed_To_Payment_Label',  $_POST['proceed_to_payment_label']);}
	if (isset($_POST['select_time_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_Select_Time_Label',  $_POST['select_time_label']);}
	if (isset($_POST['click_select_date_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Click_Select_Date_Label',  $_POST['click_select_date_label']);}
	if (isset($_POST['image_number_label']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Image_Number_Label',  $_POST['image_number_label']);}
	
	if (isset($_POST['uasp_signup_title_font']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Signup_Title_Font',  $_POST['uasp_signup_title_font']);}
    if (isset($_POST['uasp_signup_title_font_size']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Signup_Title_Font_Size',  $_POST['uasp_signup_title_font_size']);}
    if (isset($_POST['uasp_signup_title_font_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Signup_Title_Font_Color',  $_POST['uasp_signup_title_font_color']);}
    if (isset($_POST['uasp_signup_label_font']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Signup_Label_Font',  $_POST['uasp_signup_label_font']);}
    if (isset($_POST['uasp_signup_label_font_size']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Signup_Label_Font_Size',  $_POST['uasp_signup_label_font_size']);}
    if (isset($_POST['uasp_signup_block_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Signup_Block_Color',  $_POST['uasp_signup_block_color']);}
    if (isset($_POST['uasp_signup_block_margin']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Signup_Block_Margin',  $_POST['uasp_signup_block_margin']);}
    if (isset($_POST['uasp_signup_block_padding']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Signup_Block_Padding',  $_POST['uasp_signup_block_padding']);}

    if (isset($_POST['uasp_service_title_font']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Service_Title_Font',  $_POST['uasp_service_title_font']);}
    if (isset($_POST['uasp_service_title_font_size']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Service_Title_Font_Size',  $_POST['uasp_service_title_font_size']);}
    if (isset($_POST['uasp_service_title_font_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Service_Title_Font_Color',  $_POST['uasp_service_title_font_color']);}
    if (isset($_POST['uasp_service_label_font']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Service_Label_Font',  $_POST['uasp_service_label_font']);}
    if (isset($_POST['uasp_service_label_font_size']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Service_Label_Font_Size',  $_POST['uasp_service_label_font_size']);}
    if (isset($_POST['uasp_service_block_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Service_Block_Color',  $_POST['uasp_service_block_color']);}
    if (isset($_POST['uasp_service_block_margin']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Service_Block_Margin',  $_POST['uasp_service_block_margin']);}
    if (isset($_POST['uasp_service_block_padding']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Service_Block_Padding',  $_POST['uasp_service_block_padding']);}

	if (isset($_POST['uasp_appointment_title_font']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Appointment_Title_Font',  $_POST['uasp_appointment_title_font']);}
    if (isset($_POST['uasp_appointment_title_font_size']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Appointment_Title_Font_Size',  $_POST['uasp_appointment_title_font_size']);}
    if (isset($_POST['uasp_appointment_title_font_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Appointment_Title_Font_Color',  $_POST['uasp_appointment_title_font_color']);}
    if (isset($_POST['uasp_appointment_label_font']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Appointment_Label_Font',  $_POST['uasp_appointment_label_font']);}
    if (isset($_POST['uasp_appointment_label_font_size']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Appointment_Label_Font_Size',  $_POST['uasp_appointment_label_font_size']);}
    if (isset($_POST['uasp_appointment_block_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Appointment_Block_Color',  $_POST['uasp_appointment_block_color']);}
    if (isset($_POST['uasp_appointment_block_margin']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Appointment_Block_Margin',  $_POST['uasp_appointment_block_margin']);}
    if (isset($_POST['uasp_appointment_block_padding']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Appointment_Block_Padding',  $_POST['uasp_appointment_block_padding']);}
	
	if (isset($_POST['uasp_button_font']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_button_Font',  $_POST['uasp_button_font']);}
    if (isset($_POST['uasp_button_font_size']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_button_Font_Size',  $_POST['uasp_button_font_size']);}
    if (isset($_POST['uasp_button_font_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_button_Font_Color',  $_POST['uasp_button_font_color']);}
    if (isset($_POST['uasp_button_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Button_Color',  $_POST['uasp_button_color']);}
    if (isset($_POST['uasp_button_margin']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Button_Margin',  $_POST['uasp_button_margin']);}
    if (isset($_POST['uasp_button_padding']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Button_Padding',  $_POST['uasp_button_padding']);}

    if (isset($_POST['email_reminder_background_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Email_Reminder_Background_Color', stripslashes_deep($_POST['email_reminder_background_color']));}
	if (isset($_POST['email_reminder_inner_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Email_Reminder_Inner_Color', stripslashes_deep($_POST['email_reminder_inner_color']));}
	if (isset($_POST['email_reminder_text_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Email_Reminder_Text_Color', stripslashes_deep($_POST['email_reminder_text_color']));}
	if (isset($_POST['email_reminder_button_background_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Email_Reminder_Button_Background_Color', stripslashes_deep($_POST['email_reminder_button_background_color']));}
	if (isset($_POST['email_reminder_button_background_hover_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Email_Reminder_Button_Background_Hover_Color', stripslashes_deep($_POST['email_reminder_button_background_hover_color']));}
	if (isset($_POST['email_reminder_button_text_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Email_Reminder_Button_Text_Color', stripslashes_deep($_POST['email_reminder_button_text_color']));}
	if (isset($_POST['email_reminder_button_text_hover_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Email_Reminder_Button_Text_Hover_Color', stripslashes_deep($_POST['email_reminder_button_text_hover_color']));}

	if (isset($_POST['calendar_appointment_font_size']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Calendar_Appointment_Font_Size', stripslashes_deep($_POST['calendar_appointment_font_size']));}
	if (isset($_POST['calendar_appointment_font_family']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Calendar_Appointment_Font_Family', stripslashes_deep($_POST['calendar_appointment_font_family']));}
	if (isset($_POST['calendar_appointment_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Calendar_Appointment_Color', stripslashes_deep($_POST['calendar_appointment_color']));}
	if (isset($_POST['calendar_appointment_background_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Calendar_Appointment_Background_Color', stripslashes_deep($_POST['calendar_appointment_background_color']));}
	if (isset($_POST['calendar_appointment_border_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Calendar_Appointment_Border_Color', stripslashes_deep($_POST['calendar_appointment_border_color']));}
	if (isset($_POST['calendar_selected_appointment_background_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Calendar_Selected_Appointment_Background_Color', stripslashes_deep($_POST['calendar_selected_appointment_background_color']));}
	if (isset($_POST['calendar_selected_appointment_border_color']) and $EWD_UASP_Full_Version == "Yes") {update_option('EWD_UASP_Calendar_Selected_Appointment_Border_Color', stripslashes_deep($_POST['calendar_selected_appointment_border_color']));}
	
    if ($Run_WC_Sync == "Yes") {EWD_UASP_Initial_WC_Sync();}
}

function EWD_UASP_Reminder_Sort($a, $b) {
    return $a['SecondsBeforeAppointment'] - $b['SecondsBeforeAppointment'];
}

function EWD_UASP_Create_Unique_ID($length = 15) {
	$letters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$ID = '';
	for ($i = 0; $i < $length; $i++) {
		$ID .= $letters[rand(0, strlen($letters) - 1)];
	}

	return $ID;
}
?>