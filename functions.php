<?php

/*
	==========================================
	 Include scripts
	==========================================
*/
function custom_script_enqueue() 
{
	//css
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all');
	//js
	wp_enqueue_script('jquery');
	
}

add_action( 'wp_enqueue_scripts', 'custom_script_enqueue');



/*
	==========================================
	 Activate Menus
	==========================================
*/

function custom_theme_setup()
{
	
	add_theme_support('menus');
	
	register_nav_menu('primary', 'Primary Header Navigation');	
}

add_action('init', 'custom_theme_setup');



/*
	==========================================
	 Theme Support
	==========================================
*/

register_default_headers( array(
    'default-image' => array(
        'url'           => '%s/img/landing.jpg',
        'thumbnail_url' => '%s/img/landing.jpg',
        'description'   => __( 'headerimage', 'alphanu' )
        ),
	) );
	


function alphanu_custom_header_setup() {
    $args = array(
        'default-image'      => get_template_directory_uri() . '/img/landing.jpg',
        'width'              => 1200,
        'height'             => 720,
        'flex-width'         => true,
		'flex-height'        => true,
		'header-text' 		 => true,

    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'alphanu_custom_header_setup' );


