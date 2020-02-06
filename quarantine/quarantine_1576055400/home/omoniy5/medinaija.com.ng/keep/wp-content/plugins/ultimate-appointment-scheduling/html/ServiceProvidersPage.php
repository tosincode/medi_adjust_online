<div id="col-right">
<div class="col-wrap">


<!-- Display a list of the categories which have already been created -->
<?php wp_nonce_field(); ?>
<?php wp_referer_field(); ?>

<?php 
	$params = array(
		'posts_per_page' => -1, 
		'post_type' => 'uasp-provider',
		'orderby' => 'title'
	);
	if (isset($_GET['OrderBy']) and $_GET['DisplayPage'] == "Services") {
		$params['orderby'] = $_GET['OrderBy'];
		$params['order'] = $_GET['Order'];
	}
	$ServiceProviders = get_posts($params);
	
?>

<form action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_MassDeleteServiceProviders&DisplayPage=ServiceProviders" method="post">   
<div class="tablenav top">
		<div class="alignleft actions">
				<select name='action'>
  					<option value='-1' selected='selected'><?php _e("Bulk Actions", 'ultimate-appointment-scheduling') ?></option>
						<option value='delete'>Delete</option>
				</select>
				<input type="submit" name="" id="doaction" class="button-secondary action" value="<?php _e('Apply', 'ultimate-appointment-scheduling') ?>"  />
		</div>
</div>

