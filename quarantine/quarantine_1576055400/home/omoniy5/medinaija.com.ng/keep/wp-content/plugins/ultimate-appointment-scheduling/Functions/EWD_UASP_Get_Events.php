<?php
function EWD_UASP_Get_Events($Selected_Location, $Selected_Service, $Selected_Service_Provider, $Start_Date, $End_Date) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;
	global $ewd_usap_exceptions_table_name;

	$Time_Between_Appointments = get_option("EWD_UASP_Time_Between_Appointments");
	$Minimum_Days_Advance = get_option("EWD_UASP_Minimum_Days_Advance");
	$Maximum_Days_Advance = get_option("EWD_UASP_Maximum_Days_Advance");

	$Service_Duration = get_post_meta($Selected_Service, 'Service Duration', true);

	$Min_Time = time() + ($Minimum_Days_Advance*24*60*60);
	$Max_Time = time() + ($Maximum_Days_Advance*24*60*60);

	$Start_Time = $Start_Date;
	$Date_Counter = $Start_Date;
	$End_Time = $End_Date;
	while ($Date_Counter <= $End_Time) {
		if ($Date_Counter > $Min_Time and $Date_Counter < $Max_Time) {
			$Date_String = date("Y-m-d", $Date_Counter);
			$Days[$Date_String] = date("l", $Date_Counter); 
		}
		$Date_Counter += (24*60*60);
	}
	//echo "Days: " . print_r($Days, true) . "\n"; 
	/*if ($Selected_Service_Provider != "All") {
		//echo "Single Provider<br />";
		$Service_Provider = get_post($Selected_Service_Provider);
	
		foreach($Days as $Date => $Day) {
			$Start = get_post_meta($Selected_Service_Provider, $Day . " Start", true);
			$Finish = get_post_meta($Selected_Service_Provider, $Day . " Finish", true);
			$Location = get_post_meta($Selected_Service_Provider, $Day . " Location", true);
	
			if ($Selected_Location == "All" or $Selected_Location == $Location) {
				$Event['title'] = $Service_Provider->post_title . " - " . $Location;
				$Event['start'] = $Date . " " . $Start;
				$Event['end'] = $Date . " " . $Finish;
				$Event['provider'] = $Service_Provider->ID;
	
				$Events[] = $Event;
			}
		}
	
		return json_encode($Events); //pop up select a service drop-down if service not selected
	}
	
	$Location = get_post($Selected_Location);
	
	foreach ($Days as $Date => $Day) {
		$params = array(
			'posts_per_page' => -1, 
			'post_type' => 'uasp-provider',
			'meta_query' => array(
				array(
					'key' => $Day . ' Location',
					'value' => $Location->ID,
				),
				array(
					'key' => $Day . ' Start',
					'value' => '24:00',
					'compare' => '!='
				)
			)
		);
		$Service_Provider_Query = new WP_Query($params);
		$Service_Providers = $Service_Provider_Query->posts;
		
		foreach ($Service_Providers as $Service_Provider) {
			$Services_Offered_String = get_post_meta($Service_Provider->ID, 'Service Provider Services', true); //check meta name
			$Services_Offered = explode(',', $Services_Offered_String);
			$Start_Time = get_post_meta($Service_Provider->ID, $Day . ' Start', true);
			$Finish_Time = get_post_meta($Service_Provider->ID, $Day . ' Finish', true);
			
			foreach ($Services_Offered as $Service) {
				if ($Selected_Service == $Service) {
					$Event['title'] = $Service_Provider->post_title;
					$Event['start'] = $Date . " " . $Start_Time;
					$Event['end'] = $Date . " " . $Finish_Time;
					$Event['provider'] = $Service_Provider->ID;
	
					$Events[] = $Event;
				}
			}
		}
	}*/

	foreach ($Days as $Date => $Day) {
		$params = array(
			'posts_per_page' => -1, 
			'post_type' => 'uasp-provider',
			'meta_query' => array(
				array(
					'key' => $Day . ' Location',
					'value' => $Selected_Location,
				),
				array(
					'key' => $Day . ' Start',
					'value' => '24:00',
					'compare' => '!='
				)
			)
		);
		if ($Selected_Service_Provider != "All") {
			$params['p'] = $Selected_Service_Provider;
		}
		$Service_Provider_Query = new WP_Query($params);
		$Service_Providers = $Service_Provider_Query->posts;
		//echo "Service Providers: " . print_R($Service_Provider_Query, true) . "\n";
		
		foreach ($Service_Providers as $Service_Provider) {
			$Services_Offered_String = get_post_meta($Service_Provider->ID, 'Service Provider Services', true); //check meta name
			$Services_Offered = explode(',', $Services_Offered_String);
			if (!in_array($Selected_Service, $Services_Offered)) {continue;}

			$Status_Changes = array();
			$Status_Changes[] = array('Time' => strtotime($Date . get_post_meta($Service_Provider->ID, $Day . ' Start', true)), 'Event' => 'Shift', 'Status' => 'Available');
			$Status_Changes[] = array('Time' => strtotime($Date . get_post_meta($Service_Provider->ID, $Day . ' Finish', true)) - ($Service_Duration * 60) + 1, 'Event' => 'Shift', 'Status' => 'Unavailable');

			$Appointments = $wpdb->get_results($wpdb->prepare("SELECT Appointment_ID, Appointment_Start, Appointment_End, Location_Post_ID FROM $ewd_usap_appointments_table_name WHERE Service_Provider_Post_ID=%d AND Appointment_Start LIKE %s", $Service_Provider->ID, $Date . "%")); 
			foreach ($Appointments as $Appointment) {
				$Start_Time = strtotime($Appointment->Appointment_Start) - ($Time_Between_Appointments * 60) + 1 - ($Service_Duration * 60);
				$End_Time = strtotime($Appointment->Appointment_End) + ($Time_Between_Appointments * 60);
				$Status_Changes[] = array('Time' => $Start_Time, 'Event' => 'Appointment', 'Event_ID' => $Appointment->Appointment_ID, 'Status' => 'Unavailable');
				$Status_Changes[] = array('Time' => $End_Time, 'Event' => 'Appointment', 'Event_ID' => $Appointment->Appointment_ID, 'Status' => 'Available');
			}

			$Exceptions = $wpdb->get_results($wpdb->prepare("SELECT * FROM $ewd_usap_exceptions_table_name WHERE (Service_Provider_Post_ID=%d OR Location_Post_ID=%d) AND (Exception_Start LIKE %s OR Exception_End LIKE %s OR (Exception_Start < %s and Exception_End > %s))", $Service_Provider->ID, $Selected_Location, $Date . "%", $Date . "%", $Date, $Date));
			foreach ($Exceptions as $Exception) {
				$Start_Time = strtotime($Exception->Exception_Start);
				$End_Time = strtotime($Exception->Exception_End);
				$Status_Changes[] = array('Time' => $Start_Time, 'Event' => 'Exception', 'Event_ID' => $Exception->Exception_ID, 'Status' => 'Unavailable');
				$Status_Changes[] = array('Time' => $End_Time, 'Event' => 'Exception', 'Event_ID' => $Exception->Exception_ID, 'Status' => 'Available');
			}

			foreach ($Status_Changes as $Key => $Status) {
				$Status_Changes[$Key]['Human Time'] = date("Y-m-d H:i:s", $Status['Time']);
			}

			usort($Status_Changes, 'EWD_UASP_Sort_Changes_By_Time');

			$Event = array('title' => $Service_Provider->post_title, 'provider' => $Service_Provider->ID);
			$Current_Event = false;
			$Working = false;
			$Appointment = false;
			$Exception = false;
			foreach ($Status_Changes as $Status) {
				if ($Status['Event'] == "Shift") {
					if ($Status['Status'] == "Available") {$Working = true;}
					if ($Status['Status'] == "Unavailable") {$Working = false;}
				}
				if ($Status['Event'] == "Appointment") {
					if ($Status['Status'] == "Available" and $Status['Event_ID'] == $Appointment) {$Appointment = false;}
					if ($Status['Status'] == "Unavailable") {$Appointment = $Status['Event_ID'];}
				}
				if ($Status['Event'] == "Exception") {
					if ($Status['Status'] == "Available" and $Status['Event_ID'] == $Exception) {$Exception = false;}
					if ($Status['Status'] == "Unavailable") {$Exception = $Status['Event_ID'];}
				}

				if (!$Current_Event and $Working and !$Appointment and !$Exception) {
					$Event['start'] = date("Y-m-d H:i:s", $Status['Time']);
					$Current_Event = true;
				}
				elseif ($Current_Event) {
					$Event['end'] = date("Y-m-d H:i:s", $Status['Time']);
					if ($Event['start'] != $Event['end']) {$Events[] = $Event;}
					$Current_Event = false;
					$Event = array('title' => $Service_Provider->post_title, 'provider' => $Service_Provider->ID);
				}
			}
		}
	}
	
	return json_encode($Events);
}

