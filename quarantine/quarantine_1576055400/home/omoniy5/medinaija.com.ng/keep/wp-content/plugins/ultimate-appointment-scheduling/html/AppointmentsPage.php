<?php $Hours_Format = get_option("EWD_UASP_Hours_Format"); ?>

<!-- List of the appointments which have already been created -->
<div id="col-right" class="ewd-uasp-admin-products-table-full">
<div class="col-wrap">

<div class="ewd-uasp-admin-new-product-page-top-part">
	<div class="ewd-uasp-admin-new-product-page-top-part-left">
		<h3 class="ewd-uasp-admin-new-tab-headings"><?php _e('Add New Appointment', 'ultimate-appointment-scheduling'); ?></h3>	
		<div class="ewd-uasp-admin-add-new-product-buttons-area">
			<a href="admin.php?page=EWD-UASP-options&Action=EWD_UASP_AddAppointmentPage" class="button-primary ewd-uasp-admin-add-new-product-button" id="ewd-uasp-admin-manually-add-product-button"><?php _e('Manually', 'ultimate-appointment-scheduling'); ?></a>
			<div class="button-primary ewd-uasp-admin-add-new-product-button" id="ewd-uasp-admin-add-by-spreadsheet-button"><?php _e('From Spreadsheet', 'ultimate-appointment-scheduling'); ?></div>
		</div>
	</div>
	<div class="ewd-uasp-admin-new-product-page-top-part-right">
		<h3 class="ewd-uasp-admin-new-tab-headings"><?php _e('Export Appointments to Spreasheet', 'ultimate-appointment-scheduling'); ?></h3>	
		<div class="ewd-uasp-admin-export-buttons-area">
			<?php if($EWD_UASP_Full_Version == 'Yes'){ ?>
				<form method="post" action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_ExportToExcel">
					<input type="submit" name="Export_Submit" class="button button-primary ewd-uasp-admin-export-button" value="<?php _e('Export to Excel', 'ultimate-appointment-scheduling'); ?>"  />
				</form>
			<?php } else{
				_e("The full version of the Ultimate Appointment Scheduling plugin is required to export products.", 'ultimate-appointment-scheduling'); ?><br /><a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" target="_blank"><?php _e("Please upgrade to unlock this feature!", 'ultimate-appointment-scheduling'); ?></a>
			<?php } ?>
		</div>
	</div>
</div>

<?php wp_nonce_field(); ?>
<?php wp_referer_field(); ?>

