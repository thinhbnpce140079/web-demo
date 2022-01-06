<?php
/**
 * The template for displaying portfolio items
 *
 * @package Darcie
 */

$enable = get_theme_mod( 'darcie_portfolio_option', 'disabled' );

if ( ! darcie_check_section( $enable ) ) {
	// Bail if portfolio section is disabled.
	return;
}

$darcie_title = get_option( 'jetpack_portfolio_title', esc_html__( 'Projects', 'darcie' ) );
$sub_title    = get_option( 'jetpack_portfolio_content' );

$classes[] = 'layout-three';
$classes[] = 'jetpack-portfolio';
$classes[] = 'section';

if( !$darcie_title && !$sub_title ) {
	$classes[] = 'no-section-heading';
}
?>

<div id="portfolio-content-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper">
		<?php if ( $darcie_title || $sub_title ) : ?>
			<div class="section-heading-wrapper portfolio-section-headline">
				
				<div class="heading-wrapper">
					<?php if ( $darcie_title ) : ?>
						<div class="section-title-wrapper">
							<h2 class="section-title"><?php echo wp_kses_post( $darcie_title ); ?></h2>
						</div><!-- .section-title-wrapper -->
					<?php endif; ?>

					<?php if ( $sub_title ) : ?>
						<div class="section-description">
							<p><?php echo wp_kses_post( $sub_title ); ?></p>
						</div><!-- .section-description-wrapper -->
					<?php endif; ?>
				</div>
			</div><!-- .section-heading-wrapper -->
		<?php endif; ?>

		<div class="section-content-wrapper portfolio-content-wrapper layout-three">
			<div class="grid">
				<?php get_template_part( 'template-parts/portfolio/post-types', 'portfolio' ); ?>
			</div>
		</div><!-- .section-content-wrap -->
	</div><!-- .wrapper -->
</div><!-- #portfolio-section -->
