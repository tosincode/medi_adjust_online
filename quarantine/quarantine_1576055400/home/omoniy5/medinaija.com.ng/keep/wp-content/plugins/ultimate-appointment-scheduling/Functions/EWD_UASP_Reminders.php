<?php 
function EWD_UASP_Possible_Email_Reminders() {
	$Cache_Time = get_option("EWD_UASP_Reminders_Cache_Time");
	$Last_Cache = get_option("EWD_UASP_Last_Reminder_Call");
	$Email_Reminders = get_option("EWD_UASP_Email_Reminders");

	if (!is_array($Email_Reminders)) {return;}
	//if (($Last_Cache + $Cache_Time*60) < time()) {
		EWD_UASP_Check_Email_Reminders();
		update_option("EWD_UASP_Last_Reminder_Call", time());
	//}
}

function EWD_UASP_Check_Email_Reminders() {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	$Email_Reminders = get_option("EWD_UASP_Email_Reminders");
	$Timezone = get_option("EWD_UASP_Timezone");
	date_default_timezone_set($Timezone);

	$Current_Time = date("Y-m-d H:i:s");
	foreach ($Email_Reminders as $Reminder) {
		$Cut_Off_Time = date("Y-m-d H:i:s", time() + $Reminder['SecondsBeforeAppointment']);
		$Sql = "SELECT * FROM $ewd_usap_appointments_table_name WHERE Appointment_Start <= '" . $Cut_Off_Time . "' AND Appointment_Start > '" . $Current_Time . "' AND Appointment_Reminder_Email_Sent NOT LIKE '%" . $Reminder['ID'] . "%'"; 
		if ($Reminder['Conditional'] == "No") {$Sql .= " AND Appointment_Confirmation_Received != 'Yes'";} 
		$Appointments = $wpdb->get_results($Sql);

		foreach ($Appointments as $Appointment) {
			if ($Appointment->Appointment_Client_Email == "") {continue;}
			if (!EWD_UASP_Send_Email_Reminder($Appointment, $Reminder)) {$EmailFailure = true;}
		}
	}

	if ($EmailFailure) {return false;}
}

function EWD_UASP_Send_Email_Reminder($Appointment, $Reminder) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;
	
	$Email_Messages_Array = get_option("EWD_UASP_Email_Messages_Array");
	if (!is_array($Email_Messages_Array)) {$Email_Messages_Array = array();}

	if ($Reminder['Email_ID'] < 0) {
		$Params = array(
			'Email_ID' => $Reminder['Email_ID'] * -1,
			'appointment_id' => $Appointment->Appointment_ID,
			'Email_Address' => $Appointment->Appointment_Client_Email
		);

		if (function_exists('EWD_UWPM_Send_Email_To_Non_User')) {
			EWD_UWPM_Send_Email_To_Non_User($Params);
		}
	}
	else {
		foreach ($Email_Messages_Array as $Email_Message_Item) {
			if ($Email_Message_Item['ID'] == $Reminder['Email_ID']) {
				$Message = EWD_UASP_Substitute_Email_Text(EWD_UASP_Return_Email_Template($Email_Message_Item), $Appointment);
				$Subject = EWD_UASP_Substitute_Email_Text($Email_Message_Item['Subject'], $Appointment);
				$Headers = array('Content-Type: text/html; charset=UTF-8');
	
				$mail_success = wp_mail( $Appointment->Appointment_Client_Email, $Subject, $Message, $Headers);
	
				$New_Appointment_Email_Reminders = $Appointment->Appointment_Reminder_Email_Sent . "," . $Reminder['ID'];
				$wpdb->update(
					$ewd_usap_appointments_table_name,
					array( 'Appointment_Reminder_Email_Sent' => $New_Appointment_Email_Reminders),
					array( 'Appointment_ID' => $Appointment->Appointment_ID)
				);
			}
		}
	}
}