<?php 

			$user = get_current_user_id();
			$screen = get_current_screen();
			$screen_option = $screen->get_option('per_page', 'option');
			$per_page = get_user_meta($user, $screen_option, true);

			if (empty($per_page) or is_array($per_page) or $per_page < 1 ) {
				$per_page = $screen->get_option('per_page', 'default');
			}

			if (isset($_GET['Page'])) {$Page = $_GET['Page'];}
			else {$Page = 1;}
			
			$Sql = "SELECT * FROM $ewd_usap_appointments_table_name appts WHERE 1=1 ";
				if (isset($_REQUEST['EWD_UASP_Locations_Filter']) and $_REQUEST['EWD_UASP_Locations_Filter'] != "All") {$Sql .= " AND Location_Post_ID='" . $_REQUEST['EWD_UASP_Locations_Filter'] . "'";}
				if (isset($_REQUEST['EWD_UASP_Services_Filter']) and $_REQUEST['EWD_UASP_Services_Filter'] != "All") {$Sql .= " AND Service_Post_ID='" . $_REQUEST['EWD_UASP_Services_Filter'] . "'";}
				if (isset($_REQUEST['EWD_UASP_Providers_Filter']) and $_REQUEST['EWD_UASP_Providers_Filter'] != "All") {$Sql .= " AND Service_Provider_Post_ID='" . $_REQUEST['EWD_UASP_Providers_Filter'] . "'";}
				if (isset($_GET['OrderBy']) and $_GET['DisplayPage'] == "Appointments") {
					if ($_GET['OrderBy'] != 'Appointment_Count') {$Sql .= "ORDER BY " . $_GET['OrderBy'] . " " . $_GET['Order'] . " ";}
					else {
						$Sql .= "JOIN (SELECT Appointment_Client_Email, COUNT(*) AS cnt FROM $ewd_usap_appointments_table_name GROUP BY Appointment_Client_Email) appts2 ON (appts2.Appointment_Client_Email = appts.Appointment_Client_Email) ORDER BY appts2.cnt " . $_GET['Order'] . " ";
					}
				}
				else {$Sql .= "ORDER BY Appointment_Start ";}
				$Sql .= "LIMIT " . (($Page - 1) * $per_page) . "," . $per_page;
				$myrows = $wpdb->get_results($Sql);
				$TotalAppointments = $wpdb->get_results("SELECT Appointment_ID FROM $ewd_usap_appointments_table_name");
				$num_rows = $wpdb->num_rows; 
				$number_of_rows = COUNT($myrows);
				$Number_of_Pages = ceil($num_rows/$per_page);
				$Current_Page_With_Order_By = "admin.php?page=EWD-UASP-options&DisplayPage=Appointments";
				if (isset($_GET['OrderBy'])) {$Current_Page_With_Order_By .= "&OrderBy=" .$_GET['OrderBy'] . "&Order=" . $_GET['Order'];}
				if (isset($_REQUEST['EWD_UASP_Locations_Filter']) and $_REQUEST['EWD_UASP_Locations_Filter'] != "All") {$Current_Page_With_Filters .= $Current_Page_With_Order_By . "&EWD_UASP_Locations_Filter=" . sanitize_text_field($_REQUEST['EWD_UASP_Locations_Filter']);}
				else {$Current_Page_With_Filters = $Current_Page_With_Order_By;}
				if (isset($_REQUEST['EWD_UASP_Services_Filter']) and $_REQUEST['EWD_UASP_Services_Filter'] != "All") {$Current_Page_With_Filters .= $Current_Page_With_Order_By . "&EWD_UASP_Services_Filter=" . sanitize_text_field($_REQUEST['EWD_UASP_Services_Filter']);}
				else {$Current_Page_With_Filters = $Current_Page_With_Order_By;}
				if (isset($_REQUEST['EWD_UASP_Providers_Filter']) and $_REQUEST['EWD_UASP_Providers_Filter'] != "All") {$Current_Page_With_Filters .= $Current_Page_With_Order_By . "&EWD_UASP_Providers_Filter=" . sanitize_text_field($_REQUEST['EWD_UASP_Providers_Filter']);}
				else {$Current_Page_With_Filters = $Current_Page_With_Order_By;}




		$Appointment_Locations = $wpdb->get_results("SELECT * FROM $ewd_usap_appointments_table_name GROUP BY Location_Post_ID");
		$Appointment_Services = $wpdb->get_results("SELECT * FROM $ewd_usap_appointments_table_name GROUP BY Service_Post_ID");
		$Appointment_Providers = $wpdb->get_results("SELECT * FROM $ewd_usap_appointments_table_name GROUP BY Service_Provider_Post_ID");
		$Display_Fields = $wpdb->get_results("SELECT Field_ID, Field_Name, Field_Slug FROM $ewd_uasp_fields_table_name WHERE Field_Display='Yes'");
		?>

		<div class="alignleft actions">
			<form action="<?php echo $Current_Page_With_Filters; ?>" method="post">
				<select name='EWD_UASP_Locations_Filter'>
					<option value='All'><?php _e("All Locations", 'ultimate-appointment-scheduling'); ?></option>
					<?php
						if (!isset($_REQUEST['EWD_UASP_Locations_Filter'])){$_REQUEST['EWD_UASP_Locations_Filter'] = "";}
						foreach ($Appointment_Locations as $Appointment_Location) {
							echo "<option value='" . $Appointment_Location->Location_Post_ID . "' ";
							if ($_REQUEST['EWD_UASP_Locations_Filter'] == $Appointment_Location->Location_Post_ID) {echo "selected=selected";}
							echo ">" . $Appointment_Location->Location_Name . "</option>";
						}
					?>
				</select>
				<select name='EWD_UASP_Services_Filter'>
					<option value='All'><?php _e("All Services", 'ultimate-appointment-scheduling'); ?></option>
					<?php
						if (!isset($_REQUEST['EWD_UASP_Services_Filter'])){$_REQUEST['EWD_UASP_Services_Filter'] = "";}
						foreach ($Appointment_Services as $Appointment_Service) {
							echo "<option value='" . $Appointment_Service->Service_Post_ID . "' ";
							if ($_REQUEST['EWD_UASP_Services_Filter'] == $Appointment_Service->Service_Post_ID) {echo "selected=selected";}
							echo ">" . $Appointment_Service->Service_Name . "</option>";
						}
					?>
				</select>
				<select name='EWD_UASP_Providers_Filter'>
					<option value='All'><?php _e("All Providers", 'ultimate-appointment-scheduling'); ?></option>
					<?php
						if (!isset($_REQUEST['EWD_UASP_Providers_Filter'])){$_REQUEST['EWD_UASP_Providers_Filter'] = "";}
						foreach ($Appointment_Providers as $Appointment_Provider) {
							echo "<option value='" . $Appointment_Provider->Service_Provider_Post_ID . "' ";
							if ($_REQUEST['EWD_UASP_Providers_Filter'] == $Appointment_Provider->Service_Provider_Post_ID) {echo "selected=selected";}
							echo ">" . $Appointment_Provider->Service_Provider_Name . "</option>";
						}
					?>
				</select>
				<input type="submit" name="" id="search-submit" class="button-secondary action" value="<?php _e('Filter', 'ultimate-appointment-scheduling'); ?>">
			</form>
		</div>

		<div class="alignright actions">
			<div class="ewd-uasp-appointment-layout-switches">
				<div class="ewd-uasp-appointment-layout-switch ewd-uasp-table-layout-toggle button button-secondary"><?php _e("Table View", 'ultimate-appointment-scheduling'); ?></div>
				<div class="ewd-uasp-appointment-layout-switch ewd-uasp-calendar-layout-toggle button button-secondary"><?php _e("Calendar View", 'ultimate-appointment-scheduling'); ?></div>
			</div>
		</div>

