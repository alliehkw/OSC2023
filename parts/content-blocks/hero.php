<?php 
$supertitle = get_sub_field('supertitle');
$title = get_sub_field('title');
$text = get_sub_field('subtitle');
$bg = get_sub_field('bg_color');
?>
<div class="hero content-block">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="medium-6 cell">
				<p><?php echo $supertitle ?></p>
				<?php echo $title ?>
				<?php echo $text ?>
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
			<div class="medium-6 cell">
				<?php $imageobject = get_sub_field('image'); ?>
                <?php if( !empty($imageobject) ): ?>
                <img alt="<?php echo $imageobject['title'] ?>" src="<?php echo $imageobject['sizes']['large'] ?>" srcset="<?php echo $imageobject['sizes']['medium_large'] ?> <?php echo $imageobject['sizes']['medium_large-width'] ?>w, <?php echo $imageobject['sizes']['medium'] ?> <?php echo $imageobject['sizes']['medium-width'] ?>w, <?php echo $imageobject['sizes']['thumbnail'] ?> <?php echo $imageobject['sizes']['thumbnail-width'] ?>w">
                <?php endif; ?>
			</div>
		</div>
	</div>
</div>