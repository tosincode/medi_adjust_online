<style>
.bs-callout {
    margin: 20px 0;
    padding: 15px 30px 15px 15px;
    border-left: 5px solid #eee;
}
.bs-callout-info {
    background-color: #E4F1FE;
    border-color: #22A7F0;
}

</style>
<div class="bootstrap-wrapper">

	<div class="welcome-panel container-fluid">
			<?php
			$page_install= get_option('_hospital_doctor_install_setting');
			if($page_install!='installed'){?>
			  <div class="row">	
				<div class=" col-md-12  bs-callout bs-callout-info">	
					<?php _e('Please install pages, email template and setting. This is required','medical-directory');  ?> <button type="button" onclick="return  iv_install_page_template();" class="btn btn-success"><?php _e('Install Now','medical-directory'); ?> </button>
				</div>		
			
				</div>
			<?php 
			}
			?>
		
		<div class="row">
			<div class="col-md-12">
				
				<h3 class="page-header" ><?php _e('My Account','medical-directory');?> <small>  </small> </h3>
				
				
				
			</div>
		</div>
		
		
		<div class="form-group col-md-12 row">
			
			<div class="row ">
				<label for="text" class="col-md-2 control-label"><?php _e('Short Code','medical-directory');?> </label>
				<div class="col-md-4" >
					[iv_directories_profile_template]
				</div>
				<div class="col-md-4" id="success_message">
				</div>
			</div>
			<div class="row ">
				<label for="text" class="col-md-2 control-label"><?php _e('Php Code','medical-directory');?> </label>
				<div class="col-md-10" >
							<p>
										&lt;?php
										echo do_shortcode('[iv_directories_profile_template]');
										?&gt;</p>	
				</div>
			</div>
			<div class="row ">
				<label for="text" class="col-md-2 control-label"> <?php _e('My Account Page','medical-directory');?> </label>
				<div class="col-md-10" >
					<!--
					 get_option('_iv_directories_registration','73');
					-->
					<?php 
					$form_wizard=get_option('_iv_directories_profile_page');
							//echo get_the_title( $form_wizard );  ?>
					<a class="btn btn-info btn-xs " href="<?php echo get_permalink( $form_wizard ); ?>" target="blank"><?php _e('View Page','medical-directory');?> </a>
				
					
				</div>
			</div>
			<div class="row ">
				<label for="text" class="col-md-2 control-label"> <?php _e('Profile Fields Setting','medical-directory');?> </label>
				<div class="col-md-10" >	
					<a class="btn btn-primary btn-xs" href="?page=wp-iv_directories-profile-fields"><?php _e('Add /Edit/ Remove Profile Fields','medical-directory');?>   </a>
											
				</div>
			</div>
			<div class="row ">
				<label for="text" class="col-md-2 control-label"> <?php _e('My Account Menu','medical-directory');?>  </label>
				<div class="col-md-10" >	
					<a class="btn btn-primary btn-xs" href="?page=wp-iv_directories-profile-fields"> <?php _e('Show/Hide/Add Menu','medical-directory');?> </a>
											
				</div>
			</div>
			<br/>
			
			<table class="table">
				<!--
				<?php
					$opt_style=	get_option('iv_directories_profile-template');
				?>
				<tr>
					<td >
							<label >
									<input type="radio" name="option-profile" id="option-profile" value="style-1"  <?php  echo ($opt_style=='style-1' ? 'checked': ''); ?> >
									Style 1 
								</label>
					</td>
					<td>
						<?php //include( wp_iv_directories_template. 'private-profile/profile-template-1.php');?>
					</td>	
				</tr>
				-->
					
				
			</table>	
				
				
			
		</div>
		
			
		
	</div>
</div>
<script type="text/javascript">
	 jQuery(document).ready(function () {

		   jQuery("input[type='radio']").click(function(){
				update_profile_template();
		   });

		});
function update_profile_template(){
	
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var search_params = {
			"action": 			"iv_directories_update_profile_template",
			"profile-st": jQuery("input[name=option-profile]:checked").val(),	
		};
		jQuery.ajax({
			url: ajaxurl,
			dataType: "json",
			type: "post",
			data: search_params,
			success: function(response) {              		
				jQuery("#success_message").html('<h4><span style="color: #04B404;"> ' + response.code + '</span></h4>');
			}
		});
}
function iv_install_page_template(){

	var search_params={
		"action"  : 	"iv_directories_install_page_template",			
	};
	jQuery.ajax({					
		url : ajaxurl,					 
		dataType : "json",
		type : "post",
		data : search_params,
		success : function(response){
			location.reload();	
		}
	})	
}
</script>
