<?php

add_action( 'customize_register', function ( $wp_customize ) {

	/* * * * * * * * * * * * * *
		SECTION
	* * * * * * * * * * * * * */

	$wp_customize->add_section( 'lt_section_scripts', [
		'title' => __( 'Scripts', 'lt' ),
		'description' => __( 'Scripts para o site.', 'lt' ),
		'priority' => 171
	] );

	/* * * * * * * * * * * * * *
		HEAD
	* * * * * * * * * * * * * */

	$wp_customize->add_setting( 'lt_scripts_head', [
		'sanitize_callback' => 'lt_sanitize_code'
	] );
	$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'lt_scripts_head', [
		'label' => '<head></head>',
		'description' => __( 'Scripts dentro de', 'lt' ) . ' &lt;head&gt;&lt;/head&gt;',
		'section' => 'lt_section_scripts',
		'settings' => 'lt_scripts_head',
		'code_type' => 'html'
	] ) );

	/* * * * * * * * * * * * * *
		BODY
	* * * * * * * * * * * * * */

	$wp_customize->add_setting( 'lt_scripts_body', [
		'sanitize_callback' => 'lt_sanitize_code'
	] );
	$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'lt_scripts_body', [
		'label' => '<body>',
		'description' => __( 'Scripts depois de', 'lt' ) . ' &lt;body&gt;',
		'section' => 'lt_section_scripts',
		'settings' => 'lt_scripts_body',
		'code_type' => 'html'
	] ) );

	/* * * * * * * * * * * * * *
		FOOTER
	* * * * * * * * * * * * * */

	$wp_customize->add_setting( 'lt_scripts_footer', [
		'sanitize_callback' => 'lt_sanitize_code'
	] );
	$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'lt_scripts_footer', [
		'label' => '</body>',
		'description' => __( 'Scripts antes de', 'lt' ) . ' &lt;/body&gt;',
		'section' => 'lt_section_scripts',
		'settings' => 'lt_scripts_footer',
		'code_type' => 'html'
	] ) );

} );