<?php 
/*
* Template name: Page with header section
*/

?>


<?php get_header(); ?>
    <!-- Main container -->
<?php get_template_part('page-template\common\page-header-section'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
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
                        
                        <p class="page-content">
                            <?php the_content(); ?>
                        </p>
                    </div>

                </div>

                
            </div>
        </div>


    </div>

    <?php get_footer(); ?>