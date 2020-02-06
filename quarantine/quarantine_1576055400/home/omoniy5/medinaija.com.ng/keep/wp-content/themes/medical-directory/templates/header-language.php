<?php $medicaldirectory_option_data =get_option('medicaldirectory_option_data');  ?>



<?php 

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    if ( is_plugin_active('sitepress-multilingual-cms/sitepress.php') && $medicaldirectory_option_data['medicaldirectory-top-language'] == 1){
    	
    	medicaldirectory_wpml_languages();

    } else {  ?>


		<?php if(isset($medicaldirectory_option_data['medicaldirectory-top-language']) && $medicaldirectory_option_data['medicaldirectory-top-language'] == 1) : ?>
		<div class="language">
			<?php if(isset($medicaldirectory_option_data['medicaldirectory-language']) && is_array($medicaldirectory_option_data['medicaldirectory-language']) && !empty($medicaldirectory_option_data['medicaldirectory-language'])) : ?>
			<a class = "toggle" href = "" >
				EN
			</a>

				<ul>
					<?php foreach($medicaldirectory_option_data['medicaldirectory-language'] as $key => $value){ ?>

					<li><a href="#"><?php echo esc_attr($value); ?></a></li>
					
					<?php } ?>
				</ul>

			<?php endif; ?>
		</div>
		<?php endif; ?>

<?php } ?>
<!-- End Header-Language -->