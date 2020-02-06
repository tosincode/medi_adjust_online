jQuery(document).ready( function($) {
    jQuery('#ewd-uasp-das-find-appointment').on('click', UASP_AJAX_DAS_Get_Appointments);

    // jQuery('#ewd-uasp-das-date').on('focus', UASP_Open_Picker);

    jQuery('.ewd-uasp-das-select').on('change', function() {
        var Selected_Location = jQuery('#ewd-uasp-das-location').val();
        var Selected_Service = jQuery('#ewd-uasp-das-service').val();
        var data = 'Location=' + Selected_Location + '&Service=' + Selected_Service + '&action=uasp_get_service_providers';

        jQuery.post(ajaxurl, data, function(response) {
            jQuery('#ewd-uasp-das-service-provider-input').html(response);
        });
    });

    jQuery('.ewd-uasp-multistep-indicator').on('click', function() {
        if (!jQuery(this).hasClass('ewd-uasp-indicator-selected')) {return;}

        if (jQuery(this).data('indicator') == 'registrationform') {
            jQuery('.ewd-uasp-multistep-indicator[data-indicator="service"]').removeClass('ewd-uasp-indicator-selected');
            jQuery('.ewd-uasp-multistep-indicator[data-indicator="findappointment"]').removeClass('ewd-uasp-indicator-selected');
            jQuery('.ewd-uasp-das-service').addClass('ewd-uasp-hidden');
            jQuery('.ewd-uasp-das-findappointment, .ewd-uasp-calendar-container, .ewd-uasp-captcha-group').addClass('ewd-uasp-hidden');
            jQuery('.ewd-uasp-das-book-button').val('Next');
            jQuery('.ewd-uasp-das-registrationform').removeClass('ewd-uasp-hidden');
        }
        else {
            jQuery('.ewd-uasp-multistep-indicator[data-indicator="findappointment"]').removeClass('ewd-uasp-indicator-selected');
            jQuery('.ewd-uasp-das-findappointment, .ewd-uasp-calendar-container, .ewd-uasp-captcha-group').addClass('ewd-uasp-hidden');
            jQuery('.ewd-uasp-das-book-button').val('Next');
            jQuery('.ewd-uasp-das-service').removeClass('ewd-uasp-hidden');
        }
    });

    jQuery('.ewd-uasp-appointment-form').submit(function(event) {
        if (!jQuery('.ewd-uasp-das-registrationform').hasClass('ewd-uasp-hidden')) {
            jQuery('.ewd-uasp-das-registrationform').addClass('ewd-uasp-hidden');
            jQuery('.ewd-uasp-multistep-indicator[data-indicator="service"]').addClass('ewd-uasp-indicator-selected');
            jQuery('.ewd-uasp-das-service').removeClass('ewd-uasp-hidden');
        }
        else if (!jQuery('.ewd-uasp-das-service').hasClass('ewd-uasp-hidden')) {
            jQuery('.ewd-uasp-das-service').addClass('ewd-uasp-hidden');
            jQuery('.ewd-uasp-multistep-indicator[data-indicator="findappointment"]').addClass('ewd-uasp-indicator-selected');
            jQuery('.ewd-uasp-das-findappointment, .ewd-uasp-calendar-container, .ewd-uasp-captcha-group').removeClass('ewd-uasp-hidden');
            jQuery(this).val(jQuery(this).data('final'));
        }

        if (!jQuery('#ewd-uasp-selected-appointment-time').val()) {
            jQuery('#ewd-uasp-das-appointment-times').html("Please select a valid appointment time before submitting the form.");
            event.preventDefault();
        }
    });

    var regFormHeight = ( $('.ewd-uasp-das-registrationform').height() ) + 6;
    $('.ewd-uasp-das-service').css('height', regFormHeight+'px');

    var minDate = jQuery('.ewd-uasp-datepicker').attr('min');
    var maxDate = jQuery('.ewd-uasp-datepicker').attr('max');
    jQuery('.ewd-uasp-datepicker').datepicker({
        dateFormat : "yy-mm-dd",
        minDate: minDate,
        maxDate: maxDate,
        defaultDate: ewd_uasp_php_calendar_data.default_date
    });
});

function UASP_AJAX_DAS_Get_Appointments() {
    var Selected_Location = jQuery('#ewd-uasp-das-location').val();
    var Selected_Service = jQuery('#ewd-uasp-das-service').val();
    var Selected_Service_Provider = jQuery('#ewd-uasp-das-service-provider').val();
    var Selected_Date = jQuery('#ewd-uasp-das-date').val();

    jQuery('#ufaq-ajax-results').html('<h3>Retrieving available appointments...</h3>');

    var data = 'Location=' + Selected_Location + '&Service=' + Selected_Service + '&Service_Provider=' + Selected_Service_Provider + '&Date=' + Selected_Date + '&action=uasp_get_appointments';
    jQuery.post(ajaxurl, data, function(response) {
        jQuery('#ewd-uasp-das-appointment-times').html(response);
    });
}

function SetAppointmentTime(ClickObject, AppointmentTime, ServiceProvider) {
    /*remove this line once have booking multiple times functionality*/jQuery('.ewd-uasp-das-appointment-listing').each(function(){jQuery(this).removeClass('ewd-uasp-selected-appointment-time');})
    jQuery(ClickObject).parent().toggleClass('ewd-uasp-selected-appointment-time');
    
    var SelectedDate = jQuery('#ewd-uasp-das-date').val();
    jQuery('#ewd-uasp-selected-appointment-time').val(SelectedDate + " " + AppointmentTime);

    jQuery('#ewd-uasp-das-service-provider').val(ServiceProvider);
}

function ClearAppointments() {
    jQuery('#ewd-uasp-das-appointment-times').html("");
    jQuery('#ewd-uasp-selected-appointment-time').val("");
}

// function UASP_Open_Picker() {
//     var cal = document.querySelector('#ewd-uasp-das-date');
//     var ev = document.createEvent('KeyboardEvent');
//     ev.initKeyboardEvent('keydown', true, true, document.defaultView, 'F4', 0);
//     cal.dispatchEvent(ev);
// }