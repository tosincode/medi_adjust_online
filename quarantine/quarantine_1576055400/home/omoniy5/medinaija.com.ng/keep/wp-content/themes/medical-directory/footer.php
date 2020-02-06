</div>
<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage simple builder
 * @since 1.0
 */
?>
<?php

$medicaldirectory_option_data =get_option('medicaldirectory_option_data');

$medicaldirectory_option_data['medicaldirectory-multi-footer-image']=1;
$medicaldirectory_option_data['medicaldirectory-multi-bottom-image']=1;
?>
<!-- Start Footer Switch -->

<?php if($medicaldirectory_option_data['medicaldirectory-footer-switch']){?>

<!-- Start medicaldirectory Multifooter -->

<!-- Start Footer 7 -->
<?php if(isset($medicaldirectory_option_data['medicaldirectory-multi-footer-image'])&&($medicaldirectory_option_data['medicaldirectory-multi-footer-image']==1)){?>
  <!-- uou block 4e -->
  <div class="uou-block-4e">
    <div class="container">
      <div class="row">
		  <!-- Contact us section -->
		  <div class="col-md-3 col-sm-6">
			  <?php
							  /** This filter is documented in wp-includes/default-widgets.php */


						$bg_image_default = medicaldirectory_IMAGE.'footer-map-bg.png';
						$title = 	(isset($medicaldirectory_option_data['medicaldirectory-title-contact']) ? $medicaldirectory_option_data['medicaldirectory-title-contact'] :'');
						$logo = 	(isset($medicaldirectory_option_data['medicaldirectory-footer-icon']) ? $medicaldirectory_option_data['medicaldirectory-footer-icon']['url'] : '' );
						$address = (isset($medicaldirectory_option_data['medicaldirectory-address-contact']) ? $medicaldirectory_option_data['medicaldirectory-address-contact'] :'');
						$phone_no = (isset($medicaldirectory_option_data['medicaldirectory-phone-contact']) ? $medicaldirectory_option_data['medicaldirectory-phone-contact'] :'' );
						$email = 	(isset($medicaldirectory_option_data['medicaldirectory-email-contact']) ? $medicaldirectory_option_data['medicaldirectory-email-contact']:'' );
						$bg_image = (isset($medicaldirectory_option_data['medicaldirectory-contact-bg-image']['url']) ? $medicaldirectory_option_data['medicaldirectory-contact-bg-image']['url']: $bg_image_default);
						if($bg_image==''){$bg_image=$bg_image_default;}

						?>

						<!-- <div class="col-md-3 col-sm-6"> -->



						<?php if ( ! empty( $logo ) ) { ?>

							<a href="#" class="logo"><img src="<?php echo esc_url($logo); ?>" alt="<?php esc_html_e( 'image', 'medical-directory' ); ?>"></a>

						<?php } ?>



							<?php



							if ( ! empty( $bg_image ) ) {

								echo '<ul class="contact-info has-bg-image contain" data-bg-image="'.$bg_image.'">';

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
		  </div>

         <!-- Start left footer sidebar -->

    <?php   if(isset($medicaldirectory_option_data['medicaldirectory-left-footer-switch'])){ ?>

            <?php

            if(is_active_sidebar('medicaldirectory_footer_left_sidebar')):

				dynamic_sidebar('medicaldirectory_footer_left_sidebar');

            endif;

            ?>

    <?php } ?>

      </div>
    </div>
  </div> <!-- end .uou-block-4e -->
  <?php } ?>


<?php } ?>

<!-- Start Bottom 7 -->
<?php if(isset($medicaldirectory_option_data['medicaldirectory-multi-bottom-image'])&&($medicaldirectory_option_data['medicaldirectory-multi-bottom-image']==1)){?>
  <!-- uou block 4b -->
  <div class="uou-block-4a secondary">
    <div class="container">

      <?php if(isset($medicaldirectory_option_data['medicaldirectory-show-footer-copyrights'])){?>
      <p>
        <?php if(isset($medicaldirectory_option_data['medicaldirectory-copyright-text'])&&!empty($medicaldirectory_option_data['medicaldirectory-copyright-text'])) {?>
        <?php
				if(isset($medicaldirectory_option_data['medicaldirectory-copyright-link']) && $medicaldirectory_option_data['medicaldirectory-copyright-link']!='' ){?>

					<a  href="http://<?php echo esc_html($medicaldirectory_option_data['medicaldirectory-copyright-link']);?> "><?php echo esc_html($medicaldirectory_option_data['medicaldirectory-copyright-text']);?></i></a>
					<?php
				}else{
					echo esc_html($medicaldirectory_option_data['medicaldirectory-copyright-text']);
				}



				?>
        <?php } ?>
        <?php bloginfo('name'); ?>.
        <?php if(isset($medicaldirectory_option_data['medicaldirectory-after-copyright-text'])&&!empty($medicaldirectory_option_data['medicaldirectory-after-copyright-text'])) {?>
        <?php echo esc_html($medicaldirectory_option_data['medicaldirectory-after-copyright-text']); ?>
        <?php } ?>
        <?php if(isset($medicaldirectory_option_data['medicaldirectory-show-footer-credits']) && $medicaldirectory_option_data['medicaldirectory-show-footer-credits']==1) {				
			?>
        <?php echo '<a href="http://noiztech.com.ng">noiZTech</a>'; ?>
        <?php } ?>

      </p>
      <?php } ?>


    <!-- Start sccial Profile -->

    <?php if(isset($medicaldirectory_option_data['medicaldirectory-social-profile'])){?>

      <ul class="social-icons">

        <?php if(isset($medicaldirectory_option_data['medicaldirectory-facebook-profile']) && !empty($medicaldirectory_option_data['medicaldirectory-facebook-profile'])) : ?>
        <li><a  href="http://<?php echo esc_url($medicaldirectory_option_data['medicaldirectory-facebook-profile']);?> "><i class="fa fa-facebook"></i></a></li>
        <?php endif; ?>

        <?php if(isset($medicaldirectory_option_data['medicaldirectory-twitter-profile']) && !empty($medicaldirectory_option_data['medicaldirectory-twitter-profile'])) : ?>
        <li><a  href="http://<?php echo esc_url($medicaldirectory_option_data['medicaldirectory-twitter-profile']);?> "><i class="fa fa-twitter"></i></a></li>
        <?php endif; ?>

        <?php if(isset($medicaldirectory_option_data['medicaldirectory-google-profile']) && !empty($medicaldirectory_option_data['medicaldirectory-google-profile'])) : ?>
        <li><a  href="http://<?php echo esc_url($medicaldirectory_option_data['medicaldirectory-google-profile']);?> "><i class="fa fa-google"></i></a></li>
        <?php endif; ?>

        <?php if(isset($medicaldirectory_option_data['medicaldirectory-linkedin-profile']) && !empty($medicaldirectory_option_data['medicaldirectory-linkedin-profile'])) : ?>
        <li><a  href="http://<?php echo esc_url($medicaldirectory_option_data['medicaldirectory-linkedin-profile']);?> "><i class="fa fa-linkedin"></i></a></li>
        <?php endif; ?>

        <?php if(isset($medicaldirectory_option_data['medicaldirectory-pinterest-profile']) && !empty($medicaldirectory_option_data['medicaldirectory-pinterest-profile'])) : ?>
        <li><a  href="http://<?php echo esc_url($medicaldirectory_option_data['medicaldirectory-pinterest-profile']);?> "><i class="fa fa-pinterest"></i></a></li>
        <?php endif; ?>

      </ul>

    <?php }?>
    <!-- end of social profile -->

    </div>
  </div>
  <!-- end .uou-block-4a -->
    <?php } ?>



<?php wp_footer(); ?>

</body>
</html>
