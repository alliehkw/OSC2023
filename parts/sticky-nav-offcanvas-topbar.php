<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div data-sticky-container>
	<div class="top-bar" id="top-bar-menu" data-sticky data-sticky-on="small" data-options="marginTop:0;" style="width:100%">
		<div class="header-container">
			<div class="top-bar-left float-left">
				<ul class="menu">
					<li class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-colored-1.svg ?>"/></a></li>
				</ul>
			</div>
			<div class="top-bar-right">
				<?php joints_top_nav(); ?>
				<?php joints_button_nav(); ?>	
			</div>
			<div class="top-bar-right float-right">
			<!-- TO DO : make sure hamberger happens on both tablet and mobile. currently its only on tablet  -->
			<!-- i need to adjust something with "show-for-medium" and "show-for-small-only" i think  -->
				<ul class="menu">
					<li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
				</ul>
			</div>
		</div>
	</div>
</div>
