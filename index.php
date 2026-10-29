<?php
/**
 * Blog index and front page feed.
 *
 * @package Broadside
 */

get_header();
?>

<div class="shell">
	<main id="main" class="main">
		<?php
		if ( is_home() && ! is_front_page() ) {
			$broadside_posts_page = (int) get_option( 'page_for_posts' );
			if ( $broadside_posts_page && get_the_title( $broadside_posts_page ) ) {
				?>
				<header class="page-head">
					<h1 class="page-head__title"><?php echo esc_html( get_the_title( $broadside_posts_page ) ); ?></h1>
				</header>
				<?php
			}
		}

		if ( is_home() && ! is_paged() ) {
			broadside_home_band();
		}

		if ( have_posts() ) :
			$broadside_position = 0;
			echo '<div class="entry-list">';
			while ( have_posts() ) :
				the_post();
				++$broadside_position;
				get_template_part(
					'template-parts/content',
					null,
					array( 'lead' => ( 1 === $broadside_position ) )
				);
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
