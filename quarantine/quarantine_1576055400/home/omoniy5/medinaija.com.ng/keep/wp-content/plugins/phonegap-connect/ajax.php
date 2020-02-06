<?php

class phonegapDanielRiera_Ajax {
  
  private static $instance;

  function __construct() { 
	 	$actions = array(
			'phonegapDanielRiera_get_posts',
			'phonegapDanielRiera_get_post',
			'phonegapDanielRiera_get_page',
			'phonegapDanielRiera_get_categories',
			'phonegapDanielRiera_get_home',
			'phonegapDanielRiera_get_comments',
			'phonegapDanielRiera_data',
			'phonegapDanielRiera_get_next_post',
			'phonegapDanielRiera_get_prev_post',
			'phonegapDanielRiera_add_user',
			'phonegapDanielRiera_login'
		);
    	foreach( $actions as $action ){
      		add_action( 'wp_ajax_nopriv_'.$action, array( $this, $action ) );
			add_action( 'wp_ajax_'.$action, array( $this, $action ) );
    	}
  }
  /******
  Devuelve loa datos básicos para el funcionamiento de la app
  ******/
  function phonegapDanielRiera_data() {
	  	if(!$this->phonegapDanielRiera_checksecure()) {
      		exit;
    	}
	  
	  	$name = get_bloginfo('name');
	  	$res = array(
			'name' => $name			
		);
		wp_send_json($res);
	  
  }
  /********
  Devuelve los post para mostrar la home
  *******/
	function phonegapDanielRiera_get_home(){
		if(!$this->phonegapDanielRiera_checksecure()) {
      				exit;
    			}
		$elementos = 5;
		$yaCargados = intval($_GET['next']);
		$args = array(
			'posts_per_page'	=> $elementos,
			'offset'           => $yaCargados,
			'category'			=> explode(",",get_option('phonegapDanielRiera_categoriasShow')),
			'orderby'          => 'post_date',	
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		$posts_array = get_posts($args);
			if(0 < $posts_array) {
				if(!$this->phonegapDanielRiera_checksecure()) {
      				exit;
    			}
				foreach( $posts_array as $term) {
					$res['posts'][] = $term;	
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $term->ID ), 'medium' );
					$res['images'][]['imagen'] = $image;
  					$custom_fields = get_post_custom($term->ID);
  					$res['custom_field'][] = $custom_fields;
				}
			}else{
				$res = array(
				'code' => 013,
				'msg' => "No se han encontrado post"
				);	
			}
			$res['optiones'] = $args;
		wp_send_json($res);
	}
	function phonegapDanielRiera_get_posts() {
		if(!$this->phonegapDanielRiera_checksecure()) {
      				exit;
    			}
		$elementos = 5;
		$yaCargados = sanitize_text_field($_GET['next']);
		$categoria = intval($_GET['id']);
		$argsD = array(
			'posts_per_page'	=> $elementos,
			'offset'           	=> $yaCargados,
			'category'         	=> $categoria,
			'orderby'          	=> 'post_date',
			'order'            	=> 'DESC',
			'post_type'        	=> 'post',
			'post_status'      	=> 'publish',
			'suppress_filters' 	=> true
		);
		$posts_array = get_posts($argsD);
			if(0 < $posts_array) {
				foreach( $posts_array as $term) {
					$res['posts'][] = $term;	
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $term->ID ), 'medium' );
					$res['images'][]['imagen'] = $image;
  					$custom_fields = get_post_custom($term->ID);
  					$res['custom_field'][] = $custom_fields;
				}
			}else{
			$res = array(
			'code' => 012,
			'msg' => "No se han encontrado post en esta categoría"
			);	
			}
		wp_send_json($res);
	}
	function phonegapDanielRiera_get_comments() {
		if(!$this->phonegapDanielRiera_checksecure()) {
      				exit;
    			}
		$args = array(
    		'post_id' => intval($_GET['id']),   // Use post_id, not post_ID
		);
		$res = get_comments( $args );
		wp_send_json($res);
	}
	function phonegapDanielRiera_get_categories() {
		if(!$this->phonegapDanielRiera_checksecure($nonceCheck, false)) {
      				exit;
    			}
		$args = array(
			'orderby'           => 'name', 
			'order'             => 'ASC',
			'include'			=>  explode(",",get_option('phonegapDanielRiera_categoriasShow')),
			'exclude'			=> 'all',
			'hide_empty'        => 1,
			'fields'            => 'all',
			'pad_counts' => true
		);
		$terms = get_terms('category',$args);
		foreach( $terms as $term) {
			$res[] = $term;	
		}
		wp_send_json($res);
	}
	function phonegapDanielRiera_get_post() {
		$id = intval($_GET['id']);
		$args = array(
			'page_id'			=> $id,
			'post_type'        	=> 'post',
			'post_status'      	=> 'publish',
			'suppress_filters' 	=> true 
		);
		$posts_array = get_posts($args);
			if(0 < $posts_array) {
				if(!$this->phonegapDanielRiera_checksecure()) {
      				exit;
    			}
					$res['posts'][] = $posts_array;	
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_array->ID ), 'medium' );
					$res['images'][]['imagen'] = $image;
  					$custom_fields = get_post_custom($posts_array->ID);
  					$res['custom_field'][] = $custom_fields;
			}else{
				$res = array(
				'code' => 013,
				'msg' => "No se han encontrado post"
				);	
			}
		wp_send_json($res);	
	}
	//GET PAGE
	function phonegapDanielRiera_get_page() {
		$id = intval($_GET['id']);
		$args = array(
			'page_id'			=> $id,
			'post_type'        	=> 'page',
			'post_status'      	=> 'publish',
			'suppress_filters' 	=> true 
		);
		$posts_array = get_posts($args);
			if(0 < $posts_array) {
				if(!$this->phonegapDanielRiera_checksecure()) {
      				exit;
    			}
					$res['posts'][] = $posts_array;	
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_array->ID ), 'medium' );
					$res['images'][]['imagen'] = $image;
  					$custom_fields = get_post_custom($posts_array->ID);
  					$res['custom_field'][] = $custom_fields;
			}else{
				$res = array(
				'code' => 013,
				'msg' => "No se han encontrado post"
				);	
			}
		wp_send_json($res);	
	}
	//GET NEXT POST
	function phonegapDanielRiera_get_next_post() {
		global $post;
		$oldGlobal = $post;
		$id = intval($_GET['id']);

		$post = get_post($id);
		$posts_array = get_next_post(true);
		
		$post = $oldGlobal;
		
			if(0 < $posts_array) {
				if(!$this->phonegapDanielRiera_checksecure()) {
      				exit;
    			}
					$res['posts'][] = $posts_array;	
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_array->ID ), 'medium' );
					$res['images'][]['imagen'] = $image;
  					$custom_fields = get_post_custom($posts_array->ID);
  					$res['custom_field'][] = $custom_fields;
			}else{
				$res = array(
				'code' => 'ERROR 14',
				'msg' => "No se han encontrado post "
				);	
			}
		wp_send_json($res);	
	}
	//GET PREV POST
	function phonegapDanielRiera_get_prev_post() {
		global $post;
		$oldGlobal = $post;
		$id = intval($_GET['id']);

		$post = get_post($id);
		$posts_array = get_previous_post(true);
		
		$post = $oldGlobal;
		
			if(0 < $posts_array) {
				if(!$this->phonegapDanielRiera_checksecure()) {
      				exit;
    			}
					$res['posts'][] = $posts_array;	
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_array->ID ), 'medium' );
					$res['images'][]['imagen'] = $image;
  					$custom_fields = get_post_custom($posts_array->ID);
  					$res['custom_field'][] = $custom_fields;
			}else{
				$res = array(
				'code' => 'ERROR 14',
				'msg' => "No se han encontrado post "
				);	
			}
		wp_send_json($res);	
	}
	/**** ADD USER **/
	function phonegapDanielRiera_add_user() {
		if(!$this->phonegapDanielRiera_checksecure()) {
      				exit;
    	}	
		$user_login = $_POST['user'];
		$user_email = $_POST['email'];
		$user_pass = $_POST['passwd'];
		$nombre = $_POST['nombre'];
		$createUser['data'] = wp_create_user($user_login, $user_pass, $user_email);
		$dataUser = array(
			'ID' => $createUser['data'],
			'first_name' => $nombre
		);
		wp_update_user( $dataUser );
		wp_send_json($createUser);
	}
	/**** LOGIN ***/
	function phonegapDanielRiera_login() {
		if(!$this->phonegapDanielRiera_checksecure()) {
      		exit;
    	}
		$username = $_POST['user_login'];
		$password = $_POST['user_password'];
		$userdata = get_user_by('login', $username);
		$userdata = apply_filters('wp_authenticate_user', $userdata, $password);

		$check = wp_signon(array('user_login' => $username, 'user_password' => $password), false);
 
		$user['data'] =  $check;
		$md5email = md5(strtolower(trim($userdata->user_email)));
		$user['imagen'] = "https://www.gravatar.com/avatar/".$md5email;
		wp_send_json($user);
	}
	/***********
	Check de seguridad
	***********/
	function phonegapDanielRiera_checksecure() {
		if($_GET['phonegapDanielRieratoken']=="") {
			
			$return['status']['code'] = '401';
      		$return['status']['message'] = 'No token access';
      		wp_send_json( $return );
     		return false;

		}elseif($_GET['phonegapDanielRieratoken']!=get_option('phonegapDanielRiera_token')){
			
			$return['status']['code'] = '401';
      		$return['status']['message'] = 'No token valid';
      		wp_send_json( $return );
     		return false;
			
			
		}else{
			return true;	
		}
	}
  /**
  * Create singleton for this class
  *
  * @return object instance of self
  */
  public static function get_instance(){
    if( null === self::$instance ){
      self::$instance = new phonegapDanielRiera_Ajax();
    }
    return self::$instance;
  }
}

?>
