<?php
/* Prepare the data to add or edit a single appointment */
function EWD_UASP_Add_Edit_Appointment() {
	global $wpdb;
	
	if ( ! isset( $_POST['EWD_UASP_Admin_Nonce'] ) and $_POST['action'] != "EWD_UASP_AddAppointment") {return;}

    if ( ! wp_verify_nonce( $_POST['EWD_UASP_Admin_Nonce'], 'EWD_UASP_Admin_Nonce' ) and $_POST['action'] != "EWD_UASP_AddAppointment") {return;}

	$Client_Email_Details = get_option("EWD_UASP_Client_Email_Details");

	$Admin_Email_Notification = get_option("EWD_UASP_Admin_Email_Notification");
	$Provider_Email_Notification = get_option("EWD_UASP_Provider_Email_Notification");
	$Add_Captcha = get_option("EWD_UASP_Add_Captcha");
	$Allow_Paypal_Prepayment = get_option("EWD_UASP_Allow_Paypal_Prepayment");
	$Timezone = get_option("EWD_UASP_Timezone");
	date_default_timezone_set($Timezone);
	
	/* Process the $_POST data where neccessary before storage */
	if (isset($_POST['Appointment_ID'])) {$Appointment_ID = $_POST['Appointment_ID'];}
	if (isset($_POST['Appointment_Start'])) {$Appointment_Start = sanitize_text_field($_POST['Appointment_Start']);}
	if (isset($_POST['Location_ID'])) {$Location_ID = sanitize_text_field($_POST['Location_ID']);}
	$Location_Post_Object = get_post($Location_ID);
	$Location_Name = $Location_Post_Object->post_title;
	if (isset($_POST['Service_ID'])) {$Service_ID = sanitize_text_field($_POST['Service_ID']);}
	$Service_Post_Object = get_post($Service_ID);
	$Service_Name = $Service_Post_Object->post_title;
	$Service_Duration = get_post_meta($Service_Post_Object->ID, "Service Duration", true);
	if (isset($Appointment_Start)) {
		$Appointment_End_Time = (strtotime($Appointment_Start) + $Service_Duration*60);
		$Appointment_End = date("Y-m-d H:i:s", $Appointment_End_Time);
	}
	if (isset($_POST['Service_Provider_ID'])) {$Service_Provider_ID = sanitize_text_field($_POST['Service_Provider_ID']);}
	$Service_Provider_Post_Object = get_post($Service_Provider_ID);
	$Service_Provider_Name = $Service_Provider_Post_Object->post_title;

	if (isset($_POST['Appointment_Client_Name'])) {$Appointment_Client_Name = sanitize_text_field(stripslashes_deep($_POST['Appointment_Client_Name']));}
	if (isset($_POST['Appointment_Client_Phone'])) {$Appointment_Client_Phone = sanitize_text_field(stripslashes_deep($_POST['Appointment_Client_Phone']));}
	if (isset($_POST['Appointment_Client_Email'])) {$Appointment_Client_Email = sanitize_text_field(stripslashes_deep($_POST['Appointment_Client_Email']));}
	
	if (!isset($_POST['Appointment_Reminder_Email_Sent'])) {$Appointment_Reminder_Email_Sent = "No";}
	else {$Appointment_Reminder_Email_Sent = sanitize_text_field(stripslashes_deep($_POST['Appointment_Reminder_Email_Sent']));}
	if (!isset($_POST['Appointment_Confirmation_Received'])) {$Appointment_Confirmation_Received = "No";}
	else {$Appointment_Confirmation_Received = sanitize_text_field(stripslashes_deep($_POST['Appointment_Confirmation_Received']));}

	if ($_POST['action'] == "EWD_UASP_AddAppointment" and $Add_Captcha == "Yes" and EWD_UASP_Validate_Captcha() != "Yes") {
		$error = __("The number entered into the Captcha box was incorrect.", 'ultimate-appointment-scheduling');
	}
	
	if (!isset($error)) {
		/* Pass the data to the appropriate function in Update_EWD_UASP_Admin_Databases.php to create the appointment */
		if ($_POST['action'] == "Add_Appointment" or $_POST['action'] == "EWD_UASP_AddAppointment") {
			$user_update = Add_EWD_UASP_Appointment($Appointment_Start, $Appointment_End, $Location_Name, $Location_ID, $Service_Name, $Service_ID, $Service_Provider_Name, $Service_Provider_ID, $Appointment_Client_Name, $Appointment_Client_Phone, $Appointment_Client_Email, $Appointment_Reminder_Email_Sent, $Appointment_Confirmation_Received);
			if (isset($user_update['Appointment_ID']) and $Client_Email_Details != -1 and $_POST['action'] == "EWD_UASP_AddAppointment") {EWD_UASP_Send_Appointment_Notification("Client", $Client_Email_Details, $user_update['Appointment_ID']);}
			if (isset($user_update['Appointment_ID']) and $Provider_Email_Notification != -1 and $_POST['action'] == "EWD_UASP_AddAppointment") {EWD_UASP_Send_Appointment_Notification("Provider", $Provider_Email_Notification, $user_update['Appointment_ID']);}
			if (isset($user_update['Appointment_ID']) and $Admin_Email_Notification != -1 and $_POST['action'] == "EWD_UASP_AddAppointment") {EWD_UASP_Send_Appointment_Notification("Admin", $Admin_Email_Notification, $user_update['Appointment_ID']);}
			if ($Allow_Paypal_Prepayment == "Required") {
				$Appointments_To_Check = get_option("EWD_UASP_Appointments_To_Check");
				$Appointments_To_Check[$wpdb->insert_id] = date("Y-m-d H:i:s", time() + 30*60);
				update_option("EWD_UASP_Appointments_To_Check", $Appointments_To_Check);
			}
		}
		/* Pass the data to the appropriate function in Update_EWD_UASP_Admin_Databases.php to edit the appointment */
		else {
			$user_update = Edit_EWD_UASP_Appointment($Appointment_ID, $Appointment_Start, $Appointment_End, $Location_Name, $Location_ID, $Service_Name, $Service_ID, $Service_Provider_Name, $Service_Provider_ID, $Appointment_Client_Name, $Appointment_Client_Phone, $Appointment_Client_Email, $Appointment_Reminder_Email_Sent, $Appointment_Confirmation_Received);
		}
		$user_update = array("Message_Type" => "Update", "Message" => $user_update['Message']);
		return $user_update;
	}
	/* Return any error that might have occurred */
	else {
		$output_error = array("Message_Type" => "Error", "Message" => $error);
		return $output_error;
	}
}

