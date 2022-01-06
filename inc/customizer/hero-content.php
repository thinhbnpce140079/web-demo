<?php
/**
 * Hero Content Options
 *
 * @package Darcie
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function darcie_hero_content_options( $wp_customize ) {
	$wp_customize->add_section( 'darcie_hero_content_options', array(
			'title' => esc_html__( 'Hero Content', 'darcie' ),
			'panel' => 'darcie_theme_options',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_hero_content_visibility',
			'default'           => 'disabled',
			'sanitize_callback' => 'darcie_sanitize_select',
			'choices'           => darcie_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'darcie' ),
			'section'           => 'darcie_hero_content_options',
			'type'              => 'select',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_hero_content',
			'default'           => '0',
			'sanitize_callback' => 'darcie_sanitize_post',
			'active_callback'   => 'darcie_is_hero_content_active',
			'label'             => esc_html__( 'Page', 'darcie' ),
			'section'           => 'darcie_hero_content_options',
			'type'              => 'dropdown-pages',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_hero_content_sub_title',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'darcie_is_hero_content_active',
			'label'             => esc_html__( 'Sub Headline', 'darcie' ),
			'section'           => 'darcie_hero_content_options',
			'type'              => 'textarea',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_hero_experience_title',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'darcie_is_hero_content_active',
			'label'             => esc_html__( 'Experience Title', 'darcie' ),
			'section'           => 'darcie_hero_content_options',
			'type'              => 'text',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_hero_date_one',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'darcie_is_hero_content_active',
			'label'             => esc_html__( 'Date 1', 'darcie' ),
			'section'           => 'darcie_hero_content_options',
			'type'              => 'text',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_hero_experience_one',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'darcie_is_hero_content_active',
			'label'             => esc_html__( 'Experience 1', 'darcie' ),
			'section'           => 'darcie_hero_content_options',
			'type'              => 'text',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_hero_date_two',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'darcie_is_hero_content_active',
			'label'             => esc_html__( 'Date 2', 'darcie' ),
			'section'           => 'darcie_hero_content_options',
			'type'              => 'text',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_hero_experience_two',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'darcie_is_hero_content_active',
			'label'             => esc_html__( 'Experience 2', 'darcie' ),
			'section'           => 'darcie_hero_content_options',
			'type'              => 'text',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_hero_date_three',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'darcie_is_hero_content_active',
			'label'             => esc_html__( 'Date 3', 'darcie' ),
			'section'           => 'darcie_hero_content_options',
			'type'              => 'text',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_hero_experience_three',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'darcie_is_hero_content_active',
			'label'             => esc_html__( 'Experience 3', 'darcie' ),
			'section'           => 'darcie_hero_content_options',
			'type'              => 'text',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_hero_date_four',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'darcie_is_hero_content_active',
			'label'             => esc_html__( 'Date 4', 'darcie' ),
			'section'           => 'darcie_hero_content_options',
			'type'              => 'text',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_hero_experience_four',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'darcie_is_hero_content_active',
			'label'             => esc_html__( 'Experience 4', 'darcie' ),
			'section'           => 'darcie_hero_content_options',
			'type'              => 'text',
		)
	);

}
add_action( 'customize_register', 'darcie_hero_content_options' );

/** Active Callback Functions **/
if ( ! function_exists( 'darcie_is_hero_content_active' ) ) :
	/**
	* Return true if hero content is active
	*
	* @since Darcie Pro 1.0
	*/
	function darcie_is_hero_content_active( $control ) {
		$enable = $control->manager->get_setting( 'darcie_hero_content_visibility' )->value();

		return darcie_check_section( $enable );
	}
endif;
