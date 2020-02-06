<?php 
/**
 * Template Name: About Us Page
 *
 */
 ?>
<?php get_header(); ?>

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
				<h3><?php  echo esc_attr($post->post_title) ;?></h3>
			</div>
		</div>	
		<?php
			}
		?>
  <div class="blog-content pt60"> 
    <div class="container">		
       <?php echo apply_filters('the_content',$post->post_content); ?>
    </div>
            
  </div> <!--  end blog-single -->


<?php get_footer();
