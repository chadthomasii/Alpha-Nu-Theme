<a href="<?php echo get_permalink() ?>">
    <div class="all-articles-single">
        <div class="all-article-thumbnail">
            <div class="thumbnail-image">
                <img src="<?php the_post_thumbnail_url() ?>"/>
            </div>
        </div>

        <div class="all-article-content">
            <div class="all-news-title">
                <h1><?php the_title() ?></h1>
            </div>

            <div class="all-news-content">
                <p><?php the_excerpt()?></p>
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
            <div class="all-news-date">
                <p style="font-weight: bold;"><?php the_time('m.j.y')?> // <?php echo $categories; ?></p>
            </div>
        </div>
    </div>
</a>