function EWD_UASP_Mass_Delete_Appointments() {
	$Appts = $_POST['Appointments_Bulk'];
	
	if (is_array($Appts)) {
		foreach ($Appts as $Appt) {
			if ($Appt != "") {
				Delete_EWD_UASP_Appointment($Appt);
			}
		}
	}
	
	$update = __("Appointments have been successfully deleted.", 'ultimate-appointment-scheduling');
	$user_update = array("Message_Type" => "Update", "Message" => $update);
	return $user_update;
}

function EWD_UASP_Send_Appointment_Notification($Recipient, $Email_ID, $Appointment_ID) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	$Admin_Email_Address = get_option("EWD_UASP_Admin_Email_Address");

	$Email_Messages_Array = get_option("EWD_UASP_Email_Messages_Array");
	if (!is_array($Email_Messages_Array)) {$Email_Messages_Array = array();}

	$Appointment = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Appointment_ID));

	if ($Recipient == "Client") {$Recipient_Email = $Appointment->Appointment_Client_Email;}
	elseif ($Recipient == "Provider") {$Recipient_Email = get_post_meta($Appointment->Service_Provider_Post_ID, 'Service Provider Email', true);}
	else {$Recipient_Email = ($Admin_Email_Address != '' ? $Admin_Email_Address : get_option( 'admin_email' ));}

	if ($Email_ID < 0) {
		$Params = array(
			'Email_ID' => $Email_ID * -1,
			'appointment_id' => $Appointment->Appointment_ID,
			'Email_Address' => $Recipient_Email
		);
		
		if (function_exists('EWD_UWPM_Send_Email_To_Non_User')) {
			EWD_UWPM_Send_Email_To_Non_User($Params);
		}
	}
	else {
		foreach ($Email_Messages_Array as $Email_Message_Item) {
			if ($Email_Message_Item['ID'] == $Email_ID) {
				$Message = EWD_UASP_Substitute_Email_Text(EWD_UASP_Return_Email_Template($Email_Message_Item), $Appointment);
				$Subject = EWD_UASP_Substitute_Email_Text($Email_Message_Item['Subject'], $Appointment);
				$Headers = array('Content-Type: text/html; charset=UTF-8');

				$mail_success = wp_mail( $Recipient_Email, $Subject, $Message, $Headers);
			}
		}
	}

}

