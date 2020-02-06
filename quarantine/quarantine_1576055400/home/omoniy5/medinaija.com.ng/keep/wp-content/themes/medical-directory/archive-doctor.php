<?php get_header(); ?>
	<?php
wp_enqueue_style('iv_directories-style-64', wp_iv_directories_URLPATH . 'assets/cube/css/cubeportfolio.css');
wp_enqueue_style('iv_directories-style-110', medicaldirectory_CSS . 'listing_style_1.css');
wp_enqueue_script('iv_directories-script-12', wp_iv_directories_URLPATH . 'admin/files/js/markerclusterer.js');
$default_fields='';
$field_set=get_option('iv_doctor_fields_review' );
if($field_set!=""){
		$default_fields=get_option('iv_doctor_fields_review' );
}else{
		$default_fields['Staff']='Staff';
		$default_fields['Punctuality']='Punctuality';
		$default_fields['Helpfulness']='Helpfulness';
		$default_fields['Knowledge']='Knowledge';
		$default_fields['Bedside_Manner']='Bedside Manner';
		$default_fields['Wait_Time']='Wait Time';
		$default_fields['Cost']='Cost';
}

$ins_lat='37.4419';
$ins_lng='-122.1419';

$directory_url_1=get_option('_iv_directory_url_1');
if($directory_url_1==""){$directory_url_1='hospital';}

$directory_url_2=get_option('_iv_directory_url_2');
if($directory_url_2==""){$directory_url_2='doctor';}

$search_button_show=get_option('_search_button_show');
if($search_button_show==""){$search_button_show='yes';}

$dir_searchbar_show=get_option('_dir_searchbar_show');
if($dir_searchbar_show==""){$dir_searchbar_show='no';}


$dir_map_show=get_option('_dir_map_show');
if($dir_map_show==""){$dir_map_show='no';}

	$dirs_data =array();
	$tag_arr= array();
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'post_type' => $directory_url_2, // enter your custom post type
		'paged' => $paged,
		'post_status' => 'publish',
		//'fields' => 'all',
		//'orderby' => 'ASC',
		//'posts_per_page'=> '2',  // overrides posts per page in theme settings
	);

	$lat='';$long='';$keyword_post='';$address='';$postcats ='';$selected='';$city='';
if( isset($_POST['dir_specialties'])){
	if($_POST['dir_specialties']!=''){

		$args['meta_query']= array(
				array(
					'key'     => 'specialtie',
					'value'   => $_POST['dir_specialties'],
					'compare' => 'LIKE',
				),
			);
	}
}
	if(get_query_var($directory_url_2.'-category')!=''){
			$postcats = get_query_var($directory_url_2.'-category');
			$args[$directory_url_2.'-category']=$postcats;
			$selected=$postcats;
	}

	if( isset($_POST[$directory_url_2.'-category'])){
		if($_POST[$directory_url_2.'-category']!=''){
			$postcats = $_POST[$directory_url_2.'-category'];
			$args[$directory_url_2.'-category']=$postcats;
			$selected=$postcats;
			$args['posts_per_page']='999999';
		}
	}


	$radius=get_option('_iv_radius');
	if( isset($_POST['range_value'])){
		$radius = $_POST['range_value'];
	}
	if($radius==''){$radius='50';}

	if( isset($_POST['address'])){
		if($_POST['address']!=""){
			$lat =  $_POST['latitude'];
			$long = $_POST['longitude'];
			$address=trim($_POST['address']);
			$args['lat']=$lat;
			$args['lng']=$long;
			$args['distance']=$radius;
			$args['posts_per_page']='999999';
		}
	}
	if( isset($_POST['keyword'])){
		if($_POST['keyword']!=""){
			$args['s']= $_POST['keyword'];
			$keyword_post=$_POST['keyword'];
			$args['posts_per_page']='999999';
		}
	}
	if( isset($tag)){
		if($tag!=""){
			if(!isset($_POST['keyword'])){
				$args['tag']= $tag;

			}
		}
	}
	if( isset($_POST['tag_arr'])){
		if($_POST['tag_arr']!=""){
			$tag_arr= $_POST['tag_arr'];
			//$tag_arr= get_query_var('tag_arr');
			$tags_string= implode("+", $tag_arr);
			$args['tag']= $tags_string;
		}
	}
	if( isset($_POST['city'])){
		if($_POST['city']!=''){
			$city=$_POST['city'];
			$args['meta_query']= array(
					array(
						'key'     => 'city',
						'value'   => $_POST['city'],
						'compare' => 'LIKE',
					),
				);
		}
	}	

	   $the_query = new WP_GeoQuery( $args );


 $paid_ids= array();


