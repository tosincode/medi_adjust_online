<?php

function EWD_UASP_Add_Captcha($Appointment_Selection = '') {
	$Code = rand(1000,9999);
	$ModifiedCode = EWD_UASP_Encrypt_Captcha_Code($Code);

	$Image_Number_Label = get_option("EWD_UASP_Image_Number_Label");
	if ($Image_Number_Label == "") {$Image_Number_Label = __("Image Number", 'ultimate-appointment-scheduling');}

	$ReturnString .= "<div class='uasp-pure-control-group ewd-uasp-captcha-group " . ($Appointment_Selection == 'Multistep' ? 'ewd-uasp-hidden' : '') . "'><label for='captcha_image'></label>";
	$ReturnString .= "<img src=" . EWD_UASP_CD_PLUGIN_URL . "/Functions/EWD_UASP_Create_Captcha_Image.php?Code=" . $ModifiedCode . " />";
	$ReturnString .= "<input type='hidden' name='ewd_uasp_modified_captcha' value='" . $ModifiedCode . "' />";
	$ReturnString .= "</div>";
	$ReturnString .= "<div class='ewd-uasp-clear'></div>";
	$ReturnString .= "<div class='uasp-pure-control-group ewd-uasp-captcha-group " . ($Appointment_Selection == 'Multistep' ? 'ewd-uasp-hidden' : '') . "'><label for='captcha_text'>" . $Image_Number_Label . "</label>";
	$ReturnString .= "<input type='text' name='ewd_uasp_captcha' value='' />";
	$ReturnString .= "</div>";
	$ReturnString .= "<div class='ewd-uasp-clear'></div>";
	
	return $ReturnString;
}

function EWD_UASP_Validate_Captcha() {
	$ModifiedCode = $_POST['ewd_uasp_modified_captcha'];
	$UserCode = $_POST['ewd_uasp_captcha'];

	$Code = EWD_UASP_Decrypt_Catpcha_Code($ModifiedCode);

	if ($Code == $UserCode) {$Validate_Captcha = "Yes";}
	else {$Validate_Captcha = "No";}

	return $Validate_Captcha;
}

function EWD_UASP_Encrypt_Captcha_Code($Code) {
	$ModifiedCode = ($Code + 6) * 4;

	return $ModifiedCode;
}

function EWD_UASP_Decrypt_Catpcha_Code($ModifiedCode) {
	$Code = ($ModifiedCode / 4) - 6;

	return $Code;
}
?>