/* Prepare the data to add or edit a single location */
function EWD_UASP_Add_Edit_Location() {
	if ( ! isset( $_POST['EWD_UASP_Admin_Nonce'] ) ) {return;}

    if ( ! wp_verify_nonce( $_POST['EWD_UASP_Admin_Nonce'], 'EWD_UASP_Admin_Nonce' ) ) {return;}

	/* Process the $_POST data where neccessary before storage */
	if (isset($_POST['Location_ID'])) {$Location_ID = $_POST['Location_ID'];}
	if (isset($_POST['Location_Name'])) {$Location_Name = sanitize_text_field($_POST['Location_Name']);}
	if (isset($_POST['Location_Description'])) {$Location_Description = sanitize_text_field($_POST['Location_Description']);}

	$Location_Hours['Monday Open'] = $_POST['Monday_Open_Time'];
	$Location_Hours['Monday Close'] = $_POST['Monday_Close_Time'];
	$Location_Hours['Monday Note'] = $_POST['Monday_Note'];

	$Location_Hours['Tuesday Open'] = $_POST['Tuesday_Open_Time'];
	$Location_Hours['Tuesday Close'] = $_POST['Tuesday_Close_Time'];
	$Location_Hours['Tuesday Note'] = $_POST['Tuesday_Note'];

	$Location_Hours['Wednesday Open'] = $_POST['Wednesday_Open_Time'];
	$Location_Hours['Wednesday Close'] = $_POST['Wednesday_Close_Time'];
	$Location_Hours['Wednesday Note'] = $_POST['Wednesday_Note'];

	$Location_Hours['Thursday Open'] = $_POST['Thursday_Open_Time'];
	$Location_Hours['Thursday Close'] = $_POST['Thursday_Close_Time'];
	$Location_Hours['Thursday Note'] = $_POST['Thursday_Note'];

	$Location_Hours['Friday Open'] = $_POST['Friday_Open_Time'];
	$Location_Hours['Friday Close'] = $_POST['Friday_Close_Time'];
	$Location_Hours['Friday Note'] = $_POST['Friday_Note'];

	$Location_Hours['Saturday Open'] = $_POST['Saturday_Open_Time'];
	$Location_Hours['Saturday Close'] = $_POST['Saturday_Close_Time'];
	$Location_Hours['Saturday Note'] = $_POST['Saturday_Note'];

	$Location_Hours['Sunday Open'] = $_POST['Sunday_Open_Time'];
	$Location_Hours['Sunday Close'] = $_POST['Sunday_Close_Time'];
	$Location_Hours['Sunday Note'] = $_POST['Sunday_Note'];

	if (!isset($error)) {
		/* Pass the data to the appropriate function in Update_EWD_UASP_Admin_Databases.php to create the location */
		if ($_POST['action'] == "Add_Location") {
			$user_update = Add_EWD_UASP_Location($Location_Name, $Location_Description, $Location_Hours);
		}
		/* Pass the data to the appropriate function in Update_EWD_UASP_Admin_Databases.php to edit the location */
		else {
			$user_update = Edit_EWD_UASP_Location($Location_ID, $Location_Name, $Location_Description, $Location_Hours);
		}
		$user_update = array("Message_Type" => "Update", "Message" => $user_update);
		return $user_update;
	}
	/* Return any error that might have occurred */
	else {
		$output_error = array("Message_Type" => "Error", "Message" => $error);
		return $output_error;
	}
}

function EWD_UASP_Mass_Delete_Locations() {
	$Locations = $_POST['Locations_Bulk'];
	
	if (is_array($Locations)) {
		foreach ($Locations as $Location) {
			if ($Location != "") {
				Delete_EWD_UASP_Location($Location);
			}
		}
	}
	
	$update = __("Locations have been successfully deleted.", 'ultimate-appointment-scheduling');
	$user_update = array("Message_Type" => "Update", "Message" => $update);
	return $user_update;
}

