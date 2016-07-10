<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive/search.
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(["item"]); ?>>
	<div class="content">
		<a class="header" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		<a class="ui sub header" href="<?php echo get_day_link('', '', ''); ?>"><?php the_time('F jS, Y'); ?></a>
		<div class="description">
			<?php the_excerpt(__("Read more"));?>
		</div>
		<div class="extras">
			<h6 class="ui header blue"><?php the_tags('', " ", "");?></h6>
		</div>
	</div>
</div>

<p>
	<?php
		/* translators: %s: Name of current post */

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
	?>
</p><!-- .entry-content -->

<?php
	/*// Author bio.
	if ( is_single() && get_the_author_meta( 'description' ) ) :
		get_template_part( 'author-bio' );
	endif;*/
?>

<footer class="entry-footer">
	<?php //twentyfifteen_entry_meta(); ?>
	<?php //edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
</footer><!-- .entry-footer -->
