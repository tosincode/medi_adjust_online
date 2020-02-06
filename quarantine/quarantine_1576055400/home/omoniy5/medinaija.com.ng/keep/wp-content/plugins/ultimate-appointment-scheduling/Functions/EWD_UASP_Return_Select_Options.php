<?php

function EWD_UASP_Return_Select_Hours($CurrentlySelected = "", $Type = "Location") {
	if ($Type == "Location") {$End_Text = __("Closed", 'ultimate-appointment-scheduling');}
	else {$End_Text = __("Off", 'ultimate-appointment-scheduling');}
?>
	<option value='24:00' <?php if ($CurrentlySelected == "24:00") {echo "selected";} ?>><?php echo $End_Text; ?></option>
	<option value='0:00' <?php if ($CurrentlySelected == "0:00") {echo "selected";} ?>>Midnight</option>
	<option value='0:30' <?php if ($CurrentlySelected == "0:30") {echo "selected";} ?>>0:30</option>
	<option value='1:00' <?php if ($CurrentlySelected == "1:00") {echo "selected";} ?>>1:00</option>
	<option value='1:30' <?php if ($CurrentlySelected == "1:30") {echo "selected";} ?>>1:30</option>
	<option value='2:00' <?php if ($CurrentlySelected == "2:00") {echo "selected";} ?>>2:00</option>
	<option value='2:30' <?php if ($CurrentlySelected == "2:30") {echo "selected";} ?>>2:30</option>
	<option value='3:00' <?php if ($CurrentlySelected == "3:00") {echo "selected";} ?>>3:00</option>
	<option value='3:30' <?php if ($CurrentlySelected == "3:30") {echo "selected";} ?>>3:30</option>
	<option value='4:00' <?php if ($CurrentlySelected == "4:00") {echo "selected";} ?>>4:00</option>
	<option value='4:30' <?php if ($CurrentlySelected == "4:30") {echo "selected";} ?>>4:30</option>
	<option value='5:00' <?php if ($CurrentlySelected == "5:00") {echo "selected";} ?>>5:00</option>
	<option value='5:30' <?php if ($CurrentlySelected == "5:30") {echo "selected";} ?>>5:30</option>
	<option value='6:00' <?php if ($CurrentlySelected == "6:00") {echo "selected";} ?>>6:00</option>
	<option value='6:30' <?php if ($CurrentlySelected == "6:30") {echo "selected";} ?>>6:30</option>
	<option value='7:00' <?php if ($CurrentlySelected == "7:00") {echo "selected";} ?>>7:00</option>
	<option value='7:30' <?php if ($CurrentlySelected == "7:30") {echo "selected";} ?>>7:30</option>
	<option value='8:00' <?php if ($CurrentlySelected == "8:00") {echo "selected";} ?>>8:00</option>
	<option value='8:30' <?php if ($CurrentlySelected == "8:30") {echo "selected";} ?>>8:30</option>
	<option value='9:00' <?php if ($CurrentlySelected == "9:00") {echo "selected";} ?>>9:00</option>
	<option value='9:30' <?php if ($CurrentlySelected == "9:30") {echo "selected";} ?>>9:30</option>
	<option value='10:00' <?php if ($CurrentlySelected == "10:00") {echo "selected";} ?>>10:00</option>
	<option value='10:30' <?php if ($CurrentlySelected == "10:30") {echo "selected";} ?>>10:30</option>
	<option value='11:00' <?php if ($CurrentlySelected == "11:00") {echo "selected";} ?>>11:00</option>
	<option value='11:30' <?php if ($CurrentlySelected == "11:30") {echo "selected";} ?>>11:30</option>
	<option value='12:00' <?php if ($CurrentlySelected == "12:00") {echo "selected";} ?>>12:00</option>
	<option value='12:30' <?php if ($CurrentlySelected == "12:30") {echo "selected";} ?>>12:30</option>
	<option value='13:00' <?php if ($CurrentlySelected == "13:00") {echo "selected";} ?>>13:00</option>
	<option value='13:30' <?php if ($CurrentlySelected == "13:30") {echo "selected";} ?>>13:30</option>
	<option value='14:00' <?php if ($CurrentlySelected == "14:00") {echo "selected";} ?>>14:00</option>
	<option value='14:30' <?php if ($CurrentlySelected == "14:30") {echo "selected";} ?>>14:30</option>
	<option value='15:00' <?php if ($CurrentlySelected == "15:00") {echo "selected";} ?>>15:00</option>
	<option value='15:30' <?php if ($CurrentlySelected == "15:30") {echo "selected";} ?>>15:30</option>
	<option value='16:00' <?php if ($CurrentlySelected == "16:00") {echo "selected";} ?>>16:00</option>
	<option value='16:30' <?php if ($CurrentlySelected == "16:30") {echo "selected";} ?>>16:30</option>
	<option value='17:00' <?php if ($CurrentlySelected == "17:00") {echo "selected";} ?>>17:00</option>
	<option value='17:30' <?php if ($CurrentlySelected == "17:30") {echo "selected";} ?>>17:30</option>
	<option value='18:00' <?php if ($CurrentlySelected == "18:00") {echo "selected";} ?>>18:00</option>
	<option value='18:30' <?php if ($CurrentlySelected == "18:30") {echo "selected";} ?>>18:30</option>
	<option value='19:00' <?php if ($CurrentlySelected == "19:00") {echo "selected";} ?>>19:00</option>
	<option value='19:30' <?php if ($CurrentlySelected == "19:30") {echo "selected";} ?>>19:30</option>
	<option value='20:00' <?php if ($CurrentlySelected == "20:00") {echo "selected";} ?>>20:00</option>
	<option value='20:30' <?php if ($CurrentlySelected == "20:30") {echo "selected";} ?>>20:30</option>
	<option value='21:00' <?php if ($CurrentlySelected == "21:00") {echo "selected";} ?>>21:00</option>
	<option value='21:30' <?php if ($CurrentlySelected == "21:30") {echo "selected";} ?>>21:30</option>
	<option value='22:00' <?php if ($CurrentlySelected == "22:00") {echo "selected";} ?>>22:00</option>
	<option value='22:30' <?php if ($CurrentlySelected == "22:30") {echo "selected";} ?>>22:30</option>
	<option value='23:00' <?php if ($CurrentlySelected == "23:00") {echo "selected";} ?>>23:00</option>
	<option value='23:30' <?php if ($CurrentlySelected == "23:30") {echo "selected";} ?>>23:30</option>
<?php
}

