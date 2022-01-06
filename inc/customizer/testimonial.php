<?php
/**
 * Add Testimonial Settings in Customizer
 *
 * @package Darcie
*/

/**
 * Add testimonial options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function darcie_testimonial_options( $wp_customize ) {
	// Add note to Jetpack Testimonial Section
	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_jetpack_testimonial_cpt_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Darcie_Note_Control',
			'label'             => sprintf( esc_html__( 'For Testimonial Options for Darcie Theme, go %1$shere%2$s', 'darcie' ),
				'<a href="javascript:wp.customize.section( \'darcie_testimonials\' ).focus();">',
				 '</a>'
			),
		   'section'            => 'jetpack_testimonials',
			'type'              => 'description',
			'priority'          => 1,
		)
	);

	$wp_customize->add_section( 'darcie_testimonials', array(
			'panel'    => 'darcie_theme_options',
			'title'    => esc_html__( 'Testimonials', 'darcie' ),
		)
	);

	$action = 'install-plugin';
    $slug   = 'essential-content-types';

    $install_url = wp_nonce_url(
        add_query_arg(
            array(
                'action' => $action,
                'plugin' => $slug
            ),
            admin_url( 'update.php' )
        ),
        $action . '_' . $slug
    );

    darcie_register_option( $wp_customize, array(
            'name'              => 'darcie_testimonial_jetpack_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Darcie_Note_Control',
            'active_callback'   => 'darcie_is_ect_testimonial_inactive',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
            'label'             => sprintf( esc_html__( 'For Testimonial, install %1$sEssential Content Types%2$s Plugin with testimonial Type Enabled', 'darcie' ),
                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
                '</a>'

            ),
           'section'            => 'darcie_testimonials',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_testimonial_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'darcie_sanitize_select',
			'active_callback'   => 'darcie_is_ect_testimonial_active',
			'choices'           => darcie_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'darcie' ),
			'section'           => 'darcie_testimonials',
			'type'              => 'select',
			'priority'          => 1,
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_testimonial_cpt_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Darcie_Note_Control',
			'active_callback'   => 'darcie_is_testimonial_active',
			/* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'darcie' ),
				'<a href="javascript:wp.customize.section( \'jetpack_testimonials\' ).focus();">',
				'</a>'
			),
			'section'           => 'darcie_testimonials',
			'type'              => 'description',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_testimonial_number',
			'default'           => '3',
			'sanitize_callback' => 'darcie_sanitize_number_range',
			'active_callback'   => 'darcie_is_testimonial_active',
			'label'             => esc_html__( 'Number of items', 'darcie' ),
			'section'           => 'darcie_testimonials',
			'type'              => 'number',
			'input_attrs'       => array(
				'style'             => 'width: 100px;',
				'min'               => 0,
			),
		)
	);

	$number = get_theme_mod( 'darcie_testimonial_number', 3 );

	for ( $i = 1; $i <= $number ; $i++ ) {

		//for CPT
		darcie_register_option( $wp_customize, array(
				'name'              => 'darcie_testimonial_cpt_' . $i,
				'sanitize_callback' => 'darcie_sanitize_post',
				'active_callback'   => 'darcie_is_testimonial_active',
				'label'             => esc_html__( 'Testimonial', 'darcie' ) . ' ' . $i ,
				'section'           => 'darcie_testimonials',
				'type'              => 'select',
				'choices'           => darcie_generate_post_array( 'jetpack-testimonial' ),
			)
		);
	} // End for().
}
add_action( 'customize_register', 'darcie_testimonial_options' );

/**
 * Active Callback Functions
 */
if ( ! function_exists( 'darcie_is_testimonial_active' ) ) :
	/**
	* Return true if testimonial is active
	*
	* @since Darcie Pro 1.0
	*/
	function darcie_is_testimonial_active( $control ) {
		$enable = $control->manager->get_setting( 'darcie_testimonial_option' )->value();

		//return true only if previwed page on customizer matches the type of content option selected
		return ( darcie_is_ect_testimonial_active( $control ) && darcie_check_section( $enable ) );
	}
endif;

if ( ! function_exists( 'darcie_is_ect_testimonial_inactive' ) ) :
    /**
    *
    * @since Darcie 1.0
    */
    function darcie_is_ect_testimonial_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Jetpack_testimonial' ) || class_exists( 'Essential_Content_Pro_Jetpack_testimonial' ) );
    }
endif;

if ( ! function_exists( 'darcie_is_ect_testimonial_active' ) ) :
    /**
    *
    * @since Darcie 1.0
    */
    function darcie_is_ect_testimonial_active( $control ) {
        return ( class_exists( 'Essential_Content_Jetpack_testimonial' ) || class_exists( 'Essential_Content_Pro_Jetpack_testimonial' ) );
    }
endif;
