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
			<?php
			global $wpdb;
			global $current_user;
			$ii=1;
			
			$directory_url_1=get_option('_iv_directory_url_1');					
			if($directory_url_1==""){$directory_url_1='hospital';}	
			
			$directory_url_2=get_option('_iv_directory_url_2');					
			if($directory_url_2==""){$directory_url_2='doctor';}
			
			?>
			<div class="bootstrap-wrapper">
				<div class="welcome-panel container-fluid">
						<div class="row">
							
							<div class="col-md-12"><h3 class="page-header"><?php _e('Review Fields','medical-directory'); ?>  <br /><small> &nbsp;</small> </h3>
							</div>
						</div> 
						<div id="success_message">	</div>
						
						
						
							
							
						<div class="panel panel-info">
						<div class="panel-heading"><h4><?php echo ucfirst($directory_url_1); ?><?php _e(' Review Fields','medical-directory'); ?>  </h4></div>
						<div class="panel-body">	
							
							
							<form id="dir_fields" name="dir_fields" class="form-horizontal" role="form" onsubmit="return false;">	
																								
										<div class="row ">
												<div class="col-sm-5 ">										
													<h4> <?php _e('Post Meta Name','medical-directory'); ?></h4>
												</div>
												<div class="col-sm-5">
													<h4><?php _e('Display Label','medical-directory'); ?></h4>									
												</div>
												<div class="col-sm-2">
													<h4><?php _e('Action','medical-directory'); ?></h4>
													
												</div>		
																		  
										</div>
										
																 
									
											<div id="custom_field_div">			
														<?php
														
														$default_fields = array();
															$field_set=get_option('iv_hospital_fields_review' );
															
															
														if($field_set!=""){
																$default_fields=get_option('iv_hospital_fields_review' );
														}else{
																$default_fields['Cleanliness']=esc_html__('Cleanliness','medical-directory');
																$default_fields['Staff_co-operation']=esc_html__('Staff co-operation','medical-directory');
																$default_fields['Dignity_and_respect']=esc_html__('Dignity and respect','medical-directory');
																$default_fields['Same-sex_accommodation']=esc_html__('Same-sex accommodation','medical-directory');
																$default_fields['Services']=esc_html__('Services','medical-directory');
														}
														if(sizeof($field_set)<1){																
																$default_fields['Cleanliness']=esc_html__('Cleanliness','medical-directory');
																$default_fields['Staff_co-operation']=esc_html__('Staff co-operation','medical-directory');
																$default_fields['Dignity_and_respect']=esc_html__('Dignity and respect','medical-directory');
																$default_fields['Same-sex_accommodation']=esc_html__('Same-sex accommodation','medical-directory');
																$default_fields['Services']=esc_html__('Services','medical-directory');	
														 }	
														
														$i=1;		
														
														foreach ( $default_fields as $field_key => $field_value ) {												
															
																//echo'<br/>$field_key....'.$field_key.'......$field_values....'.$field_values;
																echo '<div class="row form-group " id="field_'.$i.'"><div class=" col-sm-5"> <input type="text" class="form-control" name="meta_name[]" id="meta_name[]" value="'.$field_key . '" placeholder="Enter Post Meta Name "> </div>		
																<div  class=" col-sm-5">
																<input type="text" class="form-control" name="meta_label[]" id="meta_label[]" value="'.$field_value . '" placeholder="Enter Post Meta Label">													
																</div>
																<div  class=" col-sm-2">';
																?>
																<button class="btn btn-danger btn-xs" onclick="return iv_remove_field('<?php echo $i; ?>');">Delete</button>
																<?php																								
																echo '</div></div>';
															
															$i++;	
															
														}	
													?>
														
													
											</div>				  
										<div class="col-xs-12">											
											<button class="btn btn-warning btn-xs" onclick="return iv_add_field();"><?php _e('Add More','medical-directory'); ?> </button>
									 </div>	
									<input type="hidden" name="dir_name" id="dir_name" value="<?php echo $main_category; ?>">	 
							</form>	
					
										<div class="col-xs-12">					
												<div align="center">
													<div id="loading"></div>
													<button class="btn btn-info btn-lg" onclick="return update_hospital_review_fields();"><?php _e('Update','medical-directory'); ?>  </button>
												</div>
												<p>&nbsp;</p>
											</div>
											<?php _e('Note : Keep "Post Meta Name" field without space e.g Dignity_and_respect	','medical-directory'); ?> 
										
						</div>							 
				
				</div>			 	
					
					
					
				<div id="success_message_doctor">	</div>								
										
				<div class="panel panel-info">
						<div class="panel-heading"><h4><?php echo ucfirst($directory_url_2); ?><?php _e(' Review Fields','medical-directory'); ?>  </h4></div>
						<div class="panel-body">	
							<form id="doctor_fields" name="doctor_fields" class="form-horizontal" role="form" onsubmit="return false;">
											
							
										
										
										<div class="row ">
												<div class="col-sm-5 ">										
													<h4>Post Meta Name</h4>
												</div>
												<div class="col-sm-5">
													<h4>Display Label</h4>									
												</div>
												<div class="col-sm-2">
													<h4>Action</h4>
													
												</div>		
																		  
										</div>
										
																 
									
											<div id="custom_field_div_doctor">			
														<?php
														
														$default_fields = array();
															$field_set=get_option('iv_doctor_fields_review' );
														if($field_set!=""){ 
																$default_fields=get_option('iv_doctor_fields_review' );
														}else{													
																$default_fields['Staff']='Staff';	
																$default_fields['Punctuality']='Punctuality';
																$default_fields['Helpfulness']='Helpfulness';
																$default_fields['Knowledge']='Knowledge';
																$default_fields['Bedside_Manner']='Bedside Manner';
																$default_fields['Wait_Time']='Wait Time';
																$default_fields['Cost']='Cost';	
																
															
														}
														if(sizeof($field_set)<1){	
																$default_fields['Staff']='Staff';	
																$default_fields['Punctuality']='Punctuality';
																$default_fields['Helpfulness']='Helpfulness';
																$default_fields['Knowledge']='Knowledge';
																$default_fields['Bedside_Manner']='Bedside Manner';
																$default_fields['Wait_Time']='Wait Time';
																$default_fields['Cost']='Cost';	
														 }			
														

														
														foreach ( $default_fields as $field_key => $field_value ) {												
															
																//echo'<br/>$field_key....'.$field_key.'......$field_values....'.$field_values;
																echo '<div class="row form-group " id="field_'.$i.'"><div class=" col-sm-5"> <input type="text" class="form-control" name="meta_name[]" id="meta_name[]" value="'.$field_key . '" placeholder="Enter Post Meta Name "> </div>		
																<div  class=" col-sm-5">
																<input type="text" class="form-control" name="meta_label[]" id="meta_label[]" value="'.$field_value . '" placeholder="Enter Post Meta Label">													
																</div>
																<div  class=" col-sm-2">';
																?>
																<button class="btn btn-danger btn-xs" onclick="return iv_remove_field_doctor('<?php echo $i; ?>');">Delete</button>
																<?php																								
																echo '</div></div>';
															
															$i++;	
															
														}	
													?>
														
													
											</div>				  
										<div class="col-xs-12">											
											<button class="btn btn-warning btn-xs" onclick="return iv_add_field_doctor();">Add More</button>
									 </div>	
									 
							</form>	
					
									<div class="col-xs-12">					
												<div align="center">
													<div id="loading"></div>
													<button class="btn btn-info btn-lg" onclick="return update_doctor_review();">Update </button>
												</div>
												<p>&nbsp;</p>
											</div>
								<?php _e('Note : Keep "Post Meta Name" field without space e.g Bedside_Manner','medical-directory'); ?> 			
						</div>							 
				
				</div>			 	
					
					
					
							
			
									
			  </div>						
		</div>		 


