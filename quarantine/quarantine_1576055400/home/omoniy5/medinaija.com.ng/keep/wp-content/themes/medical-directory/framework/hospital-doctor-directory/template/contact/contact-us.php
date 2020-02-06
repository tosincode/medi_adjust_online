<form  name="contactus" id="contactus"  class="form-horizontal"  role="form">
							<div class="form-group row"  >
								<!-- <label for="text" class="col-md-12 control-label"><?php  _e('Name:','medical-directory');?><span class="chili"></span></label> -->
								<div class="col-md-7">
									<input type="text"  name="contact_name" id="contact_name"   data-validation="required" data-validation-error-msg="<?php  esc_html_e('Your Name','medical-directory');?>" class="form-control ctrl-textbox" placeholder="<?php esc_html_e( 'Enter your name', 'medical-directory' ); ?>"  >

								</div>
							</div>

						<div class="form-group row">
							<!-- <label for="email" class="col-md-12 control-label" ><?php  esc_html_e('Email:','medical-directory');?><span class="chili"></span></label> -->
							<div class="col-md-7">
								<input type="email" name="contact_email" id="contact_email" data-validation="email"  class="form-control ctrl-textbox" placeholder="<?php esc_html_e( 'Your email', 'medical-directory' ); ?>" data-validation-error-msg="<?php  esc_html_e('Please enter a valid email address','medical-directory');?> " >
							</div>
						</div>
						<div class="form-group row"  >
								<!-- <label for="text" class="col-md-12 control-label"><?php  esc_html_e('Subject:','medical-directory');?><span class="chili"></span></label> -->
								<div class="col-md-7">
									<input type="text"  name="contact_subject"  class="form-control ctrl-textbox" placeholder="<?php esc_html_e( 'Subject', 'medical-directory' ); ?>" >

								</div>
						</div>
						<div class="form-group row"  >
								<!-- <label for="text" class="col-md-12 control-label"><?php  _e('Message:','medical-directory');?><span class="chili"></span></label> -->
								<div class="col-md-12">
									<textarea id="contact_content" name="contact_content" class="form-control" placeholder="<?php esc_html_e( 'Message', 'medical-directory' ); ?>" data-validation="required"></textarea>

								</div>
						</div>



						<div class="row">

								<div class="col-md-12 text-left">
									<button type="submit" class="btn-new btn-custom full-width" > <?php esc_html_e( 'Send Message', 'medical-directory' ); ?></button>
									 <div id="update_message">	</div>

								</div>
						</div>
</form>
<?php
wp_enqueue_script('iv_directories-script-contact', wp_iv_directories_URLPATH . 'admin/files/js/jquery.form-validator.js');
wp_enqueue_script( 'contact-us-js', medicaldirectory_JS.'contact-us.js', array('jquery'), $ver = true, true );
wp_localize_script( 'contact-us-js', 'medicaldirectory_data', array( 	'ajaxurl' 			=> admin_url( 'admin-ajax.php' ),
															'loading_image'		=> wp_iv_directories_URLPATH.'admin/files/images/loader.gif',) );