/* Prepare the data to add or edit a single service */
function EWD_UASP_Add_Edit_Service() {
	if ( ! isset( $_POST['EWD_UASP_Admin_Nonce'] ) ) {return;}

    if ( ! wp_verify_nonce( $_POST['EWD_UASP_Admin_Nonce'], 'EWD_UASP_Admin_Nonce' ) ) {return;}

	/* Process the $_POST data where neccessary before storage */
	if (isset($_POST['Service_ID'])) {$Service_ID = $_POST['Service_ID'];}
	if (isset($_POST['Service_Name'])) {$Service_Name = sanitize_text_field($_POST['Service_Name']);}
	if (isset($_POST['Service_Description'])) {$Service_Description = sanitize_text_field($_POST['Service_Description']);}
	if (isset($_POST['Service_Capacity'])) {$Service_Capacity = sanitize_text_field($_POST['Service_Capacity']);}
	if (isset($_POST['Service_Duration'])) {$Service_Duration = sanitize_text_field($_POST['Service_Duration']);}
	if (isset($_POST['Service_Price'])) {$Service_Price = sanitize_text_field($_POST['Service_Price']);}

	if (!isset($error)) {
		/* Pass the data to the appropriate function in Update_EWD_UASP_Admin_Databases.php to create the service */
		if ($_POST['action'] == "Add_Service") {
			$user_update = Add_EWD_UASP_Service($Service_Name, $Service_Description, $Service_Capacity, $Service_Duration, $Service_Price);
		}
		/* Pass the data to the appropriate function in Update_EWD_UASP_Admin_Databases.php to edit the service */
		else {
			$user_update = Edit_EWD_UASP_Service($Service_ID, $Service_Name, $Service_Description, $Service_Capacity, $Service_Duration, $Service_Price);
		}
		$user_update = array("Message_Type" => "Update", "Message" => $user_update);
		return $user_update;
	}
	/* Return any error that might have occurred */
	else {
		$output_error = array("Message_Type" => "Error", "Message" => $error);
		return $output_error;
	}
}

function EWD_UASP_Mass_Delete_Services() {
	$Services = $_POST['Services_Bulk'];
	
	if (is_array($Services)) {
		foreach ($Services as $Service) {
			if ($Service != "") {
				Delete_EWD_UASP_Service($Service);
			}
		}
	}
	
	$update = __("Services have been successfully deleted.", 'ultimate-appointment-scheduling');
	$user_update = array("Message_Type" => "Update", "Message" => $update);
	return $user_update;
}

