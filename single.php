<?php
/**
 * A single entry.
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
			$broadside_categories = get_the_category();
			$broadside_section    = $broadside_categories ? $broadside_categories[0] : null;
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--single' ); ?>>
				<header class="entry__head">
					<p class="entry__kicker">
						<?php if ( $broadside_section ) : ?>
							<a class="entry__section" href="<?php echo esc_url( get_category_link( $broadside_section ) ); ?>"><?php echo esc_html( $broadside_section->name ); ?></a>
						<?php endif; ?>
						<time class="entry__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					</p>

					<h1 class="entry__title entry__title--single"><?php the_title(); ?></h1>

					<p class="entry__byline">
						<span class="entry__author">
							<?php
							printf(
								/* translators: %s: entry author. */
								esc_html__( 'By %s', 'broadside' ),
								esc_html( get_the_author() )
							);
							?>
						</span>
						<?php if ( comments_open() || get_comments_number() ) : ?>
							<a class="entry__comments" href="#comments">
								<?php
								printf(
									/* translators: %s: number of comments. */
									esc_html( _n( '%s response', '%s responses', get_comments_number(), 'broadside' ) ),
									esc_html( number_format_i18n( get_comments_number() ) )
								);
								?>
							</a>
						<?php endif; ?>
					</p>
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
							'before' => '<nav class="paged-nav" aria-label="' . esc_attr__( 'Entry pages', 'broadside' ) . '"><p>',
							'after'  => '</p></nav>',
						)
					);
					?>
				</div>

				<footer class="entry__foot">
					<?php
					the_tags( '<p class="entry__tags"><span class="entry__tags-label">' . esc_html__( 'Tags', 'broadside' ) . '</span> ', ', ', '</p>' );

					edit_post_link(
						__( 'Edit this entry', 'broadside' ),
						'<p class="entry__edit">',
						'</p>'
					);
					?>
				</footer>
			</article>

			<?php
			broadside_post_navigation();

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
