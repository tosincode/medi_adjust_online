<?php

function EWD_UASP_Check_Appointments() {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	$Appointments_To_Check = get_option("EWD_UASP_Appointments_To_Check");
	$Current_Time = time();

	if (is_array($Appointments_To_Check)) {
		foreach ($Appointments_To_Check  as $Appointment_ID => $Expiry_Date) {
			$Appointment = $wpdb->get_results($wpdb->prepare("SELECT Appointment_Prepaid FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Appointment_ID));
			$Expiry_Time = strtotime($Expiry_Date);

			if ($Appointment->Appointment_Prepaid == "Yes") {
				unset($Appointments_To_Check[$Appointment_ID]);
			}
			elseif ($Expiry_Time < $Current_Time) {
				$wpdb->delete($ewd_usap_appointments_table_name, array('Appointment_ID' => $Appointment_ID));
				unset($Appointments_To_Check[$Appointment_ID]);
			}
		}
	}

	update_option("EWD_UASP_Appointments_To_Check", $Appointments_To_Check);
}

?>