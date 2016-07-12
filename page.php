<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 */

get_header(); ?>

<div class="row">
	<div class="two wide column side-panel secondary-area">
	</div>
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="twelve wide column content-column responsive-column">
		<?php get_template_part( 'content', 'page' ); ?>
	</div>
	<div class="two wide column side-panel secondary-area">
		<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
	</div>
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>
