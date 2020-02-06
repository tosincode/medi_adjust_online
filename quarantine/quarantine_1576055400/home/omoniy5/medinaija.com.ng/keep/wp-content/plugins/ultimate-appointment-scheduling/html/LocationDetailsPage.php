<!-- Display a list of the categories which have already been created -->
<?php wp_nonce_field(); ?>
<?php wp_referer_field(); ?>

<?php 
	$Location_ID = $_GET['Location_ID'];
	$Location = get_post($Location_ID);

	$Monday_Open = get_post_meta($Location_ID, 'Monday Open', true);
	$Monday_Close = get_post_meta($Location_ID, 'Monday Close', true);
	$Monday_Note = get_post_meta($Location_ID, 'Monday Note', true);

	$Tuesday_Open = get_post_meta($Location_ID, 'Tuesday Open', true);
	$Tuesday_Close = get_post_meta($Location_ID, 'Tuesday Close', true);
	$Tuesday_Note = get_post_meta($Location_ID, 'Tuesday Note', true);

	$Wednesday_Open = get_post_meta($Location_ID, 'Wednesday Open', true);
	$Wednesday_Close = get_post_meta($Location_ID, 'Wednesday Close', true);
	$Wednesday_Note = get_post_meta($Location_ID, 'Wednesday Note', true);

	$Thursday_Open = get_post_meta($Location_ID, 'Thursday Open', true);
	$Thursday_Close = get_post_meta($Location_ID, 'Thursday Close', true);
	$Thursday_Note = get_post_meta($Location_ID, 'Thursday Note', true);

	$Friday_Open = get_post_meta($Location_ID, 'Friday Open', true);
	$Friday_Close = get_post_meta($Location_ID, 'Friday Close', true);
	$Friday_Note = get_post_meta($Location_ID, 'Friday Note', true);

	$Saturday_Open = get_post_meta($Location_ID, 'Saturday Open', true);
	$Saturday_Close = get_post_meta($Location_ID, 'Saturday Close', true);
	$Saturday_Note = get_post_meta($Location_ID, 'Saturday Note', true);

	$Sunday_Open = get_post_meta($Location_ID, 'Sunday Open', true);
	$Sunday_Close = get_post_meta($Location_ID, 'Sunday Close', true);
	$Sunday_Note = get_post_meta($Location_ID, 'Sunday Note', true);
?>



<!-- Form to create a new location -->
<div id="col-left" class="ewd-uasp-location-edit-screen">
<div class="col-wrap">

