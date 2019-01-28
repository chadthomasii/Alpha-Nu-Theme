<?php get_header(); ?>
    


    <?php 
        $styleString = '';
        $styleString .= "background-image:url('";
        $styleString .= has_header_image() ? get_header_image() : get_theme_support( 'custom-header', 'default-image' ) . "')";

    ?>  

    <div class="overlay-landing"></div>

    
    <div class="landing" style= "<?php echo $styleString ?>">

        <div class= "landing-content">
            <h1 class= "animated fadeInUp"><?php echo html_entity_decode(get_bloginfo('description'));?></h1>
        </div>

    </div>



<?php get_footer(); ?>