<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 */

get_header(); ?>

<div class="row">
	<div class="<?php left_sidebar_classes(); ?>">
		<div class="ui sticky">
			<!--<div class="ui header"><?php bloginfo('name'); ?></div>
			<p><?php bloginfo('description'); ?></p>
			<img class="ui circular image" src="<?php site_icon_url(); ?>"></img>
			<div class="ui divider"></div>-->
			<?php get_sidebar(); ?>
		</div>
	</div>
	<div class="<?php content_classes(true); ?>">
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header>
		<br />
		<?php if ( have_posts() ) : ?>
			<!-- .page-header -->

		<div class="ui items">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				// End the loop.
				endwhile;
			?>
		</div>
		<?php


			//the_posts_pagination(["before_page_number" => "hello"]);
			// If no content, include the "No posts found" template.*/
			/*the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
					'next_text'          => __( 'Next page', 'twentyfifteen' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
				) );*/
			else :
				get_template_part( 'content', 'none' );

			endif;
		?>
	</div>
	<div class="<?php right_sidebar_classes(); ?>">
		<div class="ui sticky">
			<?php get_sidebar("right"); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
