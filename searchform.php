<?php
/**
 * Search form. Each instance gets its own field id so two forms can share a page.
 *
 * @package Broadside
 */

$broadside_search_id = wp_unique_id( 'search-field-' );
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="search-form__label" for="<?php echo esc_attr( $broadside_search_id ); ?>"><?php esc_html_e( 'Search the archive', 'broadside' ); ?></label>
	<div class="search-form__row">
		<input
			type="search"
			id="<?php echo esc_attr( $broadside_search_id ); ?>"
			class="search-form__field"
			name="s"
			value="<?php echo esc_attr( get_search_query() ); ?>"
			placeholder="<?php esc_attr_e( 'Topic or keyword', 'broadside' ); ?>"
		>
		<button type="submit" class="search-form__submit"><?php esc_html_e( 'Search', 'broadside' ); ?></button>
	</div>
</form>
