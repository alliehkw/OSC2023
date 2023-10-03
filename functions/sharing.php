<?php
//Social Sharing (Courtesy of Chrunchify.com)
function social_sharing_buttons() {
	global $post;
	if(is_singular() || is_home()){
	
		// Get current page URL 
		$postURL = urlencode(get_permalink());
 
		// Get current page title
		$postTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$postTitle.'&amp;url='.$postURL;
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$postURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$postURL.'&amp;title='.$postTitle;
		$websiteName = get_bloginfo('name');
  
		// Add sharing button at the end of page/page content
		echo '<div>';
		echo '<a href="mailto:?subject=Check out this story from ' . $websiteName .'.&amp;body=Check out this story from ' . $websiteName .': '. $postURL .'" title="Share by Email">Share by Email</a>';
		echo '<a href="'.$facebookURL.'" target="_blank">Facebook</a>';
		echo '<a href="'. $twitterURL .'" target="_blank">Twitter</a>';
		echo '</div>';	
	}
};