<?php $medicaldirectory_option_data =get_option('medicaldirectory_option_data');  ?>

<!-- Start Social -->
<?php if(isset($medicaldirectory_option_data['medicaldirectory-share-button']) && $medicaldirectory_option_data['medicaldirectory-share-button'] == 1) : ?>
	<ul class="social">
	<?php if(isset($medicaldirectory_option_data['medicaldirectory-share-button-facebook']) && $medicaldirectory_option_data['medicaldirectory-share-button-facebook'] == 1) : ?>
	<li><a class="fa fa-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( home_url( '/' ) );?> "></a></li>
	<?php endif; ?>
	<?php if(isset($medicaldirectory_option_data['medicaldirectory-share-button-twitter']) && $medicaldirectory_option_data['medicaldirectory-share-button-twitter'] == 1) : ?>
	<li><a class="fa fa-twitter" href="https://twitter.com/home?status=<?php echo esc_url( home_url( '/' ) ); ?>"></a></li>
	<?php endif; ?>	
	
	<?php if(isset($medicaldirectory_option_data['medicaldirectory-share-button-linkedin']) && $medicaldirectory_option_data['medicaldirectory-share-button-linkedin'] == 1) : ?>	
	<li><a class="fa fa-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( home_url( '/' ) );?>"></a></li>
	<?php endif; ?>
	
	<?php if(isset($medicaldirectory_option_data['medicaldirectory-share-button-google']) && $medicaldirectory_option_data['medicaldirectory-share-button-google'] == 1) : ?>	
	<li><a class="fa fa-google-plus" href="https://plus.google.com/share?url=<?php echo esc_url( home_url( '/' ) );?>"></a></li>
	<?php endif; ?>
	
	<?php if(isset($medicaldirectory_option_data['medicaldirectory-share-button-pinterest']) && $medicaldirectory_option_data['medicaldirectory-share-button-pinterest'] == 1) : ?>	
	<li><a class="fa fa-pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url( home_url( '/' ) );?>"></a></li>
	<?php endif; ?>
	
	</ul> 
<?php endif; ?>

<!-- End Social -->
