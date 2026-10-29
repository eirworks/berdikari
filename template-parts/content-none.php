<?php
/**
 * What the reader sees when a query returns nothing.
 *
 * @package Broadside
 */

?>
<section class="notice">
	<h2 class="notice__title">
		<?php
		if ( is_search() ) {
			esc_html_e( 'No entries matched that search', 'broadside' );
		} else {
			esc_html_e( 'Nothing has been filed here yet', 'broadside' );
		}
		?>
	</h2>

	<p class="notice__text">
		<?php
		if ( is_search() ) {
			esc_html_e( 'Try a shorter word, or a topic the site covers. The search below looks through every entry.', 'broadside' );
		} else {
			esc_html_e( 'This page has no entries under it. Search the archive, or start from the front page.', 'broadside' );
		}
		?>
	</p>

	<?php get_search_form(); ?>

	<?php if ( ! is_search() ) : ?>
		<p class="notice__link">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go to the front page', 'broadside' ); ?></a>
		</p>
	<?php endif; ?>
</section>
