<?php 
$supertitle = get_sub_field('supertitle');
$title = get_sub_field('title');
$height = get_sub_field('hero_height');
$heroType = get_sub_field('hero_type');
$heroVideo = get_sub_field('video_short_code');
?>

<?php if ($heroType == "standard") :
	echo '<div class="hero content-block ' . $height . '">';
		echo '<div class="grid-container">';
			echo '<div class="grid-x grid-padding-x align-center">';
				echo '<div class="medium-8 cell">';
					echo '<p class="allCaps">' . $supertitle . '</p>';
					echo '<h1>' . $title;
				echo '</h1>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
	else :
		$videoEmbed = get_sub_field('video_embed');
		$poster = get_sub_field('video_poster')['url'];

	echo '<div class="video-container">';
		echo $videoEmbed;
		echo '<div class="video-poster" style="background-image: url('. $poster .')">';
		echo '<div class="text-overlay" style="display: flex; align-items: center; justify-content: center; height: 100%; z-index: 3;">';
				echo '<div class="text-content-video-hero">';
					echo $title;
					echo '<div class="play-button">';
						echo '<div class="button-triangle">
					</div>';
				echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
endif; 
?>
