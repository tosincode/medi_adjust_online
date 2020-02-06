<div id="col-right">
<div class="col-wrap">


<!-- Display a list of the categories which have already been created -->
<?php wp_nonce_field(); ?>
<?php wp_referer_field(); ?>

<?php 
	$params = array(
		'posts_per_page' => -1, 
		'post_type' => 'uasp-location',
		'orderby' => 'title'
	);
	if (isset($_GET['OrderBy']) and $_GET['DisplayPage'] == "Locations") {
		$params['orderby'] = $_GET['OrderBy'];
		$params['order'] = $_GET['Order'];
	}
	$Locations = get_posts($params);
?>

<form action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_MassDeleteLocations&DisplayPage=Locations" method="post">   
<div class="tablenav top">
		<div class="alignleft actions">
				<select name='action'>
  					<option value='-1' selected='selected'><?php _e("Bulk Actions", 'ultimate-appointment-scheduling') ?></option>
						<option value='delete'>Delete</option>
				</select>
				<input type="submit" name="" id="doaction" class="button-secondary action" value="<?php _e('Apply', 'ultimate-appointment-scheduling') ?>"  />
		</div>
</div>

<table class="wp-list-table widefat fixed tags sorttable locations-list" cellspacing="0">
	<thead>
		<tr>
			<th scope='col' id='cb' class='manage-column column-cb check-column'  style="">
				<input type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style="">
				<?php 
					if ($_GET['OrderBy'] == "title" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Locations&OrderBy=title&Order=DESC'>";}
				 	else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Locations&OrderBy=title&Order=ASC'>";} 
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
					if ($_GET['OrderBy'] == "title" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Locations&OrderBy=title&Order=DESC'>";}
				 	else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Locations&OrderBy=title&Order=ASC'>";} 
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
		if ($Locations) { 
	  		foreach ($Locations as $Location) {
				echo "<tr id='location-item-" . $Location->ID ."' class='location-list-item'>";
				echo "<th scope='row' class='check-column'>";
				echo "<input type='checkbox' name='Locations_Bulk[]' value='" . $Location->ID ."' />";
				echo "</th>";
				echo "<td class='name column-name'>";
				echo "<strong>";
				echo "<a class='row-title' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_LocationDetails&Selected=Location&Location_ID=" . $Location->ID ."' title='Edit " . $Location->post_title . "'>" . $Location->post_title . "</a></strong>";
				echo "<br />";
				echo "<div class='row-actions'>";
				/*echo "<span class='edit'>";
				echo "<a href='admin.php?page=EWD-UASP-options&Action=UPCP_Category_Details&Selected=Category&Category_ID=" . $Category->Category_ID ."'>Edit</a>";
	 			echo " | </span>";*/
				echo "<span class='delete'>";
				echo "<a class='delete-tag' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_DeleteLocation&DisplayPage=Locations&Location_ID=" . $Location->ID ."'>" . __("Delete", 'ultimate-appointment-scheduling') . "</a>";
	 			echo "</span>";
				echo "</div>";
				echo "<div class='hidden' id='inline_" . $Location->ID ."'>";
				echo "<div class='name'>" . $Location->post_title . "</div>";
				echo "</div>";
				echo "</td>";
				echo "<td class='description column-description'>" . $Location->post_content . "</td>";
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

<!-- Form to create a new location -->
<div id="col-left">
<div class="col-wrap">

<div class="form-wrap">
<h3><?php _e("Add a New Location", 'ultimate-appointment-scheduling') ?></h3>
<form id="addcat" method="post" action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_AddLocation&DisplayPage=Locations" class="validate" enctype="multipart/form-data">
<input type="hidden" name="action" value="Add_Location" />
<?php wp_nonce_field( 'EWD_UASP_Admin_Nonce', 'EWD_UASP_Admin_Nonce' );  ?>
<?php wp_referer_field(); ?>
<div class="form-field form-required">
	<label for="Location_Name"><?php _e("Name", 'ultimate-appointment-scheduling') ?></label>
	<input name="Location_Name" id="Location_Name" type="text" value="" size="60" />
	<p><?php _e("The name of the location that will be displayed.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field">
	<label for="Location_Description"><?php _e("Description", 'ultimate-appointment-scheduling') ?></label>
	<textarea name="Location_Description" id="Location_Description" rows="5" cols="40"></textarea>
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
			<!--<td><input type='checkbox' name='Monday_Open_Toggle' value='Yes' /></td>-->
			<td><label for='Monday_Open_Toggle'>Monday</label></td>
			<td><select name='Monday_Open_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><select name='Monday_Close_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><input type='text' name='Monday_Note' value='' /></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Tuesday_Open_Toggle' value='Yes' /></td>-->
			<td><label for='Tuesday_Open_Toggle'>Tuesday</label></td>
			<td><select name='Tuesday_Open_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><select name='Tuesday_Close_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><input type='text' name='Tuesday_Note' value='' /></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Wednesday_Open_Toggle' value='Yes' /></td>-->
			<td><label for='Wednesday_Open_Toggle'>Wednesday</label></td>
			<td><select name='Wednesday_Open_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><select name='Wednesday_Close_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><input type='text' name='Wednesday_Note' value='' /></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Thursday_Open_Toggle' value='Yes' /></td>-->
			<td><label for='Thursday_Open_Toggle'>Thursday</label></td>
			<td><select name='Thursday_Open_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><select name='Thursday_Close_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><input type='text' name='Thursday_Note' value='' /></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Friday_Open_Toggle' value='Yes' /></td>-->
			<td><label for='Friday_Open_Toggle'>Friday</label></td>
			<td><select name='Friday_Open_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><select name='Friday_Close_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><input type='text' name='Friday_Note' value='' /></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Saturday_Open_Toggle' value='Yes' /></td>-->
			<td><label for='Saturday_Open_Toggle'>Saturday</label></td>
			<td><select name='Saturday_Open_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><select name='Saturday_Close_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><input type='text' name='Saturday_Note' value='' /></td>
		</tr>
		<tr>
			<!--<td><input type='checkbox' name='Sunday_Open_Toggle' value='Yes' /></td>-->
			<td><label for='Sunday_Open_Toggle'>Sunday</label></td>
			<td><select name='Sunday_Open_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><select name='Sunday_Close_Time'><?php EWD_UASP_Return_Select_Hours() ?></select></td>
			<td><input type='text' name='Sunday_Note' value='' /></td>
		</tr>
	</tbody>
</table>

<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Add New Location', 'ultimate-appointment-scheduling') ?>"  /></p></form></div>
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
		