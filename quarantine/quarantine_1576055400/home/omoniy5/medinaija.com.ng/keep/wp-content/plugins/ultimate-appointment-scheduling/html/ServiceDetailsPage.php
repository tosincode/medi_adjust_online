<?php 
	$Service_ID = $_GET['Service_ID'];
	$Service = get_post($Service_ID);

	$Capacity = get_post_meta($Service_ID, 'Service Capacity', true);
	$Duration = get_post_meta($Service_ID, 'Service Duration', true);
	$Price = get_post_meta($Service_ID, 'Service Price', true);
	$Prepay = get_post_meta($Service_ID, 'Service Prepay', true);

?>

<!-- Form to edit a Service -->
<div id="col-left" class="ewd-uasp-location-edit-screen">
<div class="col-wrap">

<div class="form-wrap">
<h3><?php _e("Edit Service", 'ultimate-appointment-scheduling') ?></h3>
<form id="addcat" method="post" action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_EditService&DisplayPage=Services" class="validate" enctype="multipart/form-data">
<input type="hidden" name="action" value="Edit_Service" />
<input type="hidden" name="Service_ID" value="<?php echo $_GET['Service_ID']; ?>" />
<?php wp_nonce_field( 'EWD_UASP_Admin_Nonce', 'EWD_UASP_Admin_Nonce' );  ?>
<?php wp_referer_field(); ?>
<div class="form-field form-required">
	<label for="Service_Name"><?php _e("Name", 'ultimate-appointment-scheduling') ?></label>
	<input name="Service_Name" id="Service_Name" type="text" value="<?php echo $Service->post_title; ?>" size="60" />
	<p><?php _e("The name of the service that will be displayed.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field">
	<label for="Service_Description"><?php _e("Description", 'ultimate-appointment-scheduling') ?></label>
	<textarea name="Service_Description" id="Service_Description" rows="5" cols="40"><?php echo $Service->post_content; ?></textarea>
	<p><?php _e("The description of the service, to help customers itentify it.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field form-required">
	<label for="Service_Capacity"><?php _e("Capacity", 'ultimate-appointment-scheduling') ?></label>
	<input name="Service_Capacity" id="Service_Capacity" type="text" value="<?php echo $Capacity; ?>" size="60" />
	<p><?php _e("The number of clients that can sign up for a given session of a service (eg: class size).", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field form-required">
	<label for="Service_Duration"><?php _e("Duration", 'ultimate-appointment-scheduling') ?></label>
	<input name="Service_Duration" id="Service_Duration" type="text" value="<?php echo $Duration; ?>" size="60" />
	<p><?php _e("How long it takes for the service to happen (appointment length in minutes).", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field form-required">
	<label for="Service_Price"><?php _e("Price", 'ultimate-appointment-scheduling') ?></label>
	<input name="Service_Price" id="Service_Price" type="text" value="<?php echo $Price; ?>" size="60" />
	<p><?php _e("How much it costs to sign up for the service.", 'ultimate-appointment-scheduling') ?></p>
</div>

<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Edit Service', 'ultimate-appointment-scheduling') ?>"  /></p></form></div>
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
		