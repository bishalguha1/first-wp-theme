<?php get_header(); ?>

<?php 
    $factos_sidebar_check = 'col-md-8';
    if(!is_active_sidebar('sidebar-1')){
        $factos_sidebar_check = 'col-md-10 offset-md-1';
    }
?>


    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mb-5 mt-5 w-100">
                <div class="search-form">
                    <?php 
                        if(is_search()):
                    ?>
                    <h4>You searched for: <?php echo the_search_query(); ?></h4>


                    <?php
                        endif;
                    ?>
                    <?php 
                        echo get_search_form();
                    ?>
                    <h3>
                        your search result is: <?php  echo the_search_query(); ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Main container -->
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_html($factos_sidebar_check); ?>">
                <div class="post-area">
                    <!-- Post loop -->
                    <?php
                    if (have_posts()) :
                        while (have_posts()) :
                            the_post();
                    ?>
                    <div class="single_post_wrapper">
                        <div class="post-img">
                                <?php
                                echo '<a class="popup" href="#" data-featherlight="image">';
                                the_post_thumbnail('large' , ['class' => 'img-fluid']);
                                echo '</a>';
                                ?>
                        </div>
                        <a href="<?php echo the_permalink(); ?>">
                            <h2 class="post_title"><?php the_title(); ?></h2>
                        </a>
                        <p class="post_meta">
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
                               the_excerpt();
                            ?>
                        </p>
                    </div>

                    <?php
                        endwhile;
                    endif;

                    ?>
                </div>
                <div class="col-md-12">
                    <div class="pagination">
                        <?php echo the_posts_pagination(array(
                                'prev_text' => __( 'Back', 'factos' ),
                                'next_text' => __( 'Onward', 'factos' ),
                        )) ?>
                    </div>
                </div>
            </div>
            
            <?php 
                if(is_active_sidebar('sidebar-1')):
            ?>
            <div class="col-md-4">
                <div class="sidebar-area">
                    <?php 
                        if(is_active_sidebar('sidebar-1')){
                            dynamic_sidebar('sidebar-1');
                        }
                    ?>
                </div>
            </div>

            <?php
                endif;
            ?>

        </div>


    </div>

    <?php get_footer(); ?>