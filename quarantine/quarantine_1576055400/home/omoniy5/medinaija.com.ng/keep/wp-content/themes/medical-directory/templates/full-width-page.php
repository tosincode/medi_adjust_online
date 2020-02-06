<?php 
/**
 * Template Name: Full Width Page
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
		
		<div class="row">
			<div class="col-md-12">
						
					<?php echo apply_filters('the_content',$post->post_content); ?>

						
			</div> <!--  end blog-single -->
		</div>
		<?php
		if(comments_open()) {
		?>
		<div class="row">
			<div class="col-md-12">			
				<div class="uou-post-comment"> 
					   <aside class="uou-block-14a">
						  <h5><?php esc_html_e('Comments','comments');?> 
						   <?php 
									if(comments_open() && !post_password_required()){
									  comments_popup_link( '(0)', '(1)', '(%)', 'article-post-meta' );
									}
							?> 
							   
						  </h5>          
						   <?php comments_template('', true); ?>
						</aside>
				</div> <!-- end of comment -->
			</div>
		 </div> 			
    
		<?php
			}
		?>
    
      </div> <!--  end blog-single -->
    </div> <!-- end container -->


<?php get_footer();
