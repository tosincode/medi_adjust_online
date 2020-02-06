		<div class="wrap">
		<div class="Header"><h2><?php _e("Ultimate Appointment Scheduling Settings", 'EWD_UFAQ') ?></h2></div>

		<?php if ($EWD_UASP_Full_Version != "Yes" or get_option("EWD_UASP_Trial_Happening") == "Yes") { ?>
			<div class="ewd-uasp-dashboard-new-upgrade-banner">
				<div class="ewd-uasp-dashboard-banner-icon"></div>
				<div class="ewd-uasp-dashboard-banner-buttons">
					<a class="ewd-uasp-dashboard-new-upgrade-button" href="https://www.etoilewebdesign.com/plugins/ultimate-appointment-scheduling/#buy" target="_blank">UPGRADE NOW</a>
				</div>
				<div class="ewd-uasp-dashboard-banner-text">
					<div class="ewd-uasp-dashboard-banner-title">
						GET FULL ACCESS WITH OUR PREMIUM VERSION
					</div>
					<div class="ewd-uasp-dashboard-banner-brief">
						Add premium appointment booking functionality to your site
					</div>
				</div>
			</div>
		<?php } ?>		