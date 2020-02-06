<?php
/* This file is the action handler. The appropriate function is then called based 
*  on the action that's been selected by the user. The functions themselves are all
* stored either in Prepare_Data_For_Insertion.php or Update_Admin_Databases.php */
		
function Update_EWD_UASP_Content() {
	global $ewd_uasp_message;
	
	if (isset($_GET['Action'])) {
		switch ($_GET['Action']) {
			case "EWD_UASP_AddAppointment":
			case "EWD_UASP_EditAppointment":
       			$ewd_uasp_message = EWD_UASP_Add_Edit_Appointment();
				break;
			case "EWD_UASP_DeleteAppointment":
				$ewd_uasp_message = Delete_EWD_UASP_Appointment($_GET['Appointment_ID']);
				break;
			case "EWD_UASP_MassDeleteAppointments":
       			$ewd_uasp_message = EWD_UASP_Mass_Delete_Appointments();
				break;
			case "EWD_UASP_AddLocation":
			case "EWD_UASP_EditLocation":
       			$ewd_uasp_message = EWD_UASP_Add_Edit_Location();
				break;
			case "EWD_UASP_DeleteLocation":
       			$ewd_uasp_message = Delete_EWD_UASP_Location($_GET['Location_ID']);
				break;
			case "EWD_UASP_MassDeleteLocations":
       			$ewd_uasp_message = EWD_UASP_Mass_Delete_Locations();
				break;
			case "EWD_UASP_AddService":
			case "EWD_UASP_EditService":
       			$ewd_uasp_message = EWD_UASP_Add_Edit_Service();
				break;
			case "EWD_UASP_DeleteService":
       			$ewd_uasp_message = Delete_EWD_UASP_Service($_GET['Service_ID']);
				break;
			case "EWD_UASP_MassDeleteServices":
       			$ewd_uasp_message = EWD_UASP_Mass_Delete_Services();
				break;
			case "EWD_UASP_AddServiceProvider":
			case "EWD_UASP_EditServiceProvider":
       			$ewd_uasp_message = EWD_UASP_Add_Edit_Service_Provider();
				break;
			case "EWD_UASP_DeleteServiceProvider":
       			$ewd_uasp_message = Delete_EWD_UASP_Service_Provider($_GET['Service_Provider_ID']);
				break;
			case "EWD_UASP_MassDeleteServiceProviders":
       			$ewd_uasp_message = EWD_UASP_Mass_Delete_Service_Providers();
				break;
			case "EWD_UASP_AddException":
			case "EWD_UASP_EditException":
       			$ewd_uasp_message = EWD_UASP_Add_Edit_Exception();
				break;
			case "EWD_UASP_DeleteException":
       			$ewd_uasp_message = Delete_EWD_UASP_Exception($_GET['Exception_ID']);
				break;
			case "EWD_UASP_MassDeleteExceptions":
       			$ewd_uasp_message = EWD_UASP_Mass_Delete_Exceptions();
				break;
			case "EWD_UASP_AddCustomField":
			case "EWD_UASP_EditCustomField":
       			$ewd_uasp_message = EWD_UASP_Add_Edit_Custom_Field();
				break;
			case "EWD_UASP_DeleteCustomField":
       			$ewd_uasp_message = Delete_EWD_UASP_Custom_Field($_GET['Field_ID']);
				break;
			case "EWD_UASP_MassDeleteCustomFields":
       			$ewd_uasp_message = EWD_UASP_Mass_Delete_Custom_Fields();
				break;
			case "EWD_UASP_AddAppointmentSpreadsheet":
				$ewd_uasp_message = EWD_UASP_Speadsheet_Import();
				break;
			case "EWD_UASP_ExportToExcel":
				$ewd_uasp_message = EWD_UASP_Export_To_Excel();
				break;
			case "EWD_UASP_UpdateOptions":
       			$ewd_uasp_message = EWD_UASP_UpdateOptions();
				break;
			default:
				$ewd_uasp_message = __("The form has not worked correctly. Please contact the plugin developer.", 'EWD_UFAQP');
				break;
		}
	}
}

?>