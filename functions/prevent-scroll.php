<?php function enqueue_custom_js() {
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/scripts/js/prevent-scroll.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_js');

