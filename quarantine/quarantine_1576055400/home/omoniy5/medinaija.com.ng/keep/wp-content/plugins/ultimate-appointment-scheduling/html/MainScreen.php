<div class="EWD_UASP_Menu">
	<h2 class="nav-tab-wrapper">
		<a id="ewd-uasp-dash-mobile-menu-open" href="#" class="MenuTab nav-tab"><?php _e("MENU", 'front-end-only-users'); ?><span id="ewd-uasp-dash-mobile-menu-down-caret">&nbsp;&nbsp;&#9660;</span><span id="ewd-uasp-dash-mobile-menu-up-caret">&nbsp;&nbsp;&#9650;</span></a>
		<a id="Dashboard_Menu" class="MenuTab nav-tab <?php if ($Display_Page == '' or $Display_Page == 'Dashboard') {echo 'nav-tab-active';}?>" onclick="ShowTab('Dashboard');"><?php _e("Dashboard", 'ultimate-appointment-scheduling'); ?></a>
		<a id="Appointments_Menu" class="MenuTab nav-tab <?php if ($Display_Page == 'Appointments') {echo 'nav-tab-active';}?>" onclick="ShowTab('Appointments');"><?php _e("Appointments", 'ultimate-appointment-scheduling'); ?></a>
		<a id="Locations_Menu" class="MenuTab nav-tab <?php if ($Display_Page == 'Locations') {echo 'nav-tab-active';}?>" onclick="ShowTab('Locations');"><?php _e("Locations", 'ultimate-appointment-scheduling'); ?></a>
		<a id="Services_Menu" class="MenuTab nav-tab <?php if ($Display_Page == 'Services') {echo 'nav-tab-active';}?>" onclick="ShowTab('Services');"><?php _e("Services", 'ultimate-appointment-scheduling'); ?></a>
		<a id="Providers_Menu" class="MenuTab nav-tab <?php if ($Display_Page == 'ServiceProviders') {echo 'nav-tab-active';}?>" onclick="ShowTab('Providers');"><?php _e("Providers", 'ultimate-appointment-scheduling'); ?></a>
		<a id="Exceptions_Menu" class="MenuTab nav-tab <?php if ($Display_Page == 'Exceptions') {echo 'nav-tab-active';}?>" onclick="ShowTab('Exceptions');"><?php _e("Exceptions", 'ultimate-appointment-scheduling'); ?></a>
		<a id="Fields_Menu" class="MenuTab nav-tab <?php if ($Display_Page == 'CustomFields') {echo 'nav-tab-active';}?>" onclick="ShowTab('Fields');"><?php _e("Custom Fields", 'ultimate-appointment-scheduling'); ?></a>
		<a id="Settings_Menu" class="MenuTab nav-tab <?php if ($Display_Page == 'Settings') {echo 'nav-tab-active';}?>" onclick="ShowTab('Settings');"><?php _e("Options", 'ultimate-appointment-scheduling'); ?></a>
	</h2>
</div>

<div class="clear"></div>

<!-- Add the individual pages to the admin area, and create the active tab based on the selected page -->
<div class="OptionTab <?php if ($Display_Page == "" or $Display_Page == 'Dashboard') {echo 'ActiveTab';} else {echo 'HiddenTab';} ?>" id="Dashboard">
	<?php include( plugin_dir_path( __FILE__ ) . 'DashboardPage.php'); ?>
</div>

<div class="OptionTab <?php if ($Display_Page == 'Appointment' or $Display_Page == 'Appointments') {echo 'ActiveTab';} else {echo 'HiddenTab';} ?>" id="Appointments">
	<?php include( plugin_dir_path( __FILE__ ) . 'AppointmentsPage.php'); ?>
</div>	

<div class="OptionTab <?php if ($Display_Page == 'Location'or $Display_Page == 'Locations') {echo 'ActiveTab';} else {echo 'HiddenTab';} ?>" id="Locations">
	<?php include( plugin_dir_path( __FILE__ ) . 'LocationsPage.php'); ?>
</div>	

<div class="OptionTab <?php if ($Display_Page == 'Service'or $Display_Page == 'Services') {echo 'ActiveTab';} else {echo 'HiddenTab';} ?>" id="Services">
	<?php include( plugin_dir_path( __FILE__ ) . 'ServicesPage.php'); ?>
</div>	

<div class="OptionTab <?php if ($Display_Page == 'ServiceProvider' or $Display_Page == 'ServiceProviders') {echo 'ActiveTab';} else {echo 'HiddenTab';} ?>" id="Providers">
	<?php include( plugin_dir_path( __FILE__ ) . 'ServiceProvidersPage.php'); ?>
</div>

<div class="OptionTab <?php if ($Display_Page == 'Exception' or $Display_Page == 'Exceptions') {echo 'ActiveTab';} else {echo 'HiddenTab';} ?>" id="Exceptions">
	<?php include( plugin_dir_path( __FILE__ ) . 'ExceptionsPage.php'); ?>
</div>

<div class="OptionTab <?php if ($Display_Page == 'Field' or $Display_Page == 'Fields' or $Display_Page == 'CustomField' or $Display_Page == 'CustomFields') {echo 'ActiveTab';} else {echo 'HiddenTab';} ?>" id="Fields">
	<?php include( plugin_dir_path( __FILE__ ) . 'CustomFieldsPage.php'); ?>
</div>	

<div class="OptionTab <?php if ($Display_Page == 'Setting' or $Display_Page == 'Settings') {echo 'ActiveTab';} else {echo 'HiddenTab';} ?>" id="Settings">
	<?php include( plugin_dir_path( __FILE__ ) . 'SettingsPage.php'); ?>
</div>		