<?php 
if (isset($_POST['ipn_track_id'])) {
	$Allow_Paypal_Prepayment = get_option("EWD_UASP_Allow_Paypal_Prepayment");

	if ($Allow_Paypal_Prepayment == "Required" or $Allow_Paypal_Prepayment == "Optional") {
		EWD_UASP_IPN();
	}
}


function EWD_UASP_IPN() {
	global  $wpdb;
	global  $ewd_usap_appointments_table_name;

	$PayPal_Email_Address = get_option("EWD_UASP_PayPal_Email_Address");
	$Appointment_Confirmation = get_option("EWD_UASP_Appointment_Confirmation");
	$Appointment_Confirmation_Page = get_option("EWD_UASP_Appointment_Confirmation_Page");

	if (strpos($Appointment_Confirmation_Page, "?") === false) {$Confirmation_URL = $Appointment_Confirmation_Page . "?";}
	else {$Confirmation_URL = $Appointment_Confirmation_Page . "&";}
	$Confirmation_URL .= "Appt_ID=" . $Appointment->Appointment_ID . "&Email=" . $Appointment->Appointment_Client_Email;
	$Confirmation_Link = "<a href='" . $Confirmation_URL . "'>Confirm your appointment</a>";

	// CONFIG: Enable debug mode. This means we'll log requests into 'ipn.log' in the same directory.
	// Especially useful if you encounter network errors or other intermittent problems with IPN (validation).
	// Set this to 0 once you go live or don't require logging.
	define("DEBUG", 0);
	// Set to 0 once you're ready to go live
	define("USE_SANDBOX", 0);
	define("LOG_FILE", "./ipn.log");
	// Read POST data
	// reading posted data directly from $_POST causes serialization
	// issues with array data in POST. Reading raw POST data from input stream instead.
	$raw_post_data = file_get_contents('php://input');
	$raw_post_array = explode('&', $raw_post_data);
	$myPost = array();
	foreach ($raw_post_array as $keyval) {
		$keyval = explode ('=', $keyval);
		if (count($keyval) == 2)
			$myPost[$keyval[0]] = urldecode($keyval[1]);
	}
	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-validate';
	if(function_exists('get_magic_quotes_gpc')) {
		$get_magic_quotes_exists = true;
	}
	foreach ($myPost as $key => $value) {
		if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
			$value = urlencode(stripslashes($value));
		} else {
			$value = urlencode($value);
		}
		$req .= "&$key=$value";
	}
	// Post IPN data back to PayPal to validate the IPN data is genuine
	// Without this step anyone can fake IPN data
	if(USE_SANDBOX == true) {
		$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
	} else {
		$paypal_url = "https://www.paypal.com/cgi-bin/webscr";
	}
	$ch = curl_init($paypal_url);
	if ($ch == FALSE) {
		return FALSE;
	}
	curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
	if(DEBUG == true) {
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
	}
	// CONFIG: Optional proxy configuration
	//curl_setopt($ch, CURLOPT_PROXY, $proxy);
	//curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
	// Set TCP timeout to 30 seconds
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
	// CONFIG: Please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path
	// of the certificate as shown below. Ensure the file is readable by the webserver.
	// This is mandatory for some environments.
	//$cert = __DIR__ . "./cacert.pem";
	//curl_setopt($ch, CURLOPT_CAINFO, $cert);
	$res = curl_exec($ch);
	if (curl_errno($ch) != 0) // cURL error
		{
		if(DEBUG == true) {	
			error_log(date('[Y-m-d H:i e] '). "Can't connect to PayPal to validate IPN message: " . curl_error($ch) . PHP_EOL, 3, LOG_FILE);
		}
		curl_close($ch);
		exit;
	} else {
			// Log the entire HTTP response if debug is switched on.
			if(DEBUG == true) {
				error_log(date('[Y-m-d H:i e] '). "HTTP request of validation request:". curl_getinfo($ch, CURLINFO_HEADER_OUT) ." for IPN payload: $req" . PHP_EOL, 3, LOG_FILE);
				error_log(date('[Y-m-d H:i e] '). "HTTP response of validation request: $res" . PHP_EOL, 3, LOG_FILE);
			}
			curl_close($ch);
	}
	// Inspect IPN validation result and act accordingly
	// Split response headers and payload, a better way for strcmp
	$tokens = explode("\r\n\r\n", trim($res));
	$res = trim(end($tokens));
	if (strcmp ($res, "VERIFIED") == 0) {
		
		if (DEBUG == true) {
			foreach ($_POST as $key => $value) {
				$SaveString .= $key . ": " . $value . "<br>";
			}
			$Current = file_get_contents("Information.html");
			$SaveContent = $Current . "<BR><BR><BR><BR>" . $SaveString;
			file_put_contents("Information.html", $SaveContent);
		}
		
		$Email = $_POST['payer_email'];
		$TXN_ID = $_POST['txn_id'];
		$Appt_ID = $_POST['custom'];
		
		if ($_POST['mc_gross'] == $_POST['payment_gross']) {
			$wpdb->get_results($wpdb->prepare("UPDATE $ewd_usap_appointments_table_name SET Appointment_Prepaid='Yes', Appointment_PayPal_Receipt_Number=%s WHERE Appointment_ID=%d", $TXN_ID, $Appt_ID));
			$Appointment = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ewd_usap_appointments_table_name WHERE Appointment=%d", $Appt_ID));
			
			$subject = __("Appointment Payment Received", 'ultimate-appointment-scheduling');
			$message = __("Hello,", 'ultimate-appointment-scheduling') . "<br /><br />";
			$message .= __("We've received your payment for you appointment scheduled for ", 'ultimate-appointment-scheduling') . $Appointment->Appointment_Start . ".";
			if ($Appointment_Confirmation == "Yes" and $Appointment->Appointment_Confirmation_Received != "Yes") {$message .= __("Please confirm the appointment by going to the following link: ", 'ultimate-appointment-scheduling') . "<br /><br />" . $Confirmation_Link . "<br /><br />";}
			$message .= __("Thank you and see you at your appointment,", 'ultimate-appointment-scheduling');
			$message .= get_bloginfo('name');
			$headers = array('Content-Type: text/html; charset=UTF-8');
			$mail_success = wp_mail( $Appointment->Appointment_Client_Email, $subject, $message, $headers);
			
		}
		
		if(DEBUG == true) {
			error_log(date('[Y-m-d H:i e] '). "Verified IPN: $req ". PHP_EOL, 3, LOG_FILE);
		}
	} else if (strcmp ($res, "INVALID") == 0) {
		// log for manual investigation
		
		$to = $PayPal_Email_Address;  
		$subject = 'Download Area | Invalid Payment';  
		$message = ' 
		 
		Dear Administrator, 
		 
		A payment has been made but is flagged as INVALID. 
		Please verify the payment manualy and contact the buyer. 
		 
		Buyer Email: '.$email.' 
		';  
		$headers = array('Content-Type: text/html; charset=UTF-8'); 
		  
		wp_mail($to, $subject, $message, $headers); 
	
		if(DEBUG == true) {
			error_log(date('[Y-m-d H:i e] '). "Invalid IPN: $req" . PHP_EOL, 3, LOG_FILE);
		}
	}
} 

?>