function EWD_UASP_Get_Admin_Appointments($Location, $Service, $Service_Provider, $Start_Time, $End_Time) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	$Start_Date = date("Y-m-d H:i:s", $Start_Time);
	$End_Date = date("Y-m-d H:i:s", $End_Time);

	$Sql = "SELECT * FROM $ewd_usap_appointments_table_name WHERE Appointment_Start>%s AND Appointment_Start<%s";
	$Sql_Values = array($Start_Date, $End_Date);

	if ($Location != "All") {
		$Sql .= " AND Location_Post_ID=%d";
		$Sql_Values[] = $Location;
	}

	if ($Service != "All") {
		$Sql .= " AND Service_Post_ID=%d";
		$Sql_Values[] = $Service;
	}

	if ($Service_Provider != "All") {
		$Sql .= " AND Service_Provider_Post_ID=%d";
		$Sql_Values[] = $Service_Provider;
	}

	$Appointments = $wpdb->get_results($wpdb->prepare($Sql, $Sql_Values));

	$Events = array();
	foreach ($Appointments as $Appointment) {
		$Event = array(
			'appointment_id' => $Appointment->Appointment_ID,
			'start' => $Appointment->Appointment_Start,
			'end' => $Appointment->Appointment_End,
			'title' => $Appointment->Service_Provider_Name . ' - ' . $Appointment->Service_Name . ' - ' . $Appointment->Location_Name
		);
		$Events[] = $Event;
	}

	return json_encode($Events);
}

