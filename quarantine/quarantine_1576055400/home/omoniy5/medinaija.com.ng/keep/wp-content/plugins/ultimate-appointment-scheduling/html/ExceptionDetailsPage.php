<?php
	$Exception = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ewd_usap_exceptions_table_name WHERE Exception_ID=%d", $_GET['Exception_ID']));
?>

<!-- Edit an exception using the form below -->
<div id="col-left" class="ewd-uasp-location-edit-screen">
<div class="col-wrap">


<div class="form-wrap">
<h2><?php _e("Edit Exception", 'ultimate-appointment-scheduling') ?></h2>
<form id="addtag" method="post" action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_EditException&DisplayPage=Exceptions" class="validate" enctype="multipart/form-data">
<input type="hidden" name="action" value="Edit_Exception" />
<input type="hidden" name="Exception_ID" value="<?php echo $Exception->Exception_ID; ?>" />
<?php wp_nonce_field( 'EWD_UASP_Admin_Nonce', 'EWD_UASP_Admin_Nonce' );  ?>
<?php wp_referer_field(); ?>

<div class="form-field">
	<label for="Location_Name"><?php _e("Location:", 'ultimate-appointment-scheduling') ?></label>
	<select name="Location_ID" id="Location_Name">
		<option value=''></option>
	<?php 
		$params = array(
			'posts_per_page' => -1, 
			'post_type' => 'uasp-location'
		);
		$Locations = get_posts($params);
	?>
	<?php 
		foreach ($Locations as $Location) {
			echo "<option value='" . $Location->ID . "' ";
			if ($Location->ID == $Exception->Location_Post_ID) {echo "selected='selected'";}
			echo " >" . $Location->post_title . "</option>";
		} 
	?>
	</select>
	<p><?php _e("The name of the location where the exception is happening (if applicable).", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field">
	<label for="Service_Provider_Name"><?php _e("Service Provider:", 'ultimate-appointment-scheduling') ?></label>
	<select name="Service_Provider_ID" id="Service_Provider_Name">
		<option value=''></option>
	<?php 
		$params = array(
			'posts_per_page' => -1, 
			'post_type' => 'uasp-provider'
		);
		$Service_Providers = get_posts($params);
	?>
	<?php foreach ($Service_Providers as $Service_Provider) {
						echo "<option value='" . $Service_Provider->ID . "' ";
						if ($Service_Provider->ID == $Exception->Service_Provider_Post_ID) {echo "selected='selected'";}
						echo " >" . $Service_Provider->post_title . "</option>";
				} ?>
	</select>
	<p><?php _e("The name of the service provider the exception applies to (if applicable).", 'ultimate-appointment-scheduling') ?></p>
</div>
<div>
	<label for="Exception_Start"><?php _e("Exception Start Date/Time", 'ultimate-appointment-scheduling') ?></label>
	<input name="Exception_Start" id="Exception_Start" type="datetime" value="<?php echo $Exception->Exception_Start;?>" size="60" />
	<p><?php _e("The start date/time of the exception.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div>
	<label for="Exception_End"><?php _e("Exception End Date/Time", 'ultimate-appointment-scheduling') ?></label>
	<input name="Exception_End" id="Exception_End" type="datetime" value="<?php echo $Exception->Exception_End;?>" size="60" />
	<p><?php _e("The end date/time of the exception.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div>
	<label for="Exception_Status"><?php _e("Status", 'ultimate-appointment-scheduling') ?></label>
	<select name="Exception_Status" id="Exception_Status" >
		<option value='Open' <?php if ($Exception->Exception_Status == "Open") {echo "checked";} ?> >Open</option>
		<option value='Closed' <?php if ($Exception->Exception_Status == "Closed") {echo "checked";} ?> >Closed</option>
	</select>
	<p><?php _e("The status that applies during the exception.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div>
	<label for="Exception_Reason"><?php _e("Reason", 'ultimate-appointment-scheduling') ?></label>
	<input name="Exception_Reason" id="Exception_Reason" type="text" value="<?php echo $Exception->Exception_Reason;?>" size="60" />
	<p><?php _e("The reason for the exception (if you'd like it to be displayed).", 'ultimate-appointment-scheduling') ?></p>
</div>
<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Edit Exception', 'ultimate-appointment-scheduling') ?>"  /></p></form>

</div>
</div>
