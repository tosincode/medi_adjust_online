<?php 
	$Service_Provider_ID = $_GET['Service_Provider_ID'];
	$Service_Provider = get_post($Service_Provider_ID);

	$Service_Provider_Services_String = get_post_meta($Service_Provider_ID, 'Service Provider Services', true);
	$Service_Provider_Services = explode(",", $Service_Provider_Services_String);

	$Service_Provider_Email = get_post_meta($Service_Provider_ID, 'Service Provider Email', true);

	$Monday_Start = get_post_meta($Service_Provider_ID, 'Monday Start', true);
	$Monday_Finish = get_post_meta($Service_Provider_ID, 'Monday Finish', true);
	$Monday_Location = get_post_meta($Service_Provider_ID, 'Monday Location', true);

	$Tuesday_Start = get_post_meta($Service_Provider_ID, 'Tuesday Start', true);
	$Tuesday_Finish = get_post_meta($Service_Provider_ID, 'Tuesday Finish', true);
	$Tuesday_Location = get_post_meta($Service_Provider_ID, 'Tuesday Location', true);

	$Wednesday_Start = get_post_meta($Service_Provider_ID, 'Wednesday Start', true);
	$Wednesday_Finish = get_post_meta($Service_Provider_ID, 'Wednesday Finish', true);
	$Wednesday_Location = get_post_meta($Service_Provider_ID, 'Wednesday Location', true);

	$Thursday_Start = get_post_meta($Service_Provider_ID, 'Thursday Start', true);
	$Thursday_Finish = get_post_meta($Service_Provider_ID, 'Thursday Finish', true);
	$Thursday_Location = get_post_meta($Service_Provider_ID, 'Thursday Location', true);

	$Friday_Start = get_post_meta($Service_Provider_ID, 'Friday Start', true);
	$Friday_Finish = get_post_meta($Service_Provider_ID, 'Friday Finish', true);
	$Friday_Location = get_post_meta($Service_Provider_ID, 'Friday Location', true);

	$Saturday_Start = get_post_meta($Service_Provider_ID, 'Saturday Start', true);
	$Saturday_Finish = get_post_meta($Service_Provider_ID, 'Saturday Finish', true);
	$Saturday_Location = get_post_meta($Service_Provider_ID, 'Saturday Location', true);

	$Sunday_Start = get_post_meta($Service_Provider_ID, 'Sunday Start', true);
	$Sunday_Finish = get_post_meta($Service_Provider_ID, 'Sunday Finish', true);
	$Sunday_Location = get_post_meta($Service_Provider_ID, 'Sunday Location', true);
?>

<!-- Form to edit a  Service Provider -->
<div id="col-left" class="ewd-uasp-location-edit-screen">
<div class="col-wrap">