$directory_url_2=get_option('_iv_directory_url_2');					
if($directory_url_2==""){$directory_url_2='doctor';}	



$directory_url_2_string=str_replace("-"," ",$directory_url_2); 
$directory_url_2_string= (isset($medicaldirectory_option_data['medicaldirectory-home-hearder-block2'])?$medicaldirectory_option_data['medicaldirectory-home-hearder-block2']:$directory_url_2_string);
?>

<?php
		$top_breadcrumb_image= medicaldirectory_IMAGE."banner-breadcrumb.jpg";
        if(isset($medicaldirectory_option_data['medicaldirectory-banner-breadcrumb']['url']) AND $medicaldirectory_option_data['medicaldirectory-banner-breadcrumb']['url']!=""):
			$top_breadcrumb_image=esc_url($medicaldirectory_option_data['medicaldirectory-banner-breadcrumb']['url']);
         endif;
         
         $medicaldirectory_breadcrumb_value='1';
         if(isset($medicaldirectory_option_data['medicaldirectory-breadcrumb']) AND $medicaldirectory_option_data['medicaldirectory-breadcrumb']!=""):
			$medicaldirectory_breadcrumb_value=$medicaldirectory_option_data['medicaldirectory-breadcrumb'];
         endif;
         
         
         if($medicaldirectory_breadcrumb_value=='1'){ 
		?>
		 <div class="breadcrumb-content">
			<img   src="<?php echo $top_breadcrumb_image;?>" alt="<?php esc_html_e( 'banner', 'medical-directory' ); ?>">
			<div class="container">
				<h3><?php echo  ucfirst($directory_url_2_string);?></h3>
			</div>
		</div>	
		<?php
			}
		?>

