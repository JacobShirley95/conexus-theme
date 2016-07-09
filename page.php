<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="row">
	<div class="two wide column side-panel">
	</div>
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="twelve wide column content-column">
		<div class="ui container">
		<?php get_template_part( 'content', 'page' ); ?>
		</div>
	</div>
	<div class="two wide column side-panel">
		<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
	</div>
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>