<div class="form-wrap">
<h3><?php _e("Edit Location", 'ultimate-appointment-scheduling') ?></h3>
<form id="addcat" method="post" action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_EditLocation&DisplayPage=Locations" class="validate" enctype="multipart/form-data">
<input type="hidden" name="action" value="Edit_Location" />
<input type="hidden" name="Location_ID" value="<?php echo $_GET['Location_ID']; ?>" />
<?php wp_nonce_field( 'EWD_UASP_Admin_Nonce', 'EWD_UASP_Admin_Nonce' );  ?>
<?php wp_referer_field(); ?>
<div class="form-field form-required">
	<label for="Location_Name"><?php _e("Name", 'ultimate-appointment-scheduling') ?></label>
	<input name="Location_Name" id="Location_Name" type="text" value="<?php echo $Location->post_title; ?>" size="60" />
	<p><?php _e("The name of the location that will be displayed.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field">
	<label for="Location_Description"><?php _e("Description", 'ultimate-appointment-scheduling') ?></label>
	<textarea name="Location_Description" id="Location_Description" rows="5" cols="40"><?php echo $Location->post_content; ?></textarea>
	<p><?php _e("The description of the location, to help customers itentify it.", 'ultimate-appointment-scheduling') ?></p>
</div>

<table>
	<thead>
		<tr>
			<!--<th><?php _e("Open?", 'ultimate-appointment-scheduling'); ?></th>-->
			<th><?php _e("Day", 'ultimate-appointment-scheduling'); ?></th>
			<th><?php _e("Open", 'ultimate-appointment-scheduling'); ?></th>
			<th><?php _e("Close", 'ultimate-appointment-scheduling'); ?></th>
			<th><?php _e("Note", 'ultimate-appointment-scheduling'); ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<!--<td><input type='checkbox' name='Monday_Open_Toggle' value='Yes' <?php if ($Monday_Open != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Monday_Open_Toggle'>Monday</label></td>
			<td><select name='Monday_Open_Time'><?php EWD_UASP_Return_Select_Hours($Monday_Open) ?></select></td>
			<td><select name='Monday_Close_Time'><?php EWD_UASP_Return_Select_Hours($Monday_Close) ?></select></td>
			<td><input type='text' name='Monday_Note' value='<?php echo $Monday_Note; ?>' /></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Tuesday_Open_Toggle' value='Yes' <?php if ($Tuesday_Open != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Tuesday_Open_Toggle'>Tuesday</label></td>
			<td><select name='Tuesday_Open_Time'><?php EWD_UASP_Return_Select_Hours($Tuesday_Open) ?></select></td>
			<td><select name='Tuesday_Close_Time'><?php EWD_UASP_Return_Select_Hours($Tuesday_Close) ?></select></td>
			<td><input type='text' name='Tuesday_Note' value='<?php echo $Tuesday_Note; ?>' /></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Wednesday_Open_Toggle' value='Yes' <?php if ($Wednesday_Open != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Wednesday_Open_Toggle'>Wednesday</label></td>
			<td><select name='Wednesday_Open_Time'><?php EWD_UASP_Return_Select_Hours($Wednesday_Open) ?></select></td>
			<td><select name='Wednesday_Close_Time'><?php EWD_UASP_Return_Select_Hours($Wednesday_Close) ?></select></td>
			<td><input type='text' name='Wednesday_Note' value='<?php echo $Wednesday_Note; ?>' /></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Thursday_Open_Toggle' value='Yes' <?php if ($Thursday_Open != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Thursday_Open_Toggle'>Thursday</label></td>
			<td><select name='Thursday_Open_Time'><?php EWD_UASP_Return_Select_Hours($Thursday_Open) ?></select></td>
			<td><select name='Thursday_Close_Time'><?php EWD_UASP_Return_Select_Hours($Thursday_Close) ?></select></td>
			<td><input type='text' name='Thursday_Note' value='<?php echo $Thursday_Note; ?>' /></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Friday_Open_Toggle' value='Yes' <?php if ($Friday_Open != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Friday_Open_Toggle'>Friday</label></td>
			<td><select name='Friday_Open_Time'><?php EWD_UASP_Return_Select_Hours($Friday_Open) ?></select></td>
			<td><select name='Friday_Close_Time'><?php EWD_UASP_Return_Select_Hours($Friday_Close) ?></select></td>
			<td><input type='text' name='Friday_Note' value='<?php echo $Friday_Note; ?>' /></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Saturday_Open_Toggle' value='Yes' <?php if ($Saturday_Open != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Saturday_Open_Toggle'>Saturday</label></td>
			<td><select name='Saturday_Open_Time'><?php EWD_UASP_Return_Select_Hours($Saturday_Open) ?></select></td>
			<td><select name='Saturday_Close_Time'><?php EWD_UASP_Return_Select_Hours($Saturday_Close) ?></select></td>
			<td><input type='text' name='Saturday_Note' value='<?php echo $Saturday_Note; ?>' /></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Sunday_Open_Toggle' value='Yes' <?php if ($Sunday_Open != "24:00"){echo "checked";} ?> /></td>-->
			<td><label for='Sunday_Open_Toggle'>Sunday</label></td>
			<td><select name='Sunday_Open_Time'><?php EWD_UASP_Return_Select_Hours($Sunday_Open) ?></select></td>
			<td><select name='Sunday_Close_Time'><?php EWD_UASP_Return_Select_Hours($Sunday_Close) ?></select></td>
			<td><input type='text' name='Sunday_Note' value='<?php echo $Sunday_Note; ?>' /></td>
		</tr>
	</tbody>
</table>

<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Edit Location', 'ultimate-appointment-scheduling') ?>"  /></p></form></div>
<br class="clear" />
</div>
</div>		