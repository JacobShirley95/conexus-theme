<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<div class="row">
	<div class="two wide column side-panel">
		<?php get_sidebar(); ?>
	</div>
	<div class="twelve wide column content-column responsive-column">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentyfifteen' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfifteen' ); ?></p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
	</div>
	<div class="two wide column side-panel"></div>
</div>

<?php get_footer(); ?>
