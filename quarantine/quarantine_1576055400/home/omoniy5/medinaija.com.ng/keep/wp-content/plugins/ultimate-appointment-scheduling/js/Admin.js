/* Used to show and hide the admin tabs for UPCP */
function ShowTab(TabName) {
		jQuery(".OptionTab").each(function() {
				jQuery(this).addClass("HiddenTab");
				jQuery(this).removeClass("ActiveTab");
		});
		jQuery("#"+TabName).removeClass("HiddenTab");
		jQuery("#"+TabName).addClass("ActiveTab");
		
		jQuery(".nav-tab").each(function() {
				jQuery(this).removeClass("nav-tab-active");
		});
		jQuery("#"+TabName+"_Menu").addClass("nav-tab-active");
}

jQuery(document).ready(function() {
	SetReminderDeleteHandlers();
console.log(ewd_uasp_php_add_data);
	jQuery('.ewd-uasp-add-reminder').on('click', function(event) {
		var ID = jQuery(this).data('nextid'); console.log(ewd_uasp_php_add_data);
console.log(ewd_uasp_php_add_data.uwpm_emails);
		var HTML = "<tr id='ewd-uasp-reminder-row-" + ID + "'>";
		HTML += "<td><input type='text' name='Email_Reminder_" + ID + "_Number'></td>";
		HTML += "<td><select name='Email_Reminder_" + ID + "_Unit'>";
		HTML += "<option value='Minutes'>Minute(s)</option>";
		HTML += "<option value='Hours'>Hour(s)</option>";
		HTML += "<option value='Days'>Day(s)</option>";
		HTML += "</select></td>";
		HTML += "<td><select name='Email_Reminder_" + ID + "_Email_ID'>";
		jQuery(ewd_uasp_php_add_data.emails).each(function(index, email) {HTML += "<option value='" + email.ID + "'>" + email.Name + "</option>";});
		if (ewd_uasp_php_add_data.uwpm_emails.length > 0) {
			HTML += "<optgroup label='Ultimate WP Mail'>";
			jQuery(ewd_uasp_php_add_data.uwpm_emails).each(function(index, email) {HTML += "<option value='" + email.ID + "'>" + email.post_title + "</option>";});
			HTML += '</optgroup>';
		}
		HTML += "</select></td>";
		HTML += "<td><select name='Email_Reminder_" + ID + "_Conditional'>";
		HTML += "<option value='No'>No</option>";
		HTML += "<option value='Yes'>Yes</option>";
		HTML += "</select></td>";
		HTML += "<td><a class='ewd-uasp-delete-reminder' data-reminderID='" + ID + "'>Delete</a></td>";
		HTML += "</tr>";

		//jQuery('table > tr#ewd-uasp-add-reminder').before(HTML);
		jQuery('#ewd-uasp-email-reminders-table tr:last').before(HTML);

		ID++;
		jQuery(this).data('nextid', ID); //updates but doesn't show in DOM

		SetReminderDeleteHandlers();

		event.preventDefault();
	});
});


function ShowOptionTab(TabName) {
	jQuery(".uasp-option-set").each(function() {
		jQuery(this).addClass("uasp-hidden");
	});
	jQuery("#"+TabName).removeClass("uasp-hidden");
	
	// var activeContentHeight = jQuery("#"+TabName).innerHeight();
	// jQuery(".uasp-options-page-tabbed-content").animate({
	// 	'height':activeContentHeight
	// 	}, 500);
	// jQuery(".uasp-options-page-tabbed-content").height(activeContentHeight);

	jQuery(".options-subnav-tab").each(function() {
		jQuery(this).removeClass("options-subnav-tab-active");
	});
	jQuery("#"+TabName+"_Menu").addClass("options-subnav-tab-active");
	jQuery('input[name="Display_Tab"]').val(TabName);
}

function SetReminderDeleteHandlers() {
	jQuery('.ewd-uasp-delete-reminder').on('click', function(event) {
		var ID = jQuery(this).data('reminderid');
		var tr = jQuery('#ewd-uasp-reminder-row-'+ID);

		tr.fadeOut(400, function(){
            tr.remove();
        });

		event.preventDefault();
	});
}

