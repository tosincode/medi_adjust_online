    <div class="box-shadow-for-ui">
      <div class="uou-block-2d">
        <div class="container">
          <div class="contact">
			  <?php
        $top_logo_image= medicaldirectory_IMAGE."medicaldirectory-logo.png";
        if(isset($medicaldirectory_option_data['medicaldirectory-header-icon']['url']) AND $medicaldirectory_option_data['medicaldirectory-header-icon']['url']!=""):
			$top_logo_image=esc_url($medicaldirectory_option_data['medicaldirectory-header-icon']['url']);
         endif; ?>
         
         <?php $medicaldirectory_option_data =get_option('medicaldirectory_option_data'); ?>
            <?php
			  $medicaldirectorytopphone='(02) 123-456-7890';
			 if(isset($medicaldirectory_option_data['medicaldirectory-top-phone']) AND $medicaldirectory_option_data['medicaldirectory-top-phone']!=""):
				$medicaldirectorytopphone=$medicaldirectory_option_data['medicaldirectory-top-phone'];
			 endif;
         
			?>
			
            <span>Call Us:</span>
             <a href="tel:<?php echo $medicaldirectorytopphone;?>"><?php echo $medicaldirectorytopphone;?></a>
          </div>

          <a href="<?php echo esc_url(site_url('/')); ?>" class="logo"> <img src="<?php echo esc_attr($top_logo_image); ?>" alt="<?php esc_html_e( 'image', 'medicaldirectory' ); ?>"> </a>
          <a href="#" class="mobile-sidebar-button mobile-sidebar-toggle"><span></span></a>

          <a href="#" class="cart"><i class="fa fa-shopping-cart"></i> <?php esc_html_e( 'Shopping Cart', 'medicaldirectory' ); ?>   (0)</a>
        </div>
      </div> <!-- end .uou-block-2d -->
    </div>
