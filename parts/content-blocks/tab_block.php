<div class="content-block tab-block">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<ul class="tabs" data-tabs id="tab-block">
					<?php $tabCount = 0 ?>
				  	<?php if( have_rows('tab_block') ): while( have_rows('tab_block') ) : the_row(); ?>
					  <li class="tabs-title <?php if ($tabCount == 1) {?> is-active<?php }?>"><a href="#panel<?php echo $tabCount ?>" aria-selected="true"><?php the_sub_field('section_title'); ?></a></li>
					  <?php $tabCount++ ?>
					<?php endwhile; endif; ?>
				</ul>
				<div class="tabs-content" data-tabs-content="tab-block">
					<?php $panelCount = 0 ?>
					<?php if( have_rows('tab_block') ): while( have_rows('tab_block') ) : the_row(); ?>
					  <div class="tabs-panel <?php if ($panelCount == 1) {?> is-active<?php }?>" id="panel<?php echo $panelCount ?>">
					  	<?php the_sub_field('section_content'); ?>
					  </div>
					  <?php $panelCount++ ?>
				  	<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>	
</div>