jQuery(document).ready(function() {
	jQuery('#ewd-uasp-wordpress-login-option').on('change', {optionType: "wordpress"}, Update_Options);
	jQuery('#ewd-uasp-feup-login-option').on('change', {optionType: "feup"}, Update_Options);
	jQuery('#ewd-uasp-facebook-login-option').on('change', {optionType: "facebook"}, Update_Options);
	jQuery('#ewd-uasp-twitter-login-option').on('change', {optionType: "twitter"}, Update_Options);
	
	Update_Options();
});

function Update_Options(params) {
	if (params === undefined || params.data.optionType == "wordpress") {
		if (jQuery('#ewd-uasp-wordpress-login-option').is(':checked')) {
			jQuery('.ewd-uasp-wordpress-login-option').removeClass('ewd-uasp-hidden');
		}
		else {
			jQuery('.ewd-uasp-wordpress-login-option').addClass('ewd-uasp-hidden');
		}
	}
	if (params === undefined || params.data.optionType == "feup") {
		if (jQuery('#ewd-uasp-feup-login-option').is(':checked')) {
			jQuery('.ewd-uasp-feup-login-option').removeClass('ewd-uasp-hidden');
		}
		else {
			jQuery('.ewd-uasp-feup-login-option').addClass('ewd-uasp-hidden');
		}
	}
	if (params === undefined || params.data.optionType == "facebook") {
		if (jQuery('#ewd-uasp-facebook-login-option').is(':checked')) {
			jQuery('.ewd-uasp-facebook-login-option').removeClass('ewd-uasp-hidden');
		}
		else {
			jQuery('.ewd-uasp-facebook-login-option').addClass('ewd-uasp-hidden');
		}
	}
	if (params === undefined || params.data.optionType == "twitter") {
		if (jQuery('#ewd-uasp-twitter-login-option').is(':checked')) {
			jQuery('.ewd-uasp-twitter-login-option').removeClass('ewd-uasp-hidden');
		}
		else {
			jQuery('.ewd-uasp-twitter-login-option').addClass('ewd-uasp-hidden');
		}
	}
}

jQuery(document).ready(function() {
	SetMessageDeleteHandlers();

	jQuery('.ewd-uasp-add-email').on('click', function(event) {
		var Counter = jQuery(this).data('nextcounter');
		var Max_ID = jQuery(this).data('maxid');

		var HTML = "<tr id='ewd-uasp-email-message-" + Counter + "'>";
		HTML += "<td><input type='text' name='Email_Message_" + Counter + "_Name'></td>";
		HTML += "<td><input type='text' name='Email_Message_" + Counter + "_Subject'></td>";
		HTML += "<td><textarea name='Email_Message_" + Counter + "_Body'></textarea></td>";
		HTML += "<td><input type='hidden' name='Email_Message_" + Counter + "_ID' value='" + Max_ID + "' /><a class='ewd-uasp-delete-message' data-messagecounter='" + Counter + "'>Delete</a></td>";
		HTML += "</tr>";

		//jQuery('table > tr#ewd-uasp-add-reminder').before(HTML);
		jQuery('#ewd-uasp-email-messages-table tr:last').before(HTML);

		Counter++;
		Max_ID++;
		jQuery(this).data('nextcounter', Counter); //updates but doesn't show in DOM
		jQuery(this).data('maxid', Max_ID); //updates but doesn't show in DOM

		SetMessageDeleteHandlers();

		event.preventDefault();
	});
});

function SetMessageDeleteHandlers() {
	jQuery('.ewd-uasp-delete-message').on('click', function(event) {
		var ID = jQuery(this).data('messagecounter');
		var tr = jQuery('#ewd-uasp-email-message-'+ID);

		tr.fadeOut(400, function(){
            tr.remove();
        });

		event.preventDefault();
	});
}

