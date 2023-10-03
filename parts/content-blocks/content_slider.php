<div class="content-slider content-block">
	<div class="grid-container">
			<?php if( have_rows('slide') ): ?>
			<div class="content-slider-container">
				<?php while( have_rows('slide') ) : the_row(); ?>
					<div class="slide grid-x grid-padding-x">
						<div class="small-12 cell">
							<?php $content = get_sub_field('content'); ?>
							<?php echo $content ?>
						</div>
					</div>
				<?php endwhile ?>
			</div>
			<?php endif ?>
	</div>
</div>