<?php
/**
 * Template Name: Home Page
 *
 */
wp_enqueue_style( 'iv_directories-font', 'https://fonts.googleapis.com/css?family=Raleway');
 ?>
 <?php get_header(); ?>
 <?php
$directory_url_1=get_option('_iv_directory_url_1');					
if($directory_url_1==""){$directory_url_1='hospital';}	

$directory_url_2=get_option('_iv_directory_url_2');					
if($directory_url_2==""){$directory_url_2='doctor';}


 if(isset($medicaldirectory_option_data['medicaldirectory-show-page-banner-image']) AND $medicaldirectory_option_data['medicaldirectory-show-page-banner-image']==1){
		$top_banner_image= medicaldirectory_IMAGE."home-top.jpg";
		 if(isset($medicaldirectory_option_data['medicaldirectory-home-banner-image']['url']) AND $medicaldirectory_option_data['medicaldirectory-home-banner-image']['url'] !=""){
			$top_banner_image=  $medicaldirectory_option_data['medicaldirectory-home-banner-image']['url'];
		}
		$page_name_reg=get_option('_iv_directories_registration' );
		$register_link= get_permalink($page_name_reg);
		$hospital_link=get_post_type_archive_link($directory_url_1);
		$doctor_link=get_post_type_archive_link( $directory_url_2 );
 ?>
 <div class="medicaldirectory-home-banner" style="background: url('<?php echo esc_attr($top_banner_image);?>') top center no-repeat;">
		<div class="overlay"></div>
		<div class="banner-content">
			<div class="container">
				<div  class="home-banner-text">
					<div class="row">
						<div class="text-center">
							<div class="banner-icon">
								<i class="fa fa-user-md"></i>								
							</div>
							<h2>
								<?php
									esc_html_e($medicaldirectory_option_data['medicaldirectory-home-banner-text'],'medical-directory')
									//echo esc_attr($medicaldirectory_option_data['medicaldirectory-home-banner-text']);
								?>
							</h2>

						</div>
					</div>
					<div class="row">
						<div class="text-center">
							<p>
								<?php
									$banner_subtitle= (isset($medicaldirectory_option_data['medicaldirectory-home-banner-subtitle'])?$medicaldirectory_option_data['medicaldirectory-home-banner-subtitle']:"");
									//echo esc_attr($banner_subtitle);
									esc_html_e($banner_subtitle,'medical-directory')
								?>
							</p>

						</div>
					</div>

				</div>
				<div class="home-banner-button text-center">
					<?php
					$hospital_banner_button_text= (isset($medicaldirectory_option_data['medicaldirectory-home-banner-button1'])?$medicaldirectory_option_data['medicaldirectory-home-banner-button1']:"");
					echo '<button type="button" class="btn-new btn-custom" onclick="location.href=\''.$hospital_link.'\'" >'. esc_html__($hospital_banner_button_text,'medical-directory').'</button>';
					?>

					<?php
					$hospital_banner_button_text2= (isset($medicaldirectory_option_data['medicaldirectory-home-banner-button2'])?$medicaldirectory_option_data['medicaldirectory-home-banner-button2']:"");
					echo '<button type="button" class="btn-new btn-custom-white" onclick="location.href=\''.$doctor_link.'\'" >'. esc_html__($hospital_banner_button_text2,'medical-directory').'</button>';
					?>
				</div>
			</div>
			<div class="home-search-content">
				<?php
					echo do_shortcode("[search_box bgcolor='1d1d1d']");
				?>
			</div>

		</div>


</div>
<?php
	}
