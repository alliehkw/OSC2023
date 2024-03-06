<?php  function my_theme_enqueue_scripts() {
    // Assuming you have the JavaScript file in the theme's js directory
    wp_enqueue_script('my-video-handler', get_template_directory_uri() . '/js/video-hero.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts'); ?>
