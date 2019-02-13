<?php

/*
	==========================================
	 Include scripts
	==========================================
*/
function custom_script_enqueue() 
{
	//css
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/style.css', '1.0.0', 'all');
	wp_enqueue_style( 'animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css', '3.7.0', 'all');
	wp_enqueue_style( 'font-awesome-css', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css', '5.6.0', 'all');


	//js

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

	wp_register_script( 
        'nav', 
        get_template_directory_uri() . '/js/nav.js', 
		array( 'jquery' ),
		'1.0.0'
		
    );
	wp_enqueue_script('nav');


	
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

add_theme_support( 'post-thumbnails'); 

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

function theme_slug_setup() {
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 300,
        'flex-width' => true,
        'flex-height' => true,
    ));
}
add_action('after_setup_theme', 'theme_slug_setup');

