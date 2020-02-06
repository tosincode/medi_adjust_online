<?php 
function EWD_UASP_Upgrade_To_Full() {
	global $ewc_uasp_message, $EWD_UASP_Full_Version;
	
	$Key = trim($_POST['Key']);
	
	if ($Key == "EWD Trial" and !get_option("EWD_UASP_Trial_Happening")) {
		$ewc_uasp_message = array("Message_Type" => "Update", "Message" => __("Trial successfully started!", 'color-filters'));

		update_option("EWD_UASP_Trial_Expiry_Time", time() + (7*24*60*60));
		update_option("EWD_UASP_Trial_Happening", "Yes");
		update_option("EWD_UASP_Full_Version", "Yes");
		$EWD_UASP_Full_Version = get_option("EWD_UASP_Full_Version");

		$Admin_Email = get_option('admin_email');

		$opts = array('http'=>array('method'=>"GET"));
		$context = stream_context_create($opts);
		$Response = unserialize(file_get_contents("http://www.etoilewebdesign.com/UPCP-Key-Check/Register_Trial.php?Plugin=UASP&Admin_Email=" . $Admin_Email . "&Site=" . get_bloginfo('wpurl'), false, $context));
	}
	elseif (strlen($Key) < 18 or strlen($Key) > 22) {
		$ewc_uasp_message = array("Message_Type" => "Error", "Message" => 'Invalid Product Key');
	}
	elseif ($Key != "EWD Trial") {
		$opts = array('http'=>array('method'=>"GET"));
		$context = stream_context_create($opts);
		$Theme = wp_get_theme();
		$Theme_Name = $Theme->get('Name');
		$EWD_Theme_ID = get_option('EWD_Affiliate_Theme_ID');
		$Response = unserialize(file_get_contents("http://www.etoilewebdesign.com/UPCP-Key-Check/EWD_UASP_KeyCheck.php?Key=" . $Key . "&Site=" . get_bloginfo('wpurl') . "&Theme_ID=" . $EWD_Theme_ID . "&Theme_Name=" . $Theme_Name, false, $context));
		//echo "http://www.etoilewebdesign.com/UPCP-Key-Check/EWD_OTP_KeyCheck.php?Key=" . $Key . "&Site=" . get_bloginfo('wpurl');
		//$Response = file_get_contents("http://www.etoilewebdesign.com/UPCP-Key-Check/KeyCheck.php?Key=" . $Key);
		
		if ($Response['Message_Type'] == "Error") {
			  $ewc_uasp_message = array("Message_Type" => "Error", "Message" => $Response['Message']);
		}
		else {
				$ewc_uasp_message = array("Message_Type" => "Update", "Message" => $Response['Message']);
				update_option("EWD_UASP_Trial_Happening", "No");
				delete_option("EWD_UASP_Trial_Expiry_Time");
				update_option("EWD_UASP_Full_Version", "Yes");
				$EWD_UASP_Full_Version = get_option("EWD_UASP_Full_Version");
		}
	}
}

 ?>
