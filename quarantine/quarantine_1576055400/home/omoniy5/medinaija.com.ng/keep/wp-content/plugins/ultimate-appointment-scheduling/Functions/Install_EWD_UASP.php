<?php
function Install_EWD_UASP() {
	/* Add in the required globals to be able to create the tables */
  	global $wpdb;
   	global $EWD_UASP_db_version;
	global $ewd_usap_appointments_table_name, $ewd_usap_exceptions_table_name, $ewd_usap_working_hours_table_name, $ewd_uasp_fields_table_name, $ewd_uasp_fields_meta_table_name;
    
	/* Create the appointments table */  
   	$sql = "CREATE TABLE $ewd_usap_appointments_table_name (
  		Appointment_ID mediumint(9) NOT NULL AUTO_INCREMENT,
  		Location_Name text  NULL,
  		Location_Post_ID mediumint(9) DEFAULT 0 NOT NULL,
		Service_Name text   NULL,
		Service_Post_ID mediumint(9) DEFAULT 0 NOT NULL,
		Service_Provider_Name text NULL,
		Service_Provider_Post_ID mediumint(9) DEFAULT 0 NOT NULL,
		Appointment_Prepaid text NULL,
		Appointment_PayPal_Receipt_Number text NULL,
		Appointment_Start datetime DEFAULT '0000-00-00 00:00:00' NULL,
		Appointment_End datetime DEFAULT '0000-00-00 00:00:00' NULL,
		Appointment_Client_Name text NULL,
		Appointment_Client_Phone text NULL,
		Appointment_Client_Email text NULL,
		Appointment_Reminder_Email_Sent text NULL,
		Appointment_Confirmation_Received text NULL,
  		UNIQUE KEY id (Appointment_ID)
    	)
		DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
   	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   	dbDelta($sql);
		
	/* Create the exceptions table */
	$sql = "CREATE TABLE $ewd_usap_exceptions_table_name (
  	Exception_ID mediumint(9) NOT NULL AUTO_INCREMENT,
  	Location_Name text NULL,
		Location_Post_ID mediumint(9) DEFAULT 0 NOT NULL,
  	Service_Provider_Name text NULL,
		Service_Provider_Post_ID mediumint(9) DEFAULT 0 NOT NULL,
		Exception_Start datetime DEFAULT '0000-00-00 00:00:00' NULL,
		Exception_End datetime DEFAULT '0000-00-00 00:00:00' NULL,
		Exception_Status text NULL,
		Exception_Reason text NULL,
  		UNIQUE KEY id (Exception_ID)
    	)	
		DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
   	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   	dbDelta($sql);

      /* Update the custom fields table */
  $sql = "CREATE TABLE $ewd_uasp_fields_table_name (
    Field_ID mediumint(9) NOT NULL AUTO_INCREMENT,
    Field_Name text DEFAULT '' NOT NULL,
    Field_Slug text DEFAULT '' NOT NULL,
    Field_Type text DEFAULT '' NOT NULL,
    Field_Description text DEFAULT '' NOT NULL,
    Field_Values text DEFAULT '' NOT NULL,
    Field_Display text DEFAULT '' NOT NULL,
    Field_Order mediumint(9) DEFAULT '9999',
    Field_Date_Created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL
    UNIQUE KEY id (Field_ID)
    )
    DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    
  /* Update the custom fields meta table */
  $sql = "CREATE TABLE $ewd_uasp_fields_meta_table_name (
    Meta_ID mediumint(9) NOT NULL AUTO_INCREMENT,
    Field_ID mediumint(9) DEFAULT '0',
    Appointment_ID mediumint(9) DEFAULT '0',
    Meta_Value text DEFAULT '' NOT NULL,
    UNIQUE KEY id (Meta_ID)
    )
    DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
		
	update_option("EWD_UASP_DB_version", $EWD_UASP_db_version);
 
   	if (get_option("EWD_UASP_Full_Version") == "") {update_option("EWD_UASP_Full_Version", "No");}
   	if (get_option("EWD_UASP_Time_Between_Appointments") == "") {update_option("EWD_UASP_Time_Between_Appointments", 15);}
   	if (get_option("EWD_UASP_Required_Information") == "") {update_option("EWD_UASP_Required_Information", array("Name","Phone","Email"));}
   	if (get_option("EWD_UASP_Client_Email_Details") == "") {update_option("EWD_UASP_Client_Email_Details", "Yes");}
    if (get_option("EWD_UASP_Minimum_Days_Advance") == "") {update_option("EWD_UASP_Minimum_Days_Advance", 0);}
    if (get_option("EWD_UASP_Maximum_Days_Advance") == "") {update_option("EWD_UASP_Maximum_Days_Advance", 365);}
    if (get_option("EWD_UASP_Multi_Step_Booking") == "") {update_option("EWD_UASP_Multi_Step_Booking", "Yes");}
   	
   	if (get_option("EWD_UASP_Admin_Email_Notification") == "") {update_option("EWD_UASP_Admin_Email_Notification", "No");}
   	if (get_option("EWD_UASP_Provider_Email_Notification") == "") {update_option("EWD_UASP_Provider_Email_Notification", "No");}
    if (get_option("EWD_UASP_Add_Captcha") == "") {update_option("EWD_UASP_Add_Captcha", "No");}
   	if (get_option("EWD_UASP_Require_Login") == "") {update_option("EWD_UASP_Require_Login", "No");}
   	if (get_option("EWD_UASP_Login_Options") == "") {update_option("EWD_UASP_Login_Options", array());}

   	if (get_option("EWD_UASP_WooCommerce_Integration") == "") {update_option("EWD_UASP_WooCommerce_Integration", "No");}
    if (get_option("EWD_UASP_Allow_Paypal_Prepayment") == "") {update_option("EWD_UASP_Allow_Paypal_Prepayment", "No");}
    if (get_option("EWD_UASP_Pricing_Currency_Code") == "") {update_option("EWD_UASP_Pricing_Currency_Code", "USD");}
    
   	if (get_option("EWD_UASP_Appointment_Confirmation") == "") {update_option("EWD_UASP_Appointment_Confirmation", "No");}
   	if (get_option("EWD_UASP_Reminders_Cache_Time") == "") {update_option("EWD_UASP_Reminders_Cache_Time", 600);}
   	if (get_option("EWD_UASP_Last_Reminder_Call") == "") {update_option("EWD_UASP_Last_Reminder_Call", time());}
   	if (get_option("EWD_UASP_Third_Party_Reminders") == "") {update_option("EWD_UASP_Third_Party_Reminders", "No");}
   	if (get_option("EWD_UASP_Unique_Site_ID") == "") {update_option("EWD_UASP_Third_Party_Reminders", EWD_UASP_Create_Unique_ID());}
}
?>