jQuery(document).ready(function() {
	jQuery('.ewd-uasp-send-test-email').on('click', function() {
		jQuery('.ewd-uasp-test-email-response').remove();

		var Email_Address = jQuery('.ewd-uasp-test-email-address').val();
		var Email_To_Send = jQuery('.ewd-uasp-email-selector').val();

		if (Email_Address == "" || Email_To_Send == "") {
			jQuery('.ewd-uasp-send-test-email').after('<div class="ewd-uasp-test-email-response">Error: Select an email and enter an email address before sending.</div>');
		}

		var data = 'Email_Address=' + Email_Address + '&Email_To_Send=' + Email_To_Send + '&action=uasp_send_test_email';
        jQuery.post(ajaxurl, data, function(response) {
        	jQuery('.ewd-uasp-send-test-email').after(response);
        });
	});
});

jQuery(document).ready(function() {
	jQuery('.uasp-spectrum').spectrum({
		showInput: true,
		showInitial: true,
		preferredFormat: "hex",
		allowEmpty: true
	});

	jQuery('.uasp-spectrum').css('display', 'inline');

	jQuery('.uasp-spectrum').on('change', function() {
		if (jQuery(this).val() != "") {
			jQuery(this).css('background', jQuery(this).val());
			var rgb = EWD_UASP_hexToRgb(jQuery(this).val());
			var Brightness = (rgb.r * 299 + rgb.g * 587 + rgb.b * 114) / 1000;
			if (Brightness < 100) {jQuery(this).css('color', '#ffffff');}
			else {jQuery(this).css('color', '#000000');}
		}
		else {
			jQuery(this).css('background', 'none');
		}
	});

	jQuery('.uasp-spectrum').each(function() {
		if (jQuery(this).val() != "") {
			jQuery(this).css('background', jQuery(this).val());
			var rgb = EWD_UASP_hexToRgb(jQuery(this).val());
			var Brightness = (rgb.r * 299 + rgb.g * 587 + rgb.b * 114) / 1000;
			if (Brightness < 100) {jQuery(this).css('color', '#ffffff');}
			else {jQuery(this).css('color', '#000000');}
		}
	});
});

function EWD_UASP_hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}


//NEW DASHBOARD MOBILE MENU AND WIDGET TOGGLING
jQuery(document).ready(function($){
	$('#ewd-uasp-dash-mobile-menu-open').click(function(){
		$('.EWD_UASP_Menu .nav-tab:nth-of-type(1n+2)').toggle();
		$('#ewd-uasp-dash-mobile-menu-up-caret').toggle();
		$('#ewd-uasp-dash-mobile-menu-down-caret').toggle();
		return false;
	});
	$(function(){
		$(window).resize(function(){
			if($(window).width() > 785){
				$('.EWD_UASP_Menu .nav-tab:nth-of-type(1n+2)').show();
			}
			else{
				$('.EWD_UASP_Menu .nav-tab:nth-of-type(1n+2)').hide();
				$('#ewd-uasp-dash-mobile-menu-up-caret').hide();
				$('#ewd-uasp-dash-mobile-menu-down-caret').show();
			}
		}).resize();
	});	
	$('#ewd-uasp-dashboard-support-widget-box .ewd-uasp-dashboard-new-widget-box-top').click(function(){
		$('#ewd-uasp-dashboard-support-widget-box .ewd-uasp-dashboard-new-widget-box-bottom').toggle();
		$('#ewd-uasp-dash-mobile-support-up-caret').toggle();
		$('#ewd-uasp-dash-mobile-support-down-caret').toggle();
	});
	$('#ewd-uasp-dashboard-optional-table .ewd-uasp-dashboard-new-widget-box-top').click(function(){
		$('#ewd-uasp-dashboard-optional-table .ewd-uasp-dashboard-new-widget-box-bottom').toggle();
		$('#ewd-uasp-dash-optional-table-up-caret').toggle();
		$('#ewd-uasp-dash-optional-table-down-caret').toggle();
	});
});


//REVIEW ASK POP-UP
jQuery(document).ready(function() {
    jQuery('.ewd-uasp-hide-review-ask').on('click', function() {
        var Ask_Review_Date = jQuery(this).data('askreviewdelay');

        jQuery('.ewd-uasp-review-ask-popup, #ewd-uasp-review-ask-overlay').addClass('uasp-hidden');

        var data = 'Ask_Review_Date=' + Ask_Review_Date + '&action=ewd_uasp_hide_review_ask';
        jQuery.post(ajaxurl, data, function() {});
    });
    jQuery('#ewd-uasp-review-ask-overlay').on('click', function() {
    	jQuery('.ewd-uasp-review-ask-popup, #ewd-uasp-review-ask-overlay').addClass('uasp-hidden');
    })
});