function EWD_UASP_Sort_Changes_By_Time($a, $b) {
	return $a['Time'] - $b['Time'];
}

function EWD_UASP_Get_Appointments_Times($Selected_Location, $Selected_Service, $Selected_Service_Provider, $Selected_Date, $Appointment_ID = "") {
	global $wpdb, $ewd_usap_appointments_table_name, $ewd_usap_exceptions_table_name;

	$Time_Between_Appointments = get_option("EWD_UASP_Time_Between_Appointments");
	$Hours_Format = get_option("EWD_UASP_Hours_Format");
	//$Time_Between_Appointments = $Time_Between_Appointments / 60;

	$Booking_Form_Style = get_option("EWD_UASP_Booking_Form_Style");
	
	if ($Selected_Service_Provider != "All") {
		$Service_Provider = get_post($Selected_Service_Provider);
		$Service_Providers = array($Service_Provider);
	}
	else {
		$params = array(
			'posts_per_page' => -1, 
			'post_type' => 'uasp-provider'
		);
		$Service_Providers = get_posts($params);
	}

	if ($Appointment_ID != "") {
		$Selected_Appointment = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Appointment_ID));
		$Selected_Appointment_Date_Time = $wpdb->get_var("SELECT Appointment_Start FROM $ewd_usap_appointments_table_name WHERE Appointment_ID='" . $Selected_Appointment->Appointment_ID . "'");
		$Selected_Appointment_Time = substr($Selected_Appointment_Date_Time, 11, 5);
	}
	if (isset($Selected_Appointment)) {$Selected_Appointment_Start = $Selected_Appointment->Appointment_Start;}
	else {$Selected_Appointment_Start = "";}
	$ReturnString = "<input type='hidden' name='Appointment_Start' id='ewd-uasp-selected-appointment-time' value='" . $Selected_Appointment_Start . "'/>";

	if (!is_array($Service_Providers)) {return "Incorrect service providers error";}

	$No_Appointment_Times = "Yes";
	foreach ($Service_Providers as $Service_Provider) {
		$Service_Duration = get_post_meta($Selected_Service, 'Service Duration', true);
		$Service_Duration_Hours = $Service_Duration / 60;

		$Service_Provider_Services_String = get_post_meta($Service_Provider->ID, 'Service Provider Services', true);
		$Service_Provider_Services = explode(",", $Service_Provider_Services_String);

		if (!in_array($Selected_Service, $Service_Provider_Services)) {continue;}

		$MySQL_Date_Search_String = $Selected_Date . "%";
		$Appointments = $wpdb->get_results($wpdb->prepare("SELECT Appointment_ID FROM $ewd_usap_appointments_table_name WHERE Service_Provider_Post_ID=%d AND Appointment_Start LIKE %s", $Service_Provider->ID, $MySQL_Date_Search_String));
		$Time = strtotime($Selected_Date);
		$Day = date("l", $Time); 
		$Start = get_post_meta($Service_Provider->ID, $Day . " Start", true);
		$Finish = get_post_meta($Service_Provider->ID, $Day . " Finish", true);
		$Location = get_post_meta($Service_Provider->ID, $Day . " Location", true);

		if ($Location != $Selected_Location) {continue;}

		$Start_Time_Number = EWD_UASP_ConvertTimeToNumber($Start);
		$Finish_Time_Number = EWD_UASP_ConvertTimeToNumber($Finish);
		$Time_Counter = $Start_Time_Number * 60;

		$Appointment_Time_Numbers = array();
		while (($Time_Counter /60) <= ($Finish_Time_Number - $Service_Duration_Hours)) {
			$Appointment_Time_Numbers[] = $Time_Counter / 60;
			$Time_Counter = $Time_Counter + $Time_Between_Appointments;
		}

		foreach ($Appointments as $Appointment) {
			if ($Appointment->Appointment_ID == $Selected_Appointment->Appointment_ID) {continue;}
			$Appointment_Start_Date_Time = $wpdb->get_var("SELECT Appointment_Start FROM $ewd_usap_appointments_table_name WHERE Appointment_ID='" . $Appointment->Appointment_ID . "'");
			$Appointment_Start_Time = substr($Appointment_Start_Date_Time, 11, 5);
			$Appointment_End_Date_Time = $wpdb->get_var("SELECT Appointment_End FROM $ewd_usap_appointments_table_name WHERE Appointment_ID='" . $Appointment->Appointment_ID . "'");
			$Appointment_End_Time = substr($Appointment_End_Date_Time, 11, 5);
			$Appointment_Start_Time_Number = EWD_UASP_ConvertTimeToNumber($Appointment_Start_Time);
			$Appointment_End_Time_Number = EWD_UASP_ConvertTimeToNumber($Appointment_End_Time);

			foreach ($Appointment_Time_Numbers as $key => $Appt_Time) {
				if ((($Appt_Time + $Service_Duration_Hours + ($Time_Between_Appointments / 60) - .001) > $Appointment_Start_Time_Number) and ($Appt_Time < $Appointment_End_Time_Number + ($Time_Between_Appointments / 60) - .001)) {
					unset($Appointment_Time_Numbers[$key]);
				}
			}
		}

		$Exceptions = $wpdb->get_results($wpdb->prepare("SELECT * FROM $ewd_usap_exceptions_table_name WHERE (Service_Provider_Post_ID=%d OR Location_Post_ID=%d) AND (Exception_Start LIKE %s OR Exception_End LIKE %s OR (Exception_Start < %s and Exception_End > %s))", $Service_Provider->ID, $Selected_Location, $Selected_Date . "%", $Selected_Date . "%", $Selected_Date, $Selected_Date));
		foreach ($Exceptions as $Exception) {
			$Exception_Start_Time_Date = date('Y-m-d', strtotime($Exception->Exception_Start));
			$Exception_Start_Time = substr($Exception->Exception_Start, 11, 5);
			$Exception_Start_Time_Number = EWD_UASP_ConvertTimeToNumber($Exception_Start_Time);
			$Exception_End_Time_Date = date('Y-m-d', strtotime($Exception->Exception_End));
			$Exception_End_Time = substr($Exception->Exception_End, 11, 5);
			$Exception_End_Time_Number = EWD_UASP_ConvertTimeToNumber($Exception_End_Time);
			foreach ($Appointment_Time_Numbers as $key => $Appt_Time) {
				if (((($Appt_Time + $Service_Duration_Hours) > $Exception_Start_Time_Number) or ($Exception_Start_Time_Date < $Selected_Date)) and (($Appt_Time < $Exception_End_Time_Number)) or ($Exception_End_Time_Date > $Selected_Date)) {
					unset($Appointment_Time_Numbers[$key]);
				}
			}
		}
		
		if (count($Appointment_Time_Numbers) > 0) {
			$Appointments_Found = "Yes";
			if ($Selected_Service_Provider == "All") {$ReturnString.= "<div class='ewd-uasp-das-appointments-provider-label'>" . $Service_Provider->post_title . "</div>";}
			$ReturnString .= "<div class='ewd-uasp-das-available-appointments'>";
			foreach ($Appointment_Time_Numbers as $Appointment_Time_Number) {
				$Selected_Appointment_Class = "";
				$Appointment_Start_Time = EWD_UASP_ConvertNumberToTime($Appointment_Time_Number);
				$Appointment_Start_Display_Time = EWD_UASP_ConvertNumberToTime($Appointment_Time_Number, $Hours_Format);
				if ($Appointment_Start_Time == $Selected_Appointment_Time) {$Selected_Appointment_Class = "ewd-uasp-selected-appointment-time";}
				$ReturnString .= "<div class='ewd-uasp-das-appointment-listing " . $Selected_Appointment_Class . ( $Booking_Form_Style == "Contemporary" ? " ewd-uasp-contemporary" : "" ) . "'>";
				$ReturnString .= "<a class='ewd-uasp-das-appointment-link" . ( $Booking_Form_Style == "Contemporary" ? " ewd-uasp-contemporary" : "" ) . "' onclick='SetAppointmentTime(this, \"". $Appointment_Start_Time . "\", \"" . $Service_Provider->ID . "\");'>";
				$ReturnString .= $Appointment_Start_Display_Time;
				$ReturnString .= "</a>";
				$ReturnString .= "</div>";
			}
			$ReturnString .= "</div>";
			$ReturnString .= "<div class='clear'></div>";
		}
	}

	if (!isset($Appointments_Found) or $Appointments_Found != "Yes") {
		$ReturnString .= __('No Appointments Found', 'ultimate-appointment-scheduling');
	}

	return $ReturnString;
}

