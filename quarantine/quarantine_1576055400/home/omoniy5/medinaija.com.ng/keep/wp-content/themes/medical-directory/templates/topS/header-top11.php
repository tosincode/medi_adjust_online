    <div class="box-shadow-for-ui">
      <div class="uou-block-2a banner">
        <div class="container">
          	<?php $medicaldirectory_option_data =get_option('medicaldirectory_option_data'); ?>
        <?php
        $top_logo_image= medicaldirectory_IMAGE."medicaldirectory-logo.png";
        if(isset($medicaldirectory_option_data['medicaldirectory-header-icon']['url']) AND $medicaldirectory_option_data['medicaldirectory-header-icon']['url']!=""):
			$top_logo_image=esc_url($medicaldirectory_option_data['medicaldirectory-header-icon']['url']);
         endif; ?>
         
          <a href="<?php echo esc_url(site_url('/')); ?>" class="logo"> <img src="<?php echo esc_attr($top_logo_image); ?>"  alt="<?php esc_html_e( 'image', 'medicaldirectory' ); ?>" > </a>
          <a href="#" class="mobile-sidebar-button mobile-sidebar-toggle"><span></span></a>

          <div class="banner">
            <a href="#"><img src="<?php echo esc_url(medicaldirectory_IMAGE); ?>banner.png"  alt="<?php esc_html_e( 'image', 'medicaldirectory' ); ?>"></a>
          </div>
        </div>
      </div> <!-- end .uou-block-2a -->
    </div>
