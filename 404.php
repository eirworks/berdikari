<?php
/**
 * Not found.
 *
 * @package Broadside
 */

get_header();
?>

<div class="shell">
	<main id="main" class="main">
		<header class="page-head page-head--404">
			<p class="page-head__kicker"><?php esc_html_e( 'Off the page', 'broadside' ); ?></p>
			<h1 class="page-head__title page-head__title--figure">404</h1>
			<p class="page-head__lede">
				<?php esc_html_e( 'That address is not in the archive. It may have moved, or it never existed.', 'broadside' ); ?>
			</p>
			<?php get_search_form(); ?>
		</header>

		<?php
		$broadside_recent = get_posts(
			array(
				'numberposts'      => 4,
				'post_status'      => 'publish',
				'suppress_filters' => false,
			)
		);

		if ( $broadside_recent ) :
			?>
			<section class="notice">
				<h2 class="notice__title"><?php esc_html_e( 'Recent entries', 'broadside' ); ?></h2>
				<ul class="notice__list">
					<?php foreach ( $broadside_recent as $broadside_post ) : ?>
						<li>
							<a href="<?php echo esc_url( get_permalink( $broadside_post ) ); ?>"><?php echo esc_html( get_the_title( $broadside_post ) ); ?></a>
							<time datetime="<?php echo esc_attr( get_the_date( 'c', $broadside_post ) ); ?>"><?php echo esc_html( get_the_date( '', $broadside_post ) ); ?></time>
						</li>
					<?php endforeach; ?>
				</ul>
			</section>
			<?php
		endif;
		?>
	</main>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
