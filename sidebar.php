<?php
/**
 * The sidebar containing the main widget area
 */
get_search_form();

if (is_single()) :
?>
<div class="ui items">
	<?php 
	//'post__not_in' => array($post->ID)
	$cats = [];
	foreach (get_the_category() as $cat)
		$cats[] = $cat->cat_ID;

	$my_query = new WP_Query(array(
		'showposts' => 3,
		'orderby' => 'rand',
		'cat' => $cats,
		'post__not_in' => array($post->ID)
	)); 
	while ($my_query->have_posts()) : $my_query->the_post();?>

	<div class="item">
		<div class="content">
			<a class="header" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			<a class="ui sub header" href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time('F jS, Y'); ?></a>
			<div class="description">
				<p><?php echo excerpt(20); ?></p>
			</div>
			<div class="extras">
				<h6 class="ui header blue"><?php the_tags('', " ", "");?></h6>
			</div>
		</div>
	</div>

	<?php endwhile;?>
</div>

<?php else : ?>
<div class="ui basic segment">
	<?php wp_tag_cloud(); ?>
</div>
<?php endif; ?>

