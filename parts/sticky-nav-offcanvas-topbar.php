<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<!-- // Apply homepage-class to nav bar if on homepage to allow for proper color formatting  -->
<div data-sticky-container class="<?php echo (is_home() || is_front_page()) ? 'homepage-class' : ''; ?>">
	<div class="top-bar" id="top-bar-menu" data-sticky data-sticky-on="small" data-options="marginTop:0;" style="width:100%">
		<div class="header-container">
			<div class="top-bar-left float-left">
				<ul class="menu">
					<li class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-colored-2.svg ?>"/></a></li>
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