<table class="wp-list-table widefat fixed tags sorttable service-providers-list" cellspacing="0">
	<thead>
		<tr>
			<th scope='col' id='cb' class='manage-column column-cb check-column'  style="">
				<input type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style="">
				<?php 
					if ($_GET['OrderBy'] == "title" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=ServiceProviders&OrderBy=title&Order=DESC'>";}
				 	else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=ServiceProviders&OrderBy=title&Order=ASC'>";} 
				?>
					<span><?php _e("Name", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='description' class='manage-column column-description  desc'  style="">
				<span><?php _e("Description", 'ultimate-appointment-scheduling') ?></span>
			</th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th scope='col' id='cb' class='manage-column column-cb check-column'  style="">
				<input type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style="">
				<?php 
					if ($_GET['OrderBy'] == "title" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=ServiceProviders&OrderBy=title&Order=DESC'>";}
				 	else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=ServiceProviders&OrderBy=title&Order=ASC'>";} 
				?>
					<span><?php _e("Name", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='description' class='manage-column column-description  desc'  style="">
				<span><?php _e("Description", 'ultimate-appointment-scheduling') ?></span>
			</th>
		</tr>
	</tfoot>

	<tbody id="the-list" class='list:tag'>
		
	<?php
		if ($ServiceProviders) { 
	  		foreach ($ServiceProviders as $ServiceProvider) {
				echo "<tr id='Service-item-" . $ServiceProvider->ID ."' class='Service-Provider-list-item'>";
				echo "<th scope='row' class='check-column'>";
				echo "<input type='checkbox' name='Service_Providers_Bulk[]' value='" . $ServiceProvider->ID ."' />";
				echo "</th>";
				echo "<td class='name column-name'>";
				echo "<strong>";
				echo "<a class='row-title' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_ServiceProviderDetails&Selected=ServiceProvider&Service_Provider_ID=" . $ServiceProvider->ID ."' title='Edit " . $ServiceProvider->post_title . "'>" . $ServiceProvider->post_title . "</a></strong>";
				echo "<br />";
				echo "<div class='row-actions'>";
				/*echo "<span class='edit'>";
				echo "<a href='admin.php?page=EWD-UASP-options&Action=UPCP_Category_Details&Selected=Category&Category_ID=" . $Category->Category_ID ."'>Edit</a>";
	 			echo " | </span>";*/
				echo "<span class='delete'>";
				echo "<a class='delete-tag' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_DeleteServiceProvider&DisplayPage=ServiceProviders&Service_Provider_ID=" . $ServiceProvider->ID ."'>" . __("Delete", 'ultimate-appointment-scheduling') . "</a>";
	 			echo "</span>";
				echo "</div>";
				echo "<div class='hidden' id='inline_" . $ServiceProvider->ID ."'>";
				echo "<div class='name'>" . $ServiceProvider->post_title . "</div>";
				echo "</div>";
				echo "</td>";
				echo "<td class='description column-description'>" . $ServiceProvider->post_content . "</td>";
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
				<input type="submit" name="" id="doaction" class="button-secondary action" value="Apply"  />
		</div>
		<br class="clear" />
</div>
</form>

<br class="clear" />
</div>
</div>

<!-- Form to create a new Service Provider -->
<div id="col-left">
<div class="col-wrap">

<div class="form-wrap">
<h3><?php _e("Add a New Service Provider", 'ultimate-appointment-scheduling') ?></h3>
<form id="addcat" method="post" action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_AddServiceProvider&DisplayPage=ServiceProviders" class="validate" enctype="multipart/form-data">
<input type="hidden" name="action" value="Add_Service_Provider" />
<?php wp_nonce_field( 'EWD_UASP_Admin_Nonce', 'EWD_UASP_Admin_Nonce' );  ?>
<?php wp_referer_field(); ?>
<div class="form-field form-required">
	<label for="Service_Provider_Name"><?php _e("Name", 'ultimate-appointment-scheduling') ?></label>
	<input name="Service_Provider_Name" id="Service_Provider_Name" type="text" value="" size="60" />
	<p><?php _e("The name of the service provider that will be displayed.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field">
	<label for="Service_Provider_Description"><?php _e("Description", 'ultimate-appointment-scheduling') ?></label>
	<textarea name="Service_Provider_Description" id="Service_Provider_Description" rows="5" cols="40"></textarea>
	<p><?php _e("The description of the service provider, to help customers itentify it.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field form-required">
	<label for="Service_Provider_Email"><?php _e("Email", 'ultimate-appointment-scheduling') ?></label>
	<input name="Service_Provider_Email" id="Service_Provider_Email" type="text" size="60" />
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
			echo "<input type='checkbox' name='Service_Provider_Services[]' value='" . $Service->ID . "' />" . $Service->post_title;
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
			<!--<td><input type='checkbox' name='Monday_Working_Toggle' value='' /></td>-->
			<td><label for='Monday_Working_Toggle'>Monday</label></td>
			<td>
				<select name="Monday_Location_ID" id="Monday_Location_ID">
				<?php foreach ($Locations as $Location) {echo "<option value='" . $Location->ID . "' >" . $Location->post_title . "</option>";} ?>
				</select>
			</td>
			<td><select name='Monday_Start_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
			<td><select name='Monday_Finish_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Tuesday_Working_Toggle' value='' /></td>-->
			<td><label for='Tuesday_Working_Toggle'>Tuesday</label></td>
			<td>
				<select name="Tuesday_Location_ID" id="Tuesday_Location_ID">
				<?php foreach ($Locations as $Location) {echo "<option value='" . $Location->ID . "' >" . $Location->post_title . "</option>";} ?>
				</select>
			</td>
			<td><select name='Tuesday_Start_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
			<td><select name='Tuesday_Finish_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Wednesday_Working_Toggle' value='' /></td>-->
			<td><label for='Wednesday_Working_Toggle'>Wednesday</label></td>
			<td>
				<select name="Wednesday_Location_ID" id="Wednesday_Location_ID">
				<?php foreach ($Locations as $Location) {echo "<option value='" . $Location->ID . "' >" . $Location->post_title . "</option>";} ?>
				</select>
			</td>
			<td><select name='Wednesday_Start_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
			<td><select name='Wednesday_Finish_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Thursday_Working_Toggle' value='' /></td>-->
			<td><label for='Thursday_Working_Toggle'>Thursday</label></td>
			<td>
				<select name="Thursday_Location_ID" id="Thursday_Location_ID">
				<?php foreach ($Locations as $Location) {echo "<option value='" . $Location->ID . "' >" . $Location->post_title . "</option>";} ?>
				</select>
			</td>
			<td><select name='Thursday_Start_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
			<td><select name='Thursday_Finish_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Friday_Working_Toggle' value='' /></td>-->
			<td><label for='Friday_Working_Toggle'>Friday</label></td>
			<td>
				<select name="Friday_Location_ID" id="Friday_Location_ID">
				<?php foreach ($Locations as $Location) {echo "<option value='" . $Location->ID . "' >" . $Location->post_title . "</option>";} ?>
				</select>
			</td>
			<td><select name='Friday_Start_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
			<td><select name='Friday_Finish_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Saturday_Working_Toggle' value='' /></td>-->
			<td><label for='Saturday_Working_Toggle'>Saturday</label></td>
			<td>
				<select name="Saturday_Location_ID" id="Saturday_Location_ID">
				<?php foreach ($Locations as $Location) {echo "<option value='" . $Location->ID . "' >" . $Location->post_title . "</option>";} ?>
				</select>
			</td>
			<td><select name='Saturday_Start_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
			<td><select name='Saturday_Finish_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Sunday_Working_Toggle' value='' /></td>-->
			<td><label for='Sunday_Working_Toggle'>Sunday</label></td>
			<td>
				<select name="Sunday_Location_ID" id="Sunday_Location_ID">
				<?php foreach ($Locations as $Location) {echo "<option value='" . $Location->ID . "' >" . $Location->post_title . "</option>";} ?>
				</select>
			</td>
			<td><select name='Sunday_Start_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
			<td><select name='Sunday_Finish_Time'><?php EWD_UASP_Return_Select_Hours("", "Provider") ?></select></td>
		</tr>
	</tbody>
</table>

<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Add New Service Provider', 'ultimate-appointment-scheduling') ?>"  /></p></form></div>
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
		