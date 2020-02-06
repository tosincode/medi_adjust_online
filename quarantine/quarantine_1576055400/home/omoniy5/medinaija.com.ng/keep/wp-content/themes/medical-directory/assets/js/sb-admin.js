(function($){

	

	




		/*admin panel include map start*/	

	$('#_medicaldirectory_property_address_map_canvas').closest("table").addClass("google_map");
	jQuery(".google_map").parent().append('<div id="map_canvas" style="height: 450px; width: 100%">' );


	$('#_map_ca_0').closest("table").addClass("google_map");
	jQuery(".google_map").parent().append('<div id="map_canvas" style="height: 450px; width: 100%">' );

	/*admin panel include map end*/



	

/*page templete show or hide start*/

	// $('#medicaldirectory_contact_address').hide();
	// $('#_medicaldirectory_property_address_page_templates').closest('#medicaldirectory_property_address').hide();

	// var currentTemplate = $('#page_template').val();

	// if(currentTemplate === 'templates/contact-us.php'){
		
	// 	$('#medicaldirectory_contact_address').show();
	// 	$('#_medicaldirectory_property_address_page_templates').closest('#medicaldirectory_property_address').show();
		
	// }


	// $('#page_template').change(function(){

	// 	var template = $(this).val();

	// 	if(template === 'templates/contact-us.php'){
			
	// 		$('#medicaldirectory_contact_address').show('slow');
	// 		$('#_medicaldirectory_property_address_page_templates').closest('#medicaldirectory_property_address').show('slow');	

	// 	}else{

	// 		$('#medicaldirectory_contact_address').hide('slow');
	// 		$('#_medicaldirectory_property_address_page_templates').closest('#medicaldirectory_property_address').hide('slow');
	// 	}		
	// });

	/*page templete show or hide end */

    
	

})(jQuery);