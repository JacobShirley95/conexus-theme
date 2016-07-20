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
		<div class="ui sticky">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<div class="twelve wide column content-column responsive-column">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>
		<?php endwhile; ?>
	</div>
	
	<div class="two wide column side-panel secondary-area">
		<div class="ui sticky">
			<?php // If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
