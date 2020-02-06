<?php
add_action( 'init', 'EWD_UASP_Create_Posttypes' );
function EWD_UASP_Create_Posttypes() {
	$labels = array(
		'name' => __('Locations', 'ultimate-appointment-scheduling'),
		'singular_name' => __('Location', 'ultimate-appointment-scheduling'),
		'menu_name' => __('Locations', 'ultimate-appointment-scheduling'),
		'add_new' => __('Add New', 'ultimate-appointment-scheduling'),
		'add_new_item' => __('Add New Location', 'ultimate-appointment-scheduling'),
		'edit_item' => __('Edit Location', 'ultimate-appointment-scheduling'),
		'new_item' => __('New Location', 'ultimate-appointment-scheduling'),
		'view_item' => __('View Location', 'ultimate-appointment-scheduling'),
		'search_items' => __('Search Locations', 'ultimate-appointment-scheduling'),
		'not_found' =>  __('Nothing found', 'ultimate-appointment-scheduling'),
		'not_found_in_trash' => __('Nothing found in Trash', 'ultimate-appointment-scheduling'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => false,
		'exclude_from_search' =>true,
		'publicly_queryable' => false,
		'show_ui' => false,
		'query_var' => false,
		'has_archive' => false,
		'menu_icon' => null,
		'rewrite' => array('slug' => 'locations'),
		'capability_type' => 'post',
		'menu_position' => null,
		'menu_icon' => 'dashicons-format-status',
		'supports' => array('title','editor')
	 ); 

	register_post_type( 'uasp-location' , $args );
	unset($labels);
	unset($args);

	$labels = array(
		'name' => __('Services', 'ultimate-appointment-scheduling'),
		'singular_name' => __('Service', 'ultimate-appointment-scheduling'),
		'menu_name' => __('Service', 'ultimate-appointment-scheduling'),
		'add_new' => __('Add New', 'ultimate-appointment-scheduling'),
		'add_new_item' => __('Add New Service', 'ultimate-appointment-scheduling'),
		'edit_item' => __('Edit Service', 'ultimate-appointment-scheduling'),
		'new_item' => __('New Service', 'ultimate-appointment-scheduling'),
		'view_item' => __('View Service', 'ultimate-appointment-scheduling'),
		'search_items' => __('Search Services', 'ultimate-appointment-scheduling'),
		'not_found' =>  __('Nothing found', 'ultimate-appointment-scheduling'),
		'not_found_in_trash' => __('Nothing found in Trash', 'ultimate-appointment-scheduling'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => false,
		'exclude_from_search' =>true,
		'publicly_queryable' => false,
		'show_ui' => false,
		'query_var' => false,
		'has_archive' => false,
		'menu_icon' => null,
		'rewrite' => array('slug' => 'locations'),
		'capability_type' => 'post',
		'menu_position' => null,
		'menu_icon' => 'dashicons-format-status',
		'supports' => array('title','editor')
	 ); 

	register_post_type( 'uasp-service' , $args );
	unset($labels);
	unset($args);

	$labels = array(
		'name' => __('Service Providers', 'ultimate-appointment-scheduling'),
		'singular_name' => __('Service Provider', 'ultimate-appointment-scheduling'),
		'menu_name' => __('Service Provider', 'ultimate-appointment-scheduling'),
		'add_new' => __('Add New', 'ultimate-appointment-scheduling'),
		'add_new_item' => __('Add New Service Provider', 'ultimate-appointment-scheduling'),
		'edit_item' => __('Edit Service Provider', 'ultimate-appointment-scheduling'),
		'new_item' => __('New Service Provider', 'ultimate-appointment-scheduling'),
		'view_item' => __('View Service Provider', 'ultimate-appointment-scheduling'),
		'search_items' => __('Search Service Providers', 'ultimate-appointment-scheduling'),
		'not_found' =>  __('Nothing found', 'ultimate-appointment-scheduling'),
		'not_found_in_trash' => __('Nothing found in Trash', 'ultimate-appointment-scheduling'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => false,
		'exclude_from_search' =>true,
		'publicly_queryable' => false,
		'show_ui' => false,
		'query_var' => false,
		'has_archive' => false,
		'menu_icon' => null,
		'rewrite' => array('slug' => 'locations'),
		'capability_type' => 'post',
		'menu_position' => null,
		'menu_icon' => 'dashicons-format-status',
		'supports' => array('title','editor')
	 ); 

	register_post_type( 'uasp-provider' , $args );
}

/*function EWD_UASP_Remove_Menu_Items() {
	remove_menu_page( 'edit.php?post_type=uasp-location' );
}
add_action( 'admin_menu', 'EWD_UASP_Remove_Menu_Items' );*/

?>
