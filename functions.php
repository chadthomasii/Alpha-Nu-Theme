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

	//nav
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


/*
	==========================================
	 Shortning the Excerpt
	==========================================
*/
function alphanu_excerpt_length( $length ) 
{
	return 25;
}

add_filter( 'excerpt_length', 'alphanu_excerpt_length', 999 );

/*
	==========================================
	 Archive Prefix
	==========================================
*/
add_filter( 'get_the_archive_title', function ($title) 
{

	if ( is_category() ) 
	{

			$title = single_cat_title( '', false );

	} 
	
	elseif ( is_tag() ) 
	{

			$title = single_tag_title( '', false );

	} 
	
	elseif ( is_author() ) 
	{

			$title = get_the_author();

	}
	elseif ( is_year() ) 
	{
		$title = get_the_date( _x( 'Y', '') );
	} 
	
	elseif ( is_month() ) 
	{
		$title = get_the_date( _x( 'F Y', '' ) );
	} 
	
	elseif ( is_day() ) 
	{
		$title = get_the_date( _x( 'F j, Y', '') );
	}
	return $title;

});


/*
	==========================================
	 Sidebar Function
	==========================================
*/

function alphanu_widget()
{
	register_sidebar(
		array(
			'name' => 'Sidebar',
			'id' => 'sidebar-1',
			'class' => 'all-news',
			'description' => 'The sidebar for the news pages.',
			
			'before_title' => '<h1 class="widget_title">',
			'after_title' => '</h1> <hr>'

		)
	);
}



/*
	==========================================
	 Infinite Scroll
	==========================================
*/

/**
 * Javascript for Load More
 *
 */
function be_load_more_js() {
	global $wp_query;
	$args = array(
		'nonce' => wp_create_nonce( 'be-load-more-nonce' ),
		'url'   => admin_url( 'admin-ajax.php' ),
		'query' => $wp_query->query,
	);

	
			
	wp_enqueue_script( 'be-load-more', get_template_directory_uri() . '/js/load-more.js', array( 'jquery' ), '1.0', true );
	wp_localize_script( 'be-load-more', 'beloadmore', $args ); //Pass Object to JS file
	
}
add_action( 'wp_enqueue_scripts', 'be_load_more_js' );

/**
 * AJAX Load More 
 * Is called when POST request is received from js file
 */
function be_ajax_load_more() 
{

	//Gets nonce from js, which is from previous passed function
	check_ajax_referer( 'be-load-more-nonce', 'nonce' );

	//Post Params
	$args['post_type'] = 'post';
	$args['paged'] = esc_attr( $_POST['page'] );
	$args['post_status'] = 'publish';

	ob_start(); //Starts cached obj

	$loop = new WP_Query( $args );

	if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();

	get_template_part('template-parts/template','all-news-post'); //Formats data via template

	endwhile; endif; wp_reset_postdata();

	$data = ob_get_clean();

	wp_send_json_success( $data ); //Passed formated data

	wp_die();
}

/*
	==========================================
	 Add Actions
	==========================================
*/

add_action( 'wp_enqueue_scripts', 'alphanu_script_enqueue'); //JS and CSS
add_action('init', 'alphanu_menu_setup'); //Menus
add_action('after_setup_theme', 'alphanu_theme_support'); //Various Theme Support
add_action('customize_register', 'alphanu_customize_register'); //Theme Customizer
add_action('widgets_init', 'alphanu_widget'); //Theme Customizer
add_action( 'wp_ajax_be_ajax_load_more', 'be_ajax_load_more' ); //Infinite Load
add_action( 'wp_ajax_nopriv_be_ajax_load_more', 'be_ajax_load_more' ); //Infinite Load
