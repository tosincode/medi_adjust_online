<?php
	$Appointment = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ewd_usap_appointments_table_name WHERE Appointment_ID=%d", $_GET['Appointment_ID']));
?>

<!-- Edit an appointment using the form below -->


<div id="ewd-uasp-new-edit-appointment-screen">

	<div id="col-left">
		<div class="col-wrap ewd-uasp-appointment-details-wrap">

			<div class="form-wrap" id="AppointmentDetail">

				<a href="admin.php?page=EWD-UASP-options&DisplayPage=Appointments" class="ewd-uasp-back-to-appointments-link"><?php _e("Back to Appointments", 'ultimate-appointment-scheduling') ?></a>
				<div style="clear: both;"></div>
				<h2><?php _e("Edit Appointment", 'ultimate-appointment-scheduling') ?></h2>

				<?php if ($WooCommerce_Integration == "Yes") { ?>
					<div style='margin-bottom: 12px;'>
						<p><?php _e("WooCommerce Order ID: ", 'ultimate-appointment-scheduling') ?>
						<span><?php echo $Appointment->WC_Order_ID; ?></span></p>
					</div>
				<?php } ?>

				<form id="addtag" method="post" action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_EditAppointment&DisplayPage=Appointments" class="validate" enctype="multipart/form-data">
					<input type="hidden" name="action" value="Edit_Appointment" />
					<input type="hidden" name="Appointment_ID" value="<?php echo $_GET['Appointment_ID']; ?>" />
					<?php wp_nonce_field( 'EWD_UASP_Admin_Nonce', 'EWD_UASP_Admin_Nonce' );  ?>
					<?php wp_referer_field(); ?>

					<div class="ewd-uasp-admin-edit-product-left">

						<div class="ewd-uasp-dashboard-new-widget-box ewd-widget-box-full ewd-uasp-admin-closeable-widget-box ewd-uasp-admin-edit-product-left-full-widget-box" id="ewd-uasp-admin-edit-appointment-details-widget-box">
							<div class="ewd-uasp-dashboard-new-widget-box-top"><?php _e('Appointment Details', 'ultimate-appointment-scheduling'); ?><span class="ewd-uasp-admin-edit-product-down-caret">&nbsp;&nbsp;&#9660;</span><span class="ewd-uasp-admin-edit-product-up-caret">&nbsp;&nbsp;&#9650;</span></div>
							<div class="ewd-uasp-dashboard-new-widget-box-bottom">
								<table class="form-table">
									<tr>
										<th><label for="Appointment_Start"><?php _e("Date &amp; Time", 'ultimate-appointment-scheduling') ?></label></th>
										<td>
											<input name="Appointment_Start" id="Appointment_Start" type="text" value="<?php echo $Appointment->Appointment_Start;?>" disabled />
											<p><?php _e("The current date and time of this appointment. To change, choose a date below and click the Find Appointments button.", 'ultimate-appointment-scheduling') ?></p>
										</td>
									</tr>
								</table>
								<?php 
									$atts = array(
										'no_form' => 'Yes',
										'selected_appointment_id' => $Appointment->Appointment_ID
									);
									echo EWD_UASP_Dropdown_Appointment_Selector($atts); 
								?>
							</div>
						</div>		

						<div class="ewd-uasp-dashboard-new-widget-box ewd-widget-box-full ewd-uasp-admin-closeable-widget-box ewd-uasp-admin-edit-product-left-full-widget-box" id="ewd-uasp-admin-edit-customer-details-widget-box">
							<div class="ewd-uasp-dashboard-new-widget-box-top"><?php _e('Client Details', 'ultimate-appointment-scheduling'); ?><span class="ewd-uasp-admin-edit-product-down-caret">&nbsp;&nbsp;&#9660;</span><span class="ewd-uasp-admin-edit-product-up-caret">&nbsp;&nbsp;&#9650;</span></div>
							<div class="ewd-uasp-dashboard-new-widget-box-bottom">
								<table class="form-table">
									<tr>
										<th><label for="Appointment_Client_Name"><?php _e("Client Name", 'ultimate-appointment-scheduling') ?></label></th>
										<td>
											<input name="Appointment_Client_Name" id="Appointment_Client_Name" type="text" value="<?php echo $Appointment->Appointment_Client_Name;?>" size="60" />
										</td>
									</tr>
									<tr>
										<th><label for="Appointment_Client_Phone"><?php _e("Client Phone Number", 'ultimate-appointment-scheduling') ?></label></th>
										<td>
											<input name="Appointment_Client_Phone" id="Appointment_Client_Phone" type="text" value="<?php echo $Appointment->Appointment_Client_Phone;?>" size="60" />
										</td>
									</tr>
									<tr>
										<th><label for="Appointment_Client_Email"><?php _e("Client Email Address", 'ultimate-appointment-scheduling') ?></label></th>
										<td>
											<input name="Appointment_Client_Email" id="Appointment_Client_Email" type="text" value="<?php echo $Appointment->Appointment_Client_Email;?>" size="60" />
										</td>
									</tr>
								</table>
							</div>
						</div>		

					</div> <!--ewd-uasp-admin-edit-product-left-->

					<div class="ewd-uasp-admin-edit-product-right">

						<p class="submit ewd-uasp-admin-edit-product-submit-p"><input type="submit" name="submit" id="submit" class="button-primary ewd-uasp-admin-edit-product-save-button" value="<?php _e('Edit Appointment', 'ultimate-appointment-scheduling') ?>"  /></p>

						<div class="ewd-uasp-dashboard-new-widget-box ewd-widget-box-full ewd-uasp-admin-closeable-widget-box" id="ewd-uasp-admin-edit-appointment-need-help-widget-box">
							<div class="ewd-uasp-dashboard-new-widget-box-top"><?php _e('Need Help?', 'ultimate-appointment-scheduling'); ?><span class="ewd-uasp-admin-edit-product-down-caret">&nbsp;&nbsp;&#9660;</span><span class="ewd-uasp-admin-edit-product-up-caret">&nbsp;&nbsp;&#9650;</span></div>
							<div class="ewd-uasp-dashboard-new-widget-box-bottom">
								 <div class='ewd-uasp-need-help-box'>
									<div class='ewd-uasp-need-help-text'>Visit our Support Center for documentation and tutorials</div>
									<a class='ewd-uasp-need-help-button' href='https://www.etoilewebdesign.com/support-center/?Plugin=UASP' target='_blank'>GET SUPPORT</a>
								</div>
							</div>
						</div>

						<div class="ewd-uasp-dashboard-new-widget-box ewd-widget-box-full ewd-uasp-admin-closeable-widget-box" id="ewd-uasp-admin-edit-appointment-custom-fields-widget-box">
							<div class="ewd-uasp-dashboard-new-widget-box-top"><?php _e('Custom Fields', 'ultimate-appointment-scheduling'); ?><span class="ewd-uasp-admin-edit-product-down-caret">&nbsp;&nbsp;&#9660;</span><span class="ewd-uasp-admin-edit-product-up-caret">&nbsp;&nbsp;&#9650;</span></div>
							<div class="ewd-uasp-dashboard-new-widget-box-bottom">
								<?php
								$ReturnString = "";
								$ReturnString .= "<table class='form-table'>";
								$Sql = "SELECT * FROM $ewd_uasp_fields_table_name ORDER BY Field_Order";
								$Fields = $wpdb->get_results($Sql);
								$MetaValues = $wpdb->get_results($wpdb->prepare("SELECT Field_ID, Meta_Value FROM $ewd_uasp_fields_meta_table_name WHERE Appointment_ID=%d", $_GET['Appointment_ID']));
								foreach ($Fields as $Field) {
									$Value = "";
									if (is_array($MetaValues)) {
										foreach ($MetaValues as $Meta) {
											if ($Field->Field_ID == $Meta->Field_ID) {$Value = $Meta->Meta_Value;}
										}
									}
									$ReturnString .= "<tr><th><label for='" . $Field->Field_Name . "'>" . $Field->Field_Name . ":</label></th>";
									if ($Field->Field_Type == "text" or $Field->Field_Type == "mediumint") {
											  $ReturnString .= "<td><input name='" . $Field->Field_Name . "' id='ewd-uasp-input-" . $Field->Field_ID . "' class='ewd-uasp-text-input' type='text' value='" . htmlspecialchars($Value, ENT_QUOTES) . "' /></td>";
									}
									elseif ($Field->Field_Type == "textarea") {
										$ReturnString .= "<td><textarea name='" . $Field->Field_Name . "' id='ewd-uasp-input-" . $Field->Field_ID . "' class='ewd-uasp-textarea' rows='6'>" . $Value . "</textarea></td>";
									} 
									elseif ($Field->Field_Type == "select") { 
										$Options = explode(",", $Field->Field_Values);
										$ReturnString .= "<td><select name='" . $Field->Field_Name . "' id='ewd-uasp-input-" . $Field->Field_ID . "' class='ewd-uasp-select'>";
								 		foreach ($Options as $Option) {
											$ReturnString .= "<option value='" . $Option . "' ";
											if (trim($Option) == trim($Value)) {$ReturnString .= "selected='selected'";}
											$ReturnString .= ">" . $Option . "</option>";
										}
										$ReturnString .= "</select></td>";
									} 
									elseif ($Field->Field_Type == "radio") {
										$Counter = 0;
										$Options = explode(",", $Field->Field_Values);
										$ReturnString .= "<td>";
										foreach ($Options as $Option) {
											if ($Counter != 0) {$ReturnString .= "<label class='radio'></label>";}
											$ReturnString .= "<input type='radio' name='" . $Field->Field_Name . "' value='" . $Option . "' class='ewd-uasp-radio' ";
											if (trim($Option) == trim($Value)) {$ReturnString .= "checked";}
											$ReturnString .= ">" . $Option;
											$Counter++;
										} 
										$ReturnString .= "</td>";
									} 
									elseif ($Field->Field_Type == "checkbox") {
										$Counter = 0;
										$Options = explode(",", $Field->Field_Values);
										$Values = explode(",", $Value);
										$ReturnString .= "<td>";
										foreach ($Options as $Option) {
											if ($Counter != 0) {$ReturnString .= "<label class='radio'></label>";}
											$ReturnString .= "<input type='checkbox' name='" . $Field->Field_Name . "[]' value='" . $Option . "' class='ewd-uasp-checkbox' ";
											if (in_array($Option, $Values)) {$ReturnString .= "checked";}
											$ReturnString .= ">" . $Option . "</br>";
											$Counter++;
										}
										$ReturnString .= "</td>";
									}
									elseif ($Field->Field_Type == "file") {
										$ReturnString .= "<td>";
										$ReturnString .= "<input name='" . $Field->Field_Name . "' class='ewd-uasp-file-input' type='file' value='" . $Value . "' /><br/>";
										$ReturnString .= "Current Filename: " . $Value . "<br>";
										$ReturnString .= "<input type='checkbox' name='Delete_" . $Field->Field_Name . "' value='Delete' />" . __("Delete Current File", 'ultimate-appointment-scheduling');
										$ReturnString .= "</td>";
									}
									elseif ($Field->Field_Type == "date") {
										$ReturnString .= "<td><input name='" . $Field->Field_Name . "' class='ewd-uasp-date-input' type='date' value='" . $Value . "' /></td>";
									} 
									elseif ($Field->Field_Type == "datetime") {
										$ReturnString .= "<td><input name='" . $Field->Field_Name . "' class='ewd-uasp-datetime-input' type='datetime-local' value='" . $Value . "' /></td>";
									}
									$ReturnString .= "<p>" . $Field->Field_Description . "</p>";
									$ReturnString .= "</tr>";
								}
								$ReturnString .= "</table>";
								echo $ReturnString;
								?>
							</div>
						</div>

					</div> <!--ewd-uasp-admin-edit-product-right-->

				</form>

			</div>
		</div>
	</div>

</div>
