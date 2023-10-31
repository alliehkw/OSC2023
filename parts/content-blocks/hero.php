<?php 
$supertitle = get_sub_field('supertitle');
$title = get_sub_field('title');
$height = get_sub_field('hero_height')
?>
<div class="hero content-block <?php echo $height ?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="medium-8 cell">
				<p class="allCaps"><?php echo $supertitle ?></p>
				<h1><?php echo $title ?></h1>
				<div class="cta-container">
					<?php if( have_rows('ctas') ): while( have_rows('ctas') ) : the_row(); 
						$link = get_sub_field('cta');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						endif;
					?>
					<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo $link_title ?>"><?php echo $link_title; ?></a>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>