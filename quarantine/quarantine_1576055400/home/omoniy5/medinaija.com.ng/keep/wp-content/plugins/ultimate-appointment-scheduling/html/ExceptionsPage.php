<!-- List of the appointments which have already been created -->
<div id="col-right">
<div class="col-wrap">

<?php wp_nonce_field(); ?>
<?php wp_referer_field(); ?>

<?php 
			if (isset($_GET['Page'])) {$Page = $_GET['Page'];}
			else {$Page = 1;}
			
			$Sql = "SELECT * FROM $ewd_usap_exceptions_table_name ";
				if (isset($_GET['OrderBy']) and $_GET['DisplayPage'] == "Dashboard") {$Sql .= "ORDER BY " . $_GET['OrderBy'] . " " . $_GET['Order'] . " ";}
				else {$Sql .= "ORDER BY Exception_Start ";}
				$Sql .= "LIMIT " . ($Page - 1)*20 . ",20";
				$myrows = $wpdb->get_results($Sql);
				$TotalExceptions = $wpdb->get_results("SELECT Exception_ID FROM $ewd_usap_exceptions_table_name");
				$num_rows = $wpdb->num_rows; 
				$Number_of_Pages = ceil($wpdb->num_rows/20);
				$Current_Page_With_Order_By = "admin.php?page=EWD-UASP-options&DisplayPage=Exceptions";
				if (isset($_GET['OrderBy'])) {$Current_Page_With_Order_By .= "&OrderBy=" .$_GET['OrderBy'] . "&Order=" . $_GET['Order'];}?>

