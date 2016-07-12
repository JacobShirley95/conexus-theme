<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

?>

<div class="ui comments">
	<?php wp_list_comments('callback=mytheme_comment');?>
</div>

<?php if (get_comments_number() > 0) echo "<div class='ui divider'></div>"; ?>

<?php
	$fields =  array(
	  'author' =>
	    '<div class="field"><label for="author">' . __( 'Name', 'domainreference' ) . ( $req ? '<span class="required"> *</span>' : '' ).'</label> ' .
	    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	    '" size="30"' . $aria_req . ' /></div>',

	  'email' =>
	    '<div class="field"><label for="email">' . __( 'Email', 'domainreference' )  .
	    ( $req ? '<span class="required"> *</span>' : '' ) . '</label> '.
	    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	    '" size="30"' . $aria_req . ' /></div>',

	  'url' =>
	    ''
	);

	$args = ['fields' => apply_filters( 'comment_form_default_fields', $fields ), 'class_submit' => "ui primary button", 'class_form' => "ui form",
			 'comment_field' =>  '<div class="field"><label>' . _x( 'Comment', 'noun' ) .
    							 '</label><textarea name="comment" rows="3"></textarea></div>','title_reply' => __( 'Share your thoughts!' ),];

	comment_form($args);
?>

<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfifteen' ); ?></p>
<?php endif; ?>
