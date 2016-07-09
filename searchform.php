<?php
/**
 * default search form
 */
?>
<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="ui mini input focus fluid">
		<input id="search-input" name="s" type="search" placeholder="<?php _e( 'Search...', 'presentation' ); ?>">
	</div>
</form>