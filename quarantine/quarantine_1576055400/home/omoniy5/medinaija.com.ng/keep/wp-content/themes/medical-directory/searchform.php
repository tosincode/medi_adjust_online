<form class="search-form"  method="get"   action="<?php echo esc_url( home_url( '/','medical-directory' ) ); ?>">
	<input type="text" class="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="s" placeholder="<?php esc_html_e( 'Search', 'medical-directory' ); ?>"/>
	<input type="submit" class="btn btn-default searchsubmit"  />
</form>

