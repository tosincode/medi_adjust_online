<?php

$feature_post_ids =array();
$directory_url_1=get_option('_iv_directory_url_1');					
if($directory_url_1==""){$directory_url_1='hospital';}	

$directory_url_2=get_option('_iv_directory_url_2');					
if($directory_url_2==""){$directory_url_2='doctor';}

$limit='99999';
if(isset($atts['limit']) ){
	if($atts['limit']!=''){
		$limit=$atts['limit'];
	}	
}	

if(!isset($atts['city']) OR $atts['city']==''){
	$args = array(
		'post_type' => $directory_url_1, // enter your custom post type		
		'post_status' => 'publish',
		'showposts'=>$limit,
		'orderby' => 'rand',
		
	);
	$the_query_cpt2 = new WP_Query( $args );  
		 
}else{
		$args = array(
		'post_type' => $directory_url_1, // enter your custom post type		
		'post_status' => 'publish',
		'showposts'=>$limit,
		'orderby' => 'rand',
		
		
	);
	$args['meta_query']= array(
				array(
					'key'     => 'city',
					'value'   => $atts['city'],
					'compare' => 'LIKE',
				),
			);
	$the_query_cpt1 = new WP_Query( $args );  
		
}

$default_fields='';
$field_set=get_option('iv_hospital_fields_review' );
if($field_set!=""){
		$default_fields=get_option('iv_hospital_fields_review' );
}else{
		$default_fields['Cleanliness']=esc_html__('Cleanliness','medical-directory');
		$default_fields['Staff_co-operation']=esc_html__('Staff co-operation','medical-directory');
		$default_fields['Dignity_and_respect']=esc_html__('Dignity and respect','medical-directory');
		$default_fields['Same-sex_accommodation']=esc_html__('Same-sex accommodation','medical-directory');
		$default_fields['Services']=esc_html__('Services','medical-directory');
}
?>

<div class="doctor-feature-content">
	<div class="">
		
			<div class="row">		
				<div class="col-md-12 ">
				<div class="row">
						
					<div class="categories-imgs text-center">
			
						<?php
						 if ( $the_query_cpt1->have_posts() ) :
							while ( $the_query_cpt1->have_posts() ) : $the_query_cpt1->the_post();
						
							
							 $id = get_the_ID();
							 $post = get_post($id);
							 
							 if($post!=''){
								$feature_img='';
								if(has_post_thumbnail($id)){ 
									$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' );
									if($feature_image[0]!=""){ 							
										$feature_img =$feature_image[0];
									}					
								}else{
									$feature_img= wp_iv_directories_URLPATH."/assets/images/default-directory.jpg";					
								
								}
								
								$currentCategory=wp_get_object_terms( $id, $directory_url_1.'-category');
								$cat_link='';$cat_name='';$cat_slug='';
								if(isset($currentCategory[0]->slug)){										
									$cat_slug = $currentCategory[0]->slug;
									$cat_name = $currentCategory[0]->name;
									
									$cat_link= get_term_link($currentCategory[0], $directory_url_1.'-category');
									
								}
							?>

							<div class="col-md-4">

							
							<a href="<?php echo get_post_permalink($id); ?>" style="color:#000000;">
								<div class="f-doctore-single">
									<div class="image-wrapper-content">
										<img src="<?php echo $feature_img; ?>" class="home-category-img" alt="home category">
										<div class="categories-wrap-shadow"></div>
										<div class="inner-meta ">
											
											<i class="fa fa-link"></i>
										</div>

									</div>
																									
								<span style="font-size:15px; padding-bottom: 0;"><?php echo $post->post_title;  ?></span>
								
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
									  
									  </div>						
								<p class="f-doctor-subtitle" style="margin-bottom:14px"><?php echo $cat_name.'&nbsp;'; ?></p>	
								</div>
							</a>
							</div>
							
						<?php
							}
						
						
						endwhile;
					endif;	
				
				?>
			</div>
			</div>
	</div>
	</div>
	</div>
</div>
