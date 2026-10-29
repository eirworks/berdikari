<?php
/**
 * Search results.
 *
 * @package Broadside
 */

get_header();

global $wp_query;
$broadside_total = (int) $wp_query->found_posts;
?>

<div class="shell">
	<main id="main" class="main">
		<header class="page-head">
			<p class="page-head__kicker"><?php esc_html_e( 'Search', 'broadside' ); ?></p>
			<h1 class="page-head__title">
				<?php
				printf(
					/* translators: %s: search query. */
					esc_html__( 'Results for “%s”', 'broadside' ),
					esc_html( get_search_query() )
				);
				?>
			</h1>
			<p class="page-head__lede">
				<?php
				printf(
					/* translators: %s: number of results. */
					esc_html( _n( '%s entry found', '%s entries found', $broadside_total, 'broadside' ) ),
					esc_html( number_format_i18n( $broadside_total ) )
				);
				?>
			</p>
			<?php get_search_form(); ?>
		</header>

		<?php
		if ( have_posts() ) :
			echo '<div class="entry-list">';
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', null, array( 'lead' => false ) );
			endwhile;
			echo '</div>';

			broadside_pagination();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</main>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
