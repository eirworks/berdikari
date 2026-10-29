<?php
/**
 * Colophon footer.
 *
 * @package Broadside
 */

?>
	<footer class="colophon">
		<div class="colophon__inner">
			<div class="colophon__meta">
				<p class="colophon__brand">
					<?php
					printf(
						/* translators: %s: site name. */
						esc_html__( '© %1$s %2$s', 'broadside' ),
						esc_html( gmdate( 'Y' ) ),
						esc_html( get_bloginfo( 'name' ) )
					);
					?>
				</p>

				<p class="colophon__credit">
					<?php
					printf(
						/* translators: %s: developer name, wrapped in a link. */
						esc_html__( 'Developed by %s', 'broadside' ),
						'<a href="https://eirworks.com" target="_blank" rel="noopener noreferrer">' . esc_html__( 'Eirworks', 'broadside' ) . '</a>'
					);
					?>
				</p>
			</div>

			<nav class="colophon__nav" aria-label="<?php esc_attr_e( 'Footer', 'broadside' ); ?>">
				<?php
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container'      => false,
							'menu_class'     => 'colophon__menu',
							'depth'          => 1,
						)
					);
				}
				?>
				<a href="<?php echo esc_url( get_feed_link() ); ?>"><?php esc_html_e( 'RSS', 'broadside' ); ?></a>
				<button type="button" class="theme-toggle" data-theme-toggle aria-label="<?php esc_attr_e( 'Switch to night edition', 'broadside' ); ?>">
					<span class="theme-toggle__icon theme-toggle__icon--moon" aria-hidden="true">
						<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" focusable="false">
							<path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z" />
						</svg>
					</span>
					<span class="theme-toggle__icon theme-toggle__icon--sun" aria-hidden="true">
						<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" focusable="false">
							<circle cx="12" cy="12" r="4.25" />
							<path d="M12 2.5v2.25M12 19.25v2.25M4.22 4.22l1.59 1.59M18.19 18.19l1.59 1.59M2.5 12h2.25M19.25 12h2.25M4.22 19.78l1.59-1.59M18.19 5.81l1.59-1.59" />
						</svg>
					</span>
				</button>
				<a href="#top"><?php esc_html_e( 'Back to top', 'broadside' ); ?></a>
			</nav>
		</div>
	</footer>
</div><!-- .page -->

<?php wp_footer(); ?>
</body>
</html>
