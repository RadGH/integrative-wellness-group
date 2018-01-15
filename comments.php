<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

	<?php
    comment_form(
        array(
            'comment_notes_before' => '',
            'title_reply' => '',
            'fields' => array(
                'author' => '<p class="comment-form-author">'.
                '<input placeholder="Name" id="author" name="author" type="text" value="'.esc_attr($commenter['comment_author']).
                '" size="30"'.$aria_req.' /></p>',
                'email' => '<p class="comment-form-email">'.
                '<input placeholder="Email" id="email" name="email" type="text" value="'.esc_attr($commenter['comment_author_email']).
                '" size="30"'.$aria_req.' /></p>',
            ),
			'comment_field' => '<p class="comment-form-comment"><textarea placeholder="Post A Reply" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
			'label_submit' => 'Submit',
        )
    );

    if (have_comments()) : ?>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e('Comment navigation'); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments')); ?></div>
				<div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments')); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ul class="comment-list">
			<?php
                wp_list_comments(array(
                    'avatar_size' => 0,
                    'short_ping' => true,
                    'callback' => aa_custom_comments,
                ));
            ?>
		</ul><!-- .comment-list -->

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e('Comment navigation'); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments')); ?></div>
				<div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments')); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
        endif; // Check for comment navigation.

    endif; // Check for have_comments().

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
		<p class="no-comments"><?php esc_html_e('Comments are closed.'); ?></p>
	<?php endif; ?>

</div><!-- #comments -->