<div>

		<div id="top-map" class="<?php echo ($dir_map_show=='yes'? '': 'div-hide') ?>">
			<div id="map"> </div>
		</div>


	 <div id="top-search" class=" navbar-default navbar listing-search <?php echo ($dir_searchbar_show=='yes'? '': 'div-hide') ?>" >
		<div class=" navbar-collapse text-left" >
				<form class="form-inline advanced-serach" method="POST"  onkeypress="return event.keyCode != 13;">
					<div class="container">


					<div class="input-field ">
					

					 <div class="form-group top-8" >
							<input type="text" class="form-control " id="keyword" name="keyword"  placeholder="<?php esc_html_e( 'Keyword', 'medical-directory' ); ?>" value="<?php echo esc_attr($keyword_post); ?>">
					  </div>
				  
				 	<div class="form-group top-8" >
					  <i class="fa fa-chevron-down arrow"></i>
									<?php
								echo '<select name="'.$directory_url_2.'-category" class="form-control">';
								echo'	<option selected="'.$selected.'" value="">'.esc_html__('Any Category','medical-directory').'</option>';


										if( isset($_POST['submit'])){
											$selected = $_POST[$directory_url_2.'-category'];
										}
											//directories
											$taxonomy = $directory_url_2.'-category';
											$args = array(
												'orderby'           => 'name',
												'order'             => 'ASC',
												'hide_empty'        => true,
												'exclude'           => array(),
												'exclude_tree'      => array(),
												'include'           => array(),
												'number'            => '',
												'fields'            => 'all',
												'slug'              => '',
												'parent'            => '0',
												'hierarchical'      => true,
												'child_of'          => 0,
												'childless'         => false,
												'get'               => '',

											);
								$terms = get_terms($taxonomy,$args); // Get all terms of a taxonomy
								if ( $terms && !is_wp_error( $terms ) ) :
									$i=0;
									foreach ( $terms as $term_parent ) {  ?>


											<?php

											echo '<option  value="'.$term_parent->slug.'" '.($selected==$term_parent->slug?'selected':'' ).'><strong>'.$term_parent->name.'</strong></option>';
											?>
												<?php

												$args2 = array(
													'type'                     => $directory_url_2,
													'parent'                   => $term_parent->term_id,
													'orderby'                  => 'name',
													'order'                    => 'ASC',
													'hide_empty'               => 1,
													'hierarchical'             => 1,
													'exclude'                  => '',
													'include'                  => '',
													'number'                   => '',
													'taxonomy'                 => $directory_url_2.'-category',
													'pad_counts'               => false

												);
												$categories = get_categories( $args2 );
												if ( $categories && !is_wp_error( $categories ) ) :


													foreach ( $categories as $term ) {
														echo '<option  value="'.$term->slug.'" '.($selected==$term->slug?'selected':'' ).'>-'.$term->name.'</option>';
													}

												endif;

												?>


									<?php
										$i++;
									}
								endif;
									echo '</select>';
								?>
						</div>
						
					<div class="form-group top-8" >
								<input type="text" class="form-control location-input" id="address" name="address"  placeholder="<?php esc_html_e( 'Location', 'medical-directory' ); ?>"
								value="<?php echo trim($address); ?>">
								<i class="fa fa-map-marker marker"></i>
								<input type="hidden" id="latitude" name="latitude"  value="<?php echo esc_attr($lat); ?>" >
								<input type="hidden" id="longitude" name="longitude"  value="<?php echo esc_attr($long); ?>">
					  </div>
				  
				   <div class="form-group top-8" >
								<input type="text" class="form-control location-input " id="city" name="city"  placeholder="<?php esc_html_e( 'City', 'medical-directory' ); ?>"
								value="<?php echo trim($city); ?>">								
				 </div>
				
					  <div class="form-group search top-8" >
									<button type="submit" id="submit" name="submit"  class="btn-new btn-custom-search "><i class="fa fa-search"></i><span><?php esc_html_e( 'Search', 'medical-directory' ); ?></span></button>
						</div>
					
				  </div>




					</div>
				</form>

	 </div>
	</div>


