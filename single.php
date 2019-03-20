<?php get_header(); ?>

<div class="page-content">

    <?php  if (have_posts() ) : while ( have_posts() ) : the_post(); //Start the post loop?> 

    <div class="single-title">
        <h1><?php the_title() ?></h1>
    </div>
    
    <div class="figure"><img src="<?php the_post_thumbnail_url() ?>"/></div>
    <?php the_content() ?>

    <?php endwhile; endif; ?>


</div>

<?php get_footer(); ?>