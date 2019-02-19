<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo is_front_page() ? 'Home' : wp_title('');?></title>
        <meta name="description" content="">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">        
        <?php wp_head(); ?>
        <style>
       
            :root
            {
                --main-color: <?php echo get_theme_mod('main_color', '#AD2333');?>;
                --dark-text: <?php echo get_theme_mod('dark_text', '#4A4A4A');?>
            }
        </style>
        
        
    </head>
    <body <?php body_class();?> >

    <?php get_template_part('template-parts/template','navigation'); ?>
