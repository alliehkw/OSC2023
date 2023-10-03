<?php 
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
}
add_filter('acf/fields/flexible_content/layout_title/name=content_blocks', 'my_acf_fields_flexible_content_layout_title', 10, 4);
function my_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {
	    
	    // load text sub field
		$blockTitle = '';
	    if( get_sub_field('block_title') ) {
	    	$text = get_sub_field('block_title');
	        $blockTitle .= $text;
	        //Add sub field to block title
	        $title .= ': <b>' . $blockTitle . '</b>';
	    } elseif(get_sub_field('title')) {
	    	$text = get_sub_field('title');
	    	$blockTitle .= $text;
	        //Add sub field to block title
	        $title .= ': <b>' . $blockTitle . '</b>';
	    } 

	    return $title;	
}