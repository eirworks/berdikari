<?php
/**
 * A static page.
 *
 * @package Broadside
 */

get_header();
?>

<div class="shell">
	<main id="main" class="main">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--single entry--page' ); ?>>
				<header class="entry__head">
					<h1 class="entry__title entry__title--single"><?php the_title(); ?></h1>
				</header>

				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="entry__media">
						<?php the_post_thumbnail( 'large' ); ?>
					</figure>
				<?php endif; ?>

				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<nav class="paged-nav" aria-label="' . esc_attr__( 'Page sections', 'broadside' ) . '"><p>',
							'after'  => '</p></nav>',
						)
					);
					?>
				</div>

				<?php
				edit_post_link(
					__( 'Edit this page', 'broadside' ),
					'<p class="entry__edit">',
					'</p>'
				);
				?>
			</article>

			<?php
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
		?>
	</main>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
