<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas position-top" id="off-canvas" data-off-canvas>
	<button class="close-button" aria-label="Close menu" type="button" data-close>
  		<span aria-hidden="true">&times;</span>
	</button>
	<?php joints_top_nav(); ?>	
	<?php if ( is_active_sidebar( 'offcanvas' ) ) : ?>

		<?php dynamic_sidebar( 'offcanvas' ); ?>

	<?php endif; ?>

</div>
