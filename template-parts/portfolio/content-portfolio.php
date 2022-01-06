<?php
/**
 * The template used for displaying projects on index view
 *
 * @package Darcie
 */

$layout = 'layout-three';

global $post;

$categories_list = get_the_category();

$classes = 'grid-item';
foreach ( $categories_list as $darcie_cat ) {
	$classes .= ' ' . $darcie_cat->slug ;
}
?>

<article id="portfolio-post-<?php the_ID(); ?>" <?php post_class( esc_attr( $classes ) ); ?>>
	<div class="hentry-inner">
		<?php darcie_post_thumbnail( 'darcie-portfolio' ); ?>

		<div class="entry-container">
			<header class="entry-header">

				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

				<div class="entry-meta">
					<?php darcie_posted_on(); ?>
				</div>

			</header>
		</div><!-- .entry-container -->
	</div><!-- .hentry-inner -->
</article>
