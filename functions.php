<?php

/*
	==========================================
	 Include scripts
	==========================================
*/
function alphanu_script_enqueue() 
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




/*
	==========================================
	 Theme Support
	==========================================
*/

//Menu Setup on Init
function alphanu_menu_setup()
{
	
	add_theme_support('menus');
	
	register_nav_menu('primary', 'Primary Header Navigation');	
}

//Theme Support
function alphanu_theme_support() 
{
	//Custom Logo
	add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 80,
        'flex-width' => true,
        'flex-height' => true,
	));
	
	//Custom Header
	add_theme_support( 'custom-header', array(
        'width'              => 1200,
        'height'             => 720,
        'flex-width'         => true,
		'flex-height'        => true,
		'header-text' 		 => true,
    ));
	
	//Post Thumbnails
	add_theme_support( 'post-thumbnails'); 

}


//Customize Register
function alphanu_customize_register($wp_customize) 
{
	$wp_customize->add_section('main_color', array(
		'title' => __('Main Theme Color', 'Alpha Nu'),
		'priority' => 1
	));

	$wp_customize->add_setting('main_color', array(
		'default' => '#AD2333',
		'transport' => 'refresh'

	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_color', array(
		'label' => __("Main Theme Color", "Alpha Nu"),
		'section' => 'main_color',
		'settings' => 'main_color'
	)));
}


/*
	==========================================
	 Add Actions
	==========================================
*/

add_action( 'wp_enqueue_scripts', 'alphanu_script_enqueue');
add_action('init', 'alphanu_menu_setup');
add_action('after_setup_theme', 'alphanu_theme_support');
add_action('customize_register', 'alphanu_customize_register');