function EWD_UASP_Return_Calendar_Select_Inputs($Location_Post_ID = "", $Service_Post_ID = "", $Service_Provider_Post_ID = "") {
	
?>
	<div class="ewd-uasp-calendar-selector ewd-uasp-calendar-location-div">
		<label for="EWD_UASP_Calendar_Location"><?php _e("Location:", 'ultimate-appointment-scheduling') ?></label>
		<select name="EWD_UASP_Calendar_Location" id="ewd-uasp-calendar-location">
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
				if ($Location->ID == $Appointment->Location_Post_ID) {echo "selected='selected'";}
				echo " >" . $Location->post_title . "</option>";
			} 
		?>
		</select>
		<p><?php /* _e("What location will the appointment happen at?", 'ultimate-appointment-scheduling') */ ?></p>
	</div>
	<div class="ewd-uasp-calendar-selector ewd-uasp-calendar-service-div">
		<label for="EWD_UASP_Calendar_Service"><?php _e("Service:", 'ultimate-appointment-scheduling') ?></label>
		<select name="EWD_UASP_Calendar_Service" id="ewd-uasp-calendar-service">
			<option value=''></option>
		<?php 
			$params = array(
				'posts_per_page' => -1, 
				'post_type' => 'uasp-service'
			);
			$Services = get_posts($params);
		?>
		<?php 
			foreach ($Services as $Service) {
				echo "<option value='" . $Service->ID . "' ";
				if ($Service->ID == $Appointment->Service_Post_ID) {echo "selected='selected'";}
				echo " >" . $Service->post_title . "</option>";
			} 
		?>
		</select>
		<p><?php /* _e("What service is the appointment for?", 'ultimate-appointment-scheduling') */ ?></p>
	</div>
	<div class="ewd-uasp-calendar-selector ewd-uasp-calendar-service-provider-div">
		<label for="EWD_UASP_Calendar_Service_Provider"><?php _e("Service Provider:", 'ultimate-appointment-scheduling') ?></label>
		<select name="EWD_UASP_Calendar_Service_Provider" id="ewd-uasp-calendar-service-provider">
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
							if ($Service_Provider->ID == $Appointment->Service_Provider_Post_ID) {echo "selected='selected'";}
							echo " >" . $Service_Provider->post_title . "</option>";
					} ?>
		</select>
		<p><?php /* _e("Who is the appointment being booked with?", 'ultimate-appointment-scheduling') */ ?></p>
	</div>

<?php 
}

?>