<?php 
/**
 * The sidebar containing the main widget area
 */
 ?>

<div id="patient-education" class="sidebar small-12 medium-3 large-3 cell" role="complementary">

	<?php if ( is_active_sidebar( 'patient-education' ) ) : ?>

		<?php dynamic_sidebar( 'patient-education' ); ?>

	<?php endif; ?>

</div>