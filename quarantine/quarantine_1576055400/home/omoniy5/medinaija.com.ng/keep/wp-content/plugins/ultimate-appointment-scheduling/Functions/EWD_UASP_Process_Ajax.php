<?php
/* Processes the ajax requests being put out in the admin area and the front-end
*  of the UASP plugin */

function EWD_UASP_AJAX_Get_Events() {
	$Path = ABSPATH . 'wp-load.php';
    include_once($Path);

	$Location = $_GET['location'];
	$Service = $_GET['service'];
	$Service_Provider = $_GET['service_provider'];
	$Start_Date = $_GET['start'];
	$End_Date = $_GET['end'];

	//echo "POST: " . print_r($_POST, true);
	//echo "GET: " . print_r($_GET, true);
	//echo $Location . " | " . $Service . " | " . $Service_Provider . " | " . $Start_Date . " | " . $End_Date;
	echo EWD_UASP_Get_Events($Location, $Service, $Service_Provider, $Start_Date, $End_Date);
	wp_die();
}
add_action('wp_ajax_uasp_get_events', 'EWD_UASP_AJAX_Get_Events');
add_action( 'wp_ajax_nopriv_uasp_get_events', 'EWD_UASP_AJAX_Get_Events');

function EWD_UASP_AJAX_Get_Admin_Appointments() {
	$Path = ABSPATH . 'wp-load.php';
    include_once($Path);

	$Location = $_GET['location'];
	$Service = $_GET['service'];
	$Service_Provider = $_GET['service_provider'];
	$Start_Time = $_GET['start'];
	$End_Time = $_GET['end'];

	//echo "POST: " . print_r($_POST, true);
	//echo "GET: " . print_r($_GET, true);
	//echo $Location . " | " . $Service . " | " . $Service_Provider . " | " . $Start_Date . " | " . $End_Date;
	echo EWD_UASP_Get_Admin_Appointments($Location, $Service, $Service_Provider, $Start_Time, $End_Time);
	wp_die();
}
add_action('wp_ajax_uasp_get_admin_appointments', 'EWD_UASP_AJAX_Get_Admin_Appointments');

function EWD_UASP_AJAX_Get_Appointment_Times() {
	$Location = $_POST['Location'];
	$Service = $_POST['Service'];
	$Service_Provider = $_POST['Service_Provider'];
	$Date = $_POST['Date'];

	echo EWD_UASP_Get_Appointments_Times($Location, $Service, $Service_Provider, $Date);
	wp_die();
}
add_action('wp_ajax_uasp_get_appointments', 'EWD_UASP_AJAX_Get_Appointment_Times');
add_action( 'wp_ajax_nopriv_uasp_get_appointments', 'EWD_UASP_AJAX_Get_Appointment_Times');

function EWD_UASP_AJAX_Update_Dropdowns() {
	$Location = $_POST['Location'];
	$Service = $_POST['Service'];

	echo EWD_UASP_Get_Service_Providers($Location, $Service);
	wp_die();
}
add_action('wp_ajax_uasp_get_service_providers', 'EWD_UASP_AJAX_Update_Dropdowns');
add_action( 'wp_ajax_nopriv_uasp_get_service_providers', 'EWD_UASP_AJAX_Update_Dropdowns');

// Records the number of time an FAQ post is opened
function EWD_UASP_Record_View() {
    $Path = ABSPATH . 'wp-load.php';
    include_once($Path);

    global $wpdb;
    $wpdb->show_errors();
    $post_id = $_POST['post_id'];
    $Meta_ID = $wpdb->get_var($wpdb->prepare("SELECT meta_id FROM $wpdb->postmeta WHERE post_id=%d AND meta_key='uasp_view_count'", $post_id));
    if ($Meta_ID != "" and $Meta_ID != 0) {$wpdb->query($wpdb->prepare("UPDATE $wpdb->postmeta SET meta_value=meta_value+1 WHERE post_id=%d AND meta_key='uasp_view_count'", $post_id));}
    else {$wpdb->query($wpdb->prepare("INSERT INTO $wpdb->postmeta (post_id,meta_key,meta_value) VALUES (%d,'uasp_view_count','1')", $post_id));}

}
/*add_action('wp_ajax_uasp_record_view', 'UFAQ_Record_View');
add_action( 'wp_ajax_nopriv_uasp_record_view', 'UFAQ_Record_View');*/


