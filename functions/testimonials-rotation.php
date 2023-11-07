<?php

function enqueue_custom_scripts() {
    // Enqueue jQuery, WordPress includes it by default
    wp_enqueue_script('jquery');

    // Enqueue the testimonials rotator script
    wp_enqueue_script('testimonials-rotator', get_template_directory_uri() . '/assets/scripts/js/testimonials-rotator.js', array('jquery'), '1.0.0', true);

    // Pass to the testimonials rotator script
    $testimonials_data_array = array(
        // 'key' => 'value' // Sample data
    );

    // Localize the testimonials rotator script with data
    wp_localize_script('testimonials-rotator', 'testimonialData', $testimonials_data_array);
}

// Hook the above function into the wp_enqueue_scripts action
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