<div class="form-wrap">
<h3><?php _e("Edit Service Provider", 'ultimate-appointment-scheduling') ?></h3>
<form id="addcat" method="post" action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_EditServiceProvider&DisplayPage=ServiceProviders" class="validate" enctype="multipart/form-data">
<input type="hidden" name="action" value="Edit_Service_Provider" />
<input type="hidden" name="Service_Provider_ID" value="<?php echo $Service_Provider_ID; ?>" />
<?php wp_nonce_field( 'EWD_UASP_Admin_Nonce', 'EWD_UASP_Admin_Nonce' );  ?>
<?php wp_referer_field(); ?>
<div class="form-field form-required">
	<label for="Service_Provider_Name"><?php _e("Name", 'ultimate-appointment-scheduling') ?></label>
	<input name="Service_Provider_Name" id="Service_Provider_Name" type="text" value="<?php echo $Service_Provider->post_title; ?>" size="60" />
	<p><?php _e("The name of the service provider that will be displayed.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field">
	<label for="Service_Provider_Description"><?php _e("Description", 'ultimate-appointment-scheduling') ?></label>
	<textarea name="Service_Provider_Description" id="Service_Provider_Description" rows="5" cols="40"><?php echo $Service_Provider->post_content; ?></textarea>
	<p><?php _e("The description of the service provider, to help customers itentify it.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field form-required">
	<label for="Service_Provider_Email"><?php _e("Email", 'ultimate-appointment-scheduling') ?></label>
	<input name="Service_Provider_Email" id="Service_Provider_Email" type="text" value="<?php echo $Service_Provider_Email; ?>" size="60" />
	<p><?php _e("The email of the service provider, if you'd like to enable emails to the service provider when an appointment is scheduled.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field">
	<label for="Service_Provider_Services"><?php _e("Services Offered:", 'ultimate-appointment-scheduling') ?></label>
	<?php 
		$params = array(
			'posts_per_page' => -1, 
			'post_type' => 'uasp-service'
		);
		$Services = get_posts($params);
	?>
	<?php 
		foreach ($Services as $Service) {
			echo "<input type='checkbox' name='Service_Provider_Services[]' value='" . $Service->ID . "' ";
			if (in_array($Service->ID, $Service_Provider_Services)) {echo "checked";}
			echo "/>" . $Service->post_title;
		} 
	?>
	</select>
	<p><?php _e("What services does the provider offer?", 'ultimate-appointment-scheduling') ?></p>
</div>

<?php 
	$params = array(
		'posts_per_page' => -1, 
		'post_type' => 'uasp-location'
	);
	$Locations = get_posts($params);
?>

<table>
	<thead>
		<tr>
			<!--<th><?php _e("Working?", 'ultimate-appointment-scheduling'); ?></th>-->
			<th><?php _e("Day", 'ultimate-appointment-scheduling'); ?></th>
			<th><?php _e("Location", 'ultimate-appointment-scheduling'); ?></th>
			<th><?php _e("Start", 'ultimate-appointment-scheduling'); ?></th>
			<th><?php _e("Finish", 'ultimate-appointment-scheduling'); ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<!--<td><input type='checkbox' name='Monday_Working_Toggle' value='Yes' <?php if ($Monday_Start != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Monday_Working_Toggle'>Monday</label></td>
			<td>
				<select name="Monday_Location_ID" id="Monday_Location_Name">
				<?php foreach ($Locations as $Location) {
					echo "<option value='" . $Location->ID . "' ";
					if ($Location->ID == $Monday_Location) {echo "selected=selected";}
					echo ">" . $Location->post_title . "</option>";
				} ?>
				</select>
			</td>
			<td><select name='Monday_Start_Time'><?php EWD_UASP_Return_Select_Hours($Monday_Start, "Provider") ?></select></td>
			<td><select name='Monday_Finish_Time'><?php EWD_UASP_Return_Select_Hours($Monday_Finish, "Provider") ?></select></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Tuesday_Working_Toggle' value='Yes' <?php if ($Tuesday_Start != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Tuesday_Working_Toggle'>Tuesday</label></td>
			<td>
				<select name="Tuesday_Location_ID" id="Tuesday_Location_Name">
				<?php foreach ($Locations as $Location) {
					echo "<option value='" . $Location->ID . "' ";
					if ($Location->ID == $Tuesday_Location) {echo "selected=selected";}
					echo ">" . $Location->post_title . "</option>";
				} ?>
				</select>
			</td>
			<td><select name='Tuesday_Start_Time'><?php EWD_UASP_Return_Select_Hours($Tuesday_Start, "Provider") ?></select></td>
			<td><select name='Tuesday_Finish_Time'><?php EWD_UASP_Return_Select_Hours($Tuesday_Finish, "Provider") ?></select></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Wednesday_Working_Toggle' value='Yes' <?php if ($Wednesday_Start != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Wednesday_Working_Toggle'>Wednesday</label></td>
			<td>
				<select name="Wednesday_Location_ID" id="Wednesday_Location_Name">
				<?php foreach ($Locations as $Location) {
					echo "<option value='" . $Location->ID . "' ";
					if ($Location->ID == $Wednesday_Location) {echo "selected=selected";}
					echo ">" . $Location->post_title . "</option>";
				} ?>
				</select>
			</td>
			<td><select name='Wednesday_Start_Time'><?php EWD_UASP_Return_Select_Hours($Wednesday_Start, "Provider") ?></select></td>
			<td><select name='Wednesday_Finish_Time'><?php EWD_UASP_Return_Select_Hours($Wednesday_Finish, "Provider") ?></select></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Thursday_Working_Toggle' value='Yes' <?php if ($Thursday_Start != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Thursday_Working_Toggle'>Thursday</label></td>
			<td>
				<select name="Thursday_Location_ID" id="Thursday_Location_Name">
				<?php foreach ($Locations as $Location) {
					echo "<option value='" . $Location->ID . "' ";
					if ($Location->ID == $Thursday_Location) {echo "selected=selected";}
					echo ">" . $Location->post_title . "</option>";
				} ?>
				</select>
			</td>
			<td><select name='Thursday_Start_Time'><?php EWD_UASP_Return_Select_Hours($Thursday_Start, "Provider") ?></select></td>
			<td><select name='Thursday_Finish_Time'><?php EWD_UASP_Return_Select_Hours($Thursday_Finish, "Provider") ?></select></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Friday_Working_Toggle' value='Yes' <?php if ($Friday_Start != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Friday_Working_Toggle'>Friday</label></td>
			<td>
				<select name="Friday_Location_ID" id="Friday_Location_Name">
				<?php foreach ($Locations as $Location) {
					echo "<option value='" . $Location->ID . "' ";
					if ($Location->ID == $Friday_Location) {echo "selected=selected";}
					echo ">" . $Location->post_title . "</option>";
				} ?>
				</select>
			</td>
			<td><select name='Friday_Start_Time'><?php EWD_UASP_Return_Select_Hours($Friday_Start, "Provider") ?></select></td>
			<td><select name='Friday_Finish_Time'><?php EWD_UASP_Return_Select_Hours($Friday_Finish, "Provider") ?></select></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Saturday_Working_Toggle' value='Yes' <?php if ($Saturday_Start != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Saturday_Working_Toggle'>Saturday</label></td>
			<td>
				<select name="Saturday_Location_ID" id="Saturday_Location_Name">
				<?php foreach ($Locations as $Location) {
					echo "<option value='" . $Location->ID . "' ";
					if ($Location->ID == $Saturday_Location) {echo "selected=selected";}
					echo ">" . $Location->post_title . "</option>";
				} ?>
				</select>
			</td>
			<td><select name='Saturday_Start_Time'><?php EWD_UASP_Return_Select_Hours($Saturday_Start, "Provider") ?></select></td>
			<td><select name='Saturday_Finish_Time'><?php EWD_UASP_Return_Select_Hours($Saturday_Finish, "Provider") ?></select></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Sunday_Working_Toggle' value='Yes' <?php if ($Sunday_Start != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Sunday_Working_Toggle'>Sunday</label></td>
			<td>
				<select name="Sunday_Location_ID" id="Sunday_Location_Name">
				<?php foreach ($Locations as $Location) {
					echo "<option value='" . $Location->ID . "' ";
					if ($Location->ID == $Sunday_Location) {echo "selected=selected";}
					echo ">" . $Location->post_title . "</option>";
				} ?>
				</select>
			</td>
			<td><select name='Sunday_Start_Time'><?php EWD_UASP_Return_Select_Hours($Sunday_Start, "Provider") ?></select></td>
			<td><select name='Sunday_Finish_Time'><?php EWD_UASP_Return_Select_Hours($Sunday_Finish, "Provider") ?></select></td>
		</tr>
	</tbody>
</table>

<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Edit Service Provider', 'ultimate-appointment-scheduling') ?>"  /></p></form></div>
<br class="clear" />
</div>
</div>


	<!--<form method="get" action=""><table style="display: none"><tbody id="inlineedit">
		<tr id="inline-edit" class="inline-edit-row" style="display: none"><td colspan="4" class="colspanchange">

			<fieldset><div class="inline-edit-col">
				<h4>Quick Edit</h4>

				<label>
					<span class="title">Name</span>
					<span class="input-text-wrap"><input type="text" name="name" class="ptitle" value="" /></span>
				</label>
					<label>
					<span class="title">Slug</span>
					<span class="input-text-wrap"><input type="text" name="slug" class="ptitle" value="" /></span>
				</label>
				</div></fieldset>
	
		<p class="inline-edit-save submit">
			<a accesskey="c" href="#inline-edit" title="Cancel" class="cancel button-secondary alignleft">Cancel</a>
						<a accesskey="s" href="#inline-edit" title="Update Level" class="save button-primary alignright">Update Level</a>
			<img class="waiting" style="display:none;" src="<?php echo ABSPATH . 'wp-admin/images/wpspin_light.gif'?>" alt="" />
			<span class="error" style="display:none;"></span>
			<input type="hidden" id="_inline_edit" name="_inline_edit" value="fb59c3f3d1" />			<input type="hidden" name="taxonomy" value="wmlevel" />
			<input type="hidden" name="post_type" value="post" />
			<br class="clear" />
		</p>
		</td></tr>
		</tbody></table></form>-->
		
<!--</div>-->
		