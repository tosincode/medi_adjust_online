    <div class="uou-block-2f">
      <div class="container">

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
 <?php $medicaldirectory_option_data =get_option('medicaldirectory_option_data'); ?>
 
        <div class="contact">
			<?php
			  $medicaldirectorytopphone='(02) 123-456-7890';
			 
			 if(isset($medicaldirectory_option_data['medicaldirectory-top-phone']) AND $medicaldirectory_option_data['medicaldirectory-top-phone']!=""):
				 $medicaldirectorytopphone=$medicaldirectory_option_data['medicaldirectory-top-phone'];
			 endif;
         
			?>
          <span><?php  esc_html_e('Call Us:','medicaldirectory');?> </span>
          <a href="tel:<?php echo $medicaldirectorytopphone;?>"><?php echo $medicaldirectorytopphone;?></a>
        </div>
      </div>
    </div> <!-- end .uou-block-2f -->
