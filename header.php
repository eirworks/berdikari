<?php
/**
 * Top bar, masthead and the opening of the page.
 *
 * @package Broadside
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'broadside' ); ?></a>

<div class="page" id="top">
	<header class="masthead">
		<div class="masthead__inner">
			<div class="branding">
				<?php
				$broadside_title   = get_bloginfo( 'name' );
				$broadside_tagline = get_bloginfo( 'description', 'display' );

				if ( has_custom_logo() ) :
					?>
					<div class="branding__lockup">
						<?php the_custom_logo(); ?>
						<a class="branding__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<span class="branding__title"><?php echo esc_html( $broadside_title ); ?></span>
							<?php if ( $broadside_tagline ) : ?>
								<span class="branding__tagline"><?php echo esc_html( $broadside_tagline ); ?></span>
							<?php endif; ?>
						</a>
					</div>
				<?php else : ?>
					<a class="branding__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<span class="branding__title"><?php echo esc_html( $broadside_title ); ?></span>
						<?php if ( $broadside_tagline ) : ?>
							<span class="branding__tagline"><?php echo esc_html( $broadside_tagline ); ?></span>
						<?php endif; ?>
					</a>
				<?php endif; ?>
			</div>

			<div class="masthead__tools">
				<button type="button" class="nav-toggle" data-nav-toggle aria-expanded="false" aria-controls="topbar-nav">
					<span class="nav-toggle__text"><?php esc_html_e( 'Menu', 'broadside' ); ?></span>
				</button>
			</div>

			<nav class="topnav" id="topbar-nav" aria-label="<?php esc_attr_e( 'Top bar', 'broadside' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'topbar',
						'container'      => false,
						'menu_class'     => 'menu',
						'depth'          => 1,
						'fallback_cb'    => 'broadside_menu_fallback',
					)
				);
				?>
			</nav>
		</div>
	</header>