/* Prepare the data to add or edit a single service provider */
function EWD_UASP_Add_Edit_Service_Provider() {
	if ( ! isset( $_POST['EWD_UASP_Admin_Nonce'] ) ) {return;}

    if ( ! wp_verify_nonce( $_POST['EWD_UASP_Admin_Nonce'], 'EWD_UASP_Admin_Nonce' ) ) {return;}

	/* Process the $_POST data where neccessary before storage */
	if (isset($_POST['Service_Provider_ID'])) {$Service_Provider_ID = $_POST['Service_Provider_ID'];}
	if (isset($_POST['Service_Provider_Name'])) {$Service_Provider_Name = sanitize_text_field($_POST['Service_Provider_Name']);}
	if (isset($_POST['Service_Provider_Description'])) {$Service_Provider_Description = sanitize_text_field($_POST['Service_Provider_Description']);}
	if (is_array($_POST['Service_Provider_Services'])) {$Service_Provider_Services = implode(",", $_POST['Service_Provider_Services']);}
	else {$Service_Provider_Services = sanitize_text_field($_POST['Service_Provider_Services']);}
	if (isset($_POST['Service_Provider_Email'])) {$Service_Provider_Email = $_POST['Service_Provider_Email'];}

	$Service_Provider_Hours['Monday Location'] = $_POST['Monday_Location_ID'];
	$Service_Provider_Hours['Monday Start'] = $_POST['Monday_Start_Time'];
	$Service_Provider_Hours['Monday Finish'] = $_POST['Monday_Finish_Time'];

	$Service_Provider_Hours['Tuesday Location'] = $_POST['Tuesday_Location_ID'];
	$Service_Provider_Hours['Tuesday Start'] = $_POST['Tuesday_Start_Time'];
	$Service_Provider_Hours['Tuesday Finish'] = $_POST['Tuesday_Finish_Time'];

	$Service_Provider_Hours['Wednesday Location'] = $_POST['Wednesday_Location_ID'];
	$Service_Provider_Hours['Wednesday Start'] = $_POST['Wednesday_Start_Time'];
	$Service_Provider_Hours['Wednesday Finish'] = $_POST['Wednesday_Finish_Time'];

	$Service_Provider_Hours['Thursday Location'] = $_POST['Thursday_Location_ID'];
	$Service_Provider_Hours['Thursday Start'] = $_POST['Thursday_Start_Time'];
	$Service_Provider_Hours['Thursday Finish'] = $_POST['Thursday_Finish_Time'];

	$Service_Provider_Hours['Friday Location'] = $_POST['Friday_Location_ID'];
	$Service_Provider_Hours['Friday Start'] = $_POST['Friday_Start_Time'];
	$Service_Provider_Hours['Friday Finish'] = $_POST['Friday_Finish_Time'];

	$Service_Provider_Hours['Saturday Location'] = $_POST['Saturday_Location_ID'];
	$Service_Provider_Hours['Saturday Start'] = $_POST['Saturday_Start_Time'];
	$Service_Provider_Hours['Saturday Finish'] = $_POST['Saturday_Finish_Time'];

	$Service_Provider_Hours['Sunday Location'] = $_POST['Sunday_Location_ID'];
	$Service_Provider_Hours['Sunday Start'] = $_POST['Sunday_Start_Time'];
	$Service_Provider_Hours['Sunday Finish'] = $_POST['Sunday_Finish_Time'];

	if (!isset($error)) {
		/* Pass the data to the appropriate function in Update_EWD_UASP_Admin_Databases.php to create the service provider */
		if ($_POST['action'] == "Add_Service_Provider") {
			$user_update = Add_EWD_UASP_Service_Provider($Service_Provider_Name, $Service_Provider_Description, $Service_Provider_Services, $Service_Provider_Email, $Service_Provider_Hours);
		}
		/* Pass the data to the appropriate function in Update_EWD_UASP_Admin_Databases.php to edit the service provider */
		else {
			$user_update = Edit_EWD_UASP_Service_Provider($Service_Provider_ID, $Service_Provider_Name, $Service_Provider_Description, $Service_Provider_Services, $Service_Provider_Email, $Service_Provider_Hours);
		}
		$user_update = array("Message_Type" => "Update", "Message" => $user_update);
		return $user_update;
	}
	/* Return any error that might have occurred */
	else {
		$output_error = array("Message_Type" => "Error", "Message" => $error);
		return $output_error;
	}
}

function EWD_UASP_Mass_Delete_Service_Providers() {
	$Service_Providers = $_POST['Service_Providers_Bulk'];
	
	if (is_array($Service_Providers)) {
		foreach ($Service_Providers as $Service_Provider) {
			if ($Service_Provider != "") {
				Delete_EWD_UASP_Service_Provider($Service_Provider);
			}
		}
	}
	
	$update = __("Service providers have been successfully deleted.", 'ultimate-appointment-scheduling');
	$user_update = array("Message_Type" => "Update", "Message" => $update);
	return $user_update;
}

