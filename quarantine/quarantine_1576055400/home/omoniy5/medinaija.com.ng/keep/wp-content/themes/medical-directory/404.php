<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage medicaldirectory
 * @since medicaldirectory
 */

get_header(); ?>

  <div class="blog-content pt60">
    <div class="container">
      <div class="row">
        <div class="col-md-9">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'medical-directory' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'medical-directory' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

			</div>
		</div>
	</div>
</div><!-- .content-area -->

<?php get_footer(); ?>
