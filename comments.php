<?php
/**
 * Comments and the response form.
 *
 * @package Broadside
 */

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments__title">
			<?php
			printf(
				/* translators: %s: number of comments. */
				esc_html( _n( '%s response', '%s responses', get_comments_number(), 'broadside' ) ),
				esc_html( number_format_i18n( get_comments_number() ) )
			);
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 48,
				)
			);
			?>
		</ol>

		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="comments__closed"><?php esc_html_e( 'Responses are closed for this entry.', 'broadside' ); ?></p>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'title_reply'          => __( 'Leave a response', 'broadside' ),
			'title_reply_before'   => '<h2 id="reply-title" class="comments__title comments__title--form">',
			'title_reply_after'    => '</h2>',
			'label_submit'         => __( 'Post response', 'broadside' ),
			'class_submit'         => 'submit',
			'comment_notes_before' => '<p class="comment-form__notes">' . esc_html__( 'Your email address is not published.', 'broadside' ) . '</p>',
		)
	);
	?>
</section>
