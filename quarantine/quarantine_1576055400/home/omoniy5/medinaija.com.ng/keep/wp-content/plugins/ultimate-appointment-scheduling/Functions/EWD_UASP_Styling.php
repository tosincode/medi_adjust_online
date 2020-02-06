<?php 
function EWD_UASP_Add_Modified_Styles() {
	$StylesString = "<style>";
	$StylesString .=".ewd-uasp-das-registrationform-label { ";
		if (get_option("EWD_UASP_Signup_Title_Font") != "") {$StylesString .= "font-family:" .  get_option("EWD_UASP_Signup_Title_Font") . " !important;";} 
		if (get_option("EWD_UASP_Signup_Title_Font_Size") != "") {$StylesString .= "font-size:" .  EWD_UASP_Check_Font_Size(get_option("EWD_UASP_Signup_Title_Font_Size")) . " !important;";} 
		if (get_option("EWD_UASP_Signup_Title_Font_Color") != "") {$StylesString .="color:" . get_option("EWD_UASP_Signup_Title_Font_Color") . " !important;";} 
		if (get_option("EWD_UASP_Signup_Block_Color") != "") {$StylesString .= "background-color:" . get_option("EWD_UASP_Signup_Block_Color") . " !important;";} 
		$StylesString .="}\n";
	$StylesString .=".ewd-uasp-das-registrationform { ";
		if (get_option("EWD_UASP_Signup_Block_Color") != "") {$StylesString .= "border-color:" . get_option("EWD_UASP_Signup_Block_Color") . " !important;";} 
		if (get_option("EWD_UASP_Signup_Block_Margin") != "") {$StylesString .= "margin:" . get_option("EWD_UASP_Signup_Block_Margin") . " !important;";} 
		if (get_option("EWD_UASP_Signup_Block_Padding") != "") {$StylesString .= "padding:" . get_option("EWD_UASP_Signup_Block_Padding") . " !important;";} 
		$StylesString .="}\n";
	$StylesString .=".ewd-uasp-das-registrationform-content { ";
		if (get_option("EWD_UASP_Signup_Label_Font") != "") {$StylesString .= "font-family:" . get_option("EWD_UASP_Signup_Label_Font") . " !important;";} 
		if (get_option("EWD_UASP_Signup_Label_Font_Size") != "") {$StylesString .="font-size:" . EWD_UASP_Check_Font_Size(get_option("EWD_UASP_Signup_Label_Font_Size")) . " !important;";} 
		$StylesString .="}\n";	
	$StylesString .=".ewd-uasp-das-service-label { ";
	if (get_option("EWD_UASP_Service_Title_Font") != "") {$StylesString .= "font-family:" .  get_option("EWD_UASP_Service_Title_Font") . " !important;";} 
		if (get_option("EWD_UASP_Service_Title_Font_Size") != "") {$StylesString .= "font-size:" .  EWD_UASP_Check_Font_Size(get_option("EWD_UASP_Service_Title_Font_Size")) . " !important;";} 
		if (get_option("EWD_UASP_Service_Title_Font_Color") != "") {$StylesString .="color:" . get_option("EWD_UASP_Service_Title_Font_Color") . " !important;";} 
		if (get_option("EWD_UASP_Service_Block_Color") != "") {$StylesString .= "background-color:" . get_option("EWD_UASP_Service_Block_Color") . " !important;";} 
		$StylesString .="}\n";
			$StylesString .=".ewd-uasp-das-service { ";
		if (get_option("EWD_UASP_Service_Block_Color") != "") {$StylesString .= "border-color:" . get_option("EWD_UASP_Service_Block_Color") . " !important;";} 
		if (get_option("EWD_UASP_Service_Block_Margin") != "") {$StylesString .= "margin:" . get_option("EWD_UASP_Service_Block_Margin") . " !important;";} 
		if (get_option("EWD_UASP_Service_Block_Padding") != "") {$StylesString .= "padding:" . get_option("EWD_UASP_Service_Block_Padding") . " !important;";} 
		$StylesString .="}\n";
	$StylesString .=".ewd-uasp-das-service-content { ";
		if (get_option("EWD_UASP_Service_Label_Font") != "") {$StylesString .= "font-family:" . get_option("EWD_UASP_Service_Label_Font") . " !important;";} 
		if (get_option("EWD_UASP_Service_Label_Font_Size") != "") {$StylesString .="font-size:" . EWD_UASP_Check_Font_Size(get_option("EWD_UASP_Service_Label_Font_Size")) . " !important;";} 
		$StylesString .="}\n";
	$StylesString .=".ewd-uasp-das-findappointment-label { ";
		if (get_option("EWD_UASP_Appointment_Title_Font") != "") {$StylesString .= "font-family:" .  get_option("EWD_UASP_Appointment_Title_Font") . " !important;";} 
		if (get_option("EWD_UASP_Appointment_Title_Font_Size") != "") {$StylesString .= "font-size:" .  EWD_UASP_Check_Font_Size(get_option("EWD_UASP_Appointment_Title_Font_Size")) . " !important;";} 
		if (get_option("EWD_UASP_Appointment_Title_Font_Color") != "") {$StylesString .="color:" . get_option("EWD_UASP_Appointment_Title_Font_Color") . " !important;";} 
		if (get_option("EWD_UASP_Appointment_Block_Color") != "") {$StylesString .= "background-color:" . get_option("EWD_UASP_Appointment_Block_Color") . " !important;";} 
		$StylesString .="}\n";
			$StylesString .=".ewd-uasp-das-findappointment { ";
		if (get_option("EWD_UASP_Appointment_Block_Color") != "") {$StylesString .= "border-color:" . get_option("EWD_UASP_Appointment_Block_Color") . " !important;";} 
		if (get_option("EWD_UASP_Appointment_Block_Margin") != "") {$StylesString .= "margin:" . get_option("EWD_UASP_Appointment_Block_Margin") . " !important;";} 
		if (get_option("EWD_UASP_Appointment_Block_Padding") != "") {$StylesString .= "padding:" . get_option("EWD_UASP_Appointment_Block_Padding") . " !important;";} 
		$StylesString .="}\n";
	$StylesString .=".ewd-uasp-das-findappointment-content { ";
		if (get_option("EWD_UASP_Appointment_Label_Font") != "") {$StylesString .= "font-family:" . get_option("EWD_UASP_Appointment_Label_Font") . " !important;";} 
		if (get_option("EWD_UASP_Appointment_Label_Font_Size") != "") {$StylesString .="font-size:" . EWD_UASP_Check_Font_Size(get_option("EWD_UASP_Appointment_Label_Font_Size")) . " !important;";} 
		$StylesString .="}\n";
	$StylesString .=".ewd-uasp-das-book-button-container input[type='submit'], .ewd-uasp-das-findappointment button { ";
		if (get_option("EWD_UASP_Button_Font") != "") {$StylesString .= "font-family:" .  get_option("EWD_UASP_Button_Font") . " !important;";} 
		if (get_option("EWD_UASP_Button_Font_Size") != "") {$StylesString .= "font-size:" .  EWD_UASP_Check_Font_Size(get_option("EWD_UASP_Button_Font_Size")) . " !important;";} 
		if (get_option("EWD_UASP_Button_Font_Color") != "") {$StylesString .="color:" . get_option("EWD_UASP_Button_Font_Color") . " !important;";} 
		if (get_option("EWD_UASP_Button_Color") != "") {$StylesString .= "background-color:" . get_option("EWD_UASP_Button_Color") . " !important;";} 
		if (get_option("EWD_UASP_Button_Block_Margin") != "") {$StylesString .= "margin:" . get_option("EWD_UASP_Button_Block_Margin") . " !important;";} 
		if (get_option("EWD_UASP_Button_Block_Padding") != "") {$StylesString .= "padding:" . get_option("EWD_UASP_Button_Block_Padding") . " !important;";} 
		$StylesString .="}\n";
	$StylesString .=".fc-title, .fc-time { ";
		if (get_option("EWD_UASP_Calendar_Appointment_Font_Family") != "") {$StylesString .= "font-family:" .  get_option("EWD_UASP_Calendar_Appointment_Font_Family") . " !important;";}
		if (get_option("EWD_UASP_Calendar_Appointment_Font_Size") != "") {$StylesString .= "font-size:" .  EWD_UASP_Check_Font_Size(get_option("EWD_UASP_Calendar_Appointment_Font_Size")) . " !important;";}
		if (get_option("EWD_UASP_Calendar_Appointment_Color") != "") {$StylesString .= "color:" .  get_option("EWD_UASP_Calendar_Appointment_Color") . " !important;";}
		$StylesString .= "}\n";
	$StylesString .=".fc-event { ";
		if (get_option("EWD_UASP_Calendar_Appointment_Background_Color") != "") {$StylesString .= "background:" .  get_option("EWD_UASP_Calendar_Appointment_Background_Color") . " !important;";}
		if (get_option("EWD_UASP_Calendar_Appointment_Border_Color") != "") {$StylesString .= "border-color:" .  get_option("EWD_UASP_Calendar_Appointment_Border_Color") . " !important;";}
		$StylesString .= "}\n";
	$StylesString .=".ewd-uasp-selected-event{ ";
		if (get_option("EWD_UASP_Calendar_Selected_Appointment_Background_Color") != "") {$StylesString .= "background:" .  get_option("EWD_UASP_Calendar_Selected_Appointment_Background_Color") . " !important;";}
		if (get_option("EWD_UASP_Calendar_Selected_Appointment_Border_Color") != "") {$StylesString .= "border-color:" .  get_option("EWD_UASP_Calendar_Selected_Appointment_Border_Color") . " !important;";}
		$StylesString .= "}\n";
	$StylesString .= "</style>";

	return $StylesString;
}

function EWD_UASP_Check_Font_Size($Font_Size) {
	if (is_numeric($Font_Size)) {$Font_Size .= 'px';}

	return $Font_Size;
}