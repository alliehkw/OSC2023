<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			
	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

//ACF Utilities
require_once(get_template_directory(). '/functions/acf-utilities.php');

// Adds site styles to the WordPress editor
require_once(get_template_directory().'/functions/editor-styles.php'); 

// Social Sharing
require_once(get_template_directory().'/functions/sharing.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
require_once(get_template_directory().'/functions/admin.php'); 

// Get rid of the "Archive: " in front of the title name
require_once(get_template_directory().'/functions/get-the-archive-title.php'); 

// Include the custom-scroll.php file to detect our scroll position
require get_template_directory() . '/functions/custom-scroll.php';

// Include vimeo api so we can detect when the home page video ends and bring back the poster 
function enqueue_vimeo_player_api() {
    wp_enqueue_script('vimeo-player-api', 'https://player.vimeo.com/api/player.js', array(), null, false);
}
add_action('wp_enqueue_scripts', 'enqueue_vimeo_player_api');


