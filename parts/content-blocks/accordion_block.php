<div class="content-block accordion-block">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
				<?php if( have_rows('accordion_block') ): while( have_rows('accordion_block') ) : the_row(); ?>
				  <li class="accordion-item" data-accordion-item>
				    <a href="#" class="accordion-title"><?php the_sub_field('section_title'); ?></a>
				    <div class="accordion-content" data-tab-content>
				    	<?php the_sub_field('section_content'); ?>
				    </div> 
				  </li>
				<?php endwhile; endif; ?>
				</ul>
			</div>
		</div>
	</div>	
</div>