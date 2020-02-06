<?php 


/**
 * Text widget class
 *
 * @since 2.8.0
 */
class medicaldirectory_Contact_Info extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'medicaldirectory_widget_contact_info', 'description' => esc_html__('sb Contact Info widgets','medical-directory'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('medicaldirectory_contact_info', esc_html__('medicaldirectory Contact Info','medical-directory'), $widget_ops, $control_ops);
	}



	public function widget( $args, $instance ) {

		$medicaldirectory_option_data =get_option('medicaldirectory_option_data'); 

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$bg_image = apply_filters( 'widget_title', empty( $instance['bg_image'] ) ? '' : $instance['bg_image'], $instance, $this->id_base );

		$address = apply_filters( 'medicaldirectory_mobile_no', empty( $instance['address'] ) ? '' : $instance['address'], $instance, $this->id_base );


		$phone_no = apply_filters( 'medicaldirectory_phone_no', empty( $instance['phone_no'] ) ? '' : $instance['phone_no'], $instance, $this->id_base );

		$email = apply_filters( 'medicaldirectory_email', empty( $instance['email'] ) ? '' : $instance['email'], $instance, $this->id_base );
		
		echo apply_filters( 'about_before',  $args['before_widget'] );

		if(isset($medicaldirectory_option_data['medicaldirectory-footer-icon']) && !empty($medicaldirectory_option_data['medicaldirectory-footer-icon'])){
			$logo = $medicaldirectory_option_data['medicaldirectory-footer-icon']['url'];	
		}

		?>

		<!-- <div class="col-md-3 col-sm-6"> -->

		<?php if ( ! empty( $title ) ) { ?>

			<a href="#" class="logo"><?php echo esc_attr($title); ?></a>

		<?php } ?>

		<?php if ( ! empty( $logo ) ) { ?>

			<a href="#" class="logo"><img src="<?php echo esc_url($logo); ?>" alt="<?php esc_html_e( 'image', 'medical-directory' ); ?>"></a>

		<?php } ?>

			

			<?php 

			

			if ( ! empty( $bg_image ) ) {

				echo '<ul class="contact-info has-bg-image contain" data-bg-image="'.medicaldirectory_IMAGE.''.$bg_image.'">'; 

			}

			else{

				echo '<ul class="contact-info">'; 

			}



			if ( ! empty( $address ) ) {

				echo '<li><i class="fa fa-map-marker"></i><address>'.$address.'</address></li>';

			} 



			if ( ! empty( $phone_no ) ) {

				echo '<li><i class="fa fa-phone"></i><a href="tel:#">'.$phone_no.'</a></li>';

			} 



			if ( ! empty( $email ) ) {

				echo '<li><i class="fa fa-envelope"></i><a href="mailto:">'.$email.'</a></li>';

			} 


			?>

		</ul>
	<!-- </div> -->



		
		<?php

		echo apply_filters( 'about_after',  $args['after_widget'] );

				

	}




	public function form( $instance ) {


		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'bg_image' => '','address' => '', 'phone_no' => '', 'email' => '') );
		$title = strip_tags($instance['title']);
		$bg_image = strip_tags($instance['bg_image']);
		$address = strip_tags($instance['address']);
		$phone_no = strip_tags($instance['phone_no']);
		$email = strip_tags($instance['email']);
?>
		<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','medical-directory'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo esc_attr($this->get_field_id('bg_image')); ?>"><?php esc_html_e('Background Image:','medical-directory'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('bg_image')); ?>" name="<?php echo esc_attr($this->get_field_name('bg_image')); ?>" type="text" value="<?php echo esc_attr($bg_image); ?>" /></p>

		<p><label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:','medical-directory'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($address); ?>" /></p>		

		<p><label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone No:','medical-directory'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" /></p>

		<p><label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email :','medical-directory'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" /></p>

		<p><input id="<?php echo esc_attr($this->get_field_id('filter')); ?>" name="<?php echo esc_attr($this->get_field_name('filter')); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo esc_attr($this->get_field_id('filter')); ?>"><?php esc_html_e('Automatically add paragraphs','medical-directory'); ?></label></p>
<?php

	}



	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['bg_image'] = strip_tags($new_instance['bg_image']);
		$instance['address'] = strip_tags($new_instance['address']);
		$instance['phone_no'] = strip_tags($new_instance['phone_no']);
		$instance['email'] = strip_tags($new_instance['email']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;

	}




}



add_action('widgets_init', 'medicaldirectory_contact_info');

function medicaldirectory_contact_info(){

    register_widget('medicaldirectory_Contact_Info');

}