</div>

  <div class="blog-content bg-white" >
  	<div class="listing-filter-content">
	  	<div class="container">
	  				<?php
	  				if($search_button_show=='yes'){
	  				?>
	  				 <div class="cbp-l-filters-button cbp-l-filters-right">
	  					<div id="search_toggle_div" class="cbp-filter-item" onclick="toggle_top_search('top-search');" ><i class="fa fa-search listing-padding-right" ></i><?php esc_html_e( 'Search', 'medical-directory' ); ?></div>
	  					<div  id="map_toggle_div"  class="cbp-filter-item" onclick="toggle_top_map('top-map');"><i class="fa fa-globe listing-padding-right" ></i><?php esc_html_e( 'Show Map', 'medical-directory' ); ?></div>
	  				</div>
	  				<?php
	  				}
	  				?>
	  		        <div id="js-filters-lightbox-gallery2" class="cbp-l-filters-button cbp-l-filters-left">
	  		           <?php
	  						if($postcats==''){	?>

	  		            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"><?php esc_html_e('Show All', 'medical-directory' ); ?></div>
	  		            <?php
	  						$args2 = array(
	  							'type'                     => $directory_url_2,
	  							'orderby'                  => 'name',
	  							'order'                    => 'ASC',
	  							'hide_empty'               => true,
	  							'hierarchical'             => 1,
	  							'exclude'                  => '',
	  							'include'                  => '',
	  							'number'                   => '',
	  							'taxonomy'                 => $directory_url_2.'-category',
	  							'pad_counts'               => false

	  						);
	  						$categories = get_categories( $args2 );
	  						if ( $categories && !is_wp_error( $categories ) ) :

	  							foreach ( $categories as $term ) {
	  								//echo '<div data-filter=".'.$term->slug.'" class="cbp-filter-item"> '.$term->name.'<div class="cbp-filter-counter"></div></div>';
	  								?>
	  									<div data-filter="" class="cbp-filter-item"><a href="<?php echo get_post_type_archive_link( $directory_url_2 ).'?&'.$directory_url_2.'-category='.$term->slug ; ?>">
	  										<?php echo esc_attr($term->name); ?>
	  										</a>
	  									</div>
	  							<?php
	  							}

	  						endif;
	  					}if($postcats!=''){ ?>
	  							<div data-filter="" class="cbp-filter-item"><a href="<?php echo get_post_type_archive_link( $directory_url_2 ) ; ?>">
	  								<?php esc_html_e('Show All', 'medical-directory' ); ?>
	  								</a>
	  							</div>
	  						<?php
	  						$custom_cat_obj =  get_term_by('slug',$postcats,$directory_url_2.'-category');

	  					    echo '<div data-filter=".'.$postcats.'"  class="cbp-filter-item-active cbp-filter-item"> '.$custom_cat_obj->name.' <div class="cbp-filter-counter"></div></div>';


	  					}
	  					?>


	  		    </div>
	  	</div>
	  </div>
    <div class="container">

      <div class="row">
        <div class="col-md-12">


			<!-- Map**************-->




 <div class="clearfix top-20" >


    <div id="js-grid-lightbox-gallery" class="cbp">
       <?php
	$i=1;
	 if ( $the_query->have_posts() ) :

	while ( $the_query->have_posts() ) : $the_query->the_post();
				$id = get_the_ID();

				$gallery_ids=get_post_meta($id ,'image_gallery_ids',true);
				$gallery_ids_array = array_filter(explode(",", $gallery_ids));

				$dir_data['link']=get_post_permalink($id);
				$dir_data['title']=$post->post_title;
				$dir_data['lat']=get_post_meta($id,'latitude',true);
				$dir_data['lng']=get_post_meta($id,'longitude',true);
				$ins_lat=get_post_meta($id,'latitude',true);
				$ins_lng=get_post_meta($id,'longitude',true);
				$dir_data['address']=get_post_meta($id,'address',true);
				$dir_data['image']= '';
				$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'thumbnail' );
				if($feature_image[0]!=""){
					//$dir_data['image']= '<img class=" img-responsive" src="'. $feature_image[0].'">';
					$dir_data['image']=  $feature_image[0];
				}
				$dir_data['marker_icon']=wp_iv_directories_URLPATH."/assets/images/map-marker/map-marker.png";
				$currentCategoryId='';
				$terms =get_the_terms($id, $directory_url_2."-category");
				if($terms!=""){
					foreach ($terms as $termid) {
						if(isset($termid->term_id)){
							 $currentCategoryId= $termid->term_id;
						}
					}
				}
				$marker = get_option('_cat_map_marker_'.$currentCategoryId,true);
				if($marker!=''){
					$image_attributes = wp_get_attachment_image_src( $marker ); // returns an array
					if( $image_attributes ) {
						$dir_data['marker_icon']= $image_attributes[0];
					}
				}
				array_push( $dirs_data, $dir_data );
					$feature_img='';
					if(has_post_thumbnail()){
						$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'medium' );
						if($feature_image[0]!=""){
							$feature_img =$feature_image[0];
						}
					}else{
						$feature_img= wp_iv_directories_URLPATH."/assets/images/default-doctor.jpg";

					}

					$currentCategory=wp_get_object_terms( $id, $directory_url_2.'-category');
					$cat_link='';$cat_name='';$cat_slug='';
					if(isset($currentCategory[0]->slug)){
						$cat_slug = $currentCategory[0]->slug;
						$cat_name = $currentCategory[0]->name;
						$cat_link= get_term_link($currentCategory[0], $directory_url_2.'-category');
					}
					?>
					 <div class="cbp-item <?php echo esc_attr($cat_slug);?>">
						<a href="<?php echo admin_url('admin-ajax.php'); ?>?action=iv_doctor_ajax_single&id=<?php echo esc_attr($id); ?>" class="cbp-caption cbp-singlePageInline" data-title="<?php echo esc_attr($post->post_title); ?><br><?php echo esc_attr($cat_name ); ?>" rel="nofollow">
							<div class="cbp-caption-defaultWrap">
								<div class="image-container" style="background: url('<?php echo esc_attr($feature_img);?>') center center no-repeat; background-size: cover;">
								</div>

							</div>
							<div class="cbp-caption-activeWrap">
								<div class="cbp-l-caption-alignLeft">
									<div class="cbp-l-caption-body">
										<div class="cbp-l-caption-title"><?php echo esc_attr($post->post_title); ?></div>
										<div class="cbp-l-caption-desc"><?php echo esc_attr($cat_name).'&nbsp;'; ?></div>
										<div class="cbp-l-caption-desc long"><?php

										?>

											<?php
											$total_count=0;
											$total_count=get_post_meta($id,'_rating_total_count',true);
											$i=1;$total_rating_value=0;$avg_rating=0;
											if(sizeof($default_fields)>0){
												foreach ( $default_fields as $field_key => $field_value ) {
													$field_value_trim=trim($field_value);
													$total_rating_value=$total_rating_value +get_post_meta($id,$field_key.'_rating',true);
												}
											}

											if($total_rating_value>0 AND $total_count>0){
												$avg_rating=$total_rating_value/$total_count;
											}

											?>
											  <div class="stars" style ="z-index: 99;position: relative;">
											  <i class="fa fa-star<?php echo($avg_rating>=1? "":"-o"); ?>"></i>
											  <i class="fa fa-star<?php echo($avg_rating>=1.5? "":"-o"); ?>"></i>
											  <i class="fa fa-star<?php echo($avg_rating>=2.5? "":"-o"); ?>"></i>
											  <i class="fa fa-star<?php echo($avg_rating>=3.5? "":"-o"); ?>"></i>
											  <i class="fa fa-star<?php echo($avg_rating>=4.5? "":"-o"); ?>"></i>
											  <span>(<?php echo ($total_count==""?0:$total_count); ?>)</span>
											  </div>
										</div>

									</div>
								</div>
							</div>
						</a>
					</div>

		<?php
		$i++;

	endwhile;
				$dirs_json ='';
				if(!empty($dirs_data)){
					//$dirs_json =json_encode($dirs_data);
					$dirs_json =$dirs_data;
				}

				?>


		<?php else :
			$dirs_json='';

		 ?>



		<?php endif; ?>
   </div>
