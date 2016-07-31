<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>

<div class="row">
	<div class="<?php left_sidebar_classes(); ?>">
		<div class="ui sticky">
		<?php get_sidebar(); ?>
		</div>
	</div>
	<div class="twelve wide column content-column responsive-column">
		<?php while (have_posts()) : the_post(); ?>
		<div class="post-header">
			<h1 class="ui header"><?php the_title();?></h1>

			<div class="ui left floated sub header blue"><?php the_author(); ?></div>
			<a href="<?php echo get_day_link('', '', ''); ?>"><div class="ui right floated sub header blue"><?php the_time('F jS, Y'); ?></div></a>
		</div>
		<div class="entry-content">
			<p><?php the_content(); ?></p>
		</div>
		<?php endwhile;?>
	</div>
	<div class="two wide column side-panel secondary-area">
		<div class="ui sticky">
			<?php comments_template();?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
