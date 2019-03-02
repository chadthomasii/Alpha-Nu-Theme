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
    ));
	
	//Post Thumbnails
	add_theme_support( 'post-thumbnails'); 

}


/*
	==========================================
	 Customize Register
	==========================================
*/
function alphanu_customize_register($wp_customize) 
{
	//Sections
	$wp_customize->add_section('theme_color', array(
		'title' => __('Theme Colors', 'Alpha Nu'),
		'priority' => 1
	));

	$wp_customize->add_section('site_title', array(
		'title' => __('Change Site Title', 'Alpha Nu'),
		'priority' => 2
	));

	//Settings

	$wp_customize->add_setting('main_color', array(
		'default' => '#AD2333',
		'transport' => 'refresh'

	));

	$wp_customize->add_setting('dark_text', array(
		'default' => '#4A4A4A',
		'transport' => 'refresh'
	));

	$wp_customize->add_setting('site_title', array(
		'default' => 'Site Title Here',
		'transport' => 'refresh'
	));


	//Controllers
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'theme_color', array(
		'label' => __("Main Theme Color", "Alpha Nu"),
		'section' => 'theme_color',
		'settings' => 'main_color'
	)));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'dark_text', array(
		'label' => __("Dark Text Color", "Alpha Nu"),
		'section' => 'theme_color',
		'settings' => 'dark_text'
	)));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'site_title', array(
		'label' => __("Change Title", "Alpha Nu"),
		'section' => 'site_title',
		'settings' => 'site_title'
	)));
}


//Shortening the exceprt
function alphanu_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'alphanu_excerpt_length', 999 );

/*
	==========================================
	 Add Actions
	==========================================
*/

add_action( 'wp_enqueue_scripts', 'alphanu_script_enqueue');
add_action('init', 'alphanu_menu_setup');
add_action('after_setup_theme', 'alphanu_theme_support');
add_action('customize_register', 'alphanu_customize_register');


