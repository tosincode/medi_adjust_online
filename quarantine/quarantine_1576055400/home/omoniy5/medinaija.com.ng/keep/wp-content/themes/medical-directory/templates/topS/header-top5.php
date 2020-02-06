<div class="uou-block-1e">
	<div class="container">
		<?php $medicaldirectory_option_data =get_option('medicaldirectory_option_data'); ?>
            <?php
			  $medicaldirectorytopphone='(02) 123-456-7890';
			 if(isset($medicaldirectory_option_data['medicaldirectory-top-phone']) AND $medicaldirectory_option_data['medicaldirectory-top-phone']!=""):
				$medicaldirectorytopphone=$medicaldirectory_option_data['medicaldirectory-top-phone'];
			 endif;
         
			?>
			
        <?php get_template_part('templates/header','social'); ?> 
    
        <a href="tel:<?php echo $medicaldirectorytopphone;?>"><?php echo $medicaldirectorytopphone;?></a>
        <?php get_template_part('templates/header','login'); ?> 
        <?php get_template_part('templates/header','language'); ?> 
  </div>
</div> <!-- end .uou-block-1a -->
