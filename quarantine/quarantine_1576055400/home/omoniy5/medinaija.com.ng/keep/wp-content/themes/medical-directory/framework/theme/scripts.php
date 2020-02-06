<?php



/*-------------------------------------------------------------------------
  START ENQUEUING THEME SCRIPTS
------------------------------------------------------------------------- */

if( !function_exists('medicaldirectory_add_theme_scripts') ){

  function medicaldirectory_add_theme_scripts(){

     global $is_IE;

  /**
   * mordanizr
   * @param $handle, $src, $deps, $ver, $in_footer
   * @since  Version 1.0
  */

    wp_enqueue_script( 'hoverIntent', medicaldirectory_JS_PLUGINS.'hoverIntent.js', array('jquery'), $ver = true, true );

    wp_enqueue_script( 'jquery.fitvids', medicaldirectory_JS_PLUGINS.'jquery.fitvids.js', array('jquery'), $ver = true, true );

    wp_enqueue_script( 'flexslider', medicaldirectory_JS_PLUGINS.'jquery.flexslider-min.js', array('jquery'), $ver = true, true );

    wp_enqueue_script( 'rangeslider', medicaldirectory_JS_PLUGINS.'rangeslider.min.js', array('jquery'), $ver = true, true );

    wp_enqueue_script( 'superfish', medicaldirectory_JS_PLUGINS.'superfish.min.js', array('jquery'), $ver = true, true );

    wp_enqueue_script( 'supersubs', medicaldirectory_JS_PLUGINS.'supersubs.js', array('jquery'), $ver = true, true );

    wp_enqueue_script( 'masterslider', medicaldirectory_JS .'masterslider/masterslider.min.js', array('jquery'), $ver = false, true );

    wp_enqueue_script( 'jquery.easing.min', medicaldirectory_JS .'masterslider/jquery.easing.min.js', array('jquery'), $ver = false, true );

    wp_enqueue_script( 'master-slider-custom', medicaldirectory_JS.'master-slider-custom.js', array('jquery'), $ver = true, true );

    wp_enqueue_script( 'bootstrap.min', medicaldirectory_JS.'bootstrap.js', array('jquery'), $ver = true, true );

    wp_enqueue_script( 'uou_accordions', medicaldirectory_JS.'uou-accordions.js', array('jquery'), $ver = true, true );

    wp_enqueue_script( 'uou-tabs', medicaldirectory_JS.'uou-tabs.js', array('jquery'), $ver = true, true );

    wp_enqueue_script( 'jquery-nicescroll', medicaldirectory_JS.'jquery.nicescroll.js', array('jquery'), $ver = true, true );

    wp_enqueue_script( 'isotope-custom', medicaldirectory_JS.'isotope-custom.js', array('jquery'), $ver = true, true );

    wp_enqueue_script( 'isotope', medicaldirectory_JS.'isotope.pkgd.min.js', array('jquery'), $ver = true, true );


    wp_enqueue_script( 'swipebox', medicaldirectory_JS.'jquery.swipebox.min.js', array('jquery'), $ver = true, true );

    $dir_map_api=get_option('_dir_map_api');	
	if($dir_map_api==""){$dir_map_api='AIzaSyCIqlk2NLa535ojmnA7wsDh0AS8qp0-SdE';}	
    
    wp_enqueue_script('maps.google', 'https://maps.googleapis.com/maps/api/js?key='.$dir_map_api.'&libraries=places', array('jquery'), false, true);
    

    wp_enqueue_script( 'maplace-0.1.3', medicaldirectory_JS.'maplace-0.1.3.js', array('jquery'), $ver = true, true );

    wp_enqueue_script( 'matchheight', medicaldirectory_JS.'jquery.matchHeight.js', array('jquery'), $ver = true, true );


    wp_enqueue_script( 'scripts', medicaldirectory_JS.'scripts.js', array('jquery'), $ver = true, true );


/*-------------------------------------------------------------------------
      GOOGLE MAP FOR CONTACT US PAGE START
    ------------------------------------------------------------------------- */
if(is_page_template('templates/creative-home.php' )||is_page_template('templates/corporate-home.php' )||is_page_template('templates/copywriter-home.php' ))
{
    $args = array('post_type' => 'company_location','posts_per_page' => '-1');

    $my_query = new WP_Query( $args );

    $marker_content_prev = array();


    foreach ($my_query->posts as $key => $value) {


      $post_id = $my_query->posts[$key]->ID;
      $country_name = get_post_meta( $post_id, '_medicaldirectory_property_address_country_name');
      $region_name = get_post_meta( $post_id, '_medicaldirectory_property_address_region_name');
      $address_name = get_post_meta( $post_id, '_medicaldirectory_property_address_address_name');
      $lat = get_post_meta( $post_id, '_medicaldirectory_property_address_lat');
      $lng = get_post_meta( $post_id, '_medicaldirectory_property_address_lng');

      $icon_id = get_post_meta($post_id,'_medicaldirectory_company_location_icon');
      $icon = wp_get_attachment_image_src( $icon_id[0] );

      $post_title = $my_query->posts[$key]->post_title;
      $post_permalink = $my_query->posts[$key]->guid;
      $content = $my_query->posts[$key]->post_content;
      $trimmed_content = wp_trim_words( $content, 10, '<a href="'. $post_permalink .'"> Read More</a>'  );


          $m=8;

            $marker_content_prev[$key]['lat'] = floatval($lat[0]);
            $marker_content_prev[$key]['lon'] = floatval($lng[0]);
            $marker_content_prev[$key]['id'] = (string)$post_id;
            $marker_content_prev[$key]['zoom'] =intval($m);


      if(isset($group)){
        $marker_content_prev[$key]['group'] = $group;
      }

      if(isset($icon) && !empty($icon)){
        $marker_content_prev[$key]['icon'] = $icon[0];
      }


    }


    $marker_content = array();

    foreach ($marker_content_prev as $keys => $values) {
      array_push($marker_content, $values);
    }


    wp_enqueue_script( 'medicaldirectory_custom_map_script', medicaldirectory_JS.'map-script.js', array('jquery'), $ver = false, true );
    wp_localize_script( 'medicaldirectory_custom_map_script', 'marker_location', $marker_content );
}
    /*-------------------------------------------------------------------------
       GOOGLE MAP FOR CONTACT US PAGE END
    ------------------------------------------------------------------------- */



  }
}

  add_action('wp_enqueue_scripts', 'medicaldirectory_add_theme_scripts');


/*-------------------------------------------------------------------------
  START ENQUEUING ADMIN SCRIPTS
------------------------------------------------------------------------- */

if( !function_exists('medicaldirectory_admin_load_scripts') ){

  function medicaldirectory_admin_load_scripts($hook) {

    if(in_array($hook,array("post.php","post-new.php"))) {

      wp_enqueue_script( 'medicaldirectory-admin', medicaldirectory_JS.'sb-admin.js', array('jquery'), $ver = false, true );

      wp_enqueue_script('maps.google', 'http://maps.google.com/maps/api/js?sensor=false', array('jquery'), false, true);
      wp_enqueue_script( 'gps_converter', medicaldirectory_JS.'gps_converter.js', array('jquery'), $ver = false, true );

      }

  }

}

add_action('admin_enqueue_scripts', 'medicaldirectory_admin_load_scripts');

/*-------------------------------------------------------------------------
  END ENQUEUING ADMIN SCRIPTS
------------------------------------------------------------------------- */

