<?php
	if (isset($_POST['hide_uasp_review_box_hidden'])) {update_option('EWD_UASP_Hide_Dash_Review_Ask', sanitize_text_field($_POST['hide_uasp_review_box_hidden']));}
	$hideReview = get_option('EWD_UASP_Hide_Dash_Review_Ask');
	$Ask_Review_Date = get_option('EWD_UASP_Ask_Review_Date');
	if ($Ask_Review_Date == "") {$Ask_Review_Date = get_option("EWD_UASP_Install_Time") + 3600*24*4;}

	$Sql = "SELECT * FROM $ewd_usap_appointments_table_name ORDER BY Appointment_Start ASC LIMIT 0,10";
	$myrows = $wpdb->get_results($Sql);
?>


<!-- START NEW DASHBOARD -->

<div id="ewd-uasp-dashboard-content-area">

	<div id="ewd-uasp-dashboard-content-left">

		<?php if ($EWD_UASP_Full_Version != "Yes" or get_option("EWD_UASP_Trial_Happening") == "Yes") { ?>
			<div class="ewd-uasp-dashboard-new-widget-box ewd-widget-box-full">
				<div class="ewd-uasp-dashboard-new-widget-box-top">
					<form method="post" action="admin.php?page=EWD-UASP-options" class="ewd-uasp-dashboard-key-widget">
						<input class="ewd-uasp-dashboard-key-widget-input" name="Key" type="text" placeholder="<?php _e('Enter Product Key Here', 'ultimate-appointment-scheduling'); ?>">
						<input class="ewd-uasp-dashboard-key-widget-submit" name="EWD_UASP_Upgrade_To_Full" type="submit" value="<?php _e('UNLOCK PREMIUM', 'ultimate-appointment-scheduling'); ?>">
						<div class="ewd-uasp-dashboard-key-widget-text"><?php _e("Don't have a key? Use the", 'ultimate-appointment-scheduling'); ?> <a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" target="_blank"><?php _e("Upgrade Now", 'ultimate-appointment-scheduling'); ?></a> <?php _e("button above to purchase and unlock all premium features.", 'ultimate-appointment-scheduling'); ?></div>
					</form>
				</div>
			</div>
		<?php } ?>

		<div class="ewd-uasp-dashboard-new-widget-box ewd-widget-box-full" id="ewd-uasp-dashboard-support-widget-box">
			<div class="ewd-uasp-dashboard-new-widget-box-top"><?php _e("Get Support", 'ultimate-appointment-scheduling'); ?><span id="ewd-uasp-dash-mobile-support-down-caret">&nbsp;&nbsp;&#9660;</span><span id="ewd-uasp-dash-mobile-support-up-caret">&nbsp;&nbsp;&#9650;</span></div>
			<div class="ewd-uasp-dashboard-new-widget-box-bottom">
				<ul class="ewd-uasp-dashboard-support-widgets">
					<li>
						<a href="https://www.youtube.com/channel/UCZPuaoetCJB1vZOmpnMxJNw/" target="_blank">
							<img src="<?php echo plugins_url( '../images/ewd-support-icon-youtube.png', __FILE__ ); ?>">
							<div class="ewd-uasp-dashboard-support-widgets-text"><?php _e("YouTube Tutorials", 'ultimate-appointment-scheduling'); ?></div>
						</a>
					</li>
					<li>
						<a href="https://wordpress.org/plugins/ultimate-appointment-scheduling/#faq" target="_blank">
							<img src="<?php echo plugins_url( '../images/ewd-support-icon-faqs.png', __FILE__ ); ?>">
							<div class="ewd-uasp-dashboard-support-widgets-text"><?php _e("Plugin FAQs", 'ultimate-appointment-scheduling'); ?></div>
						</a>
					</li>
					<li>
						<a href="https://wordpress.org/support/plugin/ultimate-appointment-scheduling" target="_blank">
							<img src="<?php echo plugins_url( '../images/ewd-support-icon-forum.png', __FILE__ ); ?>">
							<div class="ewd-uasp-dashboard-support-widgets-text"><?php _e("Support Forum", 'ultimate-appointment-scheduling'); ?></div>
						</a>
					</li>
					<li>
						<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/documentation-ultimate-appointment-scheduling/" target="_blank">
							<img src="<?php echo plugins_url( '../images/ewd-support-icon-documentation.png', __FILE__ ); ?>">
							<div class="ewd-uasp-dashboard-support-widgets-text"><?php _e("Documentation", 'ultimate-appointment-scheduling'); ?></div>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="ewd-uasp-dashboard-new-widget-box ewd-widget-box-full" id="ewd-uasp-dashboard-optional-table">
			<div class="ewd-uasp-dashboard-new-widget-box-top"><?php _e("Upcoming Appointments", 'ultimate-appointment-scheduling'); ?><span id="ewd-uasp-dash-optional-table-down-caret">&nbsp;&nbsp;&#9660;</span><span id="ewd-uasp-dash-optional-table-up-caret">&nbsp;&nbsp;&#9650;</span></div>
			<div class="ewd-uasp-dashboard-new-widget-box-bottom">
				<table class='ewd-uasp-overview-table wp-list-table widefat fixed striped posts'>
					<thead>
						<tr>
							<th><?php _e("Name", 'ultimate-appointment-scheduling'); ?></th>
							<th><?php _e("Phone", 'ultimate-appointment-scheduling'); ?></th>
							<th><?php _e("Date/Time", 'ultimate-appointment-scheduling'); ?></th>
							<th><?php _e("Service", 'ultimate-appointment-scheduling'); ?></th>
							<th><?php _e("Provider", 'ultimate-appointment-scheduling'); ?></th>
							<th><?php _e("Location", 'ultimate-appointment-scheduling'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($myrows) { 
				  			foreach ($myrows as $Appointment) {
								echo "<tr id='Item" . $Catalogue->Catalogue_ID ."'>";
								echo "<td class='name column-name'>";
								echo "<strong>";
								echo "<a class='row-title' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_AppointmentDetails&Selected=Appointment&Appointment_ID=" . $Appointment->Appointment_ID ."' title='Edit " . $Appointment->Appointment_Client_Name . "'>" . $Appointment->Appointment_Client_Name . "</a></strong>";
								echo "<br />";
								echo "<div class='row-actions'>";
								echo "<span class='delete'>";
								echo "<a class='delete-tag' href='admin.php?page=EWD-UASP-options&Action=EWD_UASP_DeleteAppointment&DisplayPage=Appointment&Appointment_ID=" . $Appointment->Appointment_ID ."'>" . __("Delete", 'ultimate-appointment-scheduling') . "</a>";
					 			echo "</span>";
								echo "</div>";
								echo "<div class='hidden' id='inline_" . $Appointment->Appointment_ID ."'>";
								echo "<div class='name'>" . $Appointment->Appointment_Client_Name . "</div>";
								echo "</div>";
								echo "</td>";
								echo "<td class='email column-email'>" . $Appointment->Appointment_Client_Email . "</td>";
								echo "<td class='start column-start'>" . $Appointment->Appointment_Start . "</td>";
								echo "<td class='service column-service'>" . $Appointment->Service_Name . "</td>";
								echo "<td class='provider column-provider'>" . $Appointment->Service_Provider_Name . "</td>";
								echo "<td class='location column-location'>" . $Appointment->Location_Name . "</td>";
								echo "</tr>";
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="ewd-uasp-dashboard-new-widget-box <?php echo ( ($hideReview != 'Yes' and $Ask_Review_Date < time()) ? 'ewd-widget-box-two-thirds' : 'ewd-widget-box-full' ); ?>">
			<div class="ewd-uasp-dashboard-new-widget-box-top">What People Are Saying</div>
			<div class="ewd-uasp-dashboard-new-widget-box-bottom">
				<ul class="ewd-uasp-dashboard-testimonials">
					<?php $randomTestimonial = rand(0,2);
					if($randomTestimonial == 0){ ?>
						<li id="ewd-uasp-dashboard-testimonial-one">
							<img src="<?php echo plugins_url( '../images/dash-asset-stars.png', __FILE__ ); ?>">
							<div class="ewd-uasp-dashboard-testimonial-title">"Works Great! Excellent Support!"</div>
							<div class="ewd-uasp-dashboard-testimonial-author">- @looksharp</div>
							<div class="ewd-uasp-dashboard-testimonial-text">It has most of the features you need and it works great! When it comes to support, Etoile Web Design provides excellent customer support... <a href="https://wordpress.org/support/topic/works-great-excellent-support-17/" target="_blank">read more</a></div>
						</li>
					<?php }
					if($randomTestimonial == 1){ ?>
						<li id="ewd-uasp-dashboard-testimonial-two">
							<img src="<?php echo plugins_url( '../images/dash-asset-stars.png', __FILE__ ); ?>">
							<div class="ewd-uasp-dashboard-testimonial-title">"Great Appointment Plugin!"</div>
							<div class="ewd-uasp-dashboard-testimonial-author">- @lefo1959</div>
							<div class="ewd-uasp-dashboard-testimonial-text">This plugin not only does what I want, but it does it perfectly! <a href="https://wordpress.org/support/topic/great-appointment-plugin-2/" target="_blank">read more</a></div>
						</li>
					<?php }
					if($randomTestimonial == 2){ ?>
						<li id="ewd-uasp-dashboard-testimonial-three">
							<img src="<?php echo plugins_url( '../images/dash-asset-stars.png', __FILE__ ); ?>">
							<div class="ewd-uasp-dashboard-testimonial-title">"Fantastic plugin, fantastic support"</div>
							<div class="ewd-uasp-dashboard-testimonial-author">- @speechless</div>
							<div class="ewd-uasp-dashboard-testimonial-text">I love this plugin, it gives everything you could need for a scheduler and is very customisable.... <a href="https://wordpress.org/support/topic/fantastic-plugin-fantastic-support-6/" target="_blank">read more</a></div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>

		<?php if($hideReview != 'Yes' and $Ask_Review_Date < time()){ ?>
			<div class="ewd-uasp-dashboard-new-widget-box ewd-widget-box-one-third">
				<div class="ewd-uasp-dashboard-new-widget-box-top">Leave a review</div>
				<div class="ewd-uasp-dashboard-new-widget-box-bottom">
					<div class="ewd-uasp-dashboard-review-ask">
						<img src="<?php echo plugins_url( '../images/dash-asset-stars.png', __FILE__ ); ?>">
						<div class="ewd-uasp-dashboard-review-ask-text">If you enjoy this plugin and have a minute, please consider leaving a 5-star review. Thank you!</div>
						<a href="https://wordpress.org/plugins/ultimate-appointment-scheduling/#reviews" class="ewd-uasp-dashboard-review-ask-button" target="_blank">LEAVE A REVIEW</a>
						<form action="admin.php?page=EWD-UASP-options" method="post">
							<input type="hidden" name="hide_uasp_review_box_hidden" value="Yes">
							<input type="submit" name="hide_uasp_review_box_submit" class="ewd-uasp-dashboard-review-ask-dismiss" value="I've already left a review">
						</form>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if ($EWD_UASP_Full_Version != "Yes" or get_option("EWD_UASP_Trial_Happening") == "Yes") { ?>
			<div class="ewd-uasp-dashboard-new-widget-box ewd-widget-box-full" id="ewd-uasp-dashboard-guarantee-widget-box">
				<div class="ewd-uasp-dashboard-new-widget-box-top">
					<div class="ewd-uasp-dashboard-guarantee">
						<div class="ewd-uasp-dashboard-guarantee-title">14-Day 100% Money-Back Guarantee</div>
						<div class="ewd-uasp-dashboard-guarantee-text">If you're not 100% satisfied with the premium version of our plugin - no problem. You have 14 days to receive a FULL REFUND. We're certain you won't need it, though. Lorem ipsum dolor sitamet, consectetuer adipiscing elit.</div>
					</div>
				</div>
			</div>
		<?php } ?>

	</div> <!-- left -->

	<div id="ewd-uasp-dashboard-content-right">

		<?php if ($EWD_UASP_Full_Version != "Yes" or get_option("EWD_UASP_Trial_Happening") == "Yes") { ?>
			<div class="ewd-uasp-dashboard-new-widget-box ewd-widget-box-full" id="ewd-uasp-dashboard-get-premium-widget-box">
				<div class="ewd-uasp-dashboard-new-widget-box-top">Get Premium</div>
				<?php if(get_option("EWD_UASP_Trial_Happening") == "Yes"){ 
					$trialExpireTime = get_option("EWD_UASP_Trial_Expiry_Time");
					$currentTime = time();
					$trialTimeLeft = $trialExpireTime - $currentTime;
					$trialTimeLeftDays = ( date("d", $trialTimeLeft) ) - 1;
					$trialTimeLeftHours = date("H", $trialTimeLeft);
					?>
					<div class="ewd-uasp-dashboard-new-widget-box-bottom">
						<div class="ewd-uasp-dashboard-get-premium-widget-trial-time">
							<div class="ewd-uasp-dashboard-get-premium-widget-trial-days"><?php echo $trialTimeLeftDays; ?><span>days</span></div>
							<div class="ewd-uasp-dashboard-get-premium-widget-trial-hours"><?php echo $trialTimeLeftHours; ?><span>hours</span></div>
						</div>
						<div class="ewd-uasp-dashboard-get-premium-widget-trial-time-left">LEFT IN TRIAL</div>
					</div>
				<?php } ?>
				<div class="ewd-uasp-dashboard-new-widget-box-bottom">
					<div class="ewd-uasp-dashboard-get-premium-widget-features-title"<?php echo ( get_option("EWD_UASP_Trial_Happening") == "Yes" ? "style='padding-top: 20px;'" : ""); ?>>GET FULL ACCESS WITH OUR PREMIUM VERSION AND GET:</div>
					<ul class="ewd-uasp-dashboard-get-premium-widget-features">
						<li>Accept Payments for Bookings</li>
						<li>Send Email Appointment Reminders</li>
						<li>Admin &amp; Service Provider Notifications</li>
						<li>Styling &amp; Labelling Options</li>
						<li>+ More</li>
					</ul>
					<a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" class="ewd-uasp-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
					<?php if (!get_option("EWD_UASP_Trial_Happening")) { ?>
						<form method="post" action="admin.php?page=EWD-UASP-options">
							<input name="Key" type="hidden" value='EWD Trial'>
							<input name="EWD_UASP_Upgrade_To_Full" type="hidden" value='EWD_UASP_Upgrade_To_Full'>
							<button class="ewd-uasp-dashboard-get-premium-widget-button ewd-uasp-dashboard-new-trial-button">GET FREE 7-DAY TRIAL</button>
						</form>
					<?php } ?>
				</div>
			</div>
		<?php } ?>

		<div class="ewd-uasp-dashboard-new-widget-box ewd-widget-box-full">
			<div class="ewd-uasp-dashboard-new-widget-box-top">Other Plugins by Etoile</div>
			<div class="ewd-uasp-dashboard-new-widget-box-bottom">
				<ul class="ewd-uasp-dashboard-other-plugins">
					<li>
						<a href="https://wordpress.org/plugins/ultimate-faqs/" target="_blank"><img src="<?php echo plugins_url( '../images/ewd-ufaq-icon.png', __FILE__ ); ?>"></a>
						<div class="ewd-uasp-dashboard-other-plugins-text">
							<div class="ewd-uasp-dashboard-other-plugins-title">Ultimate FAQs</div>
							<div class="ewd-uasp-dashboard-other-plugins-blurb">An easy-to-use FAQ plugin that lets you create, order and publicize FAQs, with many styles and options!</div>
						</div>
					</li>
					<li>
						<a href="https://wordpress.org/plugins/order-tracking/" target="_blank"><img src="<?php echo plugins_url( '../images/ewd-otp-icon.png', __FILE__ ); ?>"></a>
						<div class="ewd-uasp-dashboard-other-plugins-text">
							<div class="ewd-uasp-dashboard-other-plugins-title">Status Tracking</div>
							<div class="ewd-uasp-dashboard-other-plugins-blurb">Allows you to manage orders or projects quickly and easily by posting updates that can be viewed through the front-end of your site!</div>
						</div>
					</li>
				</ul>
			</div>
		</div>

	</div> <!-- right -->	

</div> <!-- ewd-uasp-dashboard-content-area -->

<?php if ($EWD_UASP_Full_Version != "Yes" or get_option("EWD_UASP_Trial_Happening") == "Yes") { ?>
	<div id="ewd-uasp-dashboard-new-footer-one">
		<div class="ewd-uasp-dashboard-new-footer-one-inside">
			<div class="ewd-uasp-dashboard-new-footer-one-left">
				<div class="ewd-uasp-dashboard-new-footer-one-title">What's Included in Our Premium Version?</div>
				<ul class="ewd-uasp-dashboard-new-footer-one-benefits">
					<li>Accept Payments for Bookings</li>
					<li>WooCommerce Sync for Payments</li>
					<li>Add Custom Fields to Booking Form</li>
					<li>Require Login to Book</li>
					<li>Admin Appointment Notifications</li>
					<li>Service Provider Update Notifications</li>
					<li>Create Appointment Time Exceptions</li>
					<li>Send Email Appointment Reminders</li>
					<li>Two Booking Form Styles</li>
					<li>Add a Captcha to Booking Form</li>
					<li>Advanced Styling &amp; Labelling Options</li>
					<li>Email Support</li>
				</ul>
			</div>
			<div class="ewd-uasp-dashboard-new-footer-one-buttons">
				<a class="ewd-uasp-dashboard-new-upgrade-button" href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" target="_blank">UPGRADE NOW</a>
			</div>
		</div>
	</div> <!-- ewd-uasp-dashboard-new-footer-one -->
<?php } ?>	
<div id="ewd-uasp-dashboard-new-footer-two">
	<div class="ewd-uasp-dashboard-new-footer-two-inside">
		<img src="<?php echo plugins_url( '../images/ewd-logo-white.png', __FILE__ ); ?>" class="ewd-uasp-dashboard-new-footer-two-icon">
		<div class="ewd-uasp-dashboard-new-footer-two-blurb">
			At Etoile Web Design, we build reliable, easy-to-use WordPress plugins with a modern look. Rich in features, highly customizable and responsive, plugins by Etoile Web Design can be used as out-of-the-box solutions and can also be adapted to your specific requirements.
		</div>
		<ul class="ewd-uasp-dashboard-new-footer-two-menu">
			<li>SOCIAL</li>
			<li><a href="https://www.facebook.com/EtoileWebDesign/" target="_blank">Facebook</a></li>
			<li><a href="https://twitter.com/EtoileWebDesign" target="_blank">Twitter</a></li>
			<li><a href="https://www.etoilewebdesign.com/blog/" target="_blank">Blog</a></li>
		</ul>
		<ul class="ewd-uasp-dashboard-new-footer-two-menu">
			<li>SUPPORT</li>
			<li><a href="https://www.youtube.com/channel/UCZPuaoetCJB1vZOmpnMxJNw/" target="_blank">YouTube Tutorials</a></li>
			<li><a href="https://wordpress.org/support/plugin/ultimate-appointment-scheduling" target="_blank">Forums</a></li>
			<li><a href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/documentation-ultimate-appointment-scheduling/" target="_blank">Documentation</a></li>
			<li><a href="https://wordpress.org/plugins/ultimate-appointment-scheduling/#faq" target="_blank">FAQs</a></li>
		</ul>
	</div>
</div> <!-- ewd-uasp-dashboard-new-footer-two -->

<!-- END NEW DASHBOARD -->

