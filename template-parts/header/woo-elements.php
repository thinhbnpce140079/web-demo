<?php
/**
 * Add WooCommerce Elements in header
 *
 * @package Darcie
 */

if ( ! class_exists( 'WooCommerce' ) ) {
    // Bail if WooCommerce is not installed
    return;
}

if ( get_theme_mod( 'darcie_header_cart_enable', 0 ) && function_exists( 'darcie_header_cart' ) ) {
	darcie_header_cart();
}
