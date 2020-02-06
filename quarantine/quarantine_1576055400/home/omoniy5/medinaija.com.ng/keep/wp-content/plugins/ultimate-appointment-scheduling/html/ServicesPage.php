<div id="col-right">
<div class="col-wrap">


<!-- Display a list of the categories which have already been created -->
<?php wp_nonce_field(); ?>
<?php wp_referer_field(); ?>

<?php 
	$params = array(
		'posts_per_page' => -1, 
		'post_type' => 'uasp-service',
		'orderby' => 'title'
	);
	if (isset($_GET['OrderBy']) and $_GET['DisplayPage'] == "Services") {
		$params['orderby'] = $_GET['OrderBy'];
		$params['order'] = $_GET['Order'];
	}
	$Services = get_posts($params);
	
?>

<form action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_MassDeleteServices&DisplayPage=Services" method="post">   
<div class="tablenav top">
		<div class="alignleft actions">
				<select name='action'>
  					<option value='-1' selected='selected'><?php _e("Bulk Actions", 'ultimate-appointment-scheduling') ?></option>
						<option value='delete'>Delete</option>
				</select>
				<input type="submit" name="" id="doaction" class="button-secondary action" value="<?php _e('Apply', 'ultimate-appointment-scheduling') ?>"  />
		</div>
</div>

<table class="wp-list-table widefat fixed tags sorttable services-list" cellspacing="0">
	<thead>
		<tr>
			<th scope='col' id='cb' class='manage-column column-cb check-column'  style="">
				<input type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style="">
				<?php 
					if ($_GET['OrderBy'] == "title" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Services&OrderBy=title&Order=DESC'>";}
				 	else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Services&OrderBy=title&Order=ASC'>";} 
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
					if ($_GET['OrderBy'] == "title" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Services&OrderBy=title&Order=DESC'>";}
				 	else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Services&OrderBy=title&Order=ASC'>";} 
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
		if ($Services) { 
	  		foreach ($Services as $Service) {
				echo "<tr id='Service-item-" . $Service->ID ."' class='Service-list-item'>";
				echo "<th scope='row' class='check-column'>";
				echo "<input type='checkbox' name='Services_Bulk[]' value='" . $Service->ID ."' />";
				echo "</th>";
				echo "<td class='name column-name'>";
				echo "<strong>";
				echo "<a class='row-title' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_ServiceDetails&Selected=Service&Service_ID=" . $Service->ID ."' title='Edit " . $Service->post_title . "'>" . $Service->post_title . "</a></strong>";
				echo "<br />";
				echo "<div class='row-actions'>";
				/*echo "<span class='edit'>";
				echo "<a href='admin.php?page=EWD-UASP-options&Action=UPCP_Category_Details&Selected=Category&Category_ID=" . $Category->Category_ID ."'>Edit</a>";
	 			echo " | </span>";*/
				echo "<span class='delete'>";
				echo "<a class='delete-tag' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_DeleteService&DisplayPage=Services&Service_ID=" . $Service->ID ."'>" . __("Delete", 'ultimate-appointment-scheduling') . "</a>";
	 			echo "</span>";
				echo "</div>";
				echo "<div class='hidden' id='inline_" . $Service->ID ."'>";
				echo "<div class='name'>" . $Service->post_title . "</div>";
				echo "</div>";
				echo "</td>";
				echo "<td class='description column-description'>" . $Service->post_content . "</td>";
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

<!-- Form to create a new Service -->
<div id="col-left">
<div class="col-wrap">

<div class="form-wrap">
<h3><?php _e("Add a New Service", 'ultimate-appointment-scheduling') ?></h3>
<form id="addcat" method="post" action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_AddService&DisplayPage=Services" class="validate" enctype="multipart/form-data">
<input type="hidden" name="action" value="Add_Service" />
<?php wp_nonce_field( 'EWD_UASP_Admin_Nonce', 'EWD_UASP_Admin_Nonce' );  ?>
<?php wp_referer_field(); ?>
<div class="form-field form-required">
	<label for="Service_Name"><?php _e("Name", 'ultimate-appointment-scheduling') ?></label>
	<input name="Service_Name" id="Service_Name" type="text" value="" size="60" />
	<p><?php _e("The name of the service that will be displayed.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field">
	<label for="Service_Description"><?php _e("Description", 'ultimate-appointment-scheduling') ?></label>
	<textarea name="Service_Description" id="Service_Description" rows="5" cols="40"></textarea>
	<p><?php _e("The description of the service, to help customers itentify it.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field form-required">
	<label for="Service_Capacity"><?php _e("Capacity", 'ultimate-appointment-scheduling') ?></label>
	<input name="Service_Capacity" id="Service_Capacity" type="text" value="" size="60" />
	<p><?php _e("The number of clients that can sign up for a given session of a service (eg: class size).", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field form-required">
	<label for="Service_Duration"><?php _e("Duration", 'ultimate-appointment-scheduling') ?></label>
	<input name="Service_Duration" id="Service_Duration" type="text" value="" size="60" />
	<p><?php _e("How long it takes for the service to happen (appointment length in minutes).", 'ultimate-appointment-scheduling') ?></p>
</div>
<div class="form-field form-required">
	<label for="Service_Price"><?php _e("Price", 'ultimate-appointment-scheduling') ?></label>
	<input name="Service_Price" id="Service_Price" type="text" value="" size="60" />
	<p><?php _e("How much it costs to sign up for the service.", 'ultimate-appointment-scheduling') ?></p>
</div>

<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Add New Service', 'ultimate-appointment-scheduling') ?>"  /></p></form></div>
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
		