<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas position-right" id="off-canvas" data-off-canvas data-transition="overlap">
	<button class="close-button" aria-label="Close menu" type="button" data-close>
		  <span aria-hidden="true">
		  	<svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"><path d="M18.5293 6L6.5293 18M6.5293 6L18.5293 18" stroke="#112E3D" stroke-linecap="round" stroke-linejoin="round"/></svg>
		  </span>
	</button>
	<?php joints_top_nav(); ?>	
	<?php joints_button_nav(); ?>	
	<?php if ( is_active_sidebar( 'offcanvas' ) ) : ?>
		<?php dynamic_sidebar( 'offcanvas' ); ?>
	<?php endif; ?>
</div>
