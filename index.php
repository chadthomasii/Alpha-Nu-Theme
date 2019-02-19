<?php get_header(); ?>
    


    <?php 
        $styleString = '';
        $styleString .= "background-image:url('";
        $styleString .= has_header_image() ? get_header_image() : get_theme_support( 'custom-header', 'default-image' ) . "')";

    ?>  

    <div class="overlay-landing"></div>

    
    <div class="landing" style= "<?php echo $styleString ?>">

        <div class= "landing-content">

            <?php
                $description = html_entity_decode(get_bloginfo( 'description', 'display' ));
                if ( $description || is_customize_preview() ) :
            ?>
                <h1 class= "animated fadeInUp">                    
                    <?php echo get_theme_mod('site_title'); ?>
                </h1>            
            <?php endif; ?>
            
        </div>

    </div>



<?php get_footer(); ?>