<?php 
	$Custom_CSS = get_option("EWD_UASP_Custom_CSS");
	$Multi_Step_Booking = get_option("EWD_UASP_Multi_Step_Booking");
	$Time_Between_Appointments = get_option("EWD_UASP_Time_Between_Appointments");
	$Required_Information = get_option("EWD_UASP_Required_Information");
	if (!is_array($Required_Information)) {$Required_Information = array();}
	$Timezone = get_option("EWD_UASP_Timezone");
	$Localize_Date_Time = get_option("EWD_UASP_Localize_Date_Time");
	$Hours_Format = get_option("EWD_UASP_Hours_Format");
	$PHP_Date_Format = get_option("EWD_UASP_PHP_Date_Format");
	$Client_Email_Details = get_option("EWD_UASP_Client_Email_Details");
	$Minimum_Days_Advance = get_option("EWD_UASP_Minimum_Days_Advance");
	$Maximum_Days_Advance = get_option("EWD_UASP_Maximum_Days_Advance");
	$Calendar_Starting_Layout = get_option("EWD_UASP_Calendar_Starting_Layout");
	$Calendar_Starting_Time = get_option("EWD_UASP_Calendar_Starting_Time");
	$Calendar_Offset = get_option("EWD_UASP_Calendar_Offset");
	$Calendar_Offset_Unit = get_option("EWD_UASP_Calendar_Offset_Unit");

	$Booking_Form_Style = get_option("EWD_UASP_Booking_Form_Style");
	$Admin_Email_Notification = get_option("EWD_UASP_Admin_Email_Notification");
	$Admin_Email_Address = get_option("EWD_UASP_Admin_Email_Address");
	$Provider_Email_Notification = get_option("EWD_UASP_Provider_Email_Notification");
	$Add_Captcha = get_option("EWD_UASP_Add_Captcha");
	$Calendar_Language = get_option("EWD_Calendar_Language");
	$Access_Role = get_option("EWD_UASP_Access_Role");
	$Require_Login = get_option("EWD_UASP_Require_Login");
	$Login_Options = get_option("EWD_UASP_Login_Options");
	if (!is_array($Login_Options)) {$Login_Options = array();}
	
	$WordPress_Login_URL = get_option("EWD_UASP_WordPress_Login_URL");
	$FEUP_Login_URL = get_option("EWD_UASP_FEUP_Login_URL");
	$Facebook_App_ID = get_option("EWD_UASP_Facebook_App_ID");
	$Facebook_Secret = get_option("EWD_UASP_Facebook_Secret");
	$Twitter_Key = get_option("EWD_UASP_Twitter_Key");
	$Twitter_Secret = get_option("EWD_UASP_Twitter_Secret");

	$Email_Reminders = get_option("EWD_UASP_Email_Reminders");
	$Appointment_Confirmation = get_option("EWD_UASP_Appointment_Confirmation");
	$Appointment_Confirmation_Page = get_option("EWD_UASP_Appointment_Confirmation_Page");
	$Reminders_Cache_Time = get_option("EWD_UASP_Reminders_Cache_Time")/60;
	$Third_Party_Reminders = get_option("EWD_UASP_Third_Party_Reminders");
	$Email_Messages_Array = get_option("EWD_UASP_Email_Messages_Array");
	if (!is_array($Email_Messages_Array)) {$Email_Messages_Array = array();}

	$WooCommerce_Integration = get_option("EWD_UASP_WooCommerce_Integration");
	$Allow_Paypal_Prepayment = get_option("EWD_UASP_Allow_Paypal_Prepayment");
	$Pricing_Currency_Code = get_option("EWD_UASP_Pricing_Currency_Code");
	$PayPal_Email_Address = get_option("EWD_UASP_PayPal_Email_Address");
	$Thank_You_URL = get_option("EWD_UASP_Thank_You_URL");

	$Sign_Up_Title_Label = get_option("EWD_Sign_Up_Title_Label");
	$Name_Label = get_option("EWD_Name_Label");
	$Phone_Label = get_option("EWD_Phone_Label");
	$Email_Label = get_option("EWD_Email_Label");
	$Service_Title_Label = get_option("EWD_Service_Title_Label");
	$Location_Label = get_option("EWD_Location_Label");
	$Service_Label = get_option("EWD_Service_Label");
	$Service_Provider_Label = get_option("EWD_Service_Provider_Label");
	$Service_Provider_Any_Label = get_option("EWD_UASP_Service_Provider_Any_Label");
	$Appointment_Title_Label = get_option("EWD_Appointment_Title_Label");
	$Appointment_Date_Label = get_option("EWD_Appointment_Date_Label");
	$Find_Appointments_Label = get_option("EWD_Find_Appointments_Label");
	$Book_Appointment_Label = get_option("EWD_Book_Appointment_Label");
	$Pay_In_Advance_Label = get_option("EWD_Pay_In_Advance_Label");
	$Proceed_To_Payment_Label = get_option("EWD_Proceed_To_Payment_Label");
	$Select_Time_Label = get_option("EWD_Select_Time_Label");
	$Click_Select_Date_Label = get_option("EWD_UASP_Click_Select_Date_Label");
	$Image_Number_Label = get_option("EWD_UASP_Image_Number_Label");

	$UASP_Signup_Title_Font = get_option("EWD_UASP_Signup_Title_Font");
	$UASP_Signup_Title_Font_Size = get_option("EWD_UASP_Signup_Title_Font_Size");
	$UASP_Signup_Title_Font_Color = get_option("EWD_UASP_Signup_Title_Font_Color");
	$UASP_Signup_Label_Font = get_option("EWD_UASP_Signup_Label_Font");
	$UASP_Signup_Label_Font_Size = get_option("EWD_UASP_Signup_Label_Font_Size");
	$UASP_Signup_Block_Color = get_option("EWD_UASP_Signup_Block_Color");
	$UASP_Signup_Block_Margin = get_option("EWD_UASP_Signup_Block_Margin");
	$UASP_Signup_Block_Padding = get_option("EWD_UASP_Signup_Block_Padding");
	
	$UASP_Service_Title_Font = get_option("EWD_UASP_Service_Title_Font");
	$UASP_Service_Title_Font_Size = get_option("EWD_UASP_Service_Title_Font_Size");
	$UASP_Service_Title_Font_Color = get_option("EWD_UASP_Service_Title_Font_Color");
	$UASP_Service_Label_Font = get_option("EWD_UASP_Service_Label_Font");
	$UASP_Service_Label_Font_Size = get_option("EWD_UASP_Service_Label_Font_Size");
	$UASP_Service_Block_Color = get_option("EWD_UASP_Service_Block_Color");
	$UASP_Service_Block_Margin = get_option("EWD_UASP_Service_Block_Margin");
	$UASP_Service_Block_Padding = get_option("EWD_UASP_Service_Block_Padding");
	
	$UASP_Appointment_Title_Font = get_option("EWD_UASP_Appointment_Title_Font");
	$UASP_Appointment_Title_Font_Size = get_option("EWD_UASP_Appointment_Title_Font_Size");
	$UASP_Appointment_Title_Font_Color = get_option("EWD_UASP_Appointment_Title_Font_Color");
	$UASP_Appointment_Label_Font = get_option("EWD_UASP_Appointment_Label_Font");
	$UASP_Appointment_Label_Font_Size = get_option("EWD_UASP_Appointment_Label_Font_Size");
	$UASP_Appointment_Block_Color = get_option("EWD_UASP_Appointment_Block_Color");
	$UASP_Appointment_Block_Margin = get_option("EWD_UASP_Appointment_Block_Margin");
	$UASP_Appointment_Block_Padding = get_option("EWD_UASP_Appointment_Block_Padding");
	
	$UASP_Button_Font = get_option("EWD_UASP_Button_Font");
	$UASP_Button_Font_Size = get_option("EWD_UASP_Button_Font_Size");
	$UASP_Button_Font_Color = get_option("EWD_UASP_Button_Font_Color");
	$UASP_Button_Color = get_option("EWD_UASP_Button_Color");
	$UASP_Button_Margin = get_option("EWD_UASP_Button_Margin");
	$UASP_Button_Padding = get_option("EWD_UASP_Button_Padding");

	$Email_Reminder_Background_Color = get_option("EWD_UASP_Email_Reminder_Background_Color");
	$Email_Reminder_Inner_Color = get_option("EWD_UASP_Email_Reminder_Inner_Color");
	$Email_Reminder_Text_Color = get_option("EWD_UASP_Email_Reminder_Text_Color");
	$Email_Reminder_Button_Background_Color = get_option("EWD_UASP_Email_Reminder_Button_Background_Color");
	$Email_Reminder_Button_Text_Color = get_option("EWD_UASP_Email_Reminder_Button_Text_Color");
	$Email_Reminder_Button_Background_Hover_Color = get_option("EWD_UASP_Email_Reminder_Button_Background_Hover_Color");
	$Email_Reminder_Button_Text_Hover_Color = get_option("EWD_UASP_Email_Reminder_Button_Text_Hover_Color");

	$Calendar_Appointment_Font_Size = get_option("EWD_UASP_Calendar_Appointment_Font_Size");
	$Calendar_Appointment_Font_Family = get_option("EWD_UASP_Calendar_Appointment_Font_Family");
	$Calendar_Appointment_Color = get_option("EWD_UASP_Calendar_Appointment_Color");
	$Calendar_Appointment_Background_Color = get_option("EWD_UASP_Calendar_Appointment_Background_Color");
	$Calendar_Appointment_Border_Color = get_option("EWD_UASP_Calendar_Appointment_Border_Color");
	$Calendar_Selected_Appointment_Background_Color = get_option("EWD_UASP_Calendar_Selected_Appointment_Background_Color");
	$Calendar_Selected_Appointment_Border_Color = get_option("EWD_UASP_Calendar_Selected_Appointment_Border_Color");

	if (isset($_POST['Display_Tab'])) {$Display_Tab = $_POST['Display_Tab'];}
	else {$Display_Tab = "";}

	$UWPM_Emails = get_posts(array('post_type' => 'uwpm_mail_template', 'posts_per_page' => -1));
?>
<div class="wrap uasp-options-page-tabbed">
	<div class="uasp-options-submenu-div">
		<ul class="uasp-options-submenu uasp-options-page-tabbed-nav">
			<li><a id="Basic_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == '' or $Display_Tab == 'Basic') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Basic');">Basic</a></li>
			<li><a id="Premium_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Premium') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Premium');">Premium</a></li>
			<li><a id="Payment_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Payment') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Payment');">Payment</a></li>
			<li><a id="Reminders_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Reminders') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Reminders');">Reminders</a></li>
			<li><a id="Emails_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Emails') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Emails');">Emails</a></li>
			<li><a id="Labelling_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Labelling') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Labelling');">Labelling</a></li>
			<li><a id="Styling_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Styling') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Styling');">Styling</a></li>
		</ul>
	</div>


<div class="uasp-options-page-tabbed-content">

<form method="post" action="admin.php?page=EWD-UASP-options&DisplayPage=Settings&Action=EWD_UASP_UpdateOptions">
<?php wp_nonce_field( 'EWD_UASP_Admin_Nonce', 'EWD_UASP_Admin_Nonce' );  ?>

<input type='hidden' name='Display_Tab' value='<?php echo $Display_Tab; ?>' />

<div id='Basic' class='uasp-option-set<?php echo ( ($Display_Tab == '' or $Display_Tab == 'Basic') ? '' : ' uasp-hidden' ); ?>'>
<br />

<div class="ewd-uasp-shortcode-reminder">
	<div class="ewd-uasp-shortcode-reminder-inside"><?php _e('To display the dropdown appointment form, place the <strong>[ultimate-appointment-dropdown]</strong> shortcode on a page', 'ultimate-appointment-scheduling'); ?></div>
	<div class="ewd-uasp-shortcode-reminder-inside"><?php _e('To display the calendar appointment form, place the <strong>[ultimate-appointment-calendar]</strong> shortcode on a page', 'ultimate-appointment-scheduling'); ?></div>
</div>

<br />

<div class="ewd-uasp-admin-section-heading"><?php _e('Basic Options', 'ultimate-appointment-scheduling'); ?></div>

<table class="form-table">
<tr>
<th scope="row">Custom CSS</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Custom CSS</span></legend>
	<label title='Custom CSS'><textarea class='ewd-uasp-textarea' name='custom_css'> <?php echo $Custom_CSS; ?></textarea></label><br />
	<p>You can add custom CSS styles for your order form in the box above.</p>
	</fieldset>
