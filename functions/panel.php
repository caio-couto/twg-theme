<?php

/* * * * * * * * * * * * * *
	CUSTOMIZER
* * * * * * * * * * * * * */

// Customizer options

if ( class_exists( 'WP_Customize_Control' ) )
{

	// Text Editor
	add_action( 'customize_controls_enqueue_scripts', function()
	{

		wp_enqueue_script(
			'wp-editor-customizer',
			get_template_directory_uri() . '/functions/assets/scripts/editor.js',
			rand(),
			true
		);

	});
}

require_once get_template_directory() . '/functions/customizer/scripts.php';