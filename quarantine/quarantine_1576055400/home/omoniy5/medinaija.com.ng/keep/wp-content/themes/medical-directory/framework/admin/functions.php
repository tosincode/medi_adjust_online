<?php


if ( ! isset( $content_width ) )
  $content_width = 1140;




/*-------------------------------------------------------------------------
  START REGISTER medicaldirectory SIDEBARS
------------------------------------------------------------------------- */

if ( ! function_exists( 'medicaldirectory_sidebar' ) ) {


function medicaldirectory_sidebar() {

  $args = array(
    'id'            => 'mainsidebar',
    'name'          => esc_html__( 'Page Sidebar', 'medical-directory' ),   
    'description'   => esc_html__('Put your main sidebar widgets here','medical-directory'),  
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h5 class="sidebar-title">',
    'after_title'   => '</h5>',
  );

  register_sidebar( $args );

   $footer_left_sidebar = array(

    'id'            => 'medicaldirectory_footer_left_sidebar',
    'name'          => esc_html__( 'Footer', 'medical-directory' ),
    'description'   => esc_html__('Put your widgets here that show on footer side area','medical-directory'),    
    'before_widget' => '<div class="col-md-3 col-sm-6">',
    'after_widget'  => '</div>', 
    'before_title'  => '<h5>',
    'after_title'   => '</h5>',

  );

  register_sidebar( $footer_left_sidebar );

  $footer_middle_sidebar = array(

    'id'            => 'medicaldirectory_footer_middle_sidebar',
    'name'          => esc_html__( 'Footer Middle Sidebar', 'medical-directory' ),
    'description'   => esc_html__('Put your widgets here that show on footer middle area','medical-directory'), 
    'before_widget' => '<div class="col-md-3 col-sm-6">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5>',

  );

  //register_sidebar( $footer_middle_sidebar );


 $footer_right_sidebar = array(
    'id'            => 'medicaldirectory_footer_right_sidebar',
    'name'          => esc_html__( 'Footer Right Sidebar', 'medical-directory' ),
    'description'   => esc_html__('Put your widgets here that show on footer right side area example(newsletter)','medical-directory'), 
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
  );

  //register_sidebar( $footer_right_sidebar );

  $footer_down_sidebar = array(
    'id'            => 'medicaldirectory_footer_down_sidebar',
    'name'          => esc_html__( 'Footer Down Sidebar', 'medical-directory' ),
    'description'   => esc_html__('Put your widgets here that show on footer down side area example(contact info)','medical-directory'), 
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
  );

  //register_sidebar( $footer_down_sidebar );

 $footer_extra_middle_sidebar = array(
    'id'            => 'medicaldirectory_footer_extra_middle_sidebar',
    'name'          => esc_html__( 'Footer Extra Middle Sidebar', 'medical-directory' ),
    'description'   => esc_html__('Put your widgets here that show on footer extra middle side area','medical-directory'), 
    'before_widget' => '<div class="col-sm-4">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5>',
  );

  //register_sidebar( $footer_extra_middle_sidebar );

}

add_action( 'widgets_init', 'medicaldirectory_sidebar' );

}

/*-------------------------------------------------------------------------
  END RESGISTER medicaldirectory SIDEBARS
------------------------------------------------------------------------- */


/*-------------------------------------------------------------------------
  START RESGISTER NAVIGATION MENUS FOR medicaldirectory
 ------------------------------------------------------------------------- */   

function medicaldirectory_custom_navigation_menus() {

  $locations = array(

    //'primary_navigation_left'   => esc_html__('Primary Menu Left','medical-directory'),
    'primary_navigation_right'  => esc_html__('Primary Menu','medical-directory'), 
    //'primary_navigation_footer' => esc_html__('Primary Menu footer','medical-directory'), 
    //'primary_navigation_mobile' => esc_html__('Primary Menu mobile','medical-directory'), 



  );

  register_nav_menus( $locations );

}

add_action( 'init', 'medicaldirectory_custom_navigation_menus' );



/*-------------------------------------------------------------------------
  END REGISTER NAVIGATION MENUS FOR  medicaldirectory
 ------------------------------------------------------------------------- */ 


 /*-------------------------------------------------------------------------
  START medicaldirectory CUSTOM CSS START
------------------------------------------------------------------------- */


add_action( 'wp_head', 'medicaldirectory_custom_css' );


function medicaldirectory_custom_css() {

  $medicaldirectory_option_data =get_option('medicaldirectory_option_data'); 
  if(isset($medicaldirectory_option_data['medicaldirectory-custom-css'])){
    echo "<style>" . $medicaldirectory_option_data['medicaldirectory-custom-css'] . "</style>";  
  }
  
  
}


/*-------------------------------------------------------------------------
  END medicaldirectory AUTORENT CUSTOM CSS END
------------------------------------------------------------------------- */


/*-------------------------------------------------------------------------
  START medicaldirectory CUSTOM JS START
------------------------------------------------------------------------- */


add_action( 'wp_head', 'medicaldirectory_custom_js' );

function medicaldirectory_custom_js() {
  $medicaldirectory_option_data =get_option('medicaldirectory_option_data'); 
  if(isset($medicaldirectory_option_data['medicaldirectory-custom-js'])){
    echo "<script>" . $medicaldirectory_option_data['medicaldirectory-custom-js'] . "</script>";  
  }
  
}


/*-------------------------------------------------------------------------
  END medicaldirectory CUSTOM JS END
------------------------------------------------------------------------- */




