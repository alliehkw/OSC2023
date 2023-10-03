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
					<li><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li>
				</ul>
			</div>
			<div class="top-bar-right show-for-medium">
				<?php joints_top_nav(); ?>	
			</div>
			<div class="top-bar-right float-right show-for-small-only">
				<ul class="menu">
					<li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
				</ul>
			</div>
		</div>
	</div>
</div>