?>


 <div class="blog-content pbzero home-blog">
 		<div class="container-fluid text-center">
			<?php

			if(isset($medicaldirectory_option_data['medicaldirectory-row1-3block']) AND $medicaldirectory_option_data['medicaldirectory-row1-3block']==1){			
			?>			
 			<div class="row">
 				<div class="feature-content-body">
 				<div class="col-md-4 matchHeight" style="background: <?php echo (isset($medicaldirectory_option_data['medicaldirectory-row1-1block-color']['color'])? $medicaldirectory_option_data['medicaldirectory-row1-1block-color']['color']:'#f5f5f5');?>;">
 					<div class="feature-content-single">
 						<h5><i class="fa fa-hospital-o"></i> 						
 						  <?php  						
 						$directory_url_1_string=str_replace("-"," ",$directory_url_1); 
 						$directory_url_1_string =  esc_attr (ucwords($directory_url_1_string)); 						
 						 
 						 echo (isset($medicaldirectory_option_data['medicaldirectory-home-hearder-block1'])? $medicaldirectory_option_data['medicaldirectory-home-hearder-block1']: $directory_url_1_string);
 						
 						  ?>
 						 
 						  </h5>
 						<p><?php
 						$hospital_top_text= (isset($medicaldirectory_option_data['medicaldirectory-home-top-block1'])?$medicaldirectory_option_data['medicaldirectory-home-top-block1']:"");
 						echo esc_html_e($hospital_top_text,'medical-directory');  ?></p>
 						<div class="button-content">
 							<?php
 								$button_link= get_post_type_archive_link( $directory_url_1);
 								echo '<button type="button" class="btn btn-transparent" onclick="location.href=\''.$button_link.'\'" >'.  esc_html__('Search Now','medical-directory').'</button>';
 							?>
 						</div>
 					</div>
 				</div>
 				<div class="col-md-4 matchHeight  middle" style="background: <?php echo (isset($medicaldirectory_option_data['medicaldirectory-row1-2block-color']['color'])? $medicaldirectory_option_data['medicaldirectory-row1-2block-color']['color']:'#f5f5f5');?>;">
 					<div class="feature-content-single">
 						<h5><i class="fa fa-user-md"></i>
 						
 						<?php
						$directory_url_2_string=str_replace("-"," ",$directory_url_2); 
						$register_top_text2= (isset($medicaldirectory_option_data['medicaldirectory-home-hearder-block2'])?$medicaldirectory_option_data['medicaldirectory-home-hearder-block2']:$directory_url_2_string);
						echo esc_attr (ucwords($register_top_text2)); 
						?>
						
 						
 						</h5>
 						<p><?php
 						$doctor_top_text= (isset($medicaldirectory_option_data['medicaldirectory-home-top-block2'])?$medicaldirectory_option_data['medicaldirectory-home-top-block2']:"");
 						echo esc_html_e($doctor_top_text,'medical-directory');
 					  ?></p>
 						<div class="button-content">
 							<?php
 							$button_link= get_post_type_archive_link( $directory_url_2 );
 							echo '<button type="button" class="btn btn-transparent" onclick="location.href=\''.$button_link.'\'" >'. esc_html__('Search Now','medical-directory').'</button>';
 							?>
 						</div>
 					</div>
 				</div>
 				<div class="col-md-4 matchHeight" style="background: <?php echo (isset($medicaldirectory_option_data['medicaldirectory-row1-3block-color']['color'])? $medicaldirectory_option_data['medicaldirectory-row1-3block-color']['color']:'#f5f5f5');?>;">
 					<div class="feature-content-single">
 						<h5><i class="fa fa-file-text-o"></i><?php
						$register_top_text3= (isset($medicaldirectory_option_data['medicaldirectory-home-hearder-block3'])?$medicaldirectory_option_data['medicaldirectory-home-hearder-block3']:"Register Now");
						esc_html_e($register_top_text3,'medical-directory'); 
						?></h5>
 						<p><?php
 						$register_top_text= (isset($medicaldirectory_option_data['medicaldirectory-home-top-block3'])?$medicaldirectory_option_data['medicaldirectory-home-top-block3']:"");
 						echo esc_html_e($register_top_text,'medical-directory');
 						
 						
 						 ?></p>
 						<div class="button-content">
 							<?php
 							$page_name_reg=get_option('_iv_directories_registration' );
 							$register_link= get_permalink($page_name_reg);
 							echo '<button type="button" class="btn btn-transparent" onclick="location.href=\''.$register_link.'\'" >'.  esc_html__('Register','medical-directory').'</button>';
 							?>
 						</div>
 					</div>
 				</div>
 				</div>
 			</div>
 		
			<?php
			}
			?>
 		</div>



	<div class="">
		<?php echo apply_filters('the_content',$post->post_content); ?>

	</div>

  </div> <!--  end blog-single -->
</div> <!-- end container -->







<?php get_footer();
