<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	<div class="row">
		<div class="two wide column side-panel">
			<a class="ui sub header" href="<?php echo esc_url(__('https://wordpress.org/')); ?>"><?php printf(__( 'Powered by %s'), 'WordPress' ); ?></a>
		</div>
		<div class="twelve wide column responsive-column">
			<?php 
			$links = custom_theme_paginate_links(array(
					'prev_text'          => __( 'Prev'),
					'next_text'          => __( 'Next' )
				) ); 
			if ($links) : ?>
			<div class="ui secondary menu">
				<?php echo $links?>
			</div>
			<?php endif; ?>
		</div>
		<div class="two wide column side-panel">
			<a class="affil-link" href="https://github.com/JacobShirley95"><img width="32px" height="32px" src="http://cdn.airve.com/icon/github/GitHub-Mark-32px.png"></img></a>
			<a class="affil-link" href="https://jsfiddle.net/user/Auferious/fiddles/"><img width="32px" height="32px" src="http://doc.jsfiddle.net/_downloads/jsfiddle-logo.png"></img></a>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
