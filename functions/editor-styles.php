<?php
// Adds your styles to the WordPress editor
add_action( 'init', 'add_editor_styles' );
function add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/assets/styles/style.css' );
}

function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

function my_mce_before_init( $settings ) {
   $style_formats = array(
        array(
            'title' => 'H1 Style'
            ,'selector' => 'p, ul, span, a, h1, h2, h3, h4, h5, h6'
            ,'classes' => 'h1'
        )
        ,array(
            'title' => 'H2 Style'
            ,'selector' => 'p, ul, span, a, h1, h2, h3, h4, h5, h6'
            ,'classes' => 'h2'
        )
        ,array(
            'title' => 'H3 Style'
            ,'selector' => 'p, ul, span, a, h1, h2, h3, h4, h5, h6'
            ,'classes' => 'h3'
        )
        ,array(
            'title' => 'H4 Style'
            ,'selector' => 'p, ul, span, a, h1, h2, h3, h4, h5, h6'
            ,'classes' => 'h4'
        )
        ,array(
            'title' => 'H5 Style'
            ,'selector' => 'p, ul, span, a, h1, h2, h3, h4, h5, h6'
            ,'classes' => 'h5'
        )
        ,array(
            'title' => 'H6 Style'
            ,'selector' => 'p, ul, span, a, h1, h2, h3, h4, h5, h6'
            ,'classes' => 'h6'
        )
    );
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}
add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );