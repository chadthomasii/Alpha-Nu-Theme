<?php get_header(); ?>

    <div class="content-heading animated fadeInDown">
        <div class="line"></div>
        <div>
            <h1><?php echo get_the_title(); ?></h1>
        </div>
        <div class="line"></div>
    </div>

    <div class="page-content">

        <?php
            if (have_posts()):
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            endif;
        ?>

    </div>
    

<?php get_footer(); ?>