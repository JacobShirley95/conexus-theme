<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>
<div class="row">
	<div class="two wide column side-panel">
		<?php get_sidebar(); ?>
	</div>
	<div class="twelve wide column content-column responsive-column">
		<?php while (have_posts()) : the_post(); ?>
		<div class="post-header">
			<h1 class="ui center aligned header"><?php the_title();?></h1>
			<div class="ui left floated sub header blue"><?php the_author(); ?></div>
			<a href="<?php echo get_day_link('', '', ''); ?>"><div class="ui right floated sub header blue"><?php the_time('F jS, Y'); ?></div></a>
		</div>
		<div class="entry-content">
			<p><?php the_content(); ?></p>
		</div>
		<?php endwhile;?>
	</div>
	<div class="two wide column side-panel">
		<?php comments_template();?>
	</div>
</div>
<?php
// Start the loop.
while ( have_posts() ) : the_post();

	/*
	 * Include the post format-specific template for the content. If you want to
	 * use this in a child theme, then include a file called called content-___.php
	 * (where ___ is the post format) and that will be used instead.
	 */
	/*get_template_part( 'content', get_post_format() );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

	// Previous/next post navigation.
	the_post_navigation( array(
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
			'<span class="post-title">%title</span>',
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
			'<span class="post-title">%title</span>',
	) );*/

// End the loop.
endwhile;
?>

<?php get_footer(); ?>