function EWD_UASP_Third_Party_Reminders($Turn_On) {
	global $ewd_uasp_message;

	$Site_ID = get_option("EWD_UASP_Unique_Site_ID");
	$Site_URL = get_site_url();

	$opts = array('http'=>array('method'=>"GET"));
	$context = stream_context_create($opts);
	$Response = unserialize(file_get_contents("http://www.etoilewebdesign.com/UASP-Cron-Jobs/CronManager.php?Site_ID=" . $Site_ID . "&Site_URL=" . $Site_URL . "&TurnOn=" . $Turn_On, false, $context));
	
	if ($Response['Message_Type'] == "Error") {
		  $ewd_uasp_message = array("Message_Type" => "Error", "Message" => $Response['Message']);
	}
	else {
		update_option("EWD_UASP_Third_Party_Reminders", $Response['Message']);
	}
}

function EWD_UASP_Substitute_Email_Text($Text, $Appointment) {
	global $wpdb;
	global $ewd_uasp_fields_table_name;
	global $ewd_uasp_fields_meta_table_name;

	$Appointment_Confirmation = get_option("EWD_UASP_Appointment_Confirmation");
	$Appointment_Confirmation_Page = get_option("EWD_UASP_Appointment_Confirmation_Page");

	$Timezone = get_option("EWD_UASP_Timezone");
	$PHP_Date_Format = get_option("EWD_UASP_PHP_Date_Format");

	if (strpos($Appointment_Confirmation_Page, "?") === false) {$Confirmation_URL = $Appointment_Confirmation_Page . "?";}
	else {$Confirmation_URL = $Appointment_Confirmation_Page . "&";}
	$Confirmation_URL .= "Appt_ID=" . $Appointment->Appointment_ID . "&Email=" . $Appointment->Appointment_Client_Email;
	$Confirmation_Link = "[button link='" . $Confirmation_URL . "']Confirm your appointment[/button]";

	if (strpos($Appointment_Confirmation_Page, "?") === false) {$Cancellation_URL = $Appointment_Confirmation_Page . "?";}
	else {$Cancellation_URL = $Appointment_Confirmation_Page . "&";}
	$Cancellation_URL .= "Appt_ID=" . $Appointment->Appointment_ID . "&Email=" . $Appointment->Appointment_Client_Email . "&Action=Cancel_Appointment";
	$Cancellation_Link = "[button link='" . $Cancellation_URL . "']Cancel your appointment[/button]";

	$Admin_Appointment_Link = get_site_url() . 'wp-admin/admin.php?page=EWD-UASP-options&Action=EWD_UASP_AppointmentDetails&Selected=Appointment&Appointment_ID=' . $Appointment->Appointment_ID;

	date_default_timezone_set($Timezone);

	$Search_Terms = array(
		"[appointment-time]",
		"[client]",
		"[phone]",
		"[email]",
		"[location]",
		"[service]",
		"[service-provider]",
		"[confirmation-link]",
		"[cancellation-link]",
		"[admin-appointment-link]"
	);

	$Replace_Terms = array(
		date($PHP_Date_Format, strtotime($Appointment->Appointment_Start)),
		$Appointment->Appointment_Client_Name,
		$Appointment->Appointment_Client_Phone,
		$Appointment->Appointment_Client_Email,
		$Appointment->Location_Name,
		$Appointment->Service_Name,
		$Appointment->Service_Provider_Name,
		$Confirmation_Link,
		$Cancellation_Link,
		$Admin_Appointment_Link
	);

	$Fields = $wpdb->get_results("SELECT Field_ID, Field_Slug FROM $ewd_uasp_fields_table_name");
	foreach ($Fields as $Field) {
		$Value = $wpdb->get_var($wpdb->prepare("SELECT Meta_Value FROM $ewd_uasp_fields_meta_table_name WHERE Field_ID=%d AND Appointment_ID=%d", $Field->Field_ID, $Appointment->Appointment_ID));
		$Search_Terms[] = '[' . $Field->Field_Slug . ']';
		$Replace_Terms[] = $Value;
	}

	$Appointment_Text = str_replace($Search_Terms, $Replace_Terms, $Text);

	return EWD_UASP_Replace_Email_Content($Appointment_Text);
}