//OPTIONS HELP/DESCRIPTION TEXT
jQuery(document).ready(function($) {
	$('.uasp-option-set .form-table tr').each(function(){
		var thisOptionClick = $(this);
		thisOptionClick.find('th').click(function(){
			thisOptionClick.find('td p').toggle();
		});
	});
	$('.ewdOptionHasInfo').each(function(){
		var thisNonTableOptionClick = $(this);
		thisNonTableOptionClick.find('.ewd-uasp-admin-styling-subsection-label').click(function(){
			thisNonTableOptionClick.find('fieldset p').toggle();
		});
	});
	$(function(){
		$(window).resize(function(){
			$('.uasp-option-set .form-table tr').each(function(){
				var thisOption = $(this);
				if( $(window).width() < 783 ){
					if( thisOption.find('.ewd-uasp-admin-hide-radios').length > 0 ) {
						thisOption.find('td p').show();			
						thisOption.find('th').css('background-image', 'none');			
						thisOption.find('th').css('cursor', 'default');			
					}
					else{
						thisOption.find('td p').hide();
						thisOption.find('th').css('background-image', 'url(../wp-content/plugins/ultimate-appointment-scheduling/images/options-asset-info.png)');			
						thisOption.find('th').css('background-position', '95% 20px');			
						thisOption.find('th').css('background-size', '18px 18px');			
						thisOption.find('th').css('background-repeat', 'no-repeat');			
						thisOption.find('th').css('cursor', 'pointer');								
					}		
				}
				else{
					thisOption.find('td p').hide();
					thisOption.find('th').css('background-image', 'url(../wp-content/plugins/ultimate-appointment-scheduling/images/options-asset-info.png)');			
					thisOption.find('th').css('background-position', 'calc(100% - 20px) 15px');			
					thisOption.find('th').css('background-size', '18px 18px');			
					thisOption.find('th').css('background-repeat', 'no-repeat');			
					thisOption.find('th').css('cursor', 'pointer');			
				}
			});
			$('.ewdOptionHasInfo').each(function(){
				var thisNonTableOption = $(this);
				if( $(window).width() < 783 ){
					if( thisNonTableOption.find('.ewd-uasp-admin-hide-radios').length > 0 ) {
						thisNonTableOption.find('fieldset p').show();			
						thisNonTableOption.find('ewd-uasp-admin-styling-subsection-label').css('background-image', 'none');			
						thisNonTableOption.find('ewd-uasp-admin-styling-subsection-label').css('cursor', 'default');			
					}
					else{
						thisNonTableOption.find('fieldset p').hide();
						thisNonTableOption.find('ewd-uasp-admin-styling-subsection-label').css('background-image', 'url(../wp-content/plugins/ultimate-appointment-scheduling/images/options-asset-info.png)');			
						thisNonTableOption.find('ewd-uasp-admin-styling-subsection-label').css('background-position', 'calc(100% - 30px) 15px');			
						thisNonTableOption.find('ewd-uasp-admin-styling-subsection-label').css('background-size', '18px 18px');			
						thisNonTableOption.find('ewd-uasp-admin-styling-subsection-label').css('background-repeat', 'no-repeat');			
						thisNonTableOption.find('ewd-uasp-admin-styling-subsection-label').css('cursor', 'pointer');								
					}		
				}
				else{
					thisNonTableOption.find('fieldset p').hide();
					thisNonTableOption.find('ewd-uasp-admin-styling-subsection-label').css('background-image', 'url(../wp-content/plugins/ultimate-appointment-scheduling/images/options-asset-info.png)');			
					thisNonTableOption.find('ewd-uasp-admin-styling-subsection-label').css('background-position', 'calc(100% - 30px) 15px');			
					thisNonTableOption.find('ewd-uasp-admin-styling-subsection-label').css('background-size', '18px 18px');			
					thisNonTableOption.find('ewd-uasp-admin-styling-subsection-label').css('background-repeat', 'no-repeat');			
					thisNonTableOption.find('ewd-uasp-admin-styling-subsection-label').css('cursor', 'pointer');			
				}
			});
		}).resize();
	});	
});


