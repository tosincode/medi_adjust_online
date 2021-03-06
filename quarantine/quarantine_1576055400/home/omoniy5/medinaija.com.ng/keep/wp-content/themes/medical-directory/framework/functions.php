<?php




/*-------------------------------------------------------------------------
  START INITIALIZE FILE LINK
------------------------------------------------------------------------- */

require_once(  get_template_directory(). '/framework/constants.php' );
require_once(  get_template_directory(). '/framework/ext/extensions-setup.php' );
require_once(  get_template_directory(). '/framework/ext/widget-catagories_one.php' );
require_once(  get_template_directory() . '/framework/ext/widget-newsletter-subscription.php' );
require_once(  get_template_directory(). '/framework/ext/widget-contact-info.php' );
require_once(  get_template_directory(). '/framework/ext/widget-social.php' );
require_once(  get_template_directory(). '/framework/ext/widget-company.php' );
require_once(  get_template_directory(). '/framework/ext/widget-legal.php' );
require_once(  get_template_directory(). '/framework/ext/widget-logo.php' );



require_once(  get_template_directory(). '/framework/ext/widget-archives.php' );
require_once(  get_template_directory(). '/framework/ext/widget-tag.php' );
require_once(  get_template_directory(). '/framework/ext/widget-social.php' );
require_once(  get_template_directory(). '/framework/ext/widget-categories.php' );



require_once(  get_template_directory(). '/framework/theme/style.php' );
require_once(  get_template_directory(). '/framework/theme/scripts.php' );
require_once(  get_template_directory() . '/framework/theme/medicaldirectory-image.php' );
require_once(  get_template_directory(). '/framework/theme/medicaldirectory-wpml.php' );

require_once(  get_template_directory(). '/framework/admin/functions.php' );
require_once(  get_template_directory(). '/framework/admin/theme-functions.php' );
require_once(  get_template_directory(). '/framework/admin/breadcrumbs.php' );
require_once(  get_template_directory(). '/framework/admin/allBreadcrumbs/arrowcrumbs.php' );
require_once(  get_template_directory() . '/framework/admin/medicaldirectory-menu-walker.php' );
require_once(  get_template_directory(). '/framework/admin/medicaldirectory-nav-menu-walker-two.php' );
require_once(  get_template_directory(). '/framework/admin/medicaldirectory-image.php' );


//if (defined('wp_iv_directories_URLPATH') && wp_iv_directories_URLPATH!='') { 
	require_once(  get_template_directory(). '/framework/ext/medicaldirectory-hospital.php' ); 
	require_once(  get_template_directory(). '/framework/ext/medicaldirectory-doctor.php' ); 
//}
require_once(  get_template_directory(). '/framework/hospital-doctor-directory/plugin.php' );
//require_once(  get_template_directory(). '/framework/visual-composer/shortcodes.php' );
/*-------------------------------------------------------------------------
  END INITIALIZE FILE LINK
------------------------------------------------------------------------- */


/*-------------------------------------------------------------------------
  START ENQUEUING REDUX OPTION FRAMEWORK
------------------------------------------------------------------------- */

	if ( !class_exists( 'ReduxFramework' ) && file_exists( get_template_directory() . '/framework/redux/ReduxCore/framework.php' ) ) {
	    require_once( get_template_directory() . '/framework/redux/ReduxCore/framework.php' );
	}
	if ( !isset( $medicaldirectory_option_data ) && file_exists( get_template_directory() . '/framework/redux/config/config.php' ) ) {
	    require_once( get_template_directory() . '/framework/redux/config/config.php' );
	}




add_filter('nav_menu_css_class' , 'medicaldirectory_special_nav_class' , 10 , 2);

function medicaldirectory_special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}





