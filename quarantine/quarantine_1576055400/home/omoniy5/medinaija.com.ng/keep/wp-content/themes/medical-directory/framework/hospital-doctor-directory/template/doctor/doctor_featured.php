<?php


$feature_post_ids =array();
$directory_url_1=get_option('_iv_directory_url_1');					
if($directory_url_1==""){$directory_url_1='hospital';}	

$directory_url_2=get_option('_iv_directory_url_2');					
if($directory_url_2==""){$directory_url_2='doctor';}

$medicaldirectory_option_data =get_option('medicaldirectory_option_data');

if(!isset($atts['post_ids']) OR $atts['post_ids']==''){
	$args = array(
		'post_type' => $directory_url_2, // enter your custom post type		
		'post_status' => 'publish',
		'showposts'=>'4',
		'orderby' => 'rand',
		
	);
	$the_feature = new WP_Query( $args );  
		 if ( $the_feature->have_posts() ) : 	
			while ( $the_feature->have_posts() ) : $the_feature->the_post();
						$id = get_the_ID();
						$feature_post_ids[]=$id;						
			endwhile; 
	 endif;
}else{
		$feature_post_ids = explode(",", $atts['post_ids']);
}


?>

<div class="doctor-feature-content">
	<div class="">
		
			<div class="row">		
				<div class="col-md-12 ">
				<div class="row">
					<p class="home-title" style="text-align: center;"><strong><?php echo esc_attr (ucfirst($directory_url_2));  ?> <?php  esc_html_e(' Featured Listing','medical-directory');?> </strong></p>
						
					<div class="categories-imgs text-center">
			
						<?php
						foreach($feature_post_ids as $fpost){
							
							 $id =$fpost;
							 $post = get_post($id);
							 
							 if($post!=''){
								$feature_img='';
								if(has_post_thumbnail($id)){ 
									$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' );
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
								<p class="f-doctor-subtitle"><?php echo $cat_name.'&nbsp;'; ?></p>
								<p class="short-description">
									<?php
									$content = apply_filters( 'the_content', $post->post_content );
									$content = str_replace( ']]>', ']]&gt;', $content );										
									echo wp_trim_words( $content, 15,'');
								?>
									
								</p>
								
								</div>
							</a>
							</div>
							
						<?php
							}
						
						}
				
				?>
			</div>
			</div>
	</div>
	</div>
	</div>
</div>