<form action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_MassDeleteAppointments" method="post">    
<div class="tablenav top">
		<div class="alignleft actions">
				<select name='action'>
  					<option value='-1' selected='selected'><?php _e("Bulk Actions", 'ultimate-appointment-scheduling') ?></option>
						<option value='delete'><?php _e("Delete", 'ultimate-appointment-scheduling') ?></option>
				</select>
				<input type="submit" name="" id="doaction" class="button-secondary action" value="<?php _e('Apply', 'ultimate-appointment-scheduling') ?>"  />
		</div>
		<div class='tablenav-pages <?php if ($Number_of_Pages == 1) {echo "one-page";} ?>'>
				<span class="displaying-num"><?php echo $wpdb->num_rows; ?> <?php _e("items", 'ultimate-appointment-scheduling') ?></span>
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
				<?php if ($_GET['OrderBy'] == "Location_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Location_Name&Order=DESC'>";}
				 	else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Location_Name&Order=ASC'>";} ?>
					<span><?php _e("Location", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Service_Provider_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Service_Provider_Name&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Service_Provider_Name&Order=ASC'>";} ?>
					<span><?php _e("Service Provider", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Exception_Start" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_Start&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_Start&Order=ASC'>";} ?>
					<span><?php _e("Start Date/Time", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Exception_End" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_End&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_End&Order=ASC'>";} ?>
					<span><?php _e("End Date/Time", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Exception_Status" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_Status&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_Status&Order=ASC'>";} ?>
					<span><?php _e("Status", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Exception_Reason" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_Reason&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_Reason&Order=ASC'>";} ?>
					<span><?php _e("Reason", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th scope='col' id='cb' class='manage-column column-cb check-column'  style="">
				<input type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Location_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Location_Name&Order=DESC'>";}
				 	else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Location_Name&Order=ASC'>";} ?>
					<span><?php _e("Location", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Service_Provider_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Service_Provider_Name&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Service_Provider_Name&Order=ASC'>";} ?>
					<span><?php _e("Service Provider", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Exception_Start" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_Start&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_Start&Order=ASC'>";} ?>
					<span><?php _e("Start Date/Time", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Exception_End" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_End&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_End&Order=ASC'>";} ?>
					<span><?php _e("End Date/Time", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Exception_Status" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_Status&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_Status&Order=ASC'>";} ?>
					<span><?php _e("Status", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
			<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
				<?php if ($_GET['OrderBy'] == "Exception_Reason" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_Reason&Order=DESC'>";}
					else {echo "<a href='admin.php?page=EWD-UASP-options&DisplayPage=Exceptions&OrderBy=Exception_Reason&Order=ASC'>";} ?>
					<span><?php _e("Reason", 'ultimate-appointment-scheduling') ?></span>
					<span class="sorting-indicator"></span>
				</a>
			</th>
		</tr>
	</tfoot>

	<tbody id="the-list" class='list:tag'>
		
		<?php
			if ($myrows) { 
	  			foreach ($myrows as $Exception) {
					echo "<tr id='Item" . $Exception->Exception_ID ."'>";
					echo "<th scope='row' class='check-column'>";
					echo "<input type='checkbox' name='Exceptions_Bulk[]' value='" . $Exception->Exception_ID ."' />";
					echo "</th>";
					echo "<td class='name column-name'>";
					echo "<strong>";
					echo "<a class='row-title' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_ExceptionDetails&Selected=Exception&Exception_ID=" . $Exception->Exception_ID ."' title='Edit " . $Exception->Location_Name . "'>" . $Exception->Location_Name . "</a></strong>";
					echo "<br />";
					echo "<div class='row-actions'>";
					echo "<span class='delete'>";
					echo "<a class='delete-tag' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_DeleteException&DisplayPage=Exceptions&Exception_ID=" . $Exception->Exception_ID ."'>" . __("Delete", 'ultimate-appointment-scheduling') . "</a>";
		 			echo "</span>";
					echo "</div>";
					echo "<div class='hidden' id='inline_" . $Exception->Exception_ID ."'>";
					echo "<div class='name'>" . $Exception->Location_Name . "</div>";
					echo "</div>";
					echo "</td>";
					echo "<td class='name column-name'>";
					echo "<strong>";
					echo "<a class='row-title' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_ExceptionDetails&Selected=Exception&Exception_ID=" . $Exception->Exception_ID ."' title='Edit " . $Exception->Service_Provider_Name . "'>" . $Exception->Service_Provider_Name . "</a></strong>";
					echo "<br />";
					echo "<div class='row-actions'>";
					echo "<span class='delete'>";
					echo "<a class='delete-tag' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_DeleteException&DisplayPage=Exceptions&Exception_ID=" . $Exception->Exception_ID ."'>" . __("Delete", 'ultimate-appointment-scheduling') . "</a>";
		 			echo "</span>";
					echo "</div>";
					echo "<div class='hidden' id='inline_" . $Exception->Exception_ID ."'>";
					echo "<div class='name'>" . $Exception->Service_Provider_Name . "</div>";
					echo "</div>";
					echo "</td>";
					echo "<td class='start column-start'>" . $Exception->Exception_Start . "</td>";
					echo "<td class='service column-service'>" . $Exception->Exception_End . "</td>";
					echo "<td class='provider column-provider'>" . $Exception->Exception_Status . "</td>";
					echo "<td class='location column-location'>" . $Exception->Exception_Reason . "</td>";
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
				<span class="displaying-num"><?php echo $wpdb->num_rows; ?> <?php _e("items", 'ultimate-appointment-scheduling') ?></span>
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

<br class="clear" />
</div>
</div>

<!-- Add a new exception using the form below -->
<div id="col-left">
<div class="col-wrap">


<div class="form-wrap">
<h3><?php _e("Add New Exception", 'ultimate-appointment-scheduling') ?></h3>
<form id="addtag" method="post" action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_AddException&DisplayPage=Exceptions" class="validate" enctype="multipart/form-data">
<input type="hidden" name="action" value="Add_Exception" />
<?php wp_nonce_field( 'EWD_UASP_Admin_Nonce', 'EWD_UASP_Admin_Nonce' );  ?>
<?php wp_referer_field(); ?>

<div class="form-field">
	<label for="Location_ID"><?php _e("Location:", 'ultimate-appointment-scheduling') ?></label>
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
	<label for="Service_Provider_ID"><?php _e("Service Provider:", 'ultimate-appointment-scheduling') ?></label>
	<select name="Service_Provider_ID" id="Service_Provider_ID">
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
	<p><?php _e("The start date/time of the exception (Formatted 'YYYY-MM-DD HH:MM:SS').", 'ultimate-appointment-scheduling') ?></p>
</div>
<div>
	<label for="Exception_End"><?php _e("Exception End Date/Time", 'ultimate-appointment-scheduling') ?></label>
	<input name="Exception_End" id="Exception_End" type="datetime" value="<?php echo $Exception->Exception_End;?>" size="60" />
	<p><?php _e("The end date/time of the exception. (Formatted 'YYYY-MM-DD HH:MM:SS').", 'ultimate-appointment-scheduling') ?></p>
</div>
<div>
	<label for="Exception_Status"><?php _e("Status", 'ultimate-appointment-scheduling') ?></label>
	<select name="Exception_Status" id="Exception_Status" >
		<option value='Open'>Open</option>
		<option value='Closed'>Closed</option>
	</select>
	<p><?php _e("The status that applies during the exception.", 'ultimate-appointment-scheduling') ?></p>
</div>
<div>
	<label for="Exception_Reason"><?php _e("Reason", 'ultimate-appointment-scheduling') ?></label>
	<input name="Exception_Reason" id="Exception_Reason" type="text" value="<?php echo $Exception->Exception_Reason;?>" size="60" />
	<p><?php _e("The reason for the exception (if you'd like it to be displayed).", 'ultimate-appointment-scheduling') ?></p>
</div>
<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Add New Exception', 'ultimate-appointment-scheduling') ?>"  /></p></form>

</div>

</div>
</div>
