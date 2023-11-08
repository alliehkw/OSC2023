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
		echo '<div class="video-container" style="position: relative; width: 100%; height: 100%; z-index: 1;">';
			echo $heroVideo;
			echo '<div class="grid-container" style="pointer-events: none;">';
				echo '<div class="grid-x grid-padding-x align-center" style="pointer-events: none;">';
		echo '<div class="large-8 cell medium-12" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; z-index: 2; pointer-events: none;">';
						echo '<div class="text-overlay" style="pointer-events: none;">';
							echo '<div class="text-content-video-hero">';
								echo '<p class="allCaps">' . $supertitle . '</p>';
								echo '<h1>' . $title . '</h1>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
		// echo '<div class="video-container" style="position: relative; width: 100%; height: 100%; z-index: 1;">';
		// 	echo $heroVideo;
		// 	echo '<div class="grid-container">';
		// 		echo '<div class="grid-x grid-padding-x align-center">';
		// 			echo '<div class="large-8 cell medium-12" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; z-index: 2;">';
		// 				echo '<div class="text-overlay" >';
		// 					echo '<div class="text-content-video-hero">';
		// 						echo '<p class="allCaps">' . $supertitle . '</p>';
		// 						echo '<h1>' . $title . '</h1>';
		// 					echo '</div>';
		// 				echo '</div>';
		// 			echo '</div>';
		// 		echo '</div>';
		// 	echo '</div>';
		// echo '</div>';
endif; 
?>
