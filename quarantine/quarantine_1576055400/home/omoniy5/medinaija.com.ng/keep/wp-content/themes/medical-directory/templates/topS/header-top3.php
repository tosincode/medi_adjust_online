    <div class="uou-block-1c">
	   <div class="container">
		   <?php
        $top_logo_image= medicaldirectory_IMAGE."medicaldirectory-logo.png";
        if(isset($medicaldirectory_option_data['medicaldirectory-header-icon']['url']) AND $medicaldirectory_option_data['medicaldirectory-header-icon']['url']!=""):
			$top_logo_image=esc_url($medicaldirectory_option_data['medicaldirectory-header-icon']['url']);
         endif; ?>
         
      <a href="<?php echo esc_url(site_url('/')); ?>" > 
      <img src="<?php echo esc_attr($top_logo_image); ?>" alt="<?php esc_html_e( 'image', 'medicaldirectory' ); ?>" class="logo"> 
      </a>

      <div class="search">
        <?php get_search_form(); ?>
      </div>
      	<?php get_template_part('templates/header','socialButton'); ?>  
    </div>
  </div> <!-- end .uou-block-1a -->

