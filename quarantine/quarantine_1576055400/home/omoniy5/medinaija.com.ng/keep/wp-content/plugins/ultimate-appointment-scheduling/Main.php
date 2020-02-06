<?php
/*
Plugin Name: Ultimate Appointment Scheduling
Plugin URI: http://www.EtoileWebDesign.com/wordpress-plugins/
Description: Appointment booking calendar and scheduling plugin that lets you set up different services, service providers, locations and availability
Author: Etoile Web Design
Author URI: http://www.EtoileWebDesign.com/wordpress-plugins/
Terms and Conditions: http://www.etoilewebdesign.com/plugin-terms-and-conditions/
Text Domain: ultimate-appointment-scheduling
Version: 1.1.1
*/

global $ewd_uasp_message;
global $EWD_UASP_Appointment_ID;
global $EWD_UASP_Full_Version;
global $EWD_UASP_db_version;
global $ewd_usap_appointments_table_name, $ewd_usap_exceptions_table_name, $ewd_uasp_fields_table_name, $ewd_uasp_fields_meta_table_name;
global $wpdb;

$EWD_UASP_db_version = "1.1.0";
//$wpdb->show_errors();

$ewd_usap_appointments_table_name = $wpdb->prefix . "EWD_UASP_Appointments";
$ewd_usap_exceptions_table_name = $wpdb->prefix . "EWD_UASP_Exceptions";
$ewd_uasp_fields_table_name = $wpdb->prefix . "EWD_UASP_Custom_Fields";
$ewd_uasp_fields_meta_table_name = $wpdb->prefix . "EWD_UASP_Custom_Fields_Meta";

