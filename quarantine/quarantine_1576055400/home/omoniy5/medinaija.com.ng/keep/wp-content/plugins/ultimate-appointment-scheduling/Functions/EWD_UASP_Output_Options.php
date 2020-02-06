<?php
/* Creates the admin page, and fills it in based on whether the user is looking at
*  the overview page or an individual item is being edited */
function EWD_UASP_Output_Options() {
	global $wpdb, $EWD_UASP_Full_Version;
	global $ewd_usap_appointments_table_name, $ewd_usap_exceptions_table_name, $ewd_uasp_fields_meta_table_name, $ewd_uasp_fields_table_name;

	$WooCommerce_Integration = get_option("EWD_UASP_WooCommerce_Integration");

	if (isset($_GET['DisplayPage'])) {
		  $Display_Page = $_GET['DisplayPage'];
	}
	else {
		$Display_Page = null;
	}

	if (!isset($_GET['Action'])) {
		$_GET['Action'] = null;
	}

	if (!isset($_GET['OrderBy'])) {
		$_GET['OrderBy'] = null;
	}

	include EWD_UASP_CD_PLUGIN_PATH . 'html/AdminHeader.php';
	if ($_GET['Action'] == "EWD_UASP_AddAppointmentPage") {
			include EWD_UASP_CD_PLUGIN_PATH . 'html/AddAppointmentPage.php';
	}
	elseif ($_GET['Action'] == "EWD_UASP_AppointmentDetails") {
			include EWD_UASP_CD_PLUGIN_PATH . 'html/AppointmentDetailsPage.php';
	}
	elseif ($_GET['Action'] == "EWD_UASP_LocationDetails") {
			include EWD_UASP_CD_PLUGIN_PATH . 'html/LocationDetailsPage.php';
	}
	elseif ($_GET['Action'] == "EWD_UASP_ServiceDetails") {
			include EWD_UASP_CD_PLUGIN_PATH . 'html/ServiceDetailsPage.php';
	}
	elseif ($_GET['Action'] == "EWD_UASP_ServiceProviderDetails") {
			include EWD_UASP_CD_PLUGIN_PATH . 'html/ServiceProviderDetailsPage.php';
	}
	elseif ($_GET['Action'] == "EWD_UASP_ExceptionDetails") {
			include EWD_UASP_CD_PLUGIN_PATH . 'html/ExceptionDetailsPage.php';
	}
	elseif ($_GET['Action'] == "EWD_UASP_CustomFieldDetails") {
			include EWD_UASP_CD_PLUGIN_PATH . 'html/CustomFieldDetails.php';
	}
	else {
		include EWD_UASP_CD_PLUGIN_PATH . 'html/MainScreen.php';
	}
	include EWD_UASP_CD_PLUGIN_PATH . 'html/AdminFooter.php';
}
?>