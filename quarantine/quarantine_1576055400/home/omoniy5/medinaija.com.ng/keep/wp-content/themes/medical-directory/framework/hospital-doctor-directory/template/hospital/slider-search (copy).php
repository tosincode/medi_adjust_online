<?php

$medicaldirectory_option_data =get_option('medicaldirectory_option_data');
$radius=get_option('_iv_radius');
$keyword_post='';
$back_ground_color='0099fe';
if(isset($atts['bgcolor']) and $atts['bgcolor']!="" ){
	$back_ground_color=$atts['bgcolor'];
}
$directory_url_1=get_option('_iv_directory_url_1');					
if($directory_url_1==""){$directory_url_1='hospital';}	

$directory_url_2=get_option('_iv_directory_url_2');					
if($directory_url_2==""){$directory_url_2='doctor';}	

$directory_url_1_string=str_replace("-"," ",$directory_url_1); 
$directory_url_1_string =  esc_attr (ucwords($directory_url_1_string)); 						
 						 
$directory_url_1_string = (isset($medicaldirectory_option_data['medicaldirectory-home-hearder-block1'])? $medicaldirectory_option_data['medicaldirectory-home-hearder-block1']: $directory_url_1_string);

$directory_url_2_string=str_replace("-"," ",$directory_url_2); 
$directory_url_2_string= (isset($medicaldirectory_option_data['medicaldirectory-home-hearder-block2'])?$medicaldirectory_option_data['medicaldirectory-home-hearder-block2']:$directory_url_2_string);						
 						
?>

<form  action="<?php echo get_post_type_archive_link( $directory_url_1) ; ?>" method="POST"  class="form-inline advanced-serach" id="searchformhd" onkeypress="return event.keyCode != 13;">
	<div class="container">
	 <div class="input-field">

			 <div class="" >
          <div class="form-group" >
					   <input type="text" class="cbp-search-input" id="keyword" name="keyword"  placeholder="<?php esc_html_e( 'Filter By Keyword', 'medical-directory' ); ?>" value="<?php echo $keyword_post; ?>">
			     </div>
        </div>


				<div class="" >
					<div class="form-group" >
						<input type="text" class="cbp-search-input location-input" id="address" name="address"  placeholder="<?php esc_html_e( 'Location', 'medical-directory' ); ?>"
						value="">
						<i class="fa fa-map-marker marker"></i>
						<input type="hidden" id="latitude" name="latitude"  value="" >
						<input type="hidden" id="longitude" name="longitude"  value="">
					</div>
			  </div>
			  
			 <div class="" >
				  <div class="form-group" >
					  <i class="fa fa-chevron-down arrow"></i>
									<?php
								echo '<select name="'.$directory_url_1.'-category" class="form-control">';
								echo'	<option selected="'.$selected.'" value="">'.esc_html__('Any City','medical-directory').'</option>';


										if( isset($_POST['submit'])){
											$selected = $_POST[$directory_url_1.'-category'];
										}
											//directories
											$taxonomy = $directory_url_1.'-category';
											$args = array(
												'orderby'           => 'name',
												'order'             => 'ASC',
												'hide_empty'        => true,
												'exclude'           => array(),
												'exclude_tree'      => array(),
												'include'           => array(),
												'number'            => '',
												'fields'            => 'all',
												'slug'              => '',
												'parent'            => '0',
												'hierarchical'      => true,
												'child_of'          => 0,
												'childless'         => false,
												'get'               => '',

											);
								$terms = get_terms($taxonomy,$args); // Get all terms of a taxonomy
								if ( $terms && !is_wp_error( $terms ) ) :
									$i=0;
									foreach ( $terms as $term_parent ) {  ?>


											<?php

											echo '<option  value="'.$term_parent->slug.'" '.($selected==$term_parent->slug?'selected':'' ).'><strong>'.$term_parent->name.'</strong></option>';
											?>
												<?php

												$args2 = array(
													'type'                     => $directory_url_1,
													'parent'                   => $term_parent->term_id,
													'orderby'                  => 'name',
													'order'                    => 'ASC',
													'hide_empty'               => 1,
													'hierarchical'             => 1,
													'exclude'                  => '',
													'include'                  => '',
													'number'                   => '',
													'taxonomy'                 => $directory_url_1.'-category',
													'pad_counts'               => false

												);
												$categories = get_categories( $args2 );
												if ( $categories && !is_wp_error( $categories ) ) :


													foreach ( $categories as $term ) {
														echo '<option  value="'.$term->slug.'" '.($selected==$term->slug?'selected':'' ).'>-'.$term->name.'</option>';
													}

												endif;
												?>


									<?php
										$i++;
									}
								endif;
									echo '</select>';
								?>
						</div>
					
					
			  
			  </div>

			  <div class="" >
				  <div class="form-group" >
						<i class="fa fa-chevron-down arrow"></i>
						<select name="dir_type"  id="dir_type" class="cbp-search-select">
						<option  class="cbp-search-select" value="rurl_1"><?php echo ucfirst($directory_url_1_string); ?></option>
						<option class="cbp-search-select"  value="rurl_2"><?php echo ucfirst($directory_url_2_string); ?></option>
						</select>
				  </div>
			  </div>

				<div class="" >
          <div class="form-group search" >
					     <button type="button" id="search_submit_m" name="search_submit_m"  onClick='submitSearchForm()' class="btn-new btn-custom-search "> <i class="fa fa-search"></i> <span><?php esc_html_e( 'Search', 'medical-directory' ); ?></span></button>
				  </div>
        </div>
		 </div>
  </div>
</form>

<?php 
 wp_enqueue_script( 'search-form-js', medicaldirectory_JS.'search-form.js', array('jquery'), $ver = true, true );
 wp_localize_script( 'search-form-js', 'jsdata', array( 'hospital_url' => get_post_type_archive_link( $directory_url_1),'doctor_url'=> get_post_type_archive_link( $directory_url_2 )) );
 
?>   
 