define( 'EWD_UASP_CD_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'EWD_UASP_CD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

//define('WP_DEBUG', true);

register_activation_hook(__FILE__,'Install_EWD_UASP');
register_activation_hook(__FILE__,'Initial_EWD_UASP_Data');

/* Hooks neccessary admin tasks */
if ( is_admin() ){
		add_action('widgets_init', 'Update_EWD_UASP_Content');
		add_action('admin_head', 'EWD_UASP_Admin_Styles');
		add_action('admin_init', 'Add_EWD_UASP_Scripts');
		add_action('widgets_init', 'Update_EWD_UASP_Content');
		add_action('widgets_init', 'EWD_UASP_Possible_Email_Reminders');
		add_action('widgets_init', 'EWD_UASP_Check_Appointments');
		add_action('admin_notices', 'EWD_UASP_Error_Notices');
}

function EWD_UASP_Enable_Menu() {
	global $EWD_UASP_Menu_Pages;

	$Access_Role = get_option("EWD_UASP_Access_Role");
	if ($Access_Role == "") {$Access_Role = "administrator";}

	$EWD_UASP_Menu_Pages = add_menu_page('Ultimate Appointment Scheduling', 'Appointments', $Access_Role, 'EWD-UASP-options', 'EWD_UASP_Output_Options', 'dashicons-calendar-alt' , '50.9');
	//add_submenu_page('EWD-UASP-options', 'UASP Appointments', 'Appointments', $Access_Role, 'EWD-UASP-options&DisplayPage=Appointments', 'EWD_UASP_Output_Options');
	add_submenu_page('EWD-UASP-options', 'UASP Locations', 'Locations', $Access_Role, 'EWD-UASP-options&DisplayPage=Locations', 'EWD_UASP_Output_Options');
	add_submenu_page('EWD-UASP-options', 'UASP Services', 'Services', $Access_Role, 'EWD-UASP-options&DisplayPage=Services', 'EWD_UASP_Output_Options');
	add_submenu_page('EWD-UASP-options', 'UASP Service Providers', 'Providers', $Access_Role, 'EWD-UASP-options&DisplayPage=ServiceProviders', 'EWD_UASP_Output_Options');
	add_submenu_page('EWD-UASP-options', 'UASP Exceptions', 'Exceptions', $Access_Role, 'EWD-UASP-options&DisplayPage=Exceptions', 'EWD_UASP_Output_Options');
	add_submenu_page('EWD-UASP-options', 'UASP Settings', 'Settings', $Access_Role, 'EWD-UASP-options&DisplayPage=Settings', 'EWD_UASP_Output_Options');
	add_action("load-$EWD_UASP_Menu_Pages", "EWD_UASP_Screen_Options");
}
add_action('admin_menu' , 'EWD_UASP_Enable_Menu');


////ADD ADMIN SCREEN OPTION FOR # OF APPOINTMENTS////
function EWD_UASP_Screen_Options() {
	global $EWD_UASP_Menu_Pages;
	$screen = get_current_screen();
	
	if(!is_object($screen) || $screen->id != $EWD_UASP_Menu_Pages)
		return;
	$args = array(
		'label' => __('Appointments Per Page', 'ultimate-appointment-scheduling'),
		'default' => 10,
		'option' => 'ewd_uasp_appointments_per_page'
	);
	$screen->add_option( 'per_page', $args );	
}

function EWD_UASP_Set_Screen_Options($status, $option, $value) {
	return $value;
}
add_filter('set-screen-option', 'EWD_UASP_Set_Screen_Options', 10, 3);



/* Add localization support */
function EWD_UASP_localization_setup() {
		load_plugin_textdomain('ultimate-appointment-scheduling', false, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('after_setup_theme', 'EWD_UASP_localization_setup');

// Add settings link on plugin page
function EWD_UASP_plugin_settings_link($links) {
  $settings_link = '<a href="admin.php?page=EWD-UASP-options">Settings</a>';
  array_unshift($links, $settings_link);
  return $links;
}
$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'EWD_UASP_plugin_settings_link' );

/**** start jquery ui datepicker ****/
function EWD_UASP_Jquery_Ui_Enqueue() {
	wp_enqueue_script( 'jquery-ui-core', array( 'jquery' ) );
	wp_enqueue_script( 'jquery-ui-datepicker', array( 'jquery' ) );
	wp_enqueue_style('ewd-uasp-jquery-datepicker-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
}
add_action( 'wp_enqueue_scripts', 'EWD_UASP_Jquery_Ui_Enqueue' );
add_action( 'admin_enqueue_scripts', 'EWD_UASP_Jquery_Ui_Enqueue' );
/**** end jquery ui datepicker ****/

function Add_EWD_UASP_Scripts() {	
	global $EWD_UASP_db_version;

	wp_enqueue_script('ewd-uasp-review-ask', plugins_url("js/ewd-uasp-dashboard-review-ask.js", __FILE__), array('jquery'), $EWD_UASP_db_version);

	if (isset($_GET['page']) && $_GET['page'] == 'EWD-UASP-options') {
		$Time_Between_Appointments = get_option("EWD_UASP_Time_Between_Appointments");
		$Timezone = get_option("EWD_UASP_Timezone");
		$Time = new \DateTime('now', new DateTimeZone($Timezone));
		$Offset = $Time->format('P');
		$Hours_Format = get_option("EWD_UASP_Hours_Format");
		$Calendar_Starting_Layout = get_option("EWD_UASP_Calendar_Starting_Layout");
		$Calendar_Starting_Time = get_option("EWD_UASP_Calendar_Starting_Time") . ":00:00";
		$Calendar_Language = get_option("EWD_Calendar_Language");
		
		$Email_Messages_Array = get_option("EWD_UASP_Email_Messages_Array");
		if (!is_array($Email_Messages_Array)) {$Email_Messages_Array = array();}

		$UWPM_Emails = get_posts(array('post_type' => 'uwpm_mail_template', 'posts_per_page' => -1));

		wp_register_script('EWD-UASP-Admin', plugins_url("ultimate-appointment-scheduling/js/Admin.js"), array('jquery'));

		$Email_Data_Array = array('emails' => $Email_Messages_Array, 'uwpm_emails' => $UWPM_Emails);
   		wp_localize_script('EWD-UASP-Admin', 'ewd_uasp_php_add_data', $Email_Data_Array);

		wp_enqueue_script('EWD-UASP-Admin');
		wp_enqueue_script('ewd-uasp-js', plugins_url("/js/ewd-uasp-js.js", __FILE__), array('jquery'));
        wp_enqueue_script('Moment-JS', plugins_url( '/js/moment.min.js' , __FILE__ ), array( 'jquery' ));
        wp_enqueue_script('Full-Calendar', plugins_url( '/js/fullcalendar.js' , __FILE__ ), array( 'jquery' ));
        wp_enqueue_script('ewd-uasp-admin-calendar', plugins_url("/js/ewd-uasp-admin-calendar.js", __FILE__), array('jquery', 'Full-Calendar'));
        wp_enqueue_script('Spectrum', plugins_url("/js/spectrum.js", __FILE__), array('jquery'));

        $Calendar_Data_Array = array(
               'time_interval' => $Time_Between_Appointments, 
               'timezone' => $Timezone,
               'timezone_offset' => $Offset,
               'hours_format' => $Hours_Format,
               'starting_layout' => $Calendar_Starting_Layout,
               'starting_time' => $Calendar_Starting_Time,
               'calendar_language' => $Calendar_Language
          );
           wp_localize_script('ewd-uasp-admin-calendar', 'ewd_uasp_php_calendar_data', $Calendar_Data_Array);

		wp_enqueue_script('ewd-uasp-js', plugins_url("ultimate-appointment-scheduling/js/ewd-uasp-js.js"), array('jquery'), $EWD_UASP_db_version);
		wp_enqueue_script('Spectrum', plugins_url("ultimate-appointment-scheduling/js/spectrum.js"), array('jquery'));
	}
}

function EWD_UASP_Admin_Styles() {
	global $EWD_UASP_db_version;
	wp_enqueue_style( 'ewd-uasp-admin', plugins_url("ultimate-appointment-scheduling/css/Admin.css"), $EWD_UASP_db_version);
	wp_enqueue_style( 'full-calendar', plugins_url("ultimate-appointment-scheduling/css/fullcalendar.css"));
	wp_enqueue_style( 'spectrum', plugins_url("ultimate-appointment-scheduling/css/spectrum.css"));
	//wp_enqueue_style( 'full-calendar-print', plugins_url("ultimate-appointment-scheduling/css/fullcalendar.print.css"));
}

add_action( 'wp_enqueue_scripts', 'Add_EWD_UASP_FrontEnd_Scripts' );
function Add_EWD_UASP_FrontEnd_Scripts() {
	global $EWD_UASP_db_version;

	$Time_Between_Appointments = get_option("EWD_UASP_Time_Between_Appointments");
	
	$Timezone = get_option("EWD_UASP_Timezone");
	$Time = new \DateTime('now', new DateTimeZone($Timezone));
	$Offset = $Time->format('P');
	$Hours_Format = get_option("EWD_UASP_Hours_Format");

	$Calendar_Starting_Layout = get_option("EWD_UASP_Calendar_Starting_Layout");
	$Calendar_Starting_Time = get_option("EWD_UASP_Calendar_Starting_Time") . ":00:00";

	$Calendar_Offset = get_option("EWD_UASP_Calendar_Offset");
	$Calendar_Offset_Unit = get_option("EWD_UASP_Calendar_Offset_Unit");
	if($Calendar_Offset_Unit == 'offsetWeek'){
		$Calendar_Offset = $Calendar_Offset * 7;
	}
	if($Calendar_Offset_Unit == 'offsetMonth'){
		$Calendar_Offset = $Calendar_Offset * (365 / 12);
	}
	$Default_Date = date('Y-m-d', time() + $Calendar_Offset *24*60*60);

	$Calendar_Language = get_option("EWD_Calendar_Language");

	wp_register_script('EWD-UASP-Calendar', plugins_url("ultimate-appointment-scheduling/js/ewd-uasp-calendar.js"), array('jquery', 'Moment-JS'));

	$Pop_Up_Label_Location = get_option("EWD_Location_Label");
	if ($Pop_Up_Label_Location == "") {$Pop_Up_Label_Location = __("Location", 'ultimate-appointment-scheduling');}
	$Pop_Up_Label_Service = get_option("EWD_Service_Label");
	if ($Pop_Up_Label_Service == "") {$Pop_Up_Label_Service = __("Service", 'ultimate-appointment-scheduling');}
	$Pop_Up_Label_Provider = get_option("EWD_Service_Provider_Label");
	if ($Pop_Up_Label_Provider == "") {$Pop_Up_Label_Provider = __("Service Provider", 'ultimate-appointment-scheduling');}

   	$Calendar_Data_Array = array(
   		'time_interval' => $Time_Between_Appointments, 
   		'timezone' => $Timezone,
   		'hours_format' => $Hours_Format,
   		'timezone_offset' => $Offset,
   		'default_date' => $Default_Date,
   		'starting_layout' => $Calendar_Starting_Layout,
   		'starting_time' => $Calendar_Starting_Time,
   		'calendar_language' => $Calendar_Language,	
   		'pop_up_label_location' => $Pop_Up_Label_Location,	
   		'pop_up_label_service' => $Pop_Up_Label_Service,	
   		'pop_up_label_provider' => $Pop_Up_Label_Provider,	
  	);
   	wp_localize_script('EWD-UASP-Calendar', 'ewd_uasp_php_calendar_data', $Calendar_Data_Array);

	wp_enqueue_script('Moment-JS', plugins_url( '/js/moment.min.js' , __FILE__ ), array( 'jquery' ));
	wp_enqueue_script('jQuery-Custom-UI', plugins_url( '/js/jquery-ui.custom.min.js' , __FILE__ ), array( 'jquery' ));
	wp_enqueue_script('Full-Calendar', plugins_url( '/js/fullcalendar.js' , __FILE__ ), array( 'jquery' ));
	if($Calendar_Language != "en") {wp_enqueue_script('EWD-UASP-Calendar-Locales', plugins_url( '/js/ewd-fc-locales/' . $Calendar_Language . '.js', __FILE__ ), array( 'jquery', 'Full-Calendar' ));}
	wp_enqueue_script('ewd-uasp-js', plugins_url( '/js/ewd-uasp-js.js' , __FILE__ ), array( 'jquery' ), $EWD_UASP_db_version);
	wp_enqueue_script('EWD-UASP-Calendar', $EWD_UASP_db_version);
}


add_action( 'wp_enqueue_scripts', 'EWD_UASP_Add_Stylesheet' );
function EWD_UASP_Add_Stylesheet() {
	global $EWD_UASP_db_version;
    wp_enqueue_style( 'ewd-uasp-style', plugins_url('css/ewd-uasp-styles.css', __FILE__), $EWD_UASP_db_version );
    wp_enqueue_style( 'full-calendar', plugins_url("ultimate-appointment-scheduling/css/fullcalendar.css"));
}


add_action('activated_plugin','save_uasp_error');
function save_uasp_error(){
		update_option('plugin_error',  ob_get_contents());
		file_put_contents("Error.txt", ob_get_contents());
}

function EWD_UASP_Start_Session() {
	if (!session_id()) {session_start();}
}
add_action('init', 'EWD_UASP_Start_Session', 1);

function EWD_UASP_Delete_Unpaid_Appointments() {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	$Allow_Paypal_Prepayment = get_option("EWD_UASP_Allow_Paypal_Prepayment");
	$Possible_Delete_Appointments = get_option("EWD_UASP_Possible_Delete_Appointments");

	if ($Allow_Paypal_Prepayment != "Required" or !is_array($Possible_Delete_Appointments)) {return;}

	foreach ($Possible_Delete_Appointments as $Appointment_ID => $Delete_Time) {
		if (time() > $Delete_Time) {
			$Appointment = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Appointment_ID));

			if ($Appointment->Appointment_Prepaid != "Yes" and $Appointment->WC_Order_Paid != "Yes") {
				$wpdb->query($wpdb->prepare("DELETE FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $Appointment_ID));
			}

			unset($Possible_Delete_Appointments[$Appointment_ID]);
		}
	}
	update_option("EWD_UASP_Possible_Delete_Appointments", $Possible_Delete_Appointments);
}
add_action('init', 'EWD_UASP_Delete_Unpaid_Appointments');

$EWD_UASP_Full_Version = get_option("EWD_UASP_Full_Version");

if (isset($_POST['EWD_UASP_Upgrade_To_Full'])) {
	  add_action('admin_init', 'EWD_UASP_Upgrade_To_Full');
}

include "blocks/ewd-uasp-blocks.php";
include "Functions/EWD_UASP_Add_Captcha.php";
include "Functions/EWD_UASP_Add_Views_Column.php";
include "Functions/EWD_UASP_Check_Appointments.php";
include "Functions/EWD_UASP_Deactivation_Survey.php";
include "Functions/EWD_UASP_Error_Notices.php";
include "Functions/EWD_UASP_Export_To_Excel.php";
include "Functions/EWD_UASP_Facebook_Config.php";
include "Functions/EWD_UASP_Get_Events.php";
include "Functions/EWD_UASP_Import.php";
include "Functions/EWD_UASP_IPN.php";
include "Functions/EWD_UASP_Output_Buffering.php";
include "Functions/EWD_UASP_Output_Options.php";
include "Functions/EWD_UASP_Process_Ajax.php";
include "Functions/EWD_UASP_Reminders.php";
include "Functions/EWD_UASP_Return_Select_Options.php";
include "Functions/EWD_UASP_Twitter_Login.php";
include "Functions/EWD_UASP_UWPM_Email_Integration.php";
include "Functions/EWD_UASP_WooCommerce_Sync.php";
include "Functions/FrontEndAjaxUrl.php";
include "Functions/Full_Upgrade.php";
include "Functions/Initial_EWD_UASP_Data.php";
include "Functions/Install_EWD_UASP.php";
include "Functions/Prepare_EWD_UASP_Data_For_Insertion.php";
include "Functions/Register_EWD_UASP_Posts_Taxonomies.php";
include "Functions/Update_EWD_UASP_Admin_Databases.php";
include "Functions/Update_EWD_UASP_Content.php";
include "Functions/Update_EWD_UASP_Tables.php";
include "Functions/EWD_UASP_Styling.php";

include "Shortcodes/EWD_UASP_Display_Calendar.php";
include "Shortcodes/EWD_UASP_Dropdown_Appointment_Selector.php";
include "Shortcodes/EWD_UASP_Appointment_Confirmation.php";
include "Shortcodes/EWD_UASP_Edit_Appointment.php";

// Updates the UASP database when required
if (get_option('EWD_UASP_DB_Version') != $EWD_UASP_db_version) {
	Update_EWD_UASP_Tables();
}
