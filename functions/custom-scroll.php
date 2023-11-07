<?php function enqueue_custom_scripts() {

    // Enqueue custom scroll script
    wp_enqueue_script('custom-scroll', get_template_directory_uri() . '/assets/scripts/js/custom-scroll.js', array('jquery'), '1.0.0', true);
    
    // Localize the script with new data
    wp_localize_script('custom-scroll', 'pageData', array(
        'isBlogPage' => is_home(),
        'isCategoryPage' => is_category(),
        'isSinglePage' => is_single(),
        'templateUrl' => get_template_directory_uri()
    ));
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
