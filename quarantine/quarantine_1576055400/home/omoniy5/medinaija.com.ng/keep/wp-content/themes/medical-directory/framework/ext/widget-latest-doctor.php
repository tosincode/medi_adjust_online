<?php
global $post,$wpdb,$tag;

//wp_enqueue_style('iv_directories-style64', wp_iv_directories_URLPATH . 'assets/cube/css/cubeportfolio.css',array(), $ver = false, $media = 'all');
//wp_enqueue_style('iv_directories-style6', medicaldirectory_CSS . 'widget.css',array(), $ver = false, $media = 'all');
$directory_url_2=get_option('_iv_directory_url_2');					
if($directory_url_2==""){$directory_url_2='doctor';}

		$display_option ='list';// (isset($instance['display_option'])? $instance['display_option']:'list');
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recently joined','medical-directory'  );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number ){
            $number = 3;
        }
        $words = ( ! empty( $instance['words'] ) ) ? absint( $instance['words'] ) : 15;
        if ( ! $words ){
            $words = 15;
       }

		$post_ids=(isset($instance['post_number'])? $instance['post_ids']:'');
		$query_arr= array(
			'post_type'		=> $directory_url_2,
			'post_status'	=> 'publish',
		);
		if($post_ids!=""){
			$post_ids_arr=explode(",",$post_ids);
			$query_arr['post__in']=$post_ids_arr;

		}else{
			$query_arr['numberposts']=$number;
			$query_arr['orderby']='rand';
		}


		$hospitals = get_posts($query_arr);

if(	$display_option=='list'){
?>

	 <h5 ><?php echo esc_attr($title); ?> </h5>

		<?php

			foreach( $hospitals as $hospital ) :
			 ?>
			 <div  class="margin-top parent-listing" >
				 <div class="widget_right" >

						 <div class="blog-posts" >
							 <p>
								<a href="<?php echo get_permalink($hospital->ID);?>" >
								 <?php echo substr( $hospital->post_title,0, $words); ?>
								 </a>
							 </p>
						</div>
						<span class="cbp-l-grid-projects-desc">
							<?php echo esc_attr(get_the_date('F j, Y')); ?>

						</span>

					</div>
					 <div class="widget_left"  >
						 	<a href="<?php echo get_permalink($hospital->ID);?>">
						  <?php
						  $feature_img='';
						if(has_post_thumbnail($hospital->ID)){
							$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $hospital->ID ), 'thumbnail' );
							if($feature_image[0]!=""){
								$feature_img =$feature_image[0];
							}
						?>
						<img  class="image-80" src="<?php echo  $feature_img;?>" alt="<?php esc_html_e( 'image', 'medical-directory' ); ?>" >
						<?php
						}else{	?>

							<img  class="image-80"  src="<?php echo  wp_iv_directories_URLPATH."/assets/images/default-doctor.jpg";?>" alt="<?php esc_html_e( 'image', 'medical-directory' ); ?>">

						<?php
						}
					?>
						</a>

					</div>
			 </div>

		<?php

			endforeach;
		?>


<?php
} // Display option list
?>

