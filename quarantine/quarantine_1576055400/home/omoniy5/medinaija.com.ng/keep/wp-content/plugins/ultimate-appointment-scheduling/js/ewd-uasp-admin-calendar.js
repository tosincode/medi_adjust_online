var calendarLanguage = ewd_uasp_php_calendar_data.calendar_language;
if (ewd_uasp_php_calendar_data.hours_format == "12") {var timeFormat = 'h(:00)a';}
else {var timeFormat = 'H(:00)';}
jQuery(document).ready(function() {
	jQuery('#ewd-uasp-admin-calendar').fullCalendar({
        locale: + calendarLanguage,
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay,listWeek'
		},
		defaultView: ewd_uasp_php_calendar_data.starting_layout,
        defaultDate: moment(ewd_uasp_php_calendar_data.default_date),
		scrollTime : ewd_uasp_php_calendar_data.starting_time,
		editable: false,
		disableDragging: true,
		eventLimit: true, // allow "more" link when too many events
		timezone: false,
        timeFormat: timeFormat,
        slotLabelFormat: timeFormat,
		events: function(start, end, timezone, callback) {
            jQuery.ajax({
    	        url: ajaxurl,
    	        data: {
    	            // our hypothetical feed requires UNIX timestamps
    	            action: 'uasp_get_admin_appointments',
    	            start: start.unix(),
    	            end: end.unix(),
    	            location: jQuery('select[name="EWD_UASP_Locations_Filter"]').val(),
    	            service: jQuery('select[name="EWD_UASP_Services_Filter"]').val(),
    	            service_provider: jQuery('select[name="EWD_UASP_Providers_Filter"]').val()
    	        },
    	        success: function(event_objects_json) { 
    	        	event_objects = JSON.parse(event_objects_json);
    	            var events = [];
    	            jQuery(event_objects).each(function(index, item) {
    	                events.push({
    	                    title: item.title,
    	                    start: item.start,
    	                    end: item.end, // will be parsed
    	                    appointment_id: item.appointment_id
    	                });
    	            });
    	            callback(events);
    	        }
    	    });
    	},
    	eventClick: function(calEvent, jsEvent, view) {
            var Admin_Appointment_URL = jQuery('#ewd-uasp-admin-calendar').data('appointmenturl');
        	window.location.href = Admin_Appointment_URL + calEvent.appointment_id;
    	}
	});

	jQuery('select[name="EWD_UASP_Locations_Filter"]').on('change', function() {
		jQuery('#ewd-uasp-calendar').fullCalendar('refetchEvents');
	});
	jQuery('select[name="EWD_UASP_Services_Filter"]').on('change', function() {
		jQuery('#ewd-uasp-calendar').fullCalendar('refetchEvents');
	});
	jQuery('select[name="EWD_UASP_Providers_Filter"]').on('change', function() {
		jQuery('#ewd-uasp-calendar').fullCalendar('refetchEvents');
	});
});