</td>
</tr>
<tr>
	<th scope="row" class="ewd-uasp-admin-no-info-button">Multi-Step Booking</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Multi-Step Booking</span></legend>
			<div class="ewd-uasp-admin-hide-radios">
				<label title='Yes'><input type='radio' name='multi_step_booking' value='Yes' <?php if($Multi_Step_Booking == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
				<label title='No'><input type='radio' name='multi_step_booking' value='No' <?php if($Multi_Step_Booking == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
			</div>
			<label class="ewd-uasp-admin-switch">
				<input type="checkbox" class="ewd-uasp-admin-option-toggle" data-inputname="multi_step_booking" <?php if($Multi_Step_Booking == "Yes") {echo "checked='checked'";} ?>>
				<span class="ewd-uasp-admin-switch-slider round"></span>
			</label>		
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">Time Between Appointments</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Time Between Appointments</span></legend>
			<label>
				<input type='text' name='time_between_appointments' value='<?php echo $Time_Between_Appointments; ?>' />
			</label>
			<p>How much time should there be between scheduled appointments? (in minutes)</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">Required Information</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Required Information</span></legend>
			<label title='Name' class='ewd-uasp-admin-input-container'><input type='checkbox' name='required_information[]' value='Name' <?php if(in_array("Name", $Required_Information)) {echo "checked='checked'";} ?> /><span class='ewd-uasp-admin-checkbox'></span> <span>Name</span></label><br />
			<label title='Phone' class='ewd-uasp-admin-input-container'><input type='checkbox' name='required_information[]' value='Phone' <?php if(in_array("Phone", $Required_Information)) {echo "checked='checked'";} ?> /><span class='ewd-uasp-admin-checkbox'></span> <span>Phone</span></label><br />
			<label title='Email' class='ewd-uasp-admin-input-container'><input type='checkbox' name='required_information[]' value='Email' <?php if(in_array("Email", $Required_Information)) {echo "checked='checked'";} ?> /><span class='ewd-uasp-admin-checkbox'></span> <span>Email</span></label><br />
			<p>What client information, if any, should be required before a appointment can be scheduled?</p>
		</fieldset>
	</td>
</tr>
<tr>
<th scope="row">Set Timezone</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Set Timezone</span></legend>
	<label title='Timezone'><select name='timezone'> 
		<option value="Pacific/Midway"<?php if($Timezone == "Pacific/Midway") {echo " selected=selected";} ?>>(GMT-11:00) Midway Island, Samoa</option>
		<option value="America/Adak"<?php if($Timezone == "America/Adak") {echo " selected=selected";} ?>>(GMT-10:00) Hawaii-Aleutian</option>
		<option value="Etc/GMT+10"<?php if($Timezone == "Etc/GMT+10") {echo " selected=selected";} ?>>(GMT-10:00) Hawaii</option>
		<option value="Pacific/Marquesas"<?php if($Timezone == "Pacific/Marquesas") {echo " selected=selected";} ?>>(GMT-09:30) Marquesas Islands</option>
		<option value="Pacific/Gambier"<?php if($Timezone == "Pacific/Gambier") {echo " selected=selected";} ?>>(GMT-09:00) Gambier Islands</option>
		<option value="America/Anchorage"<?php if($Timezone == "America/Anchorage") {echo " selected=selected";} ?>>(GMT-09:00) Alaska</option>
		<option value="America/Ensenada"<?php if($Timezone == "America/Ensenada") {echo " selected=selected";} ?>>(GMT-08:00) Tijuana, Baja California</option>
		<option value="Etc/GMT+8"<?php if($Timezone == "Etc/GMT+8") {echo " selected=selected";} ?>>(GMT-08:00) Pitcairn Islands</option>
		<option value="America/Los_Angeles"<?php if($Timezone == "America/Los_Angeles") {echo " selected=selected";} ?>>(GMT-08:00) Pacific Time (US & Canada)</option>
		<option value="America/Denver"<?php if($Timezone == "America/Denver") {echo " selected=selected";} ?>>(GMT-07:00) Mountain Time (US & Canada)</option>
		<option value="America/Chihuahua"<?php if($Timezone == "America/Chihuahua") {echo " selected=selected";} ?>>(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
		<option value="America/Dawson_Creek"<?php if($Timezone == "America/Dawson_Creek") {echo " selected=selected";} ?>>(GMT-07:00) Arizona</option>
		<option value="America/Belize"<?php if($Timezone == "America/Belize") {echo " selected=selected";} ?>>(GMT-06:00) Saskatchewan, Central America</option>
		<option value="America/Cancun"<?php if($Timezone == "America/Cancun") {echo " selected=selected";} ?>>(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
		<option value="Chile/EasterIsland"<?php if($Timezone == "Chile/EasterIsland") {echo " selected=selected";} ?>>(GMT-06:00) Easter Island</option>
		<option value="America/Chicago"<?php if($Timezone == "America/Chicago") {echo " selected=selected";} ?>>(GMT-06:00) Central Time (US & Canada)</option>
		<option value="America/New_York"<?php if($Timezone == "America/New_York") {echo " selected=selected";} ?>>(GMT-05:00) Eastern Time (US & Canada)</option>
		<option value="America/Havana"<?php if($Timezone == "America/Havana") {echo " selected=selected";} ?>>(GMT-05:00) Cuba</option>
		<option value="America/Bogota"<?php if($Timezone == "America/Bogota") {echo " selected=selected";} ?>>(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
		<option value="America/Caracas"<?php if($Timezone == "America/Caracas") {echo " selected=selected";} ?>>(GMT-04:30) Caracas</option>
		<option value="America/Santiago"<?php if($Timezone == "America/Santiago") {echo " selected=selected";} ?>>(GMT-04:00) Santiago</option>
		<option value="America/La_Paz"<?php if($Timezone == "America/La_Paz") {echo " selected=selected";} ?>>(GMT-04:00) La Paz</option>
		<option value="Atlantic/Stanley"<?php if($Timezone == "Atlantic/Stanley") {echo " selected=selected";} ?>>(GMT-04:00) Faukland Islands</option>
		<option value="America/Campo_Grande"<?php if($Timezone == "America/Campo_Grande") {echo " selected=selected";} ?>>(GMT-04:00) Brazil</option>
		<option value="America/Goose_Bay"<?php if($Timezone == "America/Goose_Bay") {echo " selected=selected";} ?>>(GMT-04:00) Atlantic Time (Goose Bay)</option>
		<option value="America/Glace_Bay"<?php if($Timezone == "America/Glace_Bay") {echo " selected=selected";} ?>>(GMT-04:00) Atlantic Time (Canada)</option>
		<option value="America/St_Johns"<?php if($Timezone == "America/St_Johns") {echo " selected=selected";} ?>>(GMT-03:30) Newfoundland</option>
		<option value="America/Araguaina"<?php if($Timezone == "America/Araguaina") {echo " selected=selected";} ?>>(GMT-03:00) UTC-3</option>
		<option value="America/Montevideo"<?php if($Timezone == "America/Montevideo") {echo " selected=selected";} ?>>(GMT-03:00) Montevideo</option>
		<option value="America/Miquelon"<?php if($Timezone == "America/Miquelon") {echo " selected=selected";} ?>>(GMT-03:00) Miquelon, St. Pierre</option>
		<option value="America/Godthab"<?php if($Timezone == "America/Godthab") {echo " selected=selected";} ?>>(GMT-03:00) Greenland</option>
		<option value="America/Argentina/Buenos_Aires"<?php if($Timezone == "America/Argentina/Buenos_Aires") {echo " selected=selected";} ?>>(GMT-03:00) Buenos Aires</option>
		<option value="America/Sao_Paulo"<?php if($Timezone == "America/Sao_Paulo") {echo " selected=selected";} ?>>(GMT-03:00) Brasilia</option>
		<option value="America/Noronha"<?php if($Timezone == "America/Noronha") {echo " selected=selected";} ?>>(GMT-02:00) Mid-Atlantic</option>
		<option value="Atlantic/Cape_Verde"<?php if($Timezone == "Atlantic/Cape_Verde") {echo " selected=selected";} ?>>(GMT-01:00) Cape Verde Is.</option>
		<option value="Atlantic/Azores"<?php if($Timezone == "Atlantic/Azores") {echo " selected=selected";} ?>>(GMT-01:00) Azores</option>
		<option value="Europe/Belfast"<?php if($Timezone == "Europe/Belfast") {echo " selected=selected";} ?>>(GMT) Greenwich Mean Time : Belfast</option>
		<option value="Europe/Dublin"<?php if($Timezone == "Europe/Dublin") {echo " selected=selected";} ?>>(GMT) Greenwich Mean Time : Dublin</option>
		<option value="Europe/Lisbon"<?php if($Timezone == "Europe/Lisbon") {echo " selected=selected";} ?>>(GMT) Greenwich Mean Time : Lisbon</option>
		<option value="Europe/London"<?php if($Timezone == "Europe/London") {echo " selected=selected";} ?>>(GMT) Greenwich Mean Time : London</option>
		<option value="Africa/Abidjan"<?php if($Timezone == "Africa/Abidjan") {echo " selected=selected";} ?>>(GMT) Monrovia, Reykjavik</option>
		<option value="Europe/Amsterdam"<?php if($Timezone == "Europe/Amsterdam") {echo " selected=selected";} ?>>(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
		<option value="Europe/Belgrade"<?php if($Timezone == "Europe/Belgrade") {echo " selected=selected";} ?>>(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
		<option value="Europe/Brussels"<?php if($Timezone == "Europe/Brussels") {echo " selected=selected";} ?>>(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
		<option value="Africa/Algiers"<?php if($Timezone == "Africa/Algiers") {echo " selected=selected";} ?>>(GMT+01:00) West Central Africa</option>
		<option value="Africa/Windhoek"<?php if($Timezone == "Africa/Windhoek") {echo " selected=selected";} ?>>(GMT+01:00) Windhoek</option>
		<option value="Asia/Beirut"<?php if($Timezone == "Asia/Beirut") {echo " selected=selected";} ?>>(GMT+02:00) Beirut</option>
		<option value="Africa/Cairo"<?php if($Timezone == "Africa/Cairo") {echo " selected=selected";} ?>>(GMT+02:00) Cairo</option>
		<option value="Asia/Gaza"<?php if($Timezone == "Asia/Gaza") {echo " selected=selected";} ?>>(GMT+02:00) Gaza</option>
		<option value="Africa/Blantyre"<?php if($Timezone == "Africa/Blantyre") {echo " selected=selected";} ?>>(GMT+02:00) Harare, Pretoria</option>
		<option value="Asia/Jerusalem"<?php if($Timezone == "Asia/Jerusalem") {echo " selected=selected";} ?>>(GMT+02:00) Jerusalem</option>
		<option value="Europe/Minsk"<?php if($Timezone == "Europe/Minsk") {echo " selected=selected";} ?>>(GMT+02:00) Minsk</option>
  		<option value="Asia/Damascus"<?php if($Timezone == "Asia/Damascus") {echo " selected=selected";} ?>>(GMT+02:00) Syria</option>
		<option value="Europe/Moscow"<?php if($Timezone == "Europe/Moscow") {echo " selected=selected";} ?>>(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
		<option value="Africa/Addis_Ababa"<?php if($Timezone == "Africa/Addis_Ababa") {echo " selected=selected";} ?>>(GMT+03:00) Nairobi</option>
		<option value="Asia/Tehran"<?php if($Timezone == "Asia/Tehran") {echo " selected=selected";} ?>>(GMT+03:30) Tehran</option>
		<option value="Asia/Dubai"<?php if($Timezone == "Asia/Dubai") {echo " selected=selected";} ?>>(GMT+04:00) Abu Dhabi, Muscat</option>
		<option value="Asia/Yerevan"<?php if($Timezone == "Asia/Yerevan") {echo " selected=selected";} ?>>(GMT+04:00) Yerevan</option>
		<option value="Asia/Kabul"<?php if($Timezone == "Asia/Kabul") {echo " selected=selected";} ?>>(GMT+04:30) Kabul</option>
		<option value="Asia/Yekaterinburg"<?php if($Timezone == "Asia/Yekaterinburg") {echo " selected=selected";} ?>>(GMT+05:00) Ekaterinburg</option>
		<option value="Asia/Tashkent"<?php if($Timezone == "Asia/Tashkent") {echo " selected=selected";} ?>>(GMT+05:00) Tashkent</option>
		<option value="Asia/Kolkata"<?php if($Timezone == "Asia/Kolkata") {echo " selected=selected";} ?>>(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
		<option value="Asia/Katmandu"<?php if($Timezone == "Asia/Katmandu") {echo " selected=selected";} ?>>(GMT+05:45) Kathmandu</option>
		<option value="Asia/Dhaka"<?php if($Timezone == "Asia/Dhaka") {echo " selected=selected";} ?>>(GMT+06:00) Astana, Dhaka</option>
		<option value="Asia/Novosibirsk"<?php if($Timezone == "Asia/Novosibirsk") {echo " selected=selected";} ?>>(GMT+06:00) Novosibirsk</option>
		<option value="Asia/Rangoon"<?php if($Timezone == "Asia/Rangoon") {echo " selected=selected";} ?>>(GMT+06:30) Yangon (Rangoon)</option>
		<option value="Asia/Bangkok"<?php if($Timezone == "Asia/Bangkok") {echo " selected=selected";} ?>>(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
		<option value="Asia/Krasnoyarsk"<?php if($Timezone == "Asia/Krasnoyarsk") {echo " selected=selected";} ?>>(GMT+07:00) Krasnoyarsk</option>
		<option value="Asia/Hong_Kong"<?php if($Timezone == "Asia/Hong_Kong") {echo " selected=selected";} ?>>(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
		<option value="Asia/Irkutsk"<?php if($Timezone == "Asia/Irkutsk") {echo " selected=selected";} ?>>(GMT+08:00) Irkutsk, Ulaan Bataar</option>
		<option value="Australia/Perth"<?php if($Timezone == "Australia/Perth") {echo " selected=selected";} ?>>(GMT+08:00) Perth</option>
		<option value="Australia/Eucla"<?php if($Timezone == "Australia/Eucla") {echo " selected=selected";} ?>>(GMT+08:45) Eucla</option>
		<option value="Asia/Tokyo"<?php if($Timezone == "Asia/Tokyo") {echo " selected=selected";} ?>>(GMT+09:00) Osaka, Sapporo, Tokyo</option>
		<option value="Asia/Seoul"<?php if($Timezone == "Asia/Seoul") {echo " selected=selected";} ?>>(GMT+09:00) Seoul</option>
		<option value="Asia/Yakutsk"<?php if($Timezone == "Asia/Yakutsk") {echo " selected=selected";} ?>>(GMT+09:00) Yakutsk</option>
		<option value="Australia/Adelaide"<?php if($Timezone == "Australia/Adelaide") {echo " selected=selected";} ?>>(GMT+09:30) Adelaide</option>
		<option value="Australia/Darwin"<?php if($Timezone == "Australia/Darwin") {echo " selected=selected";} ?>>(GMT+09:30) Darwin</option>
		<option value="Australia/Brisbane"<?php if($Timezone == "Australia/Brisbane") {echo " selected=selected";} ?>>(GMT+10:00) Brisbane</option>
		<option value="Australia/Hobart"<?php if($Timezone == "Australia/Hobart") {echo " selected=selected";} ?>>(GMT+10:00) Hobart</option>
		<option value="Asia/Vladivostok"<?php if($Timezone == "Asia/Vladivostok") {echo " selected=selected";} ?>>(GMT+10:00) Vladivostok</option>
		<option value="Australia/Lord_Howe"<?php if($Timezone == "Australia/Lord_Howe") {echo " selected=selected";} ?>>(GMT+10:30) Lord Howe Island</option>
		<option value="Etc/GMT-11"<?php if($Timezone == "Etc/GMT-11") {echo " selected=selected";} ?>>(GMT+11:00) Solomon Is., New Caledonia</option>
		<option value="Asia/Magadan"<?php if($Timezone == "Asia/Magadan") {echo " selected=selected";} ?>>(GMT+11:00) Magadan</option>
		<option value="Pacific/Norfolk"<?php if($Timezone == "Pacific/Norfolk") {echo " selected=selected";} ?>>(GMT+11:30) Norfolk Island</option>
		<option value="Asia/Anadyr"<?php if($Timezone == "Asia/Anadyr") {echo " selected=selected";} ?>>(GMT+12:00) Anadyr, Kamchatka</option>
		<option value="Pacific/Auckland"<?php if($Timezone == "Pacific/Auckland") {echo " selected=selected";} ?>>(GMT+12:00) Auckland, Wellington</option>
		<option value="Etc/GMT-12"<?php if($Timezone == "Etc/GMT-12") {echo " selected=selected";} ?>>(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
		<option value="Pacific/Chatham"<?php if($Timezone == "Pacific/Chatham") {echo " selected=selected";} ?>>(GMT+12:45) Chatham Islands</option>
		<option value="Pacific/Tongatapu"<?php if($Timezone == "Pacific/Tongatapu") {echo " selected=selected";} ?>>(GMT+13:00) Nuku'alofa</option>
		<option value="Pacific/Kiritimati"<?php if($Timezone == "Pacific/Kiritimati") {echo " selected=selected";} ?>>(GMT+14:00) Kiritimati</option>
	</select></label>
	<p>What timezone are your appointments scheduled in?</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row" class="ewd-uasp-admin-no-info-button">Date/Time Format</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Date/Time Format</span></legend>
	<label title='Localize Date & Time settings'><select name='localize_date_time'>
	<option value="North_American" <?php if($Localize_Date_Time == "North_American") {echo " selected=selected";} ?>>North American (YY-DD-MM)</option>
	<option value="European" <?php if($Localize_Date_Time == "European") {echo " selected=selected";} ?> >European (DD-MM-YY)</option>
	</select></label>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row" class="ewd-uasp-admin-no-info-button">Hours Format</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Hours Format</span></legend>
	<label title='Localize Date & Time settings'><select name='hours_format'>
	<option value="24" <?php if($Hours_Format == "24") {echo " selected=selected";} ?>>24 hour</option>
	<option value="12" <?php if($Hours_Format == "12") {echo " selected=selected";} ?> >12 hour</option>
	</select></label>
	</fieldset>
</td>
</tr>

<tr>
	<th scope="row">PHP Date Format</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>PHP Date Format</span></legend>
			<label>
				<input type='text' name='php_date_format' value='<?php echo $PHP_Date_Format; ?>' />
			</label>
			<p>
				Use this field to specify a PHP date format to be used when the date is included (e.g. in emails). More info about PHP date formats can be found <a href="https://secure.php.net/manual/en/function.date.php" target="_blank">here</a>.
				<br><br>
				A few examples:
				<br><br>
				<code>l, F jS, Y \at g:i A</code> will give you something like "Tuesday, January 1st, 2019 at 2:00 PM"
				<br>
				<code>j F Y \at H:i</code> will give you something like "5 January 2019 at 14:00"
			</p>
		</fieldset>
	</td>
</tr>

<tr>
<th scope="row" class="ewd-uasp-admin-no-info-button">Client Email Details</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Client Email Details</span></legend>
		<label>
			<select name='client_email_details'>
				<option value='-1' <?php echo ($Client_Email_Details == -1 ? "selected" : ""); ?>>No</option>
				<?php foreach ($Email_Messages_Array as $Email_Message_Item) { ?>
					<option value='<?php echo $Email_Message_Item['ID']; ?>' <?php echo ($Client_Email_Details == $Email_Message_Item['ID'] ? "selected" : ""); ?>><?php echo $Email_Message_Item['Name']; ?></option>
				<?php } ?>
				<optgroup label='Ultimate WP Mail'>
					<?php foreach ($UWPM_Emails as $Email) { ?>
							<option value='-<?php echo $Email->ID; ?>' <?php echo ($Client_Email_Details * -1 == $Email->ID ? 'selected' : ''); ?>><?php echo $Email->post_title ?></option>
					<?php } ?>
				</optgroup>
			</select>
		</label>
	</fieldset>
</td>
</tr>
<tr>
	<th scope="row">Minimum Days in Advance</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Minimum Days in Advance</span></legend>
			<label>
				<input type='text' name='minimum_days_advance' value='<?php echo $Minimum_Days_Advance; ?>' />
			</label>
			<p>What is the minimum number of days in advance an appointment can be booked? (in days)</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">Maximum Days in Advance</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Maximum Days in Advance</span></legend>
			<label>
				<input type='text' name='maximum_days_advance' value='<?php echo $Maximum_Days_Advance; ?>' />
			</label>
			<p>What is the maximum number of days in advance an appointment can be booked? (in days)</p>
		</fieldset>
	</td>
</tr>

<tr>
<th scope="row">Calendar Starting Layout</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Calendar Starting Layout</span></legend>
	<label title='Calendar_Starting_Layout'><select name='calendar_starting_layout'> 
		<option value="agendaDay"<?php if($Calendar_Starting_Layout == "agendaDay") {echo " selected=selected";} ?>>Day</option>
		<option value="agendaWeek"<?php if($Calendar_Starting_Layout == "agendaWeek") {echo " selected=selected";} ?>>Week</option>
		<option value="month"<?php if($Calendar_Starting_Layout == "month") {echo " selected=selected";} ?>>Month</option>
		<option value="listWeek"<?php if($Calendar_Starting_Layout == "listWeek") {echo " selected=selected";} ?>>List</option>
	</select></label>
	<p>What layout should the calendar start in?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Calendar Starting Hour</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Calendar Starting Hour</span></legend>
	<label title='Calendar_Starting_Time'><select name='calendar_starting_time'> 
		<option value="00"<?php if($Calendar_Starting_Time == "00") {echo " selected=selected";} ?>>12 am</option>
		<option value="01"<?php if($Calendar_Starting_Time == "01") {echo " selected=selected";} ?>>1 am</option>
		<option value="02"<?php if($Calendar_Starting_Time == "02") {echo " selected=selected";} ?>>2 am</option>
		<option value="03"<?php if($Calendar_Starting_Time == "03") {echo " selected=selected";} ?>>3 am</option>
		<option value="04"<?php if($Calendar_Starting_Time == "04") {echo " selected=selected";} ?>>4 am</option>
		<option value="05"<?php if($Calendar_Starting_Time == "05") {echo " selected=selected";} ?>>5 am</option>
		<option value="06"<?php if($Calendar_Starting_Time == "06") {echo " selected=selected";} ?>>6 am</option>
		<option value="07"<?php if($Calendar_Starting_Time == "07") {echo " selected=selected";} ?>>7 am</option>
		<option value="08"<?php if($Calendar_Starting_Time == "08") {echo " selected=selected";} ?>>8 am</option>
		<option value="09"<?php if($Calendar_Starting_Time == "09") {echo " selected=selected";} ?>>9 am</option>
		<option value="10"<?php if($Calendar_Starting_Time == "10") {echo " selected=selected";} ?>>10 am</option>
		<option value="11"<?php if($Calendar_Starting_Time == "11") {echo " selected=selected";} ?>>11 am</option>
		<option value="12"<?php if($Calendar_Starting_Time == "12") {echo " selected=selected";} ?>>12 pm</option>
		<option value="13"<?php if($Calendar_Starting_Time == "13") {echo " selected=selected";} ?>>1 pm</option>
		<option value="14"<?php if($Calendar_Starting_Time == "14") {echo " selected=selected";} ?>>2 pm</option>
		<option value="15"<?php if($Calendar_Starting_Time == "15") {echo " selected=selected";} ?>>3 pm</option>
		<option value="16"<?php if($Calendar_Starting_Time == "16") {echo " selected=selected";} ?>>4 pm</option>
		<option value="17"<?php if($Calendar_Starting_Time == "17") {echo " selected=selected";} ?>>5 pm</option>
		<option value="18"<?php if($Calendar_Starting_Time == "18") {echo " selected=selected";} ?>>6 pm</option>
		<option value="19"<?php if($Calendar_Starting_Time == "19") {echo " selected=selected";} ?>>7 pm</option>
		<option value="20"<?php if($Calendar_Starting_Time == "20") {echo " selected=selected";} ?>>8 pm</option>
		<option value="21"<?php if($Calendar_Starting_Time == "21") {echo " selected=selected";} ?>>9 pm</option>
		<option value="22"<?php if($Calendar_Starting_Time == "22") {echo " selected=selected";} ?>>10 pm</option>
		<option value="23"<?php if($Calendar_Starting_Time == "23") {echo " selected=selected";} ?>>11 pm</option>
	</select></label>
	<p>What should the default first/top time be in the calendar (e.g. if you're in the daily view)?</p>
	</fieldset>
</td>
</tr>
<tr>
	<th scope="row"><?php _e('Calendar Offset', 'ultimate-appointment-scheduling'); ?></th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Calendar Offset</span></legend>
			<label style="width: 100%;">
				<input type='text' name='calendar_offset' value='<?php echo $Calendar_Offset; ?>' />
				<select name='calendar_offset_unit' style='position: relative; top: -3px; width: auto !important;'> 
					<option value="offsetDay"<?php if($Calendar_Offset_Unit == "offsetDay") {echo " selected=selected";} ?>><?php _e('Days', 'ultimate-appointment-scheduling'); ?></option>
					<option value="offsetWeek"<?php if($Calendar_Offset_Unit == "offsetWeek") {echo " selected=selected";} ?>><?php _e('Weeks', 'ultimate-appointment-scheduling'); ?></option>
					<option value="offsetMonth"<?php if($Calendar_Offset_Unit == "offsetMonth") {echo " selected=selected";} ?>><?php _e('Months', 'ultimate-appointment-scheduling'); ?></option>
				</select>
			</label>
			<p><?php _e('Use this option so specify how far ahead (in days, weeks or months) the default opening date of the calendar will be', 'ultimate-appointment-scheduling'); ?></p>
		</fieldset>
	</td>
</tr>

<tr>

</table>
</div>

<div id='Premium' class='uasp-option-set<?php echo ( $Display_Tab == 'Premium' ? '' : ' uasp-hidden' ); ?>'>

<br />

<div class="ewd-uasp-admin-section-heading"><?php _e('Premium Options', 'ultimate-appointment-scheduling'); ?></div>

<table class="form-table ewd-uasp-premium-options-table">
<tr>
	<th scope="row">Booking Form Style</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Booking Form Style</span></legend>
			<label title='Standard' class='ewd-uasp-admin-input-container'><input type='radio' name='ewd_uasp_booking_form_style' value='Standard' <?php if($Booking_Form_Style == "Standard") {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-uasp-admin-radio-button'></span> <span>Standard</span></label><br />
			<label title='Contemporary' class='ewd-uasp-admin-input-container'><input type='radio' name='ewd_uasp_booking_form_style' value='Contemporary' <?php if($Booking_Form_Style == "Contemporary") {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-uasp-admin-radio-button'></span> <span>Contemporary</span></label><br />
			<p>Should a captcha field be added to your appointment scheduling form?</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row" class="ewd-uasp-admin-no-info-button">Admin Appointment Notification</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Admin Appointment Notification</span></legend>
			<label>
				<select name='admin_email_notification' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>>
					<option value='-1' <?php echo ($Admin_Email_Notification == -1 ? "selected" : ""); ?>>No</option>
					<?php foreach ($Email_Messages_Array as $Email_Message_Item) { ?>
						<option value='<?php echo $Email_Message_Item['ID']; ?>' <?php echo ($Admin_Email_Notification == $Email_Message_Item['ID'] ? "selected" : ""); ?>><?php echo $Email_Message_Item['Name']; ?></option>
					<?php } ?>
					<optgroup label='Ultimate WP Mail'>
						<?php foreach ($UWPM_Emails as $Email) { ?>
								<option value='-<?php echo $Email->ID; ?>' <?php echo ($Admin_Email_Notification * -1 == $Email->ID ? 'selected' : ''); ?>><?php echo $Email->post_title ?></option>
						<?php } ?>
					</optgroup>
				</select>
			</label>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">Admin Email Address</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Admin Email Address</span></legend>
			<label>
				<input type='text' name='admin_email_address' value='<?php echo $Admin_Email_Address; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
			</label>
			<p>Provide the email address at which you would like to receive the admin email notification chosen in the option above.</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row" class="ewd-uasp-admin-no-info-button">Service Provider Appointment Notification</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Service Provider Appointment Notification</span></legend>
			<label>
				<select name='provider_email_notification' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>>
					<option value='-1' <?php echo ($Provider_Email_Notification == -1 ? "selected" : ""); ?>>No</option>
					<?php foreach ($Email_Messages_Array as $Email_Message_Item) { ?>
						<option value='<?php echo $Email_Message_Item['ID']; ?>' <?php echo ($Provider_Email_Notification == $Email_Message_Item['ID'] ? "selected" : ""); ?>><?php echo $Email_Message_Item['Name']; ?></option>
					<?php } ?>
					<optgroup label='Ultimate WP Mail'>
						<?php foreach ($UWPM_Emails as $Email) { ?>
								<option value='-<?php echo $Email->ID; ?>' <?php echo ($Provider_Email_Notification * -1 == $Email->ID ? 'selected' : ''); ?>><?php echo $Email->post_title ?></option>
						<?php } ?>
					</optgroup>
				</select>
			</label>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">Require Captcha</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Require Captcha</span></legend>
			<div class="ewd-uasp-admin-hide-radios">
				<label title='Yes'><input type='radio' name='add_captcha' value='Yes' <?php if($Add_Captcha == "Yes") {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
				<label title='No'><input type='radio' name='add_captcha' value='No' <?php if($Add_Captcha == "No") {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />
			</div>
			<label class="ewd-uasp-admin-switch">
				<input type="checkbox" class="ewd-uasp-admin-option-toggle" data-inputname="add_captcha" <?php if($Add_Captcha == "Yes") {echo "checked='checked'";} ?>>
				<span class="ewd-uasp-admin-switch-slider round"></span>
			</label>		
			<p>Should a captcha field be added to your appointment scheduling form?</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row"><?php _e('Calendar Language', 'ultimate-appointment-scheduling')?></th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Calendar Language</span></legend>
			<label>
				<select name='calendar_language' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>>
					<option value="en"<?php if($Calendar_Language == "en") {echo " selected=selected";} ?>><?php _e('English', 'ultimate-appointment-scheduling')?></option>
					<option value="af"<?php if($Calendar_Language == "af") {echo " selected=selected";} ?>><?php _e('Afrikaans', 'ultimate-appointment-scheduling')?></option>
					<option value="ar"<?php if($Calendar_Language == "ar") {echo " selected=selected";} ?>><?php _e('Arabic', 'ultimate-appointment-scheduling')?></option>
					<option value="ar-dz"<?php if($Calendar_Language == "ar-dz") {echo " selected=selected";} ?>><?php _e('Arabic (Algeria)', 'ultimate-appointment-scheduling')?></option>
					<option value="ar-kw"<?php if($Calendar_Language == "ar-kw") {echo " selected=selected";} ?>><?php _e('Arabic (Kuwait)', 'ultimate-appointment-scheduling')?></option>
					<option value="ar-ly"<?php if($Calendar_Language == "ar-ly") {echo " selected=selected";} ?>><?php _e('Arabic (Libya)', 'ultimate-appointment-scheduling')?></option>
					<option value="ar-ma"<?php if($Calendar_Language == "ar-ma") {echo " selected=selected";} ?>><?php _e('Arabic (Morocco)', 'ultimate-appointment-scheduling')?></option>
					<option value="ar-sa"<?php if($Calendar_Language == "ar-sa") {echo " selected=selected";} ?>><?php _e('Arabic (Saudi Arabia)', 'ultimate-appointment-scheduling')?></option>
					<option value="ar-tn"<?php if($Calendar_Language == "ar-tn") {echo " selected=selected";} ?>><?php _e('Arabic (Tunisia)', 'ultimate-appointment-scheduling')?></option>
					<option value="bg"<?php if($Calendar_Language == "bg") {echo " selected=selected";} ?>><?php _e('Bulgarian', 'ultimate-appointment-scheduling')?></option>
					<option value="ca"<?php if($Calendar_Language == "ca") {echo " selected=selected";} ?>><?php _e('Catalan', 'ultimate-appointment-scheduling')?></option>
					<option value="cs"<?php if($Calendar_Language == "cs") {echo " selected=selected";} ?>><?php _e('Czech', 'ultimate-appointment-scheduling')?></option>
					<option value="da"<?php if($Calendar_Language == "da") {echo " selected=selected";} ?>><?php _e('Danish', 'ultimate-appointment-scheduling')?></option>
					<option value="de"<?php if($Calendar_Language == "de") {echo " selected=selected";} ?>><?php _e('German', 'ultimate-appointment-scheduling')?></option>
					<option value="de-at"<?php if($Calendar_Language == "de-at") {echo " selected=selected";} ?>><?php _e('German (Austria)', 'ultimate-appointment-scheduling')?></option>
					<option value="de-ch"<?php if($Calendar_Language == "de-ch") {echo " selected=selected";} ?>><?php _e('German (Switzerland)', 'ultimate-appointment-scheduling')?></option>
					<option value="el"<?php if($Calendar_Language == "el") {echo " selected=selected";} ?>><?php _e('Greek', 'ultimate-appointment-scheduling')?></option>
					<option value="en-au"<?php if($Calendar_Language == "en-au") {echo " selected=selected";} ?>><?php _e('English (Australia)', 'ultimate-appointment-scheduling')?></option>
					<option value="en-ca"<?php if($Calendar_Language == "en-ca") {echo " selected=selected";} ?>><?php _e('English (Canada)', 'ultimate-appointment-scheduling')?></option>
					<option value="en-gb"<?php if($Calendar_Language == "en-gb") {echo " selected=selected";} ?>><?php _e('English (Great Britain)', 'ultimate-appointment-scheduling')?></option>
					<option value="en-ie"<?php if($Calendar_Language == "en-ie") {echo " selected=selected";} ?>><?php _e('English (Ireland)', 'ultimate-appointment-scheduling')?></option>
					<option value="en-nz"<?php if($Calendar_Language == "en-nz") {echo " selected=selected";} ?>><?php _e('English (New Zealand)', 'ultimate-appointment-scheduling')?></option>
					<option value="es"<?php if($Calendar_Language == "es") {echo " selected=selected";} ?>><?php _e('Spanish', 'ultimate-appointment-scheduling')?></option>
					<option value="es-do"<?php if($Calendar_Language == "es-do") {echo " selected=selected";} ?>><?php _e('Spanish (Dominican Republic)', 'ultimate-appointment-scheduling')?></option>
					<option value="es-us"<?php if($Calendar_Language == "en-us") {echo " selected=selected";} ?>><?php _e('Spanish (United States)', 'ultimate-appointment-scheduling')?></option>
					<option value="et"<?php if($Calendar_Language == "et") {echo " selected=selected";} ?>><?php _e('Estonian', 'ultimate-appointment-scheduling')?></option>
					<option value="eu"<?php if($Calendar_Language == "eu") {echo " selected=selected";} ?>><?php _e('Basque', 'ultimate-appointment-scheduling')?></option>
					<option value="fa"<?php if($Calendar_Language == "fa") {echo " selected=selected";} ?>><?php _e('Persian (Farsi)', 'ultimate-appointment-scheduling')?></option>
					<option value="fi"<?php if($Calendar_Language == "fi") {echo " selected=selected";} ?>><?php _e('Finnish', 'ultimate-appointment-scheduling')?></option>
					<option value="fr"<?php if($Calendar_Language == "fr") {echo " selected=selected";} ?>><?php _e('French', 'ultimate-appointment-scheduling')?></option>
					<option value="fr-ca"<?php if($Calendar_Language == "fr-ca") {echo " selected=selected";} ?>><?php _e('French (Canada)', 'ultimate-appointment-scheduling')?></option>
					<option value="fr-ch"<?php if($Calendar_Language == "fr-ch") {echo " selected=selected";} ?>><?php _e('French (Switzerland)', 'ultimate-appointment-scheduling')?></option>
					<option value="gl"<?php if($Calendar_Language == "gl") {echo " selected=selected";} ?>><?php _e('Galician', 'ultimate-appointment-scheduling')?></option>
					<option value="he"<?php if($Calendar_Language == "he") {echo " selected=selected";} ?>><?php _e('Hebrew', 'ultimate-appointment-scheduling')?></option>
					<option value="hi"<?php if($Calendar_Language == "hi") {echo " selected=selected";} ?>><?php _e('Hindi', 'ultimate-appointment-scheduling')?></option>
					<option value="hr"<?php if($Calendar_Language == "hr") {echo " selected=selected";} ?>><?php _e('Croatian', 'ultimate-appointment-scheduling')?></option>
					<option value="hu"<?php if($Calendar_Language == "hu") {echo " selected=selected";} ?>><?php _e('Hungarian', 'ultimate-appointment-scheduling')?></option>
					<option value="id"<?php if($Calendar_Language == "id") {echo " selected=selected";} ?>><?php _e('Indonesian', 'ultimate-appointment-scheduling')?></option>
					<option value="is"<?php if($Calendar_Language == "is") {echo " selected=selected";} ?>><?php _e('Icelandic', 'ultimate-appointment-scheduling')?></option>
					<option value="it"<?php if($Calendar_Language == "it") {echo " selected=selected";} ?>><?php _e('Italian', 'ultimate-appointment-scheduling')?></option>
					<option value="ja"<?php if($Calendar_Language == "ja") {echo " selected=selected";} ?>><?php _e('Japanese', 'ultimate-appointment-scheduling')?></option>
					<option value="kk"<?php if($Calendar_Language == "kk") {echo " selected=selected";} ?>><?php _e('Kazakh', 'ultimate-appointment-scheduling')?></option>
					<option value="ko"<?php if($Calendar_Language == "ko") {echo " selected=selected";} ?>><?php _e('Korean', 'ultimate-appointment-scheduling')?></option>
					<option value="lb"<?php if($Calendar_Language == "lb") {echo " selected=selected";} ?>><?php _e('Luxembourgish', 'ultimate-appointment-scheduling')?></option>
					<option value="lt"<?php if($Calendar_Language == "lt") {echo " selected=selected";} ?>><?php _e('Lithuanian', 'ultimate-appointment-scheduling')?></option>
					<option value="lv"<?php if($Calendar_Language == "lv") {echo " selected=selected";} ?>><?php _e('Latvian (Lettish)', 'ultimate-appointment-scheduling')?></option>
					<option value="mk"<?php if($Calendar_Language == "mk") {echo " selected=selected";} ?>><?php _e('Macedonian', 'ultimate-appointment-scheduling')?></option>
					<option value="ms"<?php if($Calendar_Language == "ms") {echo " selected=selected";} ?>><?php _e('Malay', 'ultimate-appointment-scheduling')?></option>
					<option value="ms-my"<?php if($Calendar_Language == "ms-my") {echo " selected=selected";} ?>><?php _e('Malay (Malaysia)', 'ultimate-appointment-scheduling')?></option>
					<option value="nb"<?php if($Calendar_Language == "nb") {echo " selected=selected";} ?>><?php _e('Norwegian bokmål', 'ultimate-appointment-scheduling')?></option>
					<option value="nl"<?php if($Calendar_Language == "nl") {echo " selected=selected";} ?>><?php _e('Dutch', 'ultimate-appointment-scheduling')?></option>
					<option value="nl-be"<?php if($Calendar_Language == "nl-be") {echo " selected=selected";} ?>><?php _e('Dutch (Belgium)', 'ultimate-appointment-scheduling')?></option>
					<option value="nn"<?php if($Calendar_Language == "nn") {echo " selected=selected";} ?>><?php _e('Norwegian nynorsk', 'ultimate-appointment-scheduling')?></option>
					<option value="pl"<?php if($Calendar_Language == "pl") {echo " selected=selected";} ?>><?php _e('Polish', 'ultimate-appointment-scheduling')?></option>
					<option value="pt"<?php if($Calendar_Language == "pt") {echo " selected=selected";} ?>><?php _e('Portuguese', 'ultimate-appointment-scheduling')?></option>
					<option value="pt-br"<?php if($Calendar_Language == "pt-br") {echo " selected=selected";} ?>><?php _e('Portuguese (Brazil)', 'ultimate-appointment-scheduling')?></option>
					<option value="ro"<?php if($Calendar_Language == "ro") {echo " selected=selected";} ?>><?php _e('Romanian', 'ultimate-appointment-scheduling')?></option>
					<option value="ru"<?php if($Calendar_Language == "ru") {echo " selected=selected";} ?>><?php _e('Russian', 'ultimate-appointment-scheduling')?></option>
					<option value="sk"<?php if($Calendar_Language == "sk") {echo " selected=selected";} ?>><?php _e('Slovak', 'ultimate-appointment-scheduling')?></option>
					<option value="sl"<?php if($Calendar_Language == "sl") {echo " selected=selected";} ?>><?php _e('Slovenian', 'ultimate-appointment-scheduling')?></option>
					<option value="sq"<?php if($Calendar_Language == "sq") {echo " selected=selected";} ?>><?php _e('Albanian', 'ultimate-appointment-scheduling')?></option>
					<option value="sr"<?php if($Calendar_Language == "sr") {echo " selected=selected";} ?>><?php _e('Serbian', 'ultimate-appointment-scheduling')?></option>
					<option value="sr-cyrl"<?php if($Calendar_Language == "sr-cyrl") {echo " selected=selected";} ?>><?php _e('Serbian (Cyrillic)', 'ultimate-appointment-scheduling')?></option>
					<option value="sv"<?php if($Calendar_Language == "sv") {echo " selected=selected";} ?>><?php _e('Swedish', 'ultimate-appointment-scheduling')?></option>
					<option value="th"<?php if($Calendar_Language == "th") {echo " selected=selected";} ?>><?php _e('Thai', 'ultimate-appointment-scheduling')?></option>
					<option value="tr"<?php if($Calendar_Language == "tr") {echo " selected=selected";} ?>><?php _e('Turkish', 'ultimate-appointment-scheduling')?></option>
					<option value="uk"<?php if($Calendar_Language == "uk") {echo " selected=selected";} ?>><?php _e('Ukrainian', 'ultimate-appointment-scheduling')?></option>
					<option value="vi"<?php if($Calendar_Language == "vi") {echo " selected=selected";} ?>><?php _e('Vietnamese', 'ultimate-appointment-scheduling')?></option>
					<option value="zh-cn"<?php if($Calendar_Language == "zh-cn") {echo " selected=selected";} ?>><?php _e('Chinese', 'ultimate-appointment-scheduling')?></option>
					<option value="zh-tw"<?php if($Calendar_Language == "zh-tw") {echo " selected=selected";} ?>><?php _e('Chinese (Taiwan)', 'ultimate-appointment-scheduling')?></option>
				</select>
			</label>
			<p>Select the language of the calendar in the calendar style booking form</p>
		</fieldset>
	</td>
</tr>
<tr>
<th scope="row">Set Access Role</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Set Access Role</span></legend>
	<label title='Access Role'><select name='access_role' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>> 
		<option value="administrator"<?php if($Access_Role == "administrator") {echo " selected=selected";} ?>>Administrator</option>
		<option value="delete_others_pages"<?php if($Access_Role == "delete_others_pages") {echo " selected=selected";} ?>>Editor</option>
		<option value="delete_published_posts"<?php if($Access_Role == "delete_published_posts") {echo " selected=selected";} ?>>Author</option>
		<option value="delete_posts"<?php if($Access_Role == "delete_posts") {echo " selected=selected";} ?>>Contributor</option>
		<option value="read"<?php if($Access_Role == "read") {echo " selected=selected";} ?>>Subscriber</option>
	</select></label>
	<p>Who should have access to the "Appointments" admin menu?</p>
	</fieldset>
</td>
</tr>
</tr>
	<tr>
		<th scope="row">Require Login</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Require Login</span></legend>
				<div class="ewd-uasp-admin-hide-radios">
					<label title='Yes'><input type='radio' name='require_login' value='Yes' <?php if($Require_Login == "Yes") {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
					<label title='No'><input type='radio' name='require_login' value='No' <?php if($Require_Login == "No") {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />
				</div>
				<label class="ewd-uasp-admin-switch">
					<input type="checkbox" class="ewd-uasp-admin-option-toggle" data-inputname="require_login" <?php if($Require_Login == "Yes") {echo "checked='checked'";} ?>>
					<span class="ewd-uasp-admin-switch-slider round"></span>
				</label>		
				<p>Do reviewers have to login before they can post a review?</p>
			</fieldset>
		</td>
	</tr>
	<tr>
		<th scope="row">Login Options</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Login Options</span></legend>
				<label title='WordPress' class='ewd-uasp-admin-input-container'><input id='ewd-uasp-wordpress-login-option' type='checkbox' name='login_options[]' value='WordPress' <?php if(in_array("WordPress", $Login_Options)) {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-uasp-admin-checkbox'></span> <span>WordPress</span></label><br />
				<label title='FEUP' class='ewd-uasp-admin-input-container'><input id='ewd-uasp-feup-login-option' type='checkbox' name='login_options[]' value='FEUP' <?php if(in_array("FEUP", $Login_Options)) {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-uasp-admin-checkbox'></span> <span><a href='https://wordpress.org/plugins/front-end-only-users/'>Front-End Only Users</a></span></label><br />
				<label title='Twitter' class='ewd-uasp-admin-input-container'><input id='ewd-uasp-twitter-login-option' type='checkbox' name='login_options[]' value='Twitter' <?php if(in_array("Twitter", $Login_Options)) {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-uasp-admin-checkbox'></span> <span>Twitter</span></label><br />
				<label title='Facebook' class='ewd-uasp-admin-input-container'><input id='ewd-uasp-facebook-login-option' type='checkbox' name='login_options[]' value='Facebook' <?php if(in_array("Facebook", $Login_Options)) {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-uasp-admin-checkbox'></span> <span>Facebook</span></label><br />
				<p>What methods should users be able to use to log in before posting a review?</p>
			</fieldset>
		</td>
	</tr>
	<tr class='ewd-uasp-wordpress-login-option'>
		<th scope="row">WordPress Login URL</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>WordPress Login URL</span></legend>
				<label>
					<input type='text' name='wordpress_login_url' value='<?php echo $WordPress_Login_URL; ?>' />
				</label>
				<p>The URL of your WordPress login page.</p>
			</fieldset>
		</td>
	</tr>
	<tr class='ewd-uasp-feup-login-option'>
		<th scope="row">FEUP Login URL</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>FEUP Login URL</span></legend>
				<label>
					<input type='text' name='feup_login_url' value='<?php echo $FEUP_Login_URL; ?>' />
				</label>
				<p>The URL of your Front-End Only Users login page.</p>
			</fieldset>
		</td>
	</tr>
	<tr class='ewd-uasp-facebook-login-option'>
		<th scope="row">Facebook App ID</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Facebook App ID</span></legend>
				<label>
					<input type='text' name='facebook_app_id' value='<?php echo $Facebook_App_ID; ?>' />
				</label>
				<p>The App ID displayed when you created the Facebook API application request.<br />
				Check out <a href='https://www.youtube.com/watch?v=txCfgVmsR7g'> this tutorial</a> if you need help getting an App ID or App Secret.</p>
			</fieldset>
		</td>
	</tr>
	<tr class='ewd-uasp-facebook-login-option'>
		<th scope="row">Facebook Secret</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Facebook Secret</span></legend>
				<label>
					<input type='text' name='facebook_secret' value='<?php echo $Facebook_Secret; ?>' />
				</label>
				<p>The secret displayed when you created the Facebook API application request.</p>
			</fieldset>
		</td>
	</tr>
	<tr class='ewd-uasp-twitter-login-option'>
		<th scope="row">Twitter Key</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Twitter Key</span></legend>
				<label>
					<input type='text' name='twitter_key' value='<?php echo $Twitter_Key; ?>' />
				</label>
				<p>The key displayed when you created the Twitter API application request.<br />
				Check out <a href='https://www.youtube.com/watch?v=9ckccMDhtQI'> this tutorial</a> if you need help getting an App ID or App Secret.</p>
			</fieldset>
		</td>
	</tr>
	<tr class='ewd-uasp-twitter-login-option'>
		<th scope="row">Twitter Secret</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Twitter Secret</span></legend>
				<label>
					<input type='text' name='twitter_secret' value='<?php echo $Twitter_Secret; ?>' />
				</label>
				<p>The secret displayed when you created the Twitter API application request.</p>
			</fieldset>
		</td>
	</tr>
	<?php if ($EWD_UASP_Full_Version != "Yes") { ?>
		<tr class="ewd-uasp-premium-options-table-overlay">
			<th colspan="2">
				<div class="ewd-uasp-unlock-premium">
					<img src="<?php echo plugins_url( '../images/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Appointment Scheduling Premium">
					<p>Access this section by by upgrading to premium</p>
					<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" class="ewd-uasp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
				</div>
			</th>
		</tr>
	<?php } ?>
</table>
</div>

<div id='Reminders' class='uasp-option-set<?php echo ( $Display_Tab == 'Reminders' ? '' : ' uasp-hidden' ); ?>'>

<br />

<div class="ewd-uasp-admin-section-heading"><?php _e('Reminder Options', 'ultimate-appointment-scheduling'); ?></div>

<table class="form-table ewd-uasp-premium-options-table">
<tr>
<th scope="row">Appointment Email Reminders</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Appointment Email Reminders</span></legend>
	<table id='ewd-uasp-email-reminders-table'>
		<tr>
			<th class="ewd-uasp-admin-no-info-button">Number</th>
			<th class="ewd-uasp-admin-no-info-button">Unit</th>
			<th class="ewd-uasp-admin-no-info-button">Email</th>
			<th class="ewd-uasp-admin-no-info-button">Send if confirmation already received?</th>
			<th class="ewd-uasp-admin-no-info-button"></th>
		</tr>
		<?php 
			$Counter = 0;
			if (!is_array($Email_Reminders)) {$Email_Reminders = array();}
			foreach ($Email_Reminders as $Reminder) { 
				$Reminder_Number = EWD_UASP_Get_Reminder_Number($Reminder);
				$Reminder_Unit = EWD_UASP_Get_Reminder_Unit($Reminder);

				foreach ($Email_Messages_Array as $Email_Message_Item) {
					if ($Email_Message_Item['ID'] == $Reminder['Email_ID']) {$Email_Name = $Email_Message_Item['Name'];}
				}

				echo "<tr id='ewd-uasp-reminder-row-" . $Counter . "'>";
					echo "<td><input type='hidden' name='Email_Reminder_" . $Counter . "_Number' value='" . $Reminder_Number . "'/>" . $Reminder_Number . "</td>";
					echo "<td><input type='hidden' name='Email_Reminder_" . $Counter . "_Unit' value='" . $Reminder_Unit ."'/>" . $Reminder_Unit . "</td>";
					echo "<td><input type='hidden' name='Email_Reminder_" . $Counter . "_Email_ID' value='" . $Reminder['Email_ID'] ."'/>" . $Email_Name . "</td>";
					echo "<td><input type='hidden' name='Email_Reminder_" . $Counter . "_Conditional' value='" . $Reminder['Conditional'] . "'/>" . $Reminder['Conditional'] . "</td>";
					echo "<td><input type='hidden' name='Email_Reminder_" . $Counter . "_ID' value='" . $Reminder['ID'] . "'/><a class='ewd-uasp-delete-reminder' data-reminderid='" . $Counter . "'>Delete</a></td>";
				echo "</tr>";
				$Counter++;
			} 
			echo "<tr><td colspan='4'><a class='ewd-uasp-add-reminder ewd-uasp-new-admin-add-button' data-nextid='" . $Counter . "'>&plus; " . __('ADD', 'ultimate-appointment-scheduling') . "</a></td></tr>";
		?>
	</table>
	<p>Should reminders be sent about appointments?<br /> Note: Times are approximate, and depend on site traffic and whether third party cron job are turned on.</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row">Appointment Confirmation</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Appointment Confirmation</span></legend>
	<div class="ewd-uasp-admin-hide-radios">
		<label title='Yes'><input type='radio' name='appointment_confirmation' value='Yes' <?php if($Appointment_Confirmation == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
		<label title='No'><input type='radio' name='appointment_confirmation' value='No' <?php if($Appointment_Confirmation == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	</div>
	<label class="ewd-uasp-admin-switch">
		<input type="checkbox" class="ewd-uasp-admin-option-toggle" data-inputname="appointment_confirmation" <?php if($Appointment_Confirmation == "Yes") {echo "checked='checked'";} ?>>
		<span class="ewd-uasp-admin-switch-slider round"></span>
	</label>		
	<p>Should a link be included in reminder emails so that appointments can be confirmed? (Also requires creating a page with the [confirm-appointment] shortcode and pasting the link to it into the "Appointment Confirmation Page" field below)</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row">Appointment Confirmation Page</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Appointment Confirmation Page</span></legend>
	<label title='Appointment Confirmation Page'><input type='text' name='appointment_confirmation_page' value='<?php echo $Appointment_Confirmation_Page; ?>' /></label><br />
	<p>What's the URL of the page with the [confirm-appointment] shortcode if "Appointment Confirmation" is set to "Yes"?</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row">Reminders Cache Time</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Reminders Cache Time</span></legend>
	<label title='Reminders Cache Time'><input type='text' name='reminders_cache_time' value='<?php echo $Reminders_Cache_Time; ?>' /><span> Minutes</span></label><br />
	<p>How often should the plugin check to see if there are new reminders to send out when a page is loaded?</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row">Third Party Cron Job</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Third Party Cron Job</span></legend>
	<div class="ewd-uasp-admin-hide-radios">
		<label title='Yes'><input type='radio' name='third_party_reminders' value='Yes' <?php if($Third_Party_Reminders == "Yes") {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
		<label title='No'><input type='radio' name='third_party_reminders' value='No' <?php if($Third_Party_Reminders == "No") {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />
	</div>
	<label class="ewd-uasp-admin-switch">
		<input type="checkbox" class="ewd-uasp-admin-option-toggle" data-inputname="third_party_reminders" <?php if($Third_Party_Reminders == "Yes") {echo "checked='checked'";} ?>>
		<span class="ewd-uasp-admin-switch-slider round"></span>
	</label>		
	<p>Should a cron job be set up on the plugin author's server to help email reminders go out on time? Note this requires communicating with the external site, and is mostly useful for low traffic sites (less than ~30 visits a day).</p>
	</fieldset>
</td>
</tr>
<?php if ($EWD_UASP_Full_Version != "Yes") { ?>
	<tr class="ewd-uasp-premium-options-table-overlay">
		<th colspan="2">
			<div class="ewd-uasp-unlock-premium">
				<img src="<?php echo plugins_url( '../images/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Appointment Scheduling Premium">
				<p>Access this section by by upgrading to premium</p>
				<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" class="ewd-uasp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
			</div>
		</th>
	</tr>
<?php } ?>
</table>
</div>


<div id='Payment' class='uasp-option-set<?php echo ( $Display_Tab == 'Payment' ? '' : ' uasp-hidden' ); ?>'>
<h2 id='label-order-options' class='uasp-options-page-tab-title'>Payment Options</h2>

<br />

<div class="ewd-uasp-admin-section-heading"><?php _e('WooCommerce Payment Options', 'ultimate-appointment-scheduling'); ?></div>

<table class="form-table ewd-uasp-premium-options-table <?php echo $EWD_UASP_Full_Version; ?>">
<tr>
<th scope="row">Sync with WooCommerce</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Sync with WooCommerce</span></legend>
	<div class="ewd-uasp-admin-hide-radios">
		<label title='Yes'><input type='radio' name='woocommerce_integration' value='Yes' <?php if($WooCommerce_Integration == "Yes") {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
		<label title='No'><input type='radio' name='woocommerce_integration' value='No' <?php if($WooCommerce_Integration == "No") {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />
	</div>
	<label class="ewd-uasp-admin-switch">
		<input type="checkbox" class="ewd-uasp-admin-option-toggle" data-inputname="woocommerce_integration" <?php if($WooCommerce_Integration == "Yes") {echo "checked='checked'";} ?>>
		<span class="ewd-uasp-admin-switch-slider round"></span>
	</label>		
	<p>Should services be synced as WooCommerce products, and customers required to checkout before scheduling an appointment?</p>
	</fieldset>
</td>
</tr>
<?php if ($EWD_UASP_Full_Version != "Yes") { ?>
	<tr class="ewd-uasp-premium-options-table-overlay">
		<th colspan="2">
			<div class="ewd-uasp-unlock-premium">
				<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" class="ewd-uasp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
			</div>
		</th>
	</tr>
<?php } ?>
</table>

<br />

<div class="ewd-uasp-admin-section-heading"><?php _e('PayPal Payment Options', 'ultimate-appointment-scheduling'); ?></div>

<table class="form-table ewd-uasp-premium-options-table">
<tr>
<th scope="row">Allow Prepayment through PayPal</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Allow Prepayment through PayPal</span></legend>
	<label title='Required' class='ewd-uasp-admin-input-container'><input type='radio' name='allow_paypal_prepayment' value='Required' <?php if($Allow_Paypal_Prepayment == "Required") {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-uasp-admin-radio-button'></span> <span>Required</span></label><br />
	<label title='Optional' class='ewd-uasp-admin-input-container'><input type='radio' name='allow_paypal_prepayment' value='Optional' <?php if($Allow_Paypal_Prepayment == "Optional") {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-uasp-admin-radio-button'></span> <span>Optional</span></label><br />
	<label title='No' class='ewd-uasp-admin-input-container'><input type='radio' name='allow_paypal_prepayment' value='No' <?php if($Allow_Paypal_Prepayment == "No") {echo "checked='checked'";} ?> <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-uasp-admin-radio-button'></span> <span>No</span></label><br />
	<p>Should customers be required to, able to (optional) or unable to pay for their appointments through PayPal when they book them?</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row">Pricing Currency</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Pricing Currency</span></legend>
	<label title='Pricing Currency'><select name='pricing_currency_code' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>>
	<option value="AUD" <?php if($Pricing_Currency_Code == "AUD") {echo " selected=selected";} ?>><?php _e("Australian Dollar", 'ultimate-appointment-scheduling'); ?></option>
	<option value="BRL" <?php if($Pricing_Currency_Code == "BRL") {echo " selected=selected";} ?>><?php _e("Brazilian Real", 'ultimate-appointment-scheduling'); ?></option>
	<option value="CAD" <?php if($Pricing_Currency_Code == "CAD") {echo " selected=selected";} ?>><?php _e("Canadian Dollar", 'ultimate-appointment-scheduling'); ?></option>
	<option value="CZK" <?php if($Pricing_Currency_Code == "CZK") {echo " selected=selected";} ?>><?php _e("Czech Koruna", 'ultimate-appointment-scheduling'); ?></option>
	<option value="DKK" <?php if($Pricing_Currency_Code == "DKK") {echo " selected=selected";} ?>><?php _e("Danish Krone", 'ultimate-appointment-scheduling'); ?></option>
	<option value="EUR" <?php if($Pricing_Currency_Code == "EUR") {echo " selected=selected";} ?>><?php _e("Euro", 'ultimate-appointment-scheduling'); ?></option>
	<option value="HKD" <?php if($Pricing_Currency_Code == "HKD") {echo " selected=selected";} ?>><?php _e("Hong Kong Dollar", 'ultimate-appointment-scheduling'); ?></option>
	<option value="HUF" <?php if($Pricing_Currency_Code == "HUF") {echo " selected=selected";} ?>><?php _e("Hungarian Forint", 'ultimate-appointment-scheduling'); ?></option>
	<option value="ILS" <?php if($Pricing_Currency_Code == "ILS") {echo " selected=selected";} ?>><?php _e("Israeli New Sheqel", 'ultimate-appointment-scheduling'); ?></option>
	<option value="JPY" <?php if($Pricing_Currency_Code == "JPY") {echo " selected=selected";} ?>><?php _e("Japanese Yen", 'ultimate-appointment-scheduling'); ?></option>
	<option value="MYR" <?php if($Pricing_Currency_Code == "MYR") {echo " selected=selected";} ?>><?php _e("Malaysian Ringgit", 'ultimate-appointment-scheduling'); ?></option>
	<option value="MXN" <?php if($Pricing_Currency_Code == "MXN") {echo " selected=selected";} ?>><?php _e("Mexican Peso", 'ultimate-appointment-scheduling'); ?></option>
	<option value="NOK" <?php if($Pricing_Currency_Code == "NOK") {echo " selected=selected";} ?>><?php _e("Norwegian Krone", 'ultimate-appointment-scheduling'); ?></option>
	<option value="NZD" <?php if($Pricing_Currency_Code == "NZD") {echo " selected=selected";} ?>><?php _e("New Zealand Dollar", 'ultimate-appointment-scheduling'); ?></option>
	<option value="PHP" <?php if($Pricing_Currency_Code == "PHP") {echo " selected=selected";} ?>><?php _e("Philippine Peso", 'ultimate-appointment-scheduling'); ?></option>
	<option value="PLN" <?php if($Pricing_Currency_Code == "PLN") {echo " selected=selected";} ?>><?php _e("Polish Zloty", 'ultimate-appointment-scheduling'); ?></option>
	<option value="GBP" <?php if($Pricing_Currency_Code == "GBP") {echo " selected=selected";} ?>><?php _e("Pound Sterling", 'ultimate-appointment-scheduling'); ?></option>
	<option value="RUB" <?php if($Pricing_Currency_Code == "RUB") {echo " selected=selected";} ?>><?php _e("Russian Ruble", 'ultimate-appointment-scheduling'); ?></option>
	<option value="SGD" <?php if($Pricing_Currency_Code == "SGD") {echo " selected=selected";} ?>><?php _e("Singapore Dollar", 'ultimate-appointment-scheduling'); ?></option>
	<option value="SEK" <?php if($Pricing_Currency_Code == "SEK") {echo " selected=selected";} ?>><?php _e("Swedish Krona", 'ultimate-appointment-scheduling'); ?></option>
	<option value="CHF" <?php if($Pricing_Currency_Code == "CHF") {echo " selected=selected";} ?>><?php _e("Swiss Franc", 'ultimate-appointment-scheduling'); ?></option>
	<option value="TWD" <?php if($Pricing_Currency_Code == "TWD") {echo " selected=selected";} ?>><?php _e("Taiwan New Dollar", 'ultimate-appointment-scheduling'); ?></option>
	<option value="THB" <?php if($Pricing_Currency_Code == "THB") {echo " selected=selected";} ?>><?php _e("Thai Baht", 'ultimate-appointment-scheduling'); ?></option>
	<option value="TRY" <?php if($Pricing_Currency_Code == "TRY") {echo " selected=selected";} ?>><?php _e("Turkish Lira", 'ultimate-appointment-scheduling'); ?></option>
	<option value="USD" <?php if($Pricing_Currency_Code == "USD") {echo " selected=selected";} ?>><?php _e("U.S. Dollar", 'ultimate-appointment-scheduling'); ?></option>
	</select></label>
	<p>What currency are your services priced in?</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row">PayPal Email Address</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>PayPal Email Address</span></legend>
	<label title='PayPal Email Address'><input type='text' name='payPal_email_address' value='<?php echo $PayPal_Email_Address; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /></label><br />
	<p>If PayPal payments are required or optional, what email address is associated with the PayPal account?</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row">"Thank You" Page URL</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>"Thank You" Page URL</span></legend>
	<label title='Thank You Page URL'><input type='text' name='thank_you_url' value='<?php echo $Thank_You_URL; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> /></label><br />
	<p>What page should customers be taken to after successfully completing a PayPal payment?</p>
	</fieldset>
</td>
</tr>
<?php if ($EWD_UASP_Full_Version != "Yes") { ?>
	<tr class="ewd-uasp-premium-options-table-overlay">
		<th colspan="2">
			<div class="ewd-uasp-unlock-premium">
				<img src="<?php echo plugins_url( '../images/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Appointment Scheduling Premium">
				<p>Access this section by by upgrading to premium</p>
				<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" class="ewd-uasp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
			</div>
		</th>
	</tr>
<?php } ?>
</table>
</div>

<div id='Emails' class='uasp-option-set<?php echo ( $Display_Tab == 'Emails' ? '' : ' uasp-hidden' ); ?>'>
<h2 id='label-order-options' class='uasp-options-page-tab-title'>Email Options</h2>

<br />

<div class="ewd-uasp-admin-section-heading"><?php _e('Email Messages', 'ultimate-appointment-scheduling'); ?></div>

<table class="form-table ewd-uasp-premium-options-table">
<tr>
	<td colspan="2">
		<fieldset><legend class="screen-reader-text"><span>Email Messages</span></legend>
		<table id='ewd-uasp-email-messages-table'>
			<tr>
				<th class="ewd-uasp-admin-no-info-button">Email Name</th>
				<th class="ewd-uasp-admin-no-info-button">Message Subject</th>
				<th class="ewd-uasp-admin-no-info-button">Message</th>
				<th class="ewd-uasp-admin-no-info-button"></th>
			</tr>
			<?php
				$Counter = 0;
				$Max_ID = 0;
				foreach ($Email_Messages_Array as $Email_Message_Item) {
					echo "<tr id='ewd-uasp-email-message-" . $Counter . "'>";
						echo "<td><input class='ewd-uasp-array-text-input' type='text' name='Email_Message_" . $Counter . "_Name' value='" . $Email_Message_Item['Name']. "'/></td>";
						echo "<td><input class='ewd-uasp-array-text-input' type='text' name='Email_Message_" . $Counter . "_Subject' value='" . $Email_Message_Item['Subject']. "'/></td>";
						echo "<td><textarea class='ewd-uasp-array-textarea' name='Email_Message_" . $Counter . "_Body' rows='5'>" . stripslashes($Email_Message_Item['Message']) . "</textarea></td>";
						echo "<td><input type='hidden' name='Email_Message_" . $Counter . "_ID' value='" . $Email_Message_Item['ID'] . "' /><a class='ewd-uasp-delete-message' data-messagecounter='" . $Counter . "'>Delete</a></td>";
					echo "</tr>";
					$Counter++;
					$Max_ID = max($Max_ID, $Email_Message_Item['ID']);
				}
				$Max_ID++;
				echo "<tr><td colspan='3'><a class='ewd-uasp-add-email ewd-uasp-new-admin-add-button' data-nextcounter='" . $Counter . "' data-maxid='" . $Max_ID . "'>&plus; " . __('ADD', 'ultimate-appointment-scheduling') . "</a></td></tr>";
			?>
		</table>
		<ul>
			<li>Use the table above to build emails for your users.</li>
			<li>You can use [section]...[/section] and [footer]...[/footer] to split up the content of your email. You can also include a link button, like so: [button link='LINK_URL_GOES_HERE']BUTTON_TEXT[/button]</li>
			<li>You can also put [appointment-time], [client], [phone], [email], [location], [service], [service-provider] or [confirmation-link] (if "Appointment Confirmation" is enabled) into the message body or subject.</li>
			<li>Use the area at the bottom of the page to send yourself a sample email.</li>
		</ul>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">Send Sample Email</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Send Sample Email</span></legend>
			<div class="ewd-uasp-send-sample-email-labels">Select Email:</div>
			<select class='ewd-uasp-email-selector'>
				<?php foreach ($Email_Messages_Array as $Email_Message_Item) { ?>
					<option value="<?php echo $Email_Message_Item['ID']; ?>"><?php echo $Email_Message_Item['Name']; ?></option>
				<?php } ?>
			</select><br/>
			<div class="ewd-uasp-send-sample-email-labels">Email Address:</div>
			<input type='text' class='ewd-uasp-test-email-address' />
			<button type='button' class='ewd-uasp-send-test-email'>Send Sample Email</button>
			<p>Make sure that you click the "Save Changes" button below before sending the test message, to receive the most recent version of your email.</p>
		</fieldset>
	</td>
</tr>
<?php if ($EWD_UASP_Full_Version != "Yes") { ?>
	<tr class="ewd-uasp-premium-options-table-overlay">
		<th colspan="2">
			<div class="ewd-uasp-unlock-premium">
				<img src="<?php echo plugins_url( '../images/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Appointment Scheduling Premium">
				<p>Access this section by by upgrading to premium</p>
				<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" class="ewd-uasp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
			</div>
		</th>
	</tr>
<?php } ?>
</table>

<br />

<div class="ewd-uasp-admin-section-heading"><?php _e('Reminder Email Styling', 'ultimate-appointment-scheduling'); ?></div>

<div class="ewd-uasp-admin-styling-section">
	<div class="ewd-uasp-admin-styling-subsection">
		<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Email', 'ultimate-appointment-scheduling'); ?></div>
		<div class="ewd-uasp-admin-styling-subsection-content">
			<div class="ewd-uasp-admin-styling-subsection-content-each">
				<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Colors', 'ultimate-appointment-scheduling'); ?></div>
				<div class="ewd-uasp-admin-styling-subsection-content-right">
					<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Background', 'ultimate-appointment-scheduling'); ?></div>
						<input type='text' class='uasp-spectrum' name='email_reminder_background_color' value='<?php echo $Email_Reminder_Background_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
					<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Inner Background', 'ultimate-appointment-scheduling'); ?></div>
						<input type='text' class='uasp-spectrum' name='email_reminder_inner_color' value='<?php echo $Email_Reminder_Inner_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
					<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Text', 'ultimate-appointment-scheduling'); ?></div>
						<input type='text' class='uasp-spectrum' name='email_reminder_text_color' value='<?php echo $Email_Reminder_Text_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="ewd-uasp-admin-styling-subsection">
		<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Button', 'ultimate-appointment-scheduling'); ?></div>
		<div class="ewd-uasp-admin-styling-subsection-content">
			<div class="ewd-uasp-admin-styling-subsection-content-each">
				<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Colors', 'ultimate-appointment-scheduling'); ?></div>
				<div class="ewd-uasp-admin-styling-subsection-content-right">
					<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Background', 'ultimate-appointment-scheduling'); ?></div>
						<input type='text' class='uasp-spectrum' name='email_reminder_button_background_color' value='<?php echo $Email_Reminder_Button_Background_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
					<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Text', 'ultimate-appointment-scheduling'); ?></div>
						<input type='text' class='uasp-spectrum' name='email_reminder_button_text_color' value='<?php echo $Email_Reminder_Button_Text_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
			<div class="ewd-uasp-admin-styling-subsection-content-each">
				<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Hover Colors', 'ultimate-appointment-scheduling'); ?></div>
				<div class="ewd-uasp-admin-styling-subsection-content-right">
					<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Background', 'ultimate-appointment-scheduling'); ?></div>
						<input type='text' class='uasp-spectrum' name='email_reminder_button_background_hover_color' value='<?php echo $Email_Reminder_Button_Background_Hover_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
					<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Text', 'ultimate-appointment-scheduling'); ?></div>
						<input type='text' class='uasp-spectrum' name='email_reminder_button_text_hover_color' value='<?php echo $Email_Reminder_Button_Text_Hover_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if ($EWD_UASP_Full_Version != "Yes") { ?>
		<div class="ewd-uasp-premium-options-table-overlay">
			<div class="ewd-uasp-unlock-premium">
				<img src="<?php echo plugins_url( '../images/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Appointment Scheduling Premium">
				<p>Access this section by by upgrading to premium</p>
				<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" class="ewd-uasp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
			</div>
		</div>
	<?php } ?>
</div>

</div>

<!-- Labelling -->
<div id='Labelling' class='uasp-option-set<?php echo ( $Display_Tab == 'Labelling' ? '' : ' uasp-hidden' ); ?>'>

	<br />

	<div class="ewd-uasp-admin-section-heading"><?php _e('Labelling Options', 'ultimate-appointment-scheduling'); ?></div>

	<div class="ewd-uasp-admin-styling-section">
		<div class="ewd-uasp-admin-styling-subsection" style="padding-bottom: 20px;">
			<h3 style="margin-top: 0"><?php _e('Sign Up', 'ultimate-appointment-scheduling'); ?></h3>
			<p>Replace the default text in the sign-up area</p>
			<div class="ewd-admin-labelling-section">
				<label>
					<p><?php _e("'Sign Up' Title", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='sign_up_title_label' value='<?php echo $Sign_Up_Title_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/>
				</label>
				<label>
					<p><?php _e("Name", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='name_label' value='<?php echo $Name_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/>
				</label>
				<label>
					<p><?php _e("Phone", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='phone_label' value='<?php echo $Phone_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/>
				</label>
				<label>
					<p><?php _e("Email", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='email_label' value='<?php echo $Email_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
				</label>
			</div>
		</div>
		<div class="ewd-uasp-admin-styling-subsection" style="padding-bottom: 20px;">
			<h3 style="margin-top: 0"><?php _e('Service', 'ultimate-appointment-scheduling'); ?></h3>
			<p>Replace the default text in service area</p>
			<div class="ewd-admin-labelling-section">
				<label>
					<p><?php _e("'Service' Title", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='service_title_label' value='<?php echo $Service_Title_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/>
				</label>
				<label>
					<p><?php _e("Location", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='location_label' value='<?php echo $Location_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/>
				</label>
				<label>
					<p><?php _e("Service", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='service_label' value='<?php echo $Service_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/>
				</label>
				<label>
					<p><?php _e("Service Provider", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='service_provider_label' value='<?php echo $Service_Provider_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/>
				</label>
				<label>
					<p><?php _e("'Any' (Service Provider)", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='service_provider_any_label' value='<?php echo $Service_Provider_Any_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/>
				</label>
			</div>
		</div>
		<div class="ewd-uasp-admin-styling-subsection">
			<h3 style="margin-top: 0"><?php _e('Appointment', 'ultimate-appointment-scheduling'); ?></h3>
			<p>Replace the default text in the appointment area</p>
			<div class="ewd-admin-labelling-section">
				<label>
					<p><?php _e("'Appointment' Title", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='appointment_title_label' value='<?php echo $Appointment_Title_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/>
				</label>
				<label>
					<p><?php _e("Appointment Date", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='appointment_date_label' value='<?php echo $Appointment_Date_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/> 
				</label>
				<label>
					<p><?php _e("Find Appointments", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='find_appointments_label' value='<?php echo $Find_Appointments_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/> 
				</label>
				<label>
					<p><?php _e("Book Appointment", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='book_appointment_label' value='<?php echo $Book_Appointment_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/> 
				</label>
				<label>
					<p><?php _e("Pay in Advance", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='pay_in_advance_label' value='<?php echo $Pay_In_Advance_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/> 
				</label>
				<label>
					<p><?php _e("Proceed to Payment", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='proceed_to_payment_label' value='<?php echo $Proceed_To_Payment_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/> 
				</label>
				<label>
					<p><?php _e("Select Time", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='select_time_label' value='<?php echo $Select_Time_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/> 
				</label>
				<label>
					<p><?php _e("Click here to select a date", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='click_select_date_label' value='<?php echo $Click_Select_Date_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/> 
				</label>
				<label>
					<p><?php _e("Image Number", 'ultimate-appointment-scheduling')?></p>
					<input type='text' name='image_number_label' value='<?php echo $Image_Number_Label; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>/> 
				</label>
			</div>
		</div>
		<?php if ($EWD_UASP_Full_Version != "Yes") { ?>
			<div class="ewd-uasp-premium-options-table-overlay">
				<div class="ewd-uasp-unlock-premium">
					<img src="<?php echo plugins_url( '../images/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Appointment Scheduling Premium">
					<p>Access this section by by upgrading to premium</p>
					<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" class="ewd-uasp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
				</div>
			</div>
		<?php } ?>
	</div>

</div>


<!-- Styling -->
<div id='Styling' class='uasp-option-set<?php echo ( $Display_Tab == 'Styling' ? '' : ' uasp-hidden' ); ?>'>
	<h2 id='label-order-options' class='uasp-options-page-tab-title'>Styling Options</h2>

	<br />

	<div class="ewd-uasp-admin-section-heading"><?php _e('Sign Up Form', 'ultimate-appointment-scheduling'); ?></div>

	<div class="ewd-uasp-admin-styling-section">
		<div class="ewd-uasp-admin-styling-subsection">
			<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Title', 'ultimate-appointment-scheduling'); ?></div>
			<div class="ewd-uasp-admin-styling-subsection-content">
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Color', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
							<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"></div>
							<input type='text' class='uasp-spectrum' name='uasp_signup_title_font_color' value='<?php echo $UASP_Signup_Title_Font_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
						</div>
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Family', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_signup_title_font' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Signup_Title_Font; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Size', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_signup_title_font_size' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Signup_Title_Font_Size; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
		</div>
		<div class="ewd-uasp-admin-styling-subsection">
			<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Label', 'ultimate-appointment-scheduling'); ?></div>
			<div class="ewd-uasp-admin-styling-subsection-content">
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Family', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_signup_label_font' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Signup_Label_Font; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Size', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_signup_label_font_size' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Signup_Label_Font_Size; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
		</div>
		<div class="ewd-uasp-admin-styling-subsection">
			<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Block', 'ultimate-appointment-scheduling'); ?></div>
			<div class="ewd-uasp-admin-styling-subsection-content">
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Color', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
							<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"></div>
							<input type='text' class='uasp-spectrum' name='uasp_signup_block_color' value='<?php echo $UASP_Signup_Block_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
						</div>
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Margin', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_signup_block_margin' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Signup_Block_Margin; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Padding', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_signup_block_padding' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Signup_Block_Padding; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
		</div>
		<?php if ($EWD_UASP_Full_Version != "Yes") { ?>
			<div class="ewd-uasp-premium-options-table-overlay">
				<div class="ewd-uasp-unlock-premium">
					<img src="<?php echo plugins_url( '../images/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Appointment Scheduling Premium">
					<p>Access this section by by upgrading to premium</p>
					<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" class="ewd-uasp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
				</div>
			</div>
		<?php } ?>
	</div>

	<br />

	<div class="ewd-uasp-admin-section-heading"><?php _e('Choose Service Form', 'ultimate-appointment-scheduling'); ?></div>

	<div class="ewd-uasp-admin-styling-section">
		<div class="ewd-uasp-admin-styling-subsection">
			<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Title', 'ultimate-appointment-scheduling'); ?></div>
			<div class="ewd-uasp-admin-styling-subsection-content">
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Color', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
							<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"></div>
							<input type='text' class='uasp-spectrum' name='uasp_service_title_font_color' value='<?php echo $UASP_Service_Title_Font_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
						</div>
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Family', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_service_title_font' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Service_Title_Font; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Size', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_service_title_font_size' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Service_Title_Font_Size; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
		</div>
		<div class="ewd-uasp-admin-styling-subsection">
			<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Label', 'ultimate-appointment-scheduling'); ?></div>
			<div class="ewd-uasp-admin-styling-subsection-content">
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Family', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_service_label_font' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Service_Label_Font; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Size', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_service_label_font_size' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Service_Label_Font_Size; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
		</div>
		<div class="ewd-uasp-admin-styling-subsection">
			<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Block', 'ultimate-appointment-scheduling'); ?></div>
			<div class="ewd-uasp-admin-styling-subsection-content">
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Color', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
							<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"></div>
							<input type='text' class='uasp-spectrum' name='uasp_service_block_color' value='<?php echo $UASP_Service_Block_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
						</div>
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Margin', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_service_block_margin' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Service_Block_Margin; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Padding', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_service_block_padding' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Service_Block_Padding; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
		</div>
		<?php if ($EWD_UASP_Full_Version != "Yes") { ?>
			<div class="ewd-uasp-premium-options-table-overlay">
				<div class="ewd-uasp-unlock-premium">
					<img src="<?php echo plugins_url( '../images/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Appointment Scheduling Premium">
					<p>Access this section by by upgrading to premium</p>
					<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" class="ewd-uasp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
				</div>
			</div>
		<?php } ?>
	</div>

	<br />

	<div class="ewd-uasp-admin-section-heading"><?php _e('Find Appointment Form', 'ultimate-appointment-scheduling'); ?></div>

	<div class="ewd-uasp-admin-styling-section">
		<div class="ewd-uasp-admin-styling-subsection">
			<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Title', 'ultimate-appointment-scheduling'); ?></div>
			<div class="ewd-uasp-admin-styling-subsection-content">
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Color', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
							<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"></div>
							<input type='text' class='uasp-spectrum' name='uasp_appointment_title_font_color' value='<?php echo $UASP_Appointment_Title_Font_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
						</div>
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Family', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_appointment_title_font' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Appointment_Title_Font; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Size', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_appointment_title_font_size' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Appointment_Title_Font_Size; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
		</div>
		<div class="ewd-uasp-admin-styling-subsection">
			<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Label', 'ultimate-appointment-scheduling'); ?></div>
			<div class="ewd-uasp-admin-styling-subsection-content">
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Family', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_appointment_label_font' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Appointment_Label_Font; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Size', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_appointment_label_font_size' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Appointment_Label_Font_Size; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
		</div>
		<div class="ewd-uasp-admin-styling-subsection">
			<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Block', 'ultimate-appointment-scheduling'); ?></div>
			<div class="ewd-uasp-admin-styling-subsection-content">
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Color', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
							<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"></div>
							<input type='text' class='uasp-spectrum' name='uasp_appointment_block_color' value='<?php echo $UASP_Appointment_Block_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
						</div>
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Margin', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_appointment_block_margin' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Appointment_Block_Margin; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Padding', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_appointment_block_padding' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Appointment_Block_Padding; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
		</div>
		<?php if ($EWD_UASP_Full_Version != "Yes") { ?>
			<div class="ewd-uasp-premium-options-table-overlay">
				<div class="ewd-uasp-unlock-premium">
					<img src="<?php echo plugins_url( '../images/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Appointment Scheduling Premium">
					<p>Access this section by by upgrading to premium</p>
					<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" class="ewd-uasp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
				</div>
			</div>
		<?php } ?>
	</div>

	<br />

	<div class="ewd-uasp-admin-section-heading"><?php _e('Calendar Styling', 'ultimate-appointment-scheduling'); ?></div>

	<div class="ewd-uasp-admin-styling-section">
		<div class="ewd-uasp-admin-styling-subsection">
			<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Colors', 'ultimate-appointment-scheduling'); ?></div>
			<div class="ewd-uasp-admin-styling-subsection-content">
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Appointment Colors', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
							<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Font', 'ultimate-appointment-scheduling'); ?></div>
							<input type='text' class='uasp-spectrum' name='calendar_appointment_color' value='<?php echo $Calendar_Appointment_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
						</div>
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
							<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Background', 'ultimate-appointment-scheduling'); ?></div>
							<input type='text' class='uasp-spectrum' name='calendar_appointment_background_color' value='<?php echo $Calendar_Appointment_Background_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
						</div>
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
							<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Border', 'ultimate-appointment-scheduling'); ?></div>
							<input type='text' class='uasp-spectrum' name='calendar_appointment_border_color' value='<?php echo $Calendar_Appointment_Border_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
						</div>
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Selected Appointment Colors', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
							<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Background', 'ultimate-appointment-scheduling'); ?></div>
							<input type='text' class='uasp-spectrum' name='calendar_selected_appointment_background_color' value='<?php echo $Calendar_Selected_Appointment_Background_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
						</div>
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
							<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Border', 'ultimate-appointment-scheduling'); ?></div>
							<input type='text' class='uasp-spectrum' name='calendar_selected_appointment_border_color' value='<?php echo $Calendar_Selected_Appointment_Border_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="ewd-uasp-admin-styling-subsection">
			<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Appointment Font', 'ultimate-appointment-scheduling'); ?></div>
			<div class="ewd-uasp-admin-styling-subsection-content">
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Family', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='calendar_appointment_font_family' class='ewd-uasp-admin-font-size' value='<?php echo $Calendar_Appointment_Font_Family; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Size', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='calendar_appointment_font_size' class='ewd-uasp-admin-font-size' value='<?php echo $Calendar_Appointment_Font_Size; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
		</div>
		<?php if ($EWD_UASP_Full_Version != "Yes") { ?>
			<div class="ewd-uasp-premium-options-table-overlay">
				<div class="ewd-uasp-unlock-premium">
					<img src="<?php echo plugins_url( '../images/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Appointment Scheduling Premium">
					<p>Access this section by by upgrading to premium</p>
					<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" class="ewd-uasp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
				</div>
			</div>
		<?php } ?>
	</div>

	<br />

	<div class="ewd-uasp-admin-section-heading"><?php _e('Button Styling', 'ultimate-appointment-scheduling'); ?></div>

	<div class="ewd-uasp-admin-styling-section">
		<div class="ewd-uasp-admin-styling-subsection">
			<div class="ewd-uasp-admin-styling-subsection-label"><?php _e('Button', 'ultimate-appointment-scheduling'); ?></div>
			<div class="ewd-uasp-admin-styling-subsection-content">
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Colors', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
							<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Text', 'ultimate-appointment-scheduling'); ?></div>
							<input type='text' class='uasp-spectrum' name='uasp_button_font_color' value='<?php echo $UASP_Button_Font_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
						</div>
						<div class="ewd-uasp-admin-styling-subsection-content-color-picker">
							<div class="ewd-uasp-admin-styling-subsection-content-color-picker-label"><?php _e('Background', 'ultimate-appointment-scheduling'); ?></div>
							<input type='text' class='uasp-spectrum' name='uasp_button_color' value='<?php echo $UASP_Button_Color; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
						</div>
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Family', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_button_font' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Button_Font; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Font Size', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_button_font_size' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Button_Font_Size; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Margin', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_button_margin' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Button_Margin; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
				<div class="ewd-uasp-admin-styling-subsection-content-each">
					<div class="ewd-uasp-admin-styling-subsection-content-label"><?php _e('Padding', 'ultimate-appointment-scheduling'); ?></div>
					<div class="ewd-uasp-admin-styling-subsection-content-right">
						<input type='text' name='uasp_button_padding' class='ewd-uasp-admin-font-size' value='<?php echo $UASP_Button_Padding; ?>' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?> />
					</div>
				</div>
			</div>
		</div>
		<?php if ($EWD_UASP_Full_Version != "Yes") { ?>
			<div class="ewd-uasp-premium-options-table-overlay">
				<div class="ewd-uasp-unlock-premium">
					<img src="<?php echo plugins_url( '../images/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Appointment Scheduling Premium">
					<p>Access this section by by upgrading to premium</p>
					<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" class="ewd-uasp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
				</div>
			</div>
		<?php } ?>
	</div>

</div>
	
<?php /*<h3>Premium Options</h3>
<table class="form-table">
<tr>
<th scope="row">Set Access Role</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Set Access Role</span></legend>
	<label title='Access Role'></label><select name='access_role' <?php if ($EWD_UASP_Full_Version != "Yes") {echo "disabled";} ?>> 
		<option value="administrator"<?php if($Access_Role == "administrator") {echo " selected=selected";} ?>>Administrator</option>
		<option value="delete_others_pages"<?php if($Access_Role == "delete_others_pages") {echo " selected=selected";} ?>>Editor</option>
		<option value="delete_published_posts"<?php if($Access_Role == "delete_published_posts") {echo " selected=selected";} ?>>Author</option>
		<option value="delete_posts"<?php if($Access_Role == "delete_posts") {echo " selected=selected";} ?>>Contributor</option>
		<option value="read"<?php if($Access_Role == "read") {echo " selected=selected";} ?>>Subscriber</option>
	</select>
	<p>How often should emails be sent to customers about the status of their orders?</p>
	</fieldset>
</td>
</tr>
</table>

*/ ?>


<p class="submit"><input type="submit" name="Options_Submit" id="submit" class="button button-primary" value="Save Changes"  /></p></form>
</div>
</div>

<?php

function EWD_UASP_Get_Reminder_Number($Reminder) {
	if (($Reminder['SecondsBeforeAppointment']/(60*60*24)) > 1) {return ($Reminder['SecondsBeforeAppointment']/(60*60*24));}
	if (($Reminder['SecondsBeforeAppointment']/(60*60)) > 1) {return ($Reminder['SecondsBeforeAppointment']/(60*60));}
	else {return ($Reminder['SecondsBeforeAppointment']/(60));}
}

function EWD_UASP_Get_Reminder_Unit($Reminder) {
	if (($Reminder['SecondsBeforeAppointment']/(60*60*24)) > 1) {return "Days";}
	if (($Reminder['SecondsBeforeAppointment']/(60*60)) > 1) {return "Hours";}
	else {return "Minutes";}
}
?>