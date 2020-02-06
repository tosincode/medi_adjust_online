<?php
// Add in a new column option for the UASP post type
function EWD_UASP_Columns_Head($defaults) {
	$defaults['number_of_views'] = __('# of Views', 'ultimate-appointment-scheduling');

	return $defaults;
}
 
// Show the number of times the FAQ post has been clicked
function EWD_UASP_Columns_Content($column_name, $post_ID) {
	if ($column_name == 'number_of_views') {
		$num_views = EWD_UASP_Get_Views($post_ID);
		echo $num_views;
	}

}

function EWD_UASP_Register_Post_Column_Sortables( $column ) {
    $column['number_of_views'] = 'number_of_views';
    return $column;
}

function EWD_UASP_Sort_Views_Column( $vars ) 
{
    if ( isset( $vars['orderby'] ) && 'number_of_views' == $vars['orderby'] ) {
        $vars = array_merge( $vars, array(
            'meta_key' => 'uasp_view_count', //Custom field key
            'orderby' => 'meta_value_num') //Custom field value (number)
        );
    }

    return $vars;
}


// Get the number of times the FAQ post has been clicked
function EWD_UASP_Get_Views($post_ID) {
	$UASP_View_Count = get_post_meta($post_ID, 'uasp_view_count', true);
	if ($UASP_View_Count != "") {
		return $UASP_View_Count;
	}
	else {
		return 0;
	}
}

/*add_filter('manage_uasp_posts_columns', 'EWD_UASP_Columns_Head');
add_action('manage_uasp_posts_custom_column', 'EWD_UASP_Columns_Content', 10, 2);

add_filter( 'manage_edit-uasp_sortable_columns', 'EWD_UASP_Register_Post_Column_Sortables' );
add_filter('posts_clauses', 'mbe_sort_custom_column', 10, 2);
add_filter( 'request', 'EWD_UASP_Sort_Views_Column' );*/

?>