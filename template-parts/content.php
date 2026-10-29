<?php
/**
 * Entry in the index feed: the first one is the lead story, the rest are a dated ledger.
 *
 * @package Broadside
 */

$broadside_is_lead = ! empty( $args['lead'] );
$broadside_classes = array( 'entry' );

if ( $broadside_is_lead ) {
	$broadside_classes[] = 'entry--lead';
} else {
	$broadside_classes[] = 'entry--ledger';
}

$broadside_categories = get_the_category();
$broadside_section    = $broadside_categories ? $broadside_categories[0] : null;

/* On a section archive the section label would repeat the page heading. */
$broadside_show_section = $broadside_section && ! is_category( $broadside_section->term_id );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $broadside_classes ); ?>>
	<header class="entry__head">
		<?php if ( $broadside_is_lead ) : ?>
			<p class="entry__kicker">
				<?php if ( $broadside_show_section ) : ?>
					<a class="entry__section" href="<?php echo esc_url( get_category_link( $broadside_section ) ); ?>"><?php echo esc_html( $broadside_section->name ); ?></a>
				<?php endif; ?>
				<time class="entry__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			</p>
			<h2 class="entry__title entry__title--lead">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
		<?php else : ?>
			<p class="entry__meta">
				<?php if ( $broadside_show_section ) : ?>
					<a class="entry__section" href="<?php echo esc_url( get_category_link( $broadside_section ) ); ?>"><?php echo esc_html( $broadside_section->name ); ?></a>
				<?php endif; ?>
				<time class="entry__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			</p>
			<h2 class="entry__title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
		<?php endif; ?>
	</header>

	<?php if ( $broadside_is_lead ) : ?>
		<div class="entry__excerpt"><?php the_excerpt(); ?></div>

		<?php if ( has_post_thumbnail() ) : ?>
			<a class="entry__media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
				<?php the_post_thumbnail( 'broadside-lead', array( 'loading' => 'lazy' ) ); ?>
			</a>
		<?php endif; ?>
	<?php else : ?>
		<div class="entry__excerpt"><?php the_excerpt(); ?></div>
	<?php endif; ?>

	<?php if ( $broadside_is_lead ) : ?>
		<a class="entry__more" href="<?php the_permalink(); ?>">
			<?php esc_html_e( 'Continue reading', 'broadside' ); ?><span class="screen-reader-text"> <?php echo esc_html( get_the_title() ); ?></span>
		</a>
	<?php endif; ?>
</article>