<div class="ewd-uasp-table-layout">
<form action="admin.php?page=EWD-UASP-options&DisplayPage=Appointments&Action=EWD_UASP_MassDeleteAppointments" method="post">    
<div class="tablenav top">
		<div class="alignleft actions">
				<select name='action'>
  					<option value='-1' selected='selected'><?php _e("Bulk Actions", 'ultimate-appointment-scheduling') ?></option>
						<option value='delete'><?php _e("Delete", 'ultimate-appointment-scheduling') ?></option>
				</select>
				<input type="submit" name="" id="doaction" class="button-secondary action" value="<?php _e('Apply', 'ultimate-appointment-scheduling') ?>"  />
		</div>
		<div class='tablenav-pages <?php if ($Number_of_Pages == 1) {echo "one-page";} ?>'>
				<span class="displaying-num"><?php echo $num_rows; ?> <?php _e("items", 'ultimate-appointment-scheduling') ?></span>
				<span class='pagination-links'>
						<a class='first-page <?php if ($Page == 1) {echo "disabled";} ?>' title='Go to the first page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=1'>&laquo;</a>
						<a class='prev-page <?php if ($Page <= 1) {echo "disabled";} ?>' title='Go to the previous page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page-1;?>'>&lsaquo;</a>
						<span class="paging-input"><?php echo $Page; ?> <?php _e("of", 'ultimate-appointment-scheduling') ?> <span class='total-pages'><?php echo $Number_of_Pages; ?></span></span>
						<a class='next-page <?php if ($Page >= $Number_of_Pages) {echo "disabled";} ?>' title='Go to the next page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page+1;?>'>&rsaquo;</a>
						<a class='last-page <?php if ($Page == $Number_of_Pages) {echo "disabled";} ?>' title='Go to the last page' href='<?php echo $Current_Page_With_Order_By . "&Page=" . $Number_of_Pages; ?>'>&raquo;</a>
				</span>
		</div>
</div>

