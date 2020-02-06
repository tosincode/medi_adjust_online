<?php $medicaldirectory_option_data =get_option('medicaldirectory_option_data');  ?>

<!-- Start Social -->
<?php if(isset($medicaldirectory_option_data['medicaldirectory-share-button']) && $medicaldirectory_option_data['medicaldirectory-share-button'] == 1) : ?>
<ul class="buttons">
	<?php if(isset($medicaldirectory_option_data['medicaldirectory-share-button-facebook']) && $medicaldirectory_option_data['medicaldirectory-share-button-facebook'] == 1) : ?>
	<li><a class="fa fa-facebook" href="http://www.facebook.com/sharer.php?u=<?php home_url('/');?> "></a></li>
	<?php endif; ?>
	<?php if(isset($medicaldirectory_option_data['medicaldirectory-share-button-twitter']) && $medicaldirectory_option_data['medicaldirectory-share-button-twitter'] == 1) : ?>
	<li><a class="fa fa-twitter" href="http://twitthis.com/twit?url=<?php home_url('/'); ?>"></a></li>
	<?php endif; ?>
	<?php if(isset($medicaldirectory_option_data['medicaldirectory-share-button-linkedin']) && $medicaldirectory_option_data['medicaldirectory-share-button-linkedin'] == 1) : ?>
	<li><a class="fa fa-google-plus" href="http://plus.google.com/share?url=<?php home_url('/');?>"></a></li>
	<?php endif; ?>
</ul> 
<?php endif; ?>
<!-- End Social -->
