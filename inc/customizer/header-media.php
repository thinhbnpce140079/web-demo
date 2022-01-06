<?php
/**
 * Header Media Options
 *
 * @package Darcie
 */

/**
 * Add Header Media options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function darcie_header_media_options( $wp_customize ) {
	$wp_customize->get_section( 'header_image' )->description = esc_html__( 'If you add video, it will only show up on Homepage/FrontPage. Other Pages will use Header/Post/Page Image depending on your selection of option. Header Image will be used as a fallback while the video loads ', 'darcie' );

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_option',
			'default'           => 'entire-site',
			'sanitize_callback' => 'darcie_sanitize_select',
			'choices'           => array(
				'homepage'               => esc_html__( 'Homepage / Frontpage', 'darcie' ),
				'exclude-home'           => esc_html__( 'Excluding Homepage', 'darcie' ),
				'exclude-home-page-post' => esc_html__( 'Excluding Homepage, Page/Post Featured Image', 'darcie' ),
				'entire-site'            => esc_html__( 'Entire Site', 'darcie' ),
				'entire-site-page-post'  => esc_html__( 'Entire Site, Page/Post Featured Image', 'darcie' ),
				'pages-posts'            => esc_html__( 'Pages and Posts', 'darcie' ),
				'disable'                => esc_html__( 'Disabled', 'darcie' ),
			),
			'label'             => esc_html__( 'Enable on', 'darcie' ),
			'section'           => 'header_image',
			'type'              => 'select',
			'priority'          => 1,
		)
	);

	/* Scroll Down option */
	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_scroll_down',
			'sanitize_callback' => 'darcie_sanitize_checkbox',
			'default'           => 1,
			'label'             => esc_html__( 'Scroll Down Button', 'darcie' ),
			'section'           => 'header_image',
			'custom_control'    => 'Darcie_Toggle_Control',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_image_position_desktop',
			'default'           => 'center center',
			'sanitize_callback' => 'darcie_sanitize_select',
			'label'             => esc_html__( 'Image Position (Desktop View)', 'darcie' ),
			'section'           => 'header_image',
			'type'              => 'select',
			'choices'           => array(
				'left top'      => esc_html__( 'Left Top', 'darcie' ),
				'left center'   => esc_html__( 'Left Center', 'darcie' ),
				'left bottom'   => esc_html__( 'Left Bottom', 'darcie' ),
				'right top'     => esc_html__( 'Right Top', 'darcie' ),
				'right center'  => esc_html__( 'Right Center', 'darcie' ),
				'right bottom'  => esc_html__( 'Right Bottom', 'darcie' ),
				'center top'    => esc_html__( 'Center Top', 'darcie' ),
				'center center' => esc_html__( 'Center Center', 'darcie' ),
				'center bottom' => esc_html__( 'Center Bottom', 'darcie' ),
			),
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_image_position_mobile',
			'default'           => 'center center',
			'sanitize_callback' => 'darcie_sanitize_select',
			'label'             => esc_html__( 'Image Position (Mobile View)', 'darcie' ),
			'section'           => 'header_image',
			'type'              => 'select',
			'choices'           => array(
				'left top'      => esc_html__( 'Left Top', 'darcie' ),
				'left center'   => esc_html__( 'Left Center', 'darcie' ),
				'left bottom'   => esc_html__( 'Left Bottom', 'darcie' ),
				'right top'     => esc_html__( 'Right Top', 'darcie' ),
				'right center'  => esc_html__( 'Right Center', 'darcie' ),
				'right bottom'  => esc_html__( 'Right Bottom', 'darcie' ),
				'center top'    => esc_html__( 'Center Top', 'darcie' ),
				'center center' => esc_html__( 'Center Center', 'darcie' ),
				'center bottom' => esc_html__( 'Center Bottom', 'darcie' ),
			),
		)
	);

	/*Overlay Option for Header Media*/
	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_image_opacity',
			'default'           => '0',
			'sanitize_callback' => 'darcie_sanitize_number_range',
			'label'             => esc_html__( 'Header Media Overlay', 'darcie' ),
			'section'           => 'header_image',
			'type'              => 'number',
			'input_attrs'       => array(
				'style' => 'width: 60px;',
				'min'   => 0,
				'max'   => 100,
			),
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_text_alignment',
			'default'           => 'text-align-left',
			'sanitize_callback' => 'darcie_sanitize_select',
			'choices'           => array(
				'text-align-center' => esc_html__( 'Center', 'darcie' ),
				'text-align-right'  => esc_html__( 'Right', 'darcie' ),
				'text-align-left'   => esc_html__( 'Left', 'darcie' ),
			),
			'label'             => esc_html__( 'Text Alignment', 'darcie' ),
			'section'           => 'header_image',
			'type'              => 'radio',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_content_alignment',
			'default'           => 'content-align-right',
			'sanitize_callback' => 'darcie_sanitize_select',
			'choices'           => array(
				'content-align-center' => esc_html__( 'Center', 'darcie' ),
				'content-align-right'  => esc_html__( 'Right', 'darcie' ),
				'content-align-left'   => esc_html__( 'Left', 'darcie' ),
			),
			'label'             => esc_html__( 'Content Alignment', 'darcie' ),
			'section'           => 'header_image',
			'type'              => 'radio',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_logo',
			'sanitize_callback' => 'esc_url_raw',
			'custom_control'    => 'WP_Customize_Image_Control',
			'label'             => esc_html__( 'Header Media Logo', 'darcie' ),
			'section'           => 'header_image',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_logo_option',
			'default'           => 'homepage',
			'sanitize_callback' => 'darcie_sanitize_select',
			'active_callback'   => 'darcie_is_header_media_logo_active',
			'choices'           => array(
				'homepage'               => esc_html__( 'Homepage / Frontpage', 'darcie' ),
				'entire-site'            => esc_html__( 'Entire Site', 'darcie' ) ),
			'label'             => esc_html__( 'Enable Header Media logo on', 'darcie' ),
			'section'           => 'header_image',
			'type'              => 'select',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_sub_title',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Header Media Tagline', 'darcie' ),
			'section'           => 'header_image',
			'type'              => 'text',
		)
	);

    darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_title',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Header Media Title', 'darcie' ),
			'section'           => 'header_image',
			'type'              => 'text',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_text',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Site Header Text', 'darcie' ),
			'section'           => 'header_image',
			'type'              => 'textarea',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_url',
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
			'label'             => esc_html__( 'Header Media Url', 'darcie' ),
			'section'           => 'header_image',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_media_url_text',
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Header Media Url Text', 'darcie' ),
			'section'           => 'header_image',
		)
	);

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_header_url_target',
			'sanitize_callback' => 'darcie_sanitize_checkbox',
			'label'             => esc_html__( 'Open Link in New Window/Tab', 'darcie' ),
			'section'           => 'header_image',
			'custom_control'    => 'Darcie_Toggle_Control',
		)
	);
}
add_action( 'customize_register', 'darcie_header_media_options' );

/** Active Callback Functions */

if ( ! function_exists( 'darcie_is_header_media_logo_active' ) ) :
	/**
	* Return true if header logo is active
	*
	* @since Darcie Pro 1.0
	*/
	function darcie_is_header_media_logo_active( $control ) {
		$logo = $control->manager->get_setting( 'darcie_header_media_logo' )->value();
		if ( '' != $logo ) {
			return true;
		} else {
			return false;
		}
	}
endif;
