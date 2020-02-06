<?php
function EWD_UASP_Edit_Appointment() {
	$Require_Login = get_option("EWD_UASP_Require_Login");

		$Name_Label = get_option("EWD_Name_Label");
	if ($Name_Label == "") {$Name_Label = __("Name", 'ultimate-appointment-scheduling');}
		$Phone_Label = get_option("EWD_Phone_Label");
	if ($Phone_Label == "") {$Phone_Label = __("Phone", 'ultimate-appointment-scheduling');}
		$Email_Label = get_option("EWD_Email_Label");
	if ($Email_Label == "") {$Email_Label = __("Email", 'ultimate-appointment-scheduling');}
		$Appointment_Date_Label = get_option("EWD_Appointment_Date_Label");
	if ($Appointment_Date_Label == "") {$Appointment_Date_Label = __("Appointment Date", 'ultimate-appointment-scheduling');}

	$ReturnString = "";

	// Get the attributes passed by the shortcode, and store them in new variables for processing
	extract( shortcode_atts( array(
				'redirect_page' => '#'
				),
		$atts
		)
	);

	if ($Require_Login == "Yes") {
		$Logged_In_User = EWD_UASP_Get_Login_Information();
		if ($Logged_In_User['Login_Status'] == "None") {
			$ReturnString .= "<div class='ewd-uasp-login-message'>";
			$ReturnString .= __("Please log in to book an appointment", 'ultimate-appointment-scheduling');
			$ReturnString .= "<br />";
			$ReturnString .= __("Login Options:", 'ultimate-appointment-scheduling');
			$ReturnString .= "</div>";
			$ReturnString .= "<div class='ewd-uasp-login-options'>";
			$ReturnString .= $Logged_In_User['ManageLogin'];
			$ReturnString .= "</div>";
			return $ReturnString;
		}
	}
	else {
		$Logged_In_User['Client_Name'] = "";
		$Logged_In_User['Client_Email'] = "";
		$Logged_In_User['Client_Phone'] = "";
	}

	if (isset($_POST['Appointment_ID'])) {
		$ReturnString .= do_shortcode("[ultimate-appointment-dropdown redirect_page='" . $redirect_page . "' selected_appointment_id='" . $_POST['Appointment_ID'] . "']");
		return $ReturnString;
	}

	if (isset($_POST['Search_Appointments'])) {
		$Appointments = EWD_UASP_Search_Appointments();

		$ReturnString .= "<div class='ewd-uasp-edit-appointment-table'>";
		$ReturnString .= "<table>";
		$ReturnString .= "<thead>";
		$ReturnString .= "<tr>";
		$ReturnString .= "<th>" . $Name_Label . "</th>";
		$ReturnString .= "<th>" . $Phone_Label . "</th>";
		$ReturnString .= "<th>" . $Email_Label . "</th>";
		$ReturnString .= "<th>" . $Appointment_Date_Label . "</th>";
		$ReturnString .= "<th></th>";
		$ReturnString .= "</tr>";
		$ReturnString .= "</thead>";
		$ReturnString .= "<tbody>";
		foreach ($Appointments as $Appointment) {
			$ReturnString .= "<form method='post' action='#'>";
			$ReturnString .= "<input type='hidden' name='Appointment_ID' value='" . $Appointment->Appointment_ID . "' />";
			$ReturnString .= "<tr>";
			$ReturnString .= "<td>" . $Appointment->Appointment_Client_Name . "</td>";
			$ReturnString .= "<td>" . $Appointment->Appointment_Client_Phone . "</td>";
			$ReturnString .= "<td>" . $Appointment->Appointment_Client_Email . "</td>";
			$ReturnString .= "<td>" . $Appointment->Appointment_Start . "</td>";
			$ReturnString .= "<td><input type='submit' name='Edit_Appointment' value='" . __('Edit Appointment', 'ultimate-appointment-scheduling') . "' /></td>";
			$ReturnString .= "</tr>";
		}
		$ReturnString .= "</tbody>";
		$ReturnString .= "</table>";
		$ReturnString .= "</div>";
	
		return $ReturnString;
	}

	$ReturnString .= "<form method='post' action='#'>";
	$ReturnString .= "<div class='ewd-uasp-das-field'>";
	$ReturnString .= "<div class='ewd-uasp-das-name registration-field-title'>";
	$ReturnString .= "<label for='Appointment_Client_Name'>" .  $Name_Label . "</label>";
	$ReturnString .= "</div>";
	if ($Logged_In_User['Client_Name'] != "") {$ReturnString .= "<input name='Appointment_Client_Name' id='Appointment_Client_Name' type='hidden' value='" . $Logged_In_User['Client_Name'] . "' size='60' />" . $Logged_In_User['Client_Name'];}
	else {$ReturnString .= "<input name='Appointment_Client_Name' class='ewd-uasp-das-select' id='Appointment_Client_Name' type='text' value='" . $Selected_Appointment->Appointment_Client_Name . "' size='60' " . $Name_Required . "/>";}
	$ReturnString .= "</div>";
	  
	$ReturnString .= "<div class='ewd-uasp-das-field'>";
	$ReturnString .= "<div class='ewd-uasp-das-phone registration-field-title'>";
	$ReturnString .= "<label for='Appointment_Client_Phone'>" . $Phone_Label . "</label>";
	$ReturnString .= "</div>";
	if ($Logged_In_User['Client_Phone'] != "") {$ReturnString .= "<input name='Appointment_Client_Phone' id='Appointment_Client_Phone' type='text' value='" . $Logged_In_User['Client_Phone'] . "' size='60' " . $Phone_Required . " />" . $Logged_In_User['Client_Phone'];}
	else {$ReturnString .= "<input name='Appointment_Client_Phone' class='ewd-uasp-das-select' id='Appointment_Client_Phone' type='text' value='" . $Selected_Appointment->Appointment_Client_Phone . "' size='60' " . $Phone_Required . "/>";}
	$ReturnString .= "</div>";
	  
	$ReturnString .= "<div class='ewd-uasp-das-field'>";
	$ReturnString .= "<div class='ewd-uasp-das-email registration-field-title'>";
	$ReturnString .= "<label for='Appointment_Client_Email'>" . $Email_Label . "</label>";
	$ReturnString .= "</div>";
	if ($Logged_In_User['Client_Email'] != "") {$ReturnString .= "<input name='Appointment_Client_Email' id='Appointment_Client_Email' type='text' value='" . $Logged_In_User['Client_Email'] . "' size='60' " . $Email_Required . " />" . $Logged_In_User['Client_Email'];}
	else {$ReturnString .= "<input name='Appointment_Client_Email' class='ewd-uasp-das-select' id='Appointment_Client_Email' type='text' value='" . $Selected_Appointment->Appointment_Client_Email . "' size='60' " . $Email_Required . "/>";}
	$ReturnString .= "</div>";
	$ReturnString .= "<input type='submit' name='Search_Appointments' value='Find Appointment' />";
	$ReturnString .= "</form>";

	return $ReturnString;
}
add_shortcode('edit-appointment', "EWD_UASP_Edit_Appointment");


function EWD_UASP_Search_Appointments() {
	global  $wpdb;
	global  $ewd_usap_appointments_table_name;

	$Sql = "SELECT * FROM $ewd_usap_appointments_table_name WHERE 1=%d ";

	if ($_POST['Appointment_Client_Name'] != "") {
		$Sql .= "AND Appointment_Client_Name='%s' ";
		$Variables_String .= $_POST['Appointment_Client_Name'] . ",";
	}
	if ($_POST['Appointment_Client_Phone'] != "") {
		$Sql .= "AND Appointment_Client_Phone='%s' ";
		$Variables_String .= $_POST['Appointment_Client_Phone'] . ",";
	}
	if ($_POST['Appointment_Client_Email'] != "") {
		$Sql .= "AND Appointment_Client_Email='%s' ";
		$Variables_String .= $_POST['Appointment_Client_Email'] . ",";
	}

	$Variables_String = substr($Variables_String, 0, -1);

	$Appointments = $wpdb->get_results($wpdb->prepare($Sql, 1, $Variables_String));

	return $Appointments;
}

?>