function EWD_UASP_Get_Service_Providers($Location, $Service) {
	$params = array(
		'posts_per_page' => -1, 
		'post_type' => 'uasp-provider'
	);

	$Service_Provider_Any_Label = get_option("EWD_UASP_Service_Provider_Any_Label");
	if ($Service_Provider_Any_Label == "") {$Service_Provider_Any_Label = __("Any", 'ultimate-appointment-scheduling');}

	$Service_Providers = get_posts($params);

	if (sizeof($Service_Providers) == 1) {
		$ReturnString .= "<input type='hidden' id='ewd-uasp-das-service-provider' name='Service_Provider_ID' value='" . $Service_Providers[0]->ID . "' />";
		$ReturnString .= $Service_Providers[0]->post_title;
	}
	else {
		$ReturnString .= "<select id='ewd-uasp-das-service-provider'  class='ewd-uasp-das-select' name='Service_Provider_ID' onchange='ClearAppointments();'>";
		$ReturnString .= "<option value='All'>" . $Service_Provider_Any_Label . "</option>";
		foreach ($Service_Providers as $Service_Provider) {
			$Monday_Location = get_post_meta($Service_Provider->ID, 'Monday Location', true);
			$Tuesday_Location = get_post_meta($Service_Provider->ID, 'Tuesday Location', true);
			$Wednesday_Location = get_post_meta($Service_Provider->ID, 'Wednesday Location', true);
			$Thursday_Location = get_post_meta($Service_Provider->ID, 'Thursday Location', true);
			$Friday_Location = get_post_meta($Service_Provider->ID, 'Friday Location', true);
			$Saturday_Location = get_post_meta($Service_Provider->ID, 'Saturday Location', true);
			$Sunday_Location = get_post_meta($Service_Provider->ID, 'Sunday Location', true);

			$Service_Provider_Services_String = get_post_meta($Service_Provider->ID, 'Service Provider Services', true);
			$Service_Provider_Services = explode(",", $Service_Provider_Services_String);
			
			if (($Monday_Location == $Location or $Tuesday_Location == $Location or $Wednesday_Location == $Location or $Thursday_Location == $Location or $Friday_Location == $Location or $Saturday_Location == $Location or $Sunday_Location == $Location)
				 and in_array($Service, $Service_Provider_Services)) {
				$ReturnString .= "<option value='" . $Service_Provider->ID . "' ";
				if ($Service_Provider->ID == $Default_Service_Provider_ID) {$ReturnString .= "selected";}
				$ReturnString .= ">" . $Service_Provider->post_title . "</option>";
			}
		}
		$ReturnString .= "</select>";
	}

	return $ReturnString;
}

function EWD_UASP_Send_Test_Email() {
    $Path = ABSPATH . 'wp-load.php';
    include_once($Path);

    global $wpdb;
    global $ewd_usap_appointments_table_name;

    $Email_Address = $_POST['Email_Address'];
    $Email_To_Send = $_POST['Email_To_Send'];

    $Email_Messages_Array = get_option("EWD_UASP_Email_Messages_Array");
    if (!is_array($Email_Messages_Array)) {$Email_Messages_Array = array();}

    foreach ($Email_Messages_Array as $Email_Message_Item) {
        if ($Email_Message_Item['ID'] == $Email_To_Send) {
            
            $Appointment = new stdClass();
            $Appointment->Appointment_ID = 0;
            $Appointment->Appointment_Start = date("Y-m-d H:i:s");
			$Appointment->Appointment_Client_Name = "Test Client";
			$Appointment->Appointment_Client_Phone = "555-555-5555";
			$Appointment->Appointment_Client_Email = "test@example.com";
			$Appointment->Location_Name = "Test Email Location";
			$Appointment->Service_Name = "Test Email Service";
			$Appointment->Service_Provider_Name = "Test Email Service Provider";
            
            $Message_Body = EWD_UASP_Substitute_Email_Text(EWD_UASP_Return_Email_Template($Email_Message_Item), $Appointment);
            $Subject = EWD_UASP_Substitute_Email_Text($Email_Message_Item['Subject'], $Appointment);
            $headers = array('Content-Type: text/html; charset=UTF-8');
            $Mail_Success = wp_mail($Email_Address, $Email_Message_Item['Subject'], $Message_Body, $headers);
        }
    }

    if ($Mail_Success) {echo '<div class="ewd-uasp-test-email-response">Success: Email has been sent successfully.</div>';}
    else {echo '<div class="ewd-uasp-test-email-response">Error: Please check your email settings, or try using an SMTP email plugin to change email settings.</div>';}

    die();
}
add_action('wp_ajax_uasp_send_test_email', 'EWD_UASP_Send_Test_Email');



//REVIEW ASK POP-UP
function EWD_UASP_Hide_Review_Ask(){   
    $Ask_Review_Date = sanitize_text_field($_POST['Ask_Review_Date']);

    update_option('EWD_UASP_Ask_Review_Date', time()+3600*24*$Ask_Review_Date);

    die();
}
add_action('wp_ajax_ewd_uasp_hide_review_ask','EWD_UASP_Hide_Review_Ask');


function EWD_UASP_Send_Feedback() {   
    $Feedback = sanitize_text_field($_POST['Feedback']);

    wp_mail('contact@etoilewebdesign.com', 'UASP Feedback - Dashboard Form', $Feedback);

    die();
}
add_action('wp_ajax_ewd_uasp_send_feedback','EWD_UASP_Send_Feedback');
