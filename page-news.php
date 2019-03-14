<?php get_header(); ?>

<?php get_template_part('template-parts/template','heading'); ?>

<?php 

    $query = new WP_Query( array( 'post_type' => 'post',
                                  'posts_per_page' => '1',) ); // Post loop settings ?> 

<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

<a href="<?php echo get_permalink()?>">
    <div class="news-featured-image" style="background:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url('<?php the_post_thumbnail_url()?>'); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;">
    
        <div>
            <h1><?php the_title(); ?></h1>
        </div>
        
    </div>
</a>

<?php endwhile; endif; ?>

<div class="featured-articles">

    
    <?php 

        $cat = get_category_by_slug("featured");

    
        $query = new WP_Query( array( 'post_type' => 'post',
                                        'posts_per_page' => '3',
                                        'category__not_in' => $cat->term_id) ); // Post loop settings ?> 
    
   
    <?php  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); //Start the post loop?> 
    <a href="<?php echo get_permalink()?>">
        <div class="featured-article">

            <div class="featured-article-image" style="background:url('<?php the_post_thumbnail_url()?>'); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;"></div>

            <div class="featured-article-body">
                <h3><?php the_title(); ?></h3>
                <?php the_excerpt(20); ?>
            </div>

            <?php 
            
                $category = get_the_category();
                $categories = '';
              

                //Get the categories of category element, loop through them
                for($i = 0; $i < count($category); $i++)
                {
                    if($i < 2)
                    {
                            //Does not add a "|" to the last element in the array
                        if($i != key(end($category)) || count($category) <= 1)
                        {
                            $categories .= $category[$i]->name .= " "; 
                        }

                        else
                        {
                            $categories .= $category[$i]->name . ' | ';
                        }
                    }
                    

                }

                
                // var_dump($category);
            ?>
            
            <div class="featured-article-date">
                <p><?php the_time('M')?> // <?php echo $categories; ?> </p>
            </div>

            
        </div>
    </a>

    <?php endwhile; ?>

    <?php else : ?>

        <h1 style="text-align: center;">Please Add Posts to the page.</h1>

    <?php endif; wp_reset_postdata(); // Clost loop, if, post data settings ?> 
    
   
</div>

<div class="more-news">
    <a href="<?php echo site_url() . '/' . date('Y') ?>">More News -></a>
</div>



<?php get_footer(); ?>