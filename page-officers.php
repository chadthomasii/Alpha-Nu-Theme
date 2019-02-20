<?php get_header(); ?>


    <?php get_template_part('template-parts/template','heading'); ?>


    <div class="officer-content animated fadeIn">
            
       

        <?php $query = new WP_Query( array( 'post_type' => 'officer',
                                            'orderby' => 'publish_date',
                                            'order' => 'ASC' ) ); // Post loop settings ?> 

        <?php  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); //Start the post loop?> 

        <div class="officer-section">
            <div class="officer-picture">
                <img class= "diamond" src="<?php the_field('officer_image')?> ">
            </div>

            <div class="officer-information">
                <h1><?php the_title(); ?></h1>
                <h2><?php the_field('officer_name')?></h2>
                <p><?php the_field('officer_description')?></p>
            </div>
        </div>


        <?php endwhile; ?>

        <?php else : ?>

            <h1 style="text-align: center;">Please Add Officers to the page.</h1>

         <?php endif; wp_reset_postdata(); // Clost loop, if, post data settings ?> 

    </div>

<?php get_footer(); ?>