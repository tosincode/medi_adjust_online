<?php $Field = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ewd_uasp_fields_table_name WHERE Field_ID ='%d'", $_GET['Field_ID'])); ?>
		
		<div class="OptionTab ActiveTab" id="EditCustomField">
				
				<div id="col-left">
				<div class="col-wrap">
				<div class="form-wrap TagDetail">
						<a href="admin.php?page=EWD-UASP-options&DisplayPage=CustomFields" class="NoUnderline">&#171; <?php _e("Back", 'ultimate-appointment-scheduling') ?></a>
						<h3>Edit <?php echo $Field->Field_Name; echo "( ID: "; echo $Field->Field_ID; echo" )"; ?></h3>
						<form id="addtag" method="post" action="admin.php?page=EWD-UASP-options&Action=EWD_UASP_EditCustomField&DisplayPage=CustomFields" class="validate" enctype="multipart/form-data">
						<input type="hidden" name="action" value="Edit_Custom_Field" />
						<input type="hidden" name="Field_ID" value="<?php echo $Field->Field_ID; ?>" />
						<?php wp_nonce_field('EWD_UASP_Admin_Nonce', 'EWD_UASP_Admin_Nonce'); ?>
						<?php wp_referer_field(); ?>
						<div class="form-field form-required">
								<label for="Field_Name"><?php _e("Name", 'ultimate-appointment-scheduling') ?></label>
								<input name="Field_Name" id="Field_Name" type="text" value="<?php echo $Field->Field_Name;?>" size="60" />
								<p><?php _e("The name of the field you will see.", 'ultimate-appointment-scheduling') ?></p>
						</div>
						<div class="form-field form-required">
								<label for="Field_Slug"><?php _e("Slug", 'ultimate-appointment-scheduling') ?></label>
								<input name="Field_Slug" id="Field_Slug" type="text" value="<?php echo $Field->Field_Slug;?>" size="60" />
								<p><?php _e("An all-lowercase name that will be used to insert the field.", 'ultimate-appointment-scheduling') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Type"><?php _e("Type", 'ultimate-appointment-scheduling') ?></label>
								<select name="Field_Type" id="Field_Type">
										<option value='text' <?php if ($Field->Field_Type == "text") {echo "selected=selected";} ?>><?php _e("Short Text", 'ultimate-appointment-scheduling') ?></option>
										<option value='mediumint' <?php if ($Field->Field_Type == "mediumint") {echo "selected=selected";} ?>><?php _e("Integer", 'ultimate-appointment-scheduling') ?></option>
										<option value='select' <?php if ($Field->Field_Type == "select") {echo "selected=selected";} ?>><?php _e("Select Box", 'ultimate-appointment-scheduling') ?></option>
										<option value='radio' <?php if ($Field->Field_Type == "radio") {echo "selected=selected";} ?>><?php _e("Radio Button", 'ultimate-appointment-scheduling') ?></option>
										<option value='checkbox' <?php if ($Field->Field_Type == "checkbox") {echo "selected=selected";} ?>><?php _e("Checkbox", 'ultimate-appointment-scheduling') ?></option>
										<option value='textarea' <?php if ($Field->Field_Type == "textarea") {echo "selected=selected";} ?>><?php _e("Text Area", 'ultimate-appointment-scheduling') ?></option>
										<option value='date' <?php if ($Field->Field_Type == "date") {echo "selected=selected";} ?>><?php _e("Date", 'ultimate-appointment-scheduling') ?></option>
										<option value='datetime' <?php if ($Field->Field_Type == "datetime") {echo "selected=selected";} ?>><?php _e("Date/Time", 'ultimate-appointment-scheduling') ?></option>
								</select>
								<p><?php _e("The input method for the field and type of data that the field will hold.", 'ultimate-appointment-scheduling') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Description"><?php _e("Description", 'ultimate-appointment-scheduling') ?></label>
								<textarea name="Field_Description" id="Field_Description" rows="2" cols="40"><?php echo $Field->Field_Description;?></textarea>
								<p><?php _e("The description of the field, which you will see as the instruction for the field.", 'ultimate-appointment-scheduling') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Values"><?php _e("Input Values", 'ultimate-appointment-scheduling') ?></label>
								<input name="Field_Values" id="Field_Values" type="text" value="<?php echo $Field->Field_Values;?>"  size="60" />
								<p><?php _e("A comma-separated list of acceptable input values for this field. These values will be the options for select, checkbox, and radio inputs. All values will be accepted if left blank.", 'ultimate-appointment-scheduling') ?></p>
						</div>

						<div class="form-field">
							<label for="Field_Display"><?php _e("Display in Admin Table?", 'ultimate-appointment-scheduling') ?></label>
							<input type="radio" name="Field_Display" value='Yes' <?php if ($Field->Field_Display == "Yes") {echo "checked=checked";} ?> /><?php _e("Yes", 'ultimate-appointment-scheduling') ?><br />
							<input type="radio" name="Field_Display" value='No' <?php if ($Field->Field_Display == "No") {echo "checked=checked";} ?> /><?php _e("No", 'ultimate-appointment-scheduling') ?>
						</div>

						<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save Changes', 'ultimate-appointment-scheduling') ?>"  /></p>
						</form>
				</div>
				</div>
				</div>
		</div>