<?php

/**
 * Template Name: medicaldirectory Blog with sidebar
 *
 * @package WordPress
 * @subpackage medicaldirectory
 * @since 1.0
 */

get_header(); ?>
                
  <div class="blog-content pt60">
    <div class="container">
      <div class="row">
        <div class="col-md-9">



            <?php
              // Start the loop.
              while ( have_posts() ) : the_post();

                // Include the page content template.
                  get_template_part('templates/page/content', 'page');
              // End the loop.
              endwhile;
              ?>


              <div class="uou-post-comment">
               <aside class="uou-block-14a">
                  <h5>
                    <?php 
                            if(comments_open() && !post_password_required()){
							  esc_html_e("Comments","medical-directory"); 
								
                              comments_popup_link( '(0)', '(1)', '(%)', 'article-post-meta' ); ?>
                              <div class = "conversation"><?php comments_template('', true); ?></div>

                              
                          <?php    
                            }

                            
                    ?> 
                       
                  </h5>          
                   <?php //comments_template('', true); ?>
                </aside>
              </div> <!-- end of comment -->


            </div><!-- /.blog-main -->

<!-- ************************** Start Sidebar **************************** -->



            <div class="col-md-3">
              <div class="uou-sidebar pt40">

            <?php if ( is_active_sidebar( 'mainsidebar' ) ) : ?>
                  
              <?php dynamic_sidebar( 'mainsidebar' ); ?>
                  
            <?php else : ?>
              <div class="alert alert-message">
              
                <p><?php esc_html_e("Please activate some Widgets","medical-directory"); ?></p>
              
                </div>

            <?php endif; ?>

             </div>
            </div>
            

<!-- ************************** End Sidebar **************************** -->

        </div><!-- /.row -->
    </div> <!-- /.container -->
  </div>




<?php get_footer(); ?>
