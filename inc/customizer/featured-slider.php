<?php
/**
 * Featured Slider Options
 *
 * @package Darcie
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function darcie_slider_options( $wp_customize ) {
	$wp_customize->add_section( 'darcie_featured_slider', array(
			'panel' => 'darcie_theme_options',
			'title' => esc_html__( 'Featured Slider', 'darcie' ),
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_slider_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'darcie_sanitize_select',
			'choices'           => darcie_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'darcie' ),
			'section'           => 'darcie_featured_slider',
			'type'              => 'select',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_slider_number',
			'default'           => '4',
			'sanitize_callback' => 'darcie_sanitize_number_range',

			'active_callback'   => 'darcie_is_slider_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'darcie' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
				'min'   => 0,
				'max'   => 20,
				'step'  => 1,
			),
			'label'             => esc_html__( 'No of Slides', 'darcie' ),
			'section'           => 'darcie_featured_slider',
			'type'              => 'number',
		)
	);

	$slider_number = get_theme_mod( 'darcie_slider_number', 4 );

	for ( $i = 1; $i <= $slider_number ; $i++ ) {

		darcie_register_option( $wp_customize, array(
				'name'              => 'darcie_slider_logo_image_' . $i,
				'sanitize_callback' => 'darcie_sanitize_image',
				'custom_control'    => 'WP_Customize_Image_Control',
				'active_callback'   => 'darcie_is_slider_active',
				'label'             => esc_html__( 'Logo Image #', 'darcie' ) . $i,
				'section'           => 'darcie_featured_slider',
			)
		);

		// Page Sliders
		darcie_register_option( $wp_customize, array(
				'name'              => 'darcie_slider_page_' . $i,
				'sanitize_callback' => 'darcie_sanitize_post',
				'active_callback'   => 'darcie_is_slider_active',
				'label'             => esc_html__( 'Page', 'darcie' ) . ' # ' . $i,
				'section'           => 'darcie_featured_slider',
				'type'              => 'dropdown-pages',
			)
		);
	} // End for().
}
add_action( 'customize_register', 'darcie_slider_options' );

/** Active Callback Functions */

if ( ! function_exists( 'darcie_is_slider_active' ) ) :
	/**
	* Return true if slider is active
	*
	* @since Darcie Pro 1.0
	*/
	function darcie_is_slider_active( $control ) {
		$enable = $control->manager->get_setting( 'darcie_slider_option' )->value();

		//return true only if previwed page on customizer matches the type option selected
		return darcie_check_section( $enable );
	}
endif;
