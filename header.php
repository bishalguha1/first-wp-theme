<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta <?php bloginfo("charset") ?>>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo("name") ?></title>
    <?php wp_head() ?>
</head>
<body <?php body_class(array('bishal_class')); ?>>
    <!-- Header Part -->
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header>
                        <div class="logo text-center">
                            <?php the_custom_logo(); ?>;
                        </div>
                        <h2><a href="<?php echo site_url(); ?>"><?php echo get_bloginfo("name") ?></a></h2>
                        <h5><?php echo get_bloginfo("description") ?></h5>
                        <!-- Navbar -->
                        <div class="nav_bar">
                            <nav>
                                <?php
                                wp_nav_menu([
                                    'theme_location' => 'Primary'
                                ]);
                                ?>
                            </nav>
                        </div>
                    </header>
                </div>
            </div>

        </div>
    </div>
    