function EWD_UASP_Add_Edit_Exception() {
	if ( ! isset( $_POST['EWD_UASP_Admin_Nonce'] ) ) {return;}

    if ( ! wp_verify_nonce( $_POST['EWD_UASP_Admin_Nonce'], 'EWD_UASP_Admin_Nonce' ) ) {return;}

	/* Process the $_POST data where neccessary before storage */
	if (isset($_POST['Exception_ID'])) {$Exception_ID = $_POST['Exception_ID'];}
	if (isset($_POST['Location_ID'])) {$Location_Post_ID = sanitize_text_field($_POST['Location_ID']);}
	if ($Location_Post_ID == "") {$Location_Post_ID = 0;}
	$Location_Post = get_post($Location_Post_ID);
	$Location_Name = $Location_Post->post_title;
	if (isset($_POST['Service_Provider_ID'])) {$Service_Provider_Post_ID = sanitize_text_field($_POST['Service_Provider_ID']);}
	if ($Service_Provider_Post_ID == "") {$Service_Provider_Post_ID = 0;}
	$Service_Provider_Post = get_post($Service_Provider_Post_ID);
	$Service_Provider_Name = $Service_Provider_Post->post_title;
	if (isset($_POST['Exception_Start'])) {$Exception_Start_Time = sanitize_text_field($_POST['Exception_Start']);}
	if (isset($_POST['Exception_End'])) {$Exception_End_Time = sanitize_text_field($_POST['Exception_End']);}
	if (isset($_POST['Exception_Status'])) {$Exception_Status = sanitize_text_field($_POST['Exception_Status']);}
	if (isset($_POST['Exception_Reason'])) {$Exception_Reason = sanitize_text_field(stripslashes_deep($_POST['Exception_Reason']));}
	
	if (!isset($error)) {
		/* Pass the data to the appropriate function in Update_EWD_UASP_Admin_Databases.php to create the appointment */
		if ($_POST['action'] == "Add_Exception") {
			$user_update = Add_EWD_UASP_Exception($Location_Name, $Location_Post_ID,  $Service_Provider_Name, $Service_Provider_Post_ID, $Exception_Start_Time, $Exception_End_Time, $Exception_Status, $Exception_Reason);
		}
		/* Pass the data to the appropriate function in Update_EWD_UASP_Admin_Databases.php to edit the appointment */
		else {
			$user_update = Edit_EWD_UASP_Exception($Exception_ID, $Location_Name, $Location_Post_ID,  $Service_Provider_Name, $Service_Provider_Post_ID, $Exception_Start_Time, $Exception_End_Time, $Exception_Status, $Exception_Reason);
		}
		$user_update = array("Message_Type" => "Update", "Message" => $user_update);
		return $user_update;
	}
	/* Return any error that might have occurred */
	else {
		$output_error = array("Message_Type" => "Error", "Message" => $error);
		return $output_error;
	}
}


function EWD_UASP_Mass_Delete_Exceptions() {
	$Exceptions = $_POST['Exceptions_Bulk'];
	
	if (is_array($Exceptions)) {
		foreach ($Exceptions as $Exception) {
			if ($Exception != "") {
				Delete_EWD_UASP_Exception($Exception);
			}
		}
	}
	
	$update = __("Exceptions have been successfully deleted.", 'ultimate-appointment-scheduling');
	$user_update = array("Message_Type" => "Update", "Message" => $update);
	return $user_update;
}

function EWD_UASP_Add_Edit_Custom_Field() {
		if ( ! isset( $_POST['EWD_UASP_Admin_Nonce'] ) ) {return;}

    	if ( ! wp_verify_nonce( $_POST['EWD_UASP_Admin_Nonce'], 'EWD_UASP_Admin_Nonce' ) ) {return;}

		/* Process the $_POST data where neccessary before storage */
		$Field_Name = stripslashes_deep($_POST['Field_Name']);
		$Field_Slug = stripslashes_deep($_POST['Field_Slug']);
		$Field_Type = stripslashes_deep($_POST['Field_Type']);
		$Field_Description = stripslashes_deep($_POST['Field_Description']);
		$Field_Values = stripslashes_deep($_POST['Field_Values']);
		$Field_Display = stripslashes_deep($_POST['Field_Display']);

		$Field_ID = (isset($_POST['Field_ID']) ? $_POST['Field_ID'] : '');

		if (!isset($error)) {
				/* Pass the data to the appropriate function in Update_Admin_Databases.php to create the custom field */
				if ($_POST['action'] == "Add_Custom_Field") {
					  $user_update = Add_EWD_UASP_Custom_Field($Field_Name, $Field_Slug, $Field_Type, $Field_Description, $Field_Values, $Field_Display);
				}
				/* Pass the data to the appropriate function in Update_Admin_Databases.php to edit the custom field */
				else {
						$user_update = Edit_EWD_UASP_Custom_Field($Field_ID, $Field_Name, $Field_Slug, $Field_Type, $Field_Description, $Field_Values, $Field_Display);
				}
				$user_update = array("Message_Type" => "Update", "Message" => $user_update);
				return $user_update;
		}
		else {
				$output_error = array("Message_Type" => "Error", "Message" => $error);
				return $output_error;
		}
}

function EWD_UASP_Mass_Delete_Custom_Fields() {
		$Fields = $_POST['Fields_Bulk'];

		if (is_array($Fields)) {
				foreach ($Fields as $Field) {
						if ($Field != "") {
								Delete_EWD_UASP_Custom_Field($Field);
						}
				}
		}

		$update = __("Field(s) have been successfully deleted.", 'ultimate-appointment-scheduling');
		$user_update = array("Message_Type" => "Update", "Message" => $update);
		return $user_update;
}

?>
