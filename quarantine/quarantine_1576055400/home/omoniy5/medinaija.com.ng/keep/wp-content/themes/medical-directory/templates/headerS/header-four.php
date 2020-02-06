    <div class="box-shadow-for-ui">
      <div class="uou-block-2b icons">
        <div class="container">
        <?php $medicaldirectory_option_data =get_option('medicaldirectory_option_data');  ?>

        <?php $top_logo_image= medicaldirectory_IMAGE."medicaldirectory-logo.png";              
        if(isset($medicaldirectory_option_data['medicaldirectory-header-icon']['url']) AND $medicaldirectory_option_data['medicaldirectory-header-icon']['url']!=""):         
			$top_logo_image=esc_url($medicaldirectory_option_data['medicaldirectory-header-icon']['url']); 
         endif; ?> 
         <a href="<?php echo esc_url(site_url('/')); ?>" class="logo"> <img src="<?php echo esc_attr($top_logo_image); ?>" alt="<?php esc_html_e( 'image', 'medicaldirectory' ); ?>"> </a>         
        <a href="#" class="mobile-sidebar-button mobile-sidebar-toggle"><span></span></a>
          <nav class="nav">
            <?php 

              $defaults = array(
                'theme_location'  => 'primary_navigation_right',
                'menu'            => '',
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'sf-menu',
                'menu_id'         => '',
                'echo'            => true,            
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul class="sf-menu %2$s"> %3$s </ul>',
                'depth'           => 0,
                'fallback_cb'     => 'medicaldirectory_nav_walker::fallback',
                'walker'          => new medicaldirectory_nav_walker()
              );

              wp_nav_menu( $defaults );

            ?>

          </nav>
        </div>
      </div> <!-- end .uou-block-2b -->
    </div>




