<?php
/**
 * Setup savoye Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function savoye_child_theme_setup() {
	load_child_theme_textdomain( 'savoye-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'savoye_child_theme_setup' );


function savoye_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
	
	wp_enqueue_script(
		'nav-scroll',
		get_stylesheet_directory_uri() . '/assets/js/nav-scroll.js',
		[],rand(111,9999)
	);
	
	wp_enqueue_style(
		'custom-css',
		get_stylesheet_directory_uri() . '/assets/css/custom-css.min.css',
		[],rand(111,9999)
	);
	
	if( is_page( 3350 ) ) {
		wp_enqueue_script(
			'capabilities-page',
			get_stylesheet_directory_uri() . '/assets/js/capabilities-page.js',
			[],rand(111,9999)
		);
	}
	
	if( is_page( 3584 ) ) {
		wp_enqueue_script(
			'form-fabrication-capabilities',
			get_stylesheet_directory_uri() . '/assets/js/form-fabrication-capabilities.js',
			[],rand(111,9999)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'savoye_enqueue_styles' );

add_action( 'elementor_pro/forms/new_record', function( $record, $ajax_handler ) {
	//make sure its our form
	$form_name = $record->get_form_settings( 'form_name' );
	if ( 'Fabrication' !== $form_name ) {
		return;
	}

	// Set the redirect URL with the form fields shortcodes
	$redirect_url = '/capabilities/fabrication-technology?form=true';

	// Convert fields shortcodes to form values
	//$redirect_to = $record->replace_setting_shortcodes( $redirect_url );

	// Set redirect action
	$ajax_handler->add_response_data( 'redirect_url', $redirect_url );
}, 10, 2);