//OPTIONS PAGE YES/NO TOGGLE SWITCHES
jQuery(document).ready(function($) {
	jQuery('.ewd-uasp-admin-option-toggle').on('change', function() {
		var Input_Name = jQuery(this).data('inputname'); console.log(Input_Name);
		if (jQuery(this).is(':checked')) {
			jQuery('input[name="' + Input_Name + '"][value="Yes"]').prop('checked', true).trigger('change');
			jQuery('input[name="' + Input_Name + '"][value="No"]').prop('checked', false);
		}
		else {
			jQuery('input[name="' + Input_Name + '"][value="Yes"]').prop('checked', false).trigger('change');
			jQuery('input[name="' + Input_Name + '"][value="No"]').prop('checked', true);
		}
	});
	$(function(){
		$(window).resize(function(){
			$('.uasp-option-set .form-table tr').each(function(){
				var thisOptionTr = $(this);
				if( $(window).width() < 783 ){
					if( thisOptionTr.find('.ewd-uasp-admin-switch').length > 0 ) {
						thisOptionTr.find('th').css('width', 'calc(90% - 50px');			
						thisOptionTr.find('th').css('padding-right', 'calc(5% + 50px');			
					}
					else{
						thisOptionTr.find('th').css('width', '90%');			
						thisOptionTr.find('th').css('padding-right', '5%');			
					}		
				}
				else{
					thisOptionTr.find('th').css('width', '200px');			
					thisOptionTr.find('th').css('padding-right', '46px');			
				}
			});
		}).resize();
	});	
});



//DATEPICKER
jQuery(document).ready(function($) {
    var minDate = jQuery('.ewd-uasp-datepicker').attr('min');
    var maxDate = jQuery('.ewd-uasp-datepicker').attr('max');
    jQuery('.ewd-uasp-datepicker').datepicker({
        dateFormat : "yy-mm-dd",
        minDate: minDate,
        maxDate: maxDate,
    });
});


// APPOINTMENTS TABLE/CALENDAR TOGGLE
jQuery(document).ready(function($) {
	jQuery('.ewd-uasp-table-layout-toggle').on('click', function() {
		jQuery('.ewd-uasp-table-layout').removeClass('ewd-uasp-hidden');
		jQuery('.ewd-uasp-calendar-layout').addClass('ewd-uasp-hidden');
	});

	jQuery('.ewd-uasp-calendar-layout-toggle').on('click', function() {
		jQuery('.ewd-uasp-calendar-layout').removeClass('ewd-uasp-hidden');
		jQuery('.ewd-uasp-table-layout').addClass('ewd-uasp-hidden');
	});
});


/*************************************************************************
NEW APPOINTMENT TAB FORMATTING
**************************************************************************/
jQuery(document).ready(function($){
	$('#ewd-uasp-admin-add-by-spreadsheet-button').click(function(){
		$('.toplevel_page_EWD-UASP-options #Appointments #col-right').removeClass('ewd-uasp-admin-products-table-full');
		$('.toplevel_page_EWD-UASP-options #Appointments #col-left').removeClass('uasp-hidden');
		$('#ewd-uasp-admin-add-manually').addClass('uasp-hidden');
		$('#ewd-uasp-admin-add-from-spreadsheet').removeClass('uasp-hidden');
	});
});


/*************************************************************************
CREATE/EDIT APPOINTMENT WIDGET TOGGLING
**************************************************************************/
jQuery(document).ready(function($){
	$('.ewd-uasp-admin-closeable-widget-box').each(function(){
		var thisClosableWidgetBox = $(this);
		thisClosableWidgetBox.find('.ewd-uasp-dashboard-new-widget-box-top').click(function(){
			thisClosableWidgetBox.find('.ewd-uasp-dashboard-new-widget-box-bottom').toggle();
			thisClosableWidgetBox.find('.ewd-uasp-admin-edit-product-down-caret').toggle();
			thisClosableWidgetBox.find('.ewd-uasp-admin-edit-product-up-caret').toggle();
		});
	});
});