<table class="wp-list-table widefat fixed tags sorttable" cellspacing="0">
	<thead>
		<tr>
			<th scope='col' id='cb' class='manage-column column-cb check-column'  style="">
				<input type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Appointment_Client_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Client_Name&Order=DESC'>";}
				 	else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Client_Name&Order=ASC'>";} ?>
					<span><?php _e("Name", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Appointment_Client_Email" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Client_Email&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Client_Email&Order=ASC'>";} ?>
					<span><?php _e("Email", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Appointment_Start" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Start&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Start&Order=ASC'>";} ?>
					<span><?php _e("Date/Time", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Service_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Service_Name&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Service_Name&Order=ASC'>";} ?>
					<span><?php _e("Service", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Service_Provider_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Service_Provider_Name&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Service_Provider_Name&Order=ASC'>";} ?>
					<span><?php _e("Provider", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Location_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Location_Name&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Location_Name&Order=ASC'>";} ?>
					<span><?php _e("Location", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<?php foreach ($Display_Fields as $Display_Field) { ?>
				<th scope='col' id='<?php echo $Display_Field->Field_ID; ?>' class='manage-column column-requirements'  style="">
					<span><?php echo $Display_Field->Field_Name; ?></span>
				</th>
			<?php } ?>
			<?php if ($WooCommerce_Integration == "Yes") { ?>
				<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
					<?php if ($_GET['OrderBy'] == "WC_Order_ID" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=WC_Order_ID&Order=DESC'>";}
						else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=WC_Order_ID&Order=ASC'>";} ?>
						<span><?php _e("WooCommerce Order ID", 'ultimate-appointment-scheduling') ?></span>
						<span class="sorting-indicator"></span>
					</a>
				</th>
			<?php } ?>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Appointment_Count" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Count&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Count&Order=ASC'>";} ?>
					<span><?php _e("Total # of Appts for Client", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th scope='col' id='cb' class='manage-column column-cb check-column'  style="">
				<input type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Appointment_Client_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Client_Name&Order=DESC'>";}
				 	else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Dashboartd&OrderBy=Appointment_Client_Name&Order=ASC'>";} ?>
					<span><?php _e("Name", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Appointment_Client_Phone" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Client_Email&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Client_Email&Order=ASC'>";} ?>
					<span><?php _e("Email", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Appointment_Start" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Start&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Start&Order=ASC'>";} ?>
					<span><?php _e("Date/Time", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Service_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Service_Name&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Service_Name&Order=ASC'>";} ?>
					<span><?php _e("Service", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Service_Provider_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Service_Provider_Name&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Service_Provider_Name&Order=ASC'>";} ?>
					<span><?php _e("Provider", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Location_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Location_Name&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Location_Name&Order=ASC'>";} ?>
					<span><?php _e("Location", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<?php foreach ($Display_Fields as $Display_Field) { ?>
				<th scope='col' id='<?php echo $Display_Field->Field_ID; ?>' class='manage-column column-requirements'  style="">
					<span><?php echo $Display_Field->Field_Name; ?></span>
				</th>
			<?php } ?>
			<?php if ($WooCommerce_Integration == "Yes") { ?>
				<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
					<?php if ($_GET['OrderBy'] == "WC_Order_ID" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=WC_Order_ID&Order=DESC'>";}
						else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=WC_Order_ID&Order=ASC'>";} ?>
						<span><?php _e("WooCommerce Order ID", 'ultimate-appointment-scheduling') ?></span>
						<span class="sorting-indicator"></span>
					</a>
				</th>
			<?php } ?>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Appointment_Count" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Count&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Appointments&OrderBy=Appointment_Count&Order=ASC'>";} ?>
					<span><?php _e("Total # of Appts for Client", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
		</tr>
	</tfoot>

	<tbody id="the-list" class='list:tag'>
		
		<?php
			if ($myrows) { 
	  			foreach ($myrows as $Appointment) {
					$Appointment_Count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(Appointment_ID) FROM $ewd_usap_appointments_table_name WHERE Appointment_Client_Email=%s", $Appointment->Appointment_Client_Email));

					echo "<tr id='Item" . $Appointment->Appointment_ID ."'>";
					echo "<th scope='row' class='check-column'>";
					echo "<input type='checkbox' name='Appointments_Bulk[]' value='" . $Appointment->Appointment_ID ."' />";
					echo "</th>";
					echo "<td class='name column-name'>";
					echo "<strong>";
					$AppointmentClientName = $Appointment->Appointment_Client_Name;
					if($AppointmentClientName == '') { $AppointmentClientName = '(no name)'; }
					echo "<a class='row-title' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_AppointmentDetails&Selected=Appointment&Appointment_ID=" . $Appointment->Appointment_ID ."' title='Edit " . $Appointment->Appointment_Client_Name . "'>" . $AppointmentClientName . "</a></strong>";
					echo "<br />";
					echo "<div class='row-actions'>";
					echo "<span class='delete'>";
					echo "<a class='delete-tag' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_DeleteAppointment&DisplayPage=Appointment&Appointment_ID=" . $Appointment->Appointment_ID ."'>" . __("Delete", 'ultimate-appointment-scheduling') . "</a>";
		 			echo "</span>";
					echo "</div>";
					echo "<div class='hidden' id='inline_" . $Appointment->Appointment_ID ."'>";
					echo "<div class='name'>" . $Appointment->Appointment_Client_Name . "</div>";
					echo "</div>";
					echo "</td>";
					echo "<td class='email column-email'>" . $Appointment->Appointment_Client_Email . "</td>";
					if ($Hours_Format == 12) {
						$Time = strtotime($Appointment->Appointment_Start);
						$Appointment_Time_Reformatted = date("Y-m-d g:i:s a", $Time);
						echo "<td class='start column-start'>" . $Appointment_Time_Reformatted . "</td>";
					}
					else {echo "<td class='start column-start'>" . $Appointment->Appointment_Start . "</td>";}
					echo "<td class='service column-service'>" . $Appointment->Service_Name . "</td>";
					echo "<td class='provider column-provider'>" . $Appointment->Service_Provider_Name . "</td>";
					echo "<td class='location column-location'>" . $Appointment->Location_Name . "</td>";
					foreach ($Display_Fields as $Display_Field) { 
						$Field_Value = $wpdb->get_var($wpdb->prepare("SELECT Meta_Value FROM $ewd_uasp_fields_meta_table_name WHERE Appointment_ID=%d AND Field_ID=%d", $Appointment->Appointment_ID, $Display_Field->Field_ID));
						echo "<td class='" . $Display_Field->Field_Slug . " column-" . $Display_Field->Field_Slug . "'>" . $Field_Value . "</td>";
					}
					if ($WooCommerce_Integration == "Yes") {echo "<td class='order-id column-order-id'>" . $Appointment->WC_Order_ID . "</td>";}
					echo "<td class='location column-appt-count'>" . $Appointment_Count . "</td>";
					echo "</tr>";
				}
			}
		?>

	</tbody>
</table>

<div class="tablenav bottom">
		<div class="alignleft actions">
				<select name='action'>
  					<option value='-1' selected='selected'><?php _e("Bulk Actions", 'ultimate-appointment-scheduling') ?></option>
						<option value='delete'><?php _e("Delete", 'ultimate-appointment-scheduling') ?></option>
				</select>
				<input type="submit" name="" id="doaction" class="button-secondary action" value="<?php _e('Apply', 'ultimate-appointment-scheduling') ?>"  />
		</div>
		<div class='tablenav-pages <?php if ($Number_of_Pages == 1) {echo "one-page";} ?>'>
				<span class="displaying-num"><?php echo $num_rows; ?> <?php _e("items", 'ultimate-appointment-scheduling') ?></span>
				<span class='pagination-links'>
						<a class='first-page <?php if ($Page == 1) {echo "disabled";} ?>' title='Go to the first page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=1'>&laquo;</a>
						<a class='prev-page <?php if ($Page <= 1) {echo "disabled";} ?>' title='Go to the previous page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page-1;?>'>&lsaquo;</a>
						<span class="paging-input"><?php echo $Page; ?> <?php _e("of", 'ultimate-appointment-scheduling') ?> <span class='total-pages'><?php echo $Number_of_Pages; ?></span></span>
						<a class='next-page <?php if ($Page >= $Number_of_Pages) {echo "disabled";} ?>' title='Go to the next page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page+1;?>'>&rsaquo;</a>
						<a class='last-page <?php if ($Page == $Number_of_Pages) {echo "disabled";} ?>' title='Go to the last page' href='<?php echo $Current_Page_With_Order_By . "&Page=" . $Number_of_Pages; ?>'>&raquo;</a>
				</span>
		</div>
		<br class="clear" />
</div>
</form>
</div> <!-- Table layout -->

<div class="ewd-uasp-calendar-layout ewd-uasp-hidden">
	<div id='ewd-uasp-admin-calendar' data-appointmenturl='<?php echo get_site_url();?>/wp-admin/admin.php?page=EWD-UASP-options&Action=EWD_UASP_AppointmentDetails&Selected=Appointment&Appointment_ID='></div>
</div>

<br class="clear" />
</div>
</div>

<!-- HTML for creating the appointments calendar -->

<!--<div id='ewd-uasp-calendar-blur'></div>
<div id='ewd-uasp-calendar-div'>
	<div id='ewd-uasp-calendar-selectors'><?php EWD_UASP_Return_Calendar_Select_Inputs(); ?></div>
	<div id='ewd-uasp-calendar'></div>
</div>-->

<!-- Add a new appointment using the form below -->
<div id="col-left" class="uasp-hidden">
<div class="col-wrap">


<div class="form-wrap">


<div id="ewd-uasp-admin-add-manually">

<h3><?php _e("Add New Appointment", 'ultimate-appointment-scheduling') ?></h3>

<form id="addtag" method="post" action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_AddAppointment&DisplayPage=Appointments" class="validate ewd-uasp-appointment-form" enctype="multipart/form-data">
<input type="hidden" name="action" value="Add_Appointment" />
<?php wp_nonce_field( 'EWD_UASP_Admin_Nonce', 'EWD_UASP_Admin_Nonce' );  ?>
<?php wp_referer_field(); ?>

<!--<div class='form-field'>
	<div class='ewd-uasp-appointment-scheduling-button'><?php _e("Schedule Appointment", 'ultimate-appointment-scheduling'); ?></div>
</div>-->
<?php 
	$atts = array('no_form' => 'Yes');
	echo EWD_UASP_Dropdown_Appointment_Selector($atts); 
?>

<div class="form-field">
	<label for="Appointment_Client_Name"><?php _e("Client Name", 'ultimate-appointment-scheduling') ?></label>
	<input name="Appointment_Client_Name" id="Appointment_Client_Name" type="text" value="" size="60" />
	<p><?php _e("The name of the client that the appointment is being booked for.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field">
	<label for="Appointment_Client_Phone"><?php _e("Client Phone", 'ultimate-appointment-scheduling') ?></label>
	<input name="Appointment_Client_Phone" id="Appointment_Client_Phone" type="text" value="" size="60" />
	<p><?php _e("The phone number of the client that the appointment is being booked for.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field">
	<label for="Appointment_Client_Email"><?php _e("Client Email", 'ultimate-appointment-scheduling') ?></label>
	<input name="Appointment_Client_Email" id="Appointment_Client_Email" type="text" value="" size="60" />
	<p><?php _e("The email of the client that the appointment is being booked for.", 'ultimate-appointment-scheduling') ?></p>
</div>

<?php
$Sql = "SELECT * FROM $ewd_uasp_fields_table_name ORDER BY Field_Order";
$Fields = $wpdb->get_results($Sql);
$Value = "";
$ReturnString = "";
foreach ($Fields as $Field) {
		$ReturnString .= "<div class='form-field'><label for='" . $Field->Field_Name . "'>" . $Field->Field_Name . ":</label>";
		if ($Field->Field_Type == "text" or $Field->Field_Type == "mediumint") {
			  $ReturnString .= "<input name='" . $Field->Field_Name . "' id='ewd-uasp-input-" . $Field->Field_ID . "' class='ewd-uasp-text-input' type='text' value='" . $Value . "' />";
		}
		elseif ($Field->Field_Type == "textarea") {
				$ReturnString .= "<textarea name='" . $Field->Field_Name . "' id='ewd-uasp-input-" . $Field->Field_ID . "' class='ewd-uasp-textarea'>" . $Value . "</textarea>";
		}
		elseif ($Field->Field_Type == "select") {
				$Options = explode(",", $Field->Field_Values);
				$ReturnString .= "<select name='" . $Field->Field_Name . "' id='ewd-uasp-input-" . $Field->Field_ID . "' class='ewd-uasp-select'>";
				foreach ($Options as $Option) {
						$ReturnString .= "<option value='" . $Option . "' ";
						if (trim($Option) == trim($Value)) {$ReturnString .= "selected='selected'";}
						$ReturnString .= ">" . $Option . "</option>";
				}
				$ReturnString .= "</select>";
		}
		elseif ($Field->Field_Type == "radio") {
				$Counter = 0;
				$Options = explode(",", $Field->Field_Values);
				foreach ($Options as $Option) {
						if ($Counter != 0) {$ReturnString .= "<label class='radio'></label>";}
						$ReturnString .= "<input type='radio' name='" . $Field->Field_Name . "' value='" . $Option . "' class='ewd-uasp-radio' ";
						if (trim($Option) == trim($Value)) {$ReturnString .= "checked";}
						$ReturnString .= ">" . $Option;
						$Counter++;
				}
		}
		elseif ($Field->Field_Type == "checkbox") {
  			$Counter = 0;
				$Options = explode(",", $Field->Field_Values);
				$Values = explode(",", $Value);
				foreach ($Options as $Option) {
						if ($Counter != 0) {$ReturnString .= "<label class='radio'></label>";}
						$ReturnString .= "<input type='checkbox' name='" . $Field->Field_Name . "[]' value='" . $Option . "' class='ewd-uasp-checkbox' ";
						if (in_array($Option, $Values)) {$ReturnString .= "checked";}
						$ReturnString .= ">" . $Option . "</br>";
						$Counter++;
				}
		}
		elseif ($Field->Field_Type == "file") {
				$ReturnString .= "<input name='" . $Field->Field_Name . "' class='ewd-uasp-file-input' type='file' value='' />";
		}
		elseif ($Field->Field_Type == "date") {
				$ReturnString .= "<input name='" . $Field->Field_Name . "' class='ewd-uasp-date-input' type='date' value='' />";
		}
		elseif ($Field->Field_Type == "datetime") {
				$ReturnString .= "<input name='" . $Field->Field_Name . "' class='ewd-uasp-datetime-input' type='datetime-local' value='' />";
  	}
	$ReturnString .= "<p>" . $Field->Field_Description . "</p>";
	$ReturnString .= "</div>";
}
echo $ReturnString;

?>

<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Add New Appointment', 'ultimate-appointment-scheduling') ?>"  /></p></form>

</div> <!-- ewd-uasp-admin-add-manually -->

</div>


<div id="ewd-uasp-admin-add-from-spreadsheet">
	<h3><?php _e("Add Appointments from Spreadsheet", 'ultimate-appointment-scheduling') ?></h3>
	<?php if ($EWD_UASP_Full_Version == "Yes") { ?>
	<form id="addtag" method="post" action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_AddAppointmentSpreadsheet&DisplayPage=Appointments" class="validate" enctype="multipart/form-data">
		<div class="form-field form-required">
			<input name="Appointments_Spreadsheet" id="Appointments_Spreadsheet" type="file" value=""/>
			<p><?php _e("The spreadsheet containing the appointments you wish to add. Make sure that the column title names are the same as the field names for appointments (ex: Name, Phone, Email, Location, Service etc.).", 'ultimate-appointment-scheduling') ?></p>
		</div>
		<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Add New Appointments', 'ultimate-appointment-scheduling') ?>"  /></p>
	</form>
	<?php } else { ?>
	<div class="Info-Div">
			<h2><?php _e("Full Version Required!", 'ultimate-appointment-scheduling') ?></h2>
			<div class="ewd-uasp-full-version-explanation">
					<?php _e("The full version of Ultimate Appointment Scheduling is required to use spreadsheet uploads.", 'ultimate-appointment-scheduling');?><a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/"><?php _e(" Please upgrade to unlock this page!", 'ultimate-appointment-scheduling'); ?></a>
			</div>
	</div>
	<?php } ?>
</div>



</div>
</div>
</div>