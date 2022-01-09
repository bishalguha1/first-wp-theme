<?php get_header(); ?>



    <!-- Main container -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post-area">
                    <!-- Post loop -->
                   
                    <div class="single_post_wrapper">
                        <div class="post-img">
                            <a href="<?php echo the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    // $thumbnail_url = get_the_post_thumbnail_url(null , 'large');

                                    // echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                                    echo '<a class="popup" href="#" data-featherlight="image">';
                                    the_post_thumbnail('large' , ['class' => 'img-fluid']);
                                    echo '</a>';
                                };
                                ?>
                            </a>
                        </div>
                        <a href="<?php echo the_permalink(); ?>">
                            <h2 class="post_title text-center"><?php the_title(); ?></h2>
                        </a>
                        <p class="post_meta text-center">
                            <span>Category :
                                <?php
                                $Categories = get_the_category();
                                $Seperator = ' | ';
                                $result = ' ';

                                if ($Categories) {
                                    foreach ($Categories as $Category) {
                                        $result .= '<a href="' . get_category_link($Category->term_id) . '">' . $Category->cat_name . '</a>' . $Seperator;
                                    }

                                    echo trim($result, $Seperator);
                                }
                                ?>
                            </span>
                            <span>Time: <?php the_time(); ?></span>
                            <span>
                               Tag: <?php echo get_the_tag_list('<span>' , '/' , '</span>'); ?>
                            </span>
                        </p>
                        <p class="post-content">
                            <?php 
                                the_content();

                                next_post_link();
                                echo "<br>";
                                previous_post_link();
                            ?>
                        </p>
                    </div>

                </div>

            
                <div class="comment-box">
                    <?php 
                        if(comments_open()):
                            comments_template();
                        endif;
                    ?>
                </div>

                
            </div>

            <div class="col-md-4">
                <div class="sidebar-area">
                    <?php 
                        if(is_active_sidebar('sidebar-1')){
                            dynamic_sidebar('sidebar-1');
                        }
                    ?>
                </div>
            </div>
        </div>


    </div>

    <?php get_footer(); ?>