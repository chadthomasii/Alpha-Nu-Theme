<?php get_header(); ?>



<!-- Get Archive Title -->
<div class="content-heading animated fadeInDown">
    <h1>"<?php the_archive_title() ?>"</h1>
</div>

<!-- Print Out the Posts -->

<div class="all-news">

    <div class="all-articles">
        <a href="/">
            <div class="all-articles-single">
                <div class="all-article-thumbnail">
                    <div class="thumbnail-image">
                        <img src="<?php echo get_template_directory_uri() . '/img/landing.jpg'?>"/>
                    </div>
                </div>

                <div class="all-article-content">
                    <div class="all-news-title">
                        <h1>The History Of The Alpha Nu Chapter</h1>
                    </div>

                    <div class="all-news-content">
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                            Sed aut magni, repellat sit architecto sapiente dolores adipisci sint 
                            libero hic tenetur voluptate sequi qui vel! Vel tempore neque dicta nulla!
                        </p>
                    </div>
                    
                    <div class="all-news-date">
                        <p style="font-weight: bold;">2.2.19 // Spring19 | A&T</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="/">
            <div class="all-articles-single">
                <div class="all-article-thumbnail">
                    <div class="thumbnail-image">
                        <img src="<?php echo get_template_directory_uri() . '/img/landing.jpg'?>"/>
                    </div>
                </div>

                <div class="all-article-content">
                    <div class="all-news-title">
                        <h1>The History Of The Alpha Nu Chapter</h1>
                    </div>

                    <div class="all-news-content">
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                            Sed aut magni, repellat sit architecto sapiente dolores adipisci sint 
                            libero hic tenetur voluptate sequi qui vel! Vel tempore neque dicta nulla!
                        </p>
                    </div>
                    
                    <div class="all-news-date">
                        <p style="font-weight: bold;">2.2.19 // Spring19 | A&T</p>
                    </div>
                </div>
            </div>
        </a>

     
        


    </div>
    


    <div class="all-news-sidebar">
        <h1>Sidebar</h1>
    </div>


</div>




<?php
// if ( have_posts() ) : while ( have_posts() ) : the_post();
//         the_title();
//         the_content();
//     endwhile;
//     else :
//         echo '<h1>Sorry, there are no posts</h1>';
//     endif;
?>

<?php get_footer(); ?>