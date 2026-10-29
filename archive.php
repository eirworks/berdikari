<?php
/**
 * Archive heads for categories, tags, authors and dates.
 *
 * @package Broadside
 */

get_header();

$broadside_kicker = broadside_archive_kicker();
?>

<div class="shell">
	<main id="main" class="main">
		<header class="page-head">
			<?php if ( $broadside_kicker ) : ?>
				<p class="page-head__kicker"><?php echo esc_html( $broadside_kicker ); ?></p>
			<?php endif; ?>
			<h1 class="page-head__title"><?php echo esc_html( broadside_archive_title() ); ?></h1>
			<?php
			$broadside_description = get_the_archive_description();
			if ( $broadside_description ) :
				?>
				<div class="page-head__lede"><?php echo wp_kses_post( $broadside_description ); ?></div>
			<?php endif; ?>
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
