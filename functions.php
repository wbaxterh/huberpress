<?php
include get_template_directory() . '/classes/bootstrap-navwalker.php';

function my_custom_theme_setup() {
    // Make sure the title tag & custom logo are added
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );

    // Register nav menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'my-custom-theme' ),
    ) );
   
}

add_action( 'after_setup_theme', 'my_custom_theme_setup' );

//Enqueue CSS files
function my_theme_enqueue_styles() {

    // Enqueue the main stylesheet
    wp_enqueue_style( 'huberpress-style', get_stylesheet_uri() );

    // Enqueue header stylesheet
    wp_enqueue_style( 'huberpress-header-style', get_template_directory_uri() . '/css/header.css', array(), '1.0', 'all' );
    
    // Enqueue footer stylesheet
    wp_enqueue_style('footer-style', get_stylesheet_directory_uri() . '/css/footer.css');

}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
?>