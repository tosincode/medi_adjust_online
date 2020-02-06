<?php

function EWD_UASP_Initial_WC_Sync() {
	$params = array(
		'posts_per_page' => -1, 
		'post_type' => 'uasp-service',
		'orderby' => 'title'
	);
	if (isset($_GET['OrderBy']) and $_GET['DisplayPage'] == "Services") {
		$params['orderby'] = $_GET['OrderBy'];
		$params['order'] = $_GET['Order'];
	}
	$Services = get_posts($params);

	foreach ($Services as $Service) {
		EWD_UASP_Create_Linked_WC_Product($Service->ID);
	}
}

function EWD_UASP_Create_Linked_WC_Product($Service_ID) {
	$args = array(
		'post_type' => 'product',
		'meta_query' => array(
			array(
				'key' => 'EWD_UASP_Service_ID',
				'value' => $Service_ID,
				'compare' => '='
			)
		)
	);
	$Service_Query = new WP_Query($args);

	if ($Service_Query->post_count > 0) {return;}

	$Service_Post = get_post($Service_ID);
	$Price = get_post_meta($Service_ID, "Service Price", true);

	$params = array(
		'post_title' => $Service_Post->post_title,
		'post_content' => $Service_Post->post_content,
		'post_status' => 'publish',
		'post_type' => 'product' 
	);
	$post_id = wp_insert_post($params);

	update_post_meta( $post_id, 'EWD_UASP_Service_ID', $Service_ID);

	update_post_meta( $post_id, '_visibility', 'visible' );
	update_post_meta( $post_id, '_stock_status', 'instock');
	update_post_meta( $post_id, 'total_sales', '0' );
	update_post_meta( $post_id, '_downloadable', 'no' );
	update_post_meta( $post_id, '_virtual', 'yes' );
	update_post_meta( $post_id, '_regular_price', $Price );
	update_post_meta( $post_id, '_sale_price', '' );
	update_post_meta( $post_id, '_purchase_note', '' );
	update_post_meta( $post_id, '_featured', 'no' );
	update_post_meta( $post_id, '_weight', '' );
	update_post_meta( $post_id, '_length', '' );
	update_post_meta( $post_id, '_width', '' );
	update_post_meta( $post_id, '_height', '' );
	update_post_meta( $post_id, '_sku', '' );
	update_post_meta( $post_id, '_product_attributes', array() );
	update_post_meta( $post_id, '_sale_price_dates_from', '' );
	update_post_meta( $post_id, '_sale_price_dates_to', '' );
	update_post_meta( $post_id, '_price', $Price );
	update_post_meta( $post_id, '_sold_individually', '' );
	update_post_meta( $post_id, '_manage_stock', 'no' );
	update_post_meta( $post_id, '_backorders', 'no' );
	update_post_meta( $post_id, '_stock', '' );
}

function EWD_UASP_Edit_Linked_WC_Product($Service_ID) {
	$args = array(
		'post_type' => 'product',
		'meta_query' => array(
			array(
				'key' => 'EWD_UASP_Service_ID',
				'value' => $Service_ID,
				'compare' => '='
			)
		)
	);
	$Service_Query = new WP_Query($args);

	if ($Service_Query->post_count == 0) {return;}

	$Service = get_post($Service_ID);
	$WC_Product = $Service_Query->posts[0];

	$Price = get_post_meta($Service_ID, "Service Price", true);

	$Updated_Post = array(
		'ID' => $WC_Product->ID,
		'post_title' => $Service->post_title,
		'post_content' => $Service->post_content
	);

	wp_update_post($Updated_Post);

	update_post_meta( $WC_Product->ID, '_regular_price', $Price );
	update_post_meta( $WC_Product->ID, '_price', $Price );
}

function EWD_UASP_Add_WC_Appointment_Deletion($Appointment_ID) {
	$WC_Delete_Appointments = get_option("EWD_UASP_WC_Delete_Appointments");
	if (!is_array($WC_Delete_Appointments)) {$WC_Delete_Appointments = array();}

	$WC_Delete_Appointments[$Appointment_ID] = time() + 60*15;

	update_option("EWD_UASP_WC_Delete_Appointments", $WC_Delete_Appointments);
}

function EWD_UASP_Remove_WC_Appointment_Deletion($Appointment_ID) {
	$WC_Delete_Appointments = get_option("EWD_UASP_WC_Delete_Appointments");
	if (!is_array($WC_Delete_Appointments)) {$WC_Delete_Appointments = array();}

	unset($WC_Delete_Appointments[$Appointment_ID]);

	update_option("EWD_UASP_WC_Delete_Appointments", $WC_Delete_Appointments);
}

function EWD_UASP_Do_WC_Appointment_Deletion() {
	$WC_Delete_Appointments = get_option("EWD_UASP_WC_Delete_Appointments");
	if (!is_array($WC_Delete_Appointments)) {$WC_Delete_Appointments = array();}

	foreach($WC_Delete_Appointments as $Appointment_ID => $Deletion_Time) {
		if ($Deletion_Time < time()) {
			Delete_EWD_UASP_Appointment($Appointment_ID);	
			unset($WC_Delete_Appointments[$Appointment_ID]);
		}
	}

	update_option("EWD_UASP_WC_Delete_Appointments", $WC_Delete_Appointments);
}
add_action('init', 'EWD_UASP_Do_WC_Appointment_Deletion');

function EWD_UASP_Handle_WooCommerce_Appointment_Checkout($order_id) {
	global $wpdb;
	global $ewd_usap_appointments_table_name;

	$WooCommerce_Integration = get_option("EWD_UASP_WooCommerce_Integration");

	if ($WooCommerce_Integration != "Yes" or $order_id == "") {return;}

	if (isset($_SESSION['EWD_UASP_Appointment_ID']) and $_SESSION['EWD_UASP_Appointment_ID'] != "") {
		$wpdb->query($wpdb->prepare("UPDATE $ewd_usap_appointments_table_name SET Appointment_Prepaid='Yes',WC_Order_ID=%d, WC_Order_Paid='Yes' WHERE Appointment_ID=%d", $order_id, $_SESSION['EWD_UASP_Appointment_ID']));
		EWD_UASP_Remove_WC_Appointment_Deletion($_SESSION['EWD_UASP_Appointment_ID']);
	}
}
add_action('woocommerce_thankyou', "EWD_UASP_Handle_WooCommerce_Appointment_Checkout", 10, 1);

?>