<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<!-- // Apply homepage-class to nav bar if on homepage to allow for proper color formatting  -->
<div data-sticky-container class="<?php echo (is_front_page()) ? 'homepage-class' : ''; ?><?php echo (is_home() || is_category()) ? ' blogpage-class' : ''; ?>">
	<div class="top-bar" id="top-bar-menu" data-sticky data-sticky-on="small" data-options="marginTop:0;" style="width:100%">
		<div class="header-container">
			<div class="inner-header">
				<div class="top-bar-left float-left">
					<ul class="menu">
						<li class="logo">
							<a href="<?php echo home_url(); ?>">
							<?php if ( is_home() ): ?>
								<!-- If is_home() is true, use a different image -->
								<img class="image-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-colored-1.svg" alt="Logo"/>
							<?php elseif ( is_category() ): ?>
								<!-- If is_category() is true, use a different image -->
								<img class="image-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-colored-1.svg" alt="Logo"/>
							<?php else: ?>
								<!-- If is_home() is false, use the default image -->
								<img class="image-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-colored-2.svg" alt="Logo"/>
							<?php endif; ?>
							</a>
						</li>
					</ul>
				</div>
				<div class="top-bar-right">
					<?php joints_top_nav(); ?>
					<?php joints_button_nav(); ?>	
				</div>
				<div class="top-bar-right float-right">
					<ul class="menu">
						<li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
