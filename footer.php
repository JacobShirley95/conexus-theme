<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 */
?>

	<div class="row footer">
		<div class="two wide column side-panel secondary-area">
			<a class="ui sub header" href="<?php echo esc_url(__('https://wordpress.org/')); ?>"><?php printf(__( 'Powered by %s'), 'WordPress' ); ?></a>
		</div>
		<div class="twelve wide column responsive-column secondary-area">
			<?php 
			$links = conexus_theme_paginate_links(array(
					'prev_text'          => __( 'Prev'),
					'next_text'          => __( 'Next' )
				) ); 
			if ($links) : ?>

			<div class="ui secondary menu">
				<?php echo $links; ?>

			</div>
			
			<?php endif; ?>

			<div class="responsive-toggle">
				<?php
					if (is_single()) {
						echo "<div class='ui dividing header'>Comments</div>";
						comments_template();
						echo "<div class='ui dividing header'>Related posts</div>";
					} else {
						if ($links)
							echo "<div class='ui divider'></div>";
					}
					get_template_part('sidebar');
				?>
			</div>
			
		</div>
		<div class="two wide column side-panel secondary-area">
			<?php
				$args = array("theme_location" => "social");
				wp_nav_menu($args);
			?>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