<?php
	if ( !$the_query->have_posts() ){
	esc_html_e( 'Sorry, no doctor matched your criteria.','medical-directory' );
	}
?>
					<!--
					ppaging plugin
					https://wordpress.org/plugins/wp-pagenavi/screenshots/
					-->
					  <?php
					  if ( $the_query->have_posts() ){
							   if (function_exists("wp_pagination")){
									wp_pagination();

							}
					}
					?>

					<!--END .navigation-links-->




<?php
wp_enqueue_script('iv_directories-ar-script-23', wp_iv_directories_URLPATH . 'assets/cube/js/jquery.cubeportfolio.min.js');
wp_enqueue_script('iv_directories-ar-script-102', wp_iv_directories_URLPATH . 'assets/cube/js/lightbox-main.js');
wp_enqueue_script('archive-hospital-js', medicaldirectory_JS.'archive-hospital.js', array('jquery'), $ver = true, true );
wp_localize_script('archive-hospital-js', 'medicaldirectory_data', array( 			'ajaxurl' 			=> admin_url( 'admin-ajax.php' ),
'loading_image'		=> wp_iv_directories_URLPATH.'admin/files/images/loader.gif',
'current_user_id'	=>get_current_user_id(),
'login_message'		=> esc_html__('Please login to remove favorite','medical-directory'),
'Add_to_Favorites'	=> esc_html__('Add to Favorites','medical-directory'),
'Login_claim'		=> esc_html__('Please login to Claim The Listing','medical-directory'),
'login_favorite'	=> esc_html__("Please login to add favorite",'medical-directory'),
'ins_lat'=>$ins_lat,
'ins_lng'=>$ins_lng,
'dirs'=> $dirs_json,
) );
?>


            </div> <!-- end .blog-list -->
      </div>
    </div>
  </div> <!-- end .page-content -->
  </div>



<?php get_footer(); ?>
