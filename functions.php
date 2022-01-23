<?php 

// Theme Bootstrapping
function factos_bootstrapping(){
    load_theme_textdomain('factos');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    $factos_header_text_color = array(
        'header-text' => true,
        'default-text-color' => "#222"
    );
    add_theme_support('custom-header' , $factos_header_text_color);

    $factos_custom_logo = array(
        'height'               => 100,
        'width'                => 100,
        'flex-height'          => true,
        'flex-width'           => true
    );
    add_theme_support('custom-logo' , $factos_custom_logo);
}
add_action('after_setup_theme', 'factos_bootstrapping');

function factos_assets(){
    wp_enqueue_style('main_css' , get_stylesheet_uri());

    wp_enqueue_style( 'bootstrap', get_theme_file_uri('assets/css/bootstrap.min.css'));
    wp_enqueue_style( 'featherlight-css', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css');
	
	wp_enqueue_script( 'popper-js', get_theme_file_uri('assets/js/popper.min.js'));
	// wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-3.6.0.min.js' , array('jquery') , true);
	wp_enqueue_script( 'featherlight-js', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js' , array('jquery') , '1.0.0' , true);
    wp_enqueue_script('main-js' , get_theme_file_uri('assets/js/main.js') , array('jquery' , 'featherlight-js') , '1.0.0' , true);
	
}

add_action('wp_enqueue_scripts' ,'factos_assets');

// Register Nav Menus

register_nav_menus([
    'Primary' => __('Primary Menu', 'factos'),
    'Footer' => __('Footer menu' , 'factos')
]);

// Add class to menu item
function factos_menu_item_css($classes , $item){
    $classes[] = 'list-inline-item';
    return $classes;
}

add_filter('nav_menu_css_class' , 'factos_menu_item_css' , 10 , 2);

//Sidebar Registration
function factos_sidebar() {
    register_sidebar( array(
        'name'          => __( 'Single Post Sidebar', 'factos' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'This sidebar is for single post page', 'factos' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    // Footer left wiget
    register_sidebar( array(
        'name'          => __( 'Footer Left', 'factos' ),
        'id'            => 'footer-left',
        'description'   => __( 'Footer left sidebar', 'factos' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    // Right left wiget
    register_sidebar( array(
        'name'          => __( 'Footer Right', 'factos' ),
        'id'            => 'footer-right',
        'description'   => __( 'Footer right sidebar', 'factos' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'factos_sidebar' );


// Password protected post management

function factos_excerpt($excerpt){
    if(!post_password_required()){
        return $excerpt;
    }else{
       echo get_the_password_form();
    };
}
add_filter('the_excerpt', 'factos_excerpt');

// Remove protected text from ttitle
function factos_protected_change (){
    return '%s';
};
add_filter('protected_title_format', 'factos_protected_change');

// Theme custom header image setting

function factos_header_img(){
        if(current_theme_supports('custom-header')){
            ?>
                <style>
                    .header-area{
                        background-image: url(<?php echo header_image(); ?>);
                        background-size: cover;
                        background-repeat: no-repeat;
                    }

                    header h2 a{
                        color: #<?php echo get_header_textcolor();?>;
                        
                        <?php
                            if(!display_header_text()){
                                echo 'display:none';
                            }
                        ?>
                    }
                </style>
            <?php
        }

}

add_action('wp_head' , 'factos_header_img');

// remove a class from body_class
// function factos_body_class($classes){
//     unset($classes[array_search('wp-custom-logo' , $classes)]);
//     return $classes;
// }
// add_filter('body_class', 'factos_body_class');