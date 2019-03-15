<?php /* Template Name: All News Page */  get_header(); ?>

<?php get_template_part('template-parts/template','heading-news'); ?>

<div class="all-news">

    <div class="all-articles">

    <?php $query = new WP_Query( array( 'post_type' => 'post') ); // Post loop settings ?> 

    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>   

    <?php get_template_part('template-parts/template','all-news-post'); ?>
         
        
    <?php endwhile; endif; ?>
        

    </div>
    


    <?php get_template_part('template-parts/template','news-sidebar'); ?>


</div>


<?php get_footer(); ?>