<?php
/**
 * Left rail.
 *
 * Registered widgets take over when present. Without them the rail shows real
 * sections, recent entries and feeds instead of an empty column.
 *
 * @package Broadside
 */

?>
<aside class="rail" id="secondary" aria-label="<?php esc_attr_e( 'Sidebar', 'broadside' ); ?>">
	<div class="rail__inner">
		<?php
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			dynamic_sidebar( 'sidebar-1' );
		} else {
			broadside_rail_fallback();
		}
		?>
	</div>
</aside>
