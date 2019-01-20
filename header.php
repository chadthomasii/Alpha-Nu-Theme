<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title><?php echo is_front_page() ?  'Home' : wp_title(''); ?></title>
        <?php wp_head(); ?>

        
    </head>
    <body <?php body_class();?>>