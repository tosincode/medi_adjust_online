<?php
add_filter( 'block_categories', 'ewd_uasp_add_block_category' );
function ewd_uasp_add_block_category( $categories ) {
	$categories[] = array(
		'slug'  => 'ewd-uasp-blocks',
		'title' => __( 'Ultimate Appointment Scheduling', 'ultimate-appointment-scheduling' ),
	);
	return $categories;
}