//These are oversimplified
function EWD_UASP_Get_Opening_Hour($Open_Hour, $Exceptions) {

	if (sizeof($Exceptions) == 0) {return $Open_Hour;}

	$Midnight = "24:00";
	$Twenty_Three_Fifty_Nine = "23:59";

	$Modified_Open_Hour = $Open_Hour;

	foreach ($Exceptions as $Exception) {
		if ($Exception->Exception_Start > $Open_Hour and $Exception->Exception_Status == "Open") {$Modified_Open_Hour = min($Midnight, $Exception_Start);}
		if ($Exception->Exception_End < $Open_Hour and $Exception->Exception_Status == "Closed") {$Modified_Open_Hour = min($Twenty_Three_Fifty_Nine, $Exception_End);}
	}

	return $Modified_Open_Hour;
}

//These are oversimplified
function EWD_UASP_Get_Closing_Hour($Close_Hour, $Exceptions) {

	if (sizeof($Exceptions) == 0) {return $Close_Hour;}

	$Midnight = "24:00";
	$Twenty_Three_Fifty_Nine = "23:59";

	$Modified_Close_Hour = $Close_Hour;

	foreach ($Exceptions as $Exception) {
		if ($Exception->Exception_Start < $Close_Hour and $Exception->Exception_Status == "Open") {$Modified_Close_Hour = min($Midnight, $Exception_Start);}
		if ($Exception->Exception_End > $Close_Hour and $Exception->Exception_Status == "Closed") {$Modified_Close_Hour = min($Twenty_Three_Fifty_Nine, $Exception_End);}
	}

	return $Modified_Close_Hour;
}

function EWD_UASP_ConvertTimeToNumber($Time, $Format = "24") {
	if ($Format == "24") {
		$Hours = substr($Time, 0, strpos($Time, ":"));
		$Minutes = substr($Time, strpos($Time, ":")+1);
	}
	elseif ($Format == "12") {
		$Hours = 0;
	}

	$NumberTime = $Hours + ($Minutes/60);

	return $NumberTime;
}

function EWD_UASP_ConvertNumberToTime($Time, $Format = "24") {
	if ($Format == "24") {
		$Hours = floor($Time);
		$Minutes = ($Time - $Hours) * 60;
	}
	elseif ($Format == "12") {
		$Hours = floor($Time);
		$Minutes = ($Time - $Hours) * 60;
		if ($Hours > 12) {
			$Hours = $Hours - 12;
		}
	}

	while (strlen($Minutes) < 2) {$Minutes = "0" . $Minutes;}

	if ($Format == "12") {
		if ($Time >= 12) {$Ending .= " p.m.";}
		else {$Ending .= " a.m.";}
	}
	else {$Ending = "";}

	return $Hours . ":" . $Minutes . " " . $Ending;
}

?>