function EWD_UASP_Return_Email_Template($Email_Message_Item) {
  $Message_Title = $Email_Message_Item['Subject'];
  $Message_Content = EWD_UASP_Replace_Email_Content(stripslashes($Email_Message_Item['Message']));

	$Email_Reminder_Background_Color = get_option("EWD_UASP_Email_Reminder_Background_Color");
	$Email_Reminder_Inner_Color = get_option("EWD_UASP_Email_Reminder_Inner_Color");
	$Email_Reminder_Text_Color = get_option("EWD_UASP_Email_Reminder_Text_Color");
	$Email_Reminder_Button_Background_Color = get_option("EWD_UASP_Email_Reminder_Button_Background_Color");
	$Email_Reminder_Button_Text_Color = get_option("EWD_UASP_Email_Reminder_Button_Text_Color");
	$Email_Reminder_Button_Background_Hover_Color = get_option("EWD_UASP_Email_Reminder_Button_Background_Hover_Color");
	$Email_Reminder_Button_Text_Hover_Color = get_option("EWD_UASP_Email_Reminder_Button_Text_Hover_Color");

  $Message =   <<< EOT
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
  <head>
  <meta name="viewport" content="width=device-width" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>$Message_Title</title>


  <style type="text/css">

	.body-wrap {
		background-color: {$Email_Reminder_Background_Color} !important;
	}
	.btn-primary {
		background-color: {$Email_Reminder_Button_Background_Color} !important;
		border-color: $Email_Reminder_Button_Background_Color !important;
		color: {$Email_Reminder_Button_Text_Color} !important;
	}
	.btn-primary:hover {
		background-color: {$Email_Reminder_Button_Background_Hover_Color} !important;
		border-color: $Email_Reminder_Button_Background_Hover_Color !important;
		color: {$Email_Reminder_Button_Text_Hover_Color} !important;
	}
	.main {
		background: $Email_Reminder_Inner_Color !important;
		color: $Email_Reminder_Text_Color;
	}

  img {
  max-width: 100%;
  }
  body {
  -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em;
  }
  body {
  background-color: #f6f6f6;
  }
  @media only screen and (max-width: 640px) {
    body {
      padding: 0 !important;
    }
    h1 {
      font-weight: 800 !important; margin: 20px 0 5px !important;
    }
    h2 {
      font-weight: 800 !important; margin: 20px 0 5px !important;
    }
    h3 {
      font-weight: 800 !important; margin: 20px 0 5px !important;
    }
    h4 {
      font-weight: 800 !important; margin: 20px 0 5px !important;
    }
    h1 {
      font-size: 22px !important;
    }
    h2 {
      font-size: 18px !important;
    }
    h3 {
      font-size: 16px !important;
    }
    .container {
      padding: 0 !important; width: 100% !important;
    }
    .content {
      padding: 0 !important;
    }
    .content-wrap {
      padding: 10px !important;
    }
    .invoice {
      width: 100% !important;
    }
  }
  </style>
  </head>

  <body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">

  <table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
  		<td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
  			<div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
  				<table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff"><tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
  					<meta itemprop="name" content="Please Review" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" /><table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
              $Message_Content
        </div>
  		</td>
  		<td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
  	</tr></table></body>
  </html>

EOT;

  return $Message;
}

function EWD_UASP_Replace_Email_Content($Message_Start) {
  //if (strpos($Message_Start, '[footer]') === false) {$Message_Start .= '</table></td></tr></table>';}

  $Replace = array('[section]', '[/section]', '[footer]', '[/footer]', '[/button]');
  $ReplaceWith = array(
    '<tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">',
    '</td></tr>',
    '</table></td></tr></table><div class="footer" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;"><table width="100%" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="aligncenter content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">',
    '</td></tr></table></div>',
    '</a></td></tr>'
  );
  $Message = str_replace($Replace, $ReplaceWith, $Message_Start);
  $Final_Message = EWD_UASP_Replace_Email_Links($Message);

  return $Final_Message;
}


function EWD_UASP_Replace_Email_Links($Message) {
	$Pattern = "/\[button link=\'(.*?)\'\]/";

	preg_match_all($Pattern, $Message, $Matches);

	$Replace = '<tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top"><a href="INSERTED_LINK" class="btn-primary" itemprop="url" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">';
	$Result = preg_replace($Pattern, $Replace, $Message);

	if (is_array($Matches[1])) {
		foreach ($Matches[1] as $Link) {
			$Pos = strpos($Result, "INSERTED_LINK");
			if ($Pos !== false) {
			    $NewString = substr_replace($Result, $Link, $Pos, 13);
			    $Result = $NewString;
			}
		}
	}

	return $Result;
}
?>