<script>
	var i=<?php echo $i; ?>;
	var ii=<?php echo $ii; ?>;
	
	
	function update_hospital_review_fields(){
		
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var search_params = {
			"action": 		"iv_hospital_update_review_fields",
			"form_data":	jQuery("#dir_fields").serialize(), 	
		};
		jQuery.ajax({
			url: ajaxurl,
			dataType: "json",
			type: "post",
			data: search_params,
			success: function(response) {              		
				//jQuery("#success_message").html('<h4><span style="color: #04B404;"> ' + response.code + '</span></h4>');
				jQuery('#success_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.code +'.</div>');
			}
		});
	}
	function iv_add_field(){	
	
		jQuery('#custom_field_div').append('<div class="row form-group " id="field_'+i+'"><div class=" col-sm-5"> <input type="text" class="form-control" name="meta_name[]" id="meta_name[]" value="" placeholder="Enter Post Meta Name "> </div>	<div  class=" col-sm-5"><input type="text" class="form-control" name="meta_label[]" id="meta_label[]" value="" placeholder="Enter Post Meta Label"></div><div  class=" col-sm-2"><button class="btn btn-danger btn-xs" onclick="return iv_remove_field('+i+');">Delete</button>');		
			i=i+1;		
	}
	function iv_remove_field(div_id){		
		jQuery("#field_"+div_id).remove();
	}	
	// Doctor**********
	function update_doctor_review(){
		
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var search_params = {
			"action": 		"iv_doctor_update_review_fields",
			"form_data":	jQuery("#doctor_fields").serialize(), 	
		};
		jQuery.ajax({
			url: ajaxurl,
			dataType: "json",
			type: "post",
			data: search_params,
			success: function(response) {              		
				//jQuery("#success_message").html('<h4><span style="color: #04B404;"> ' + response.code + '</span></h4>');
				jQuery('#success_message_doctor').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.code +'.</div>');
			}
		});
	}
	function iv_add_field_doctor(){	
	
		jQuery('#custom_field_div_doctor').append('<div class="row form-group " id="field_'+i+'"><div class=" col-sm-5"> <input type="text" class="form-control" name="meta_name[]" id="meta_name[]" value="" placeholder="Enter Post Meta Name "> </div>	<div  class=" col-sm-5"><input type="text" class="form-control" name="meta_label[]" id="meta_label[]" value="" placeholder="Enter Post Meta Label"></div><div  class=" col-sm-2"><button class="btn btn-danger btn-xs" onclick="return iv_remove_field_doctor('+i+');">Delete</button>');		
			i=i+1;		
	}
	function iv_remove_field_doctor(div_id){		
		jQuery("#field_"+div_id).remove();
	}	
	
	
	
		
		
</script>				
			
