<?php

/**
 * Posts API class
 */
class phonegapDanielRiera_Admin {
  
  private static $instance;
  function __construct() {
    $this->ajax = phonegapDanielRiera_Ajax::get_instance();
    add_action( 'init', array( $this, 'phonegapDanielRiera_add_rewrites' ) );
  }

  function phonegapDanielRiera_add_rewrites(){
	  $urlFinalAdmin = str_replace(home_url()."/","",admin_url('admin-ajax.php?phonegapDanielRieratoken=$1&action=phonegapDanielRiera_$2&id=$3&next=$4'));
    add_rewrite_rule( 'app/([^/]*)/([^/]*)/([^/]*)/([^/]*)/?', $urlFinalAdmin, 'top');
  }
  
  public static function get_instance(){
    if( null === self::$instance ){
      self::$instance = new phonegapDanielRiera_Admin();
    }
    return self::$instance;
  }
}

?>