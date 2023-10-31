<?php 
/**
 * The sidebar containing the main widget area
 */
 ?>

<div id="our-research" class="sidebar small-12 medium-3 large-3 cell" role="complementary">

	<?php if ( is_active_sidebar( 'our-research' ) ) : ?>

		<?php dynamic_sidebar( 'our-research' ); ?>

	<?php endif; ?>

</div>