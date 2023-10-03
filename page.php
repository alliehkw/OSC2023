<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>
	<div id="content" class="content">
	
		<div class="inner-content">
	
		    <main id="main" class="main" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'page' ); ?>
			    
			    <?php endwhile; endif; ?>							
			    					
			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->
<?php wp_link_pages(); ?>
<?php edit_post_link(__('Edit'), '', '', null, 'button edit-post-button'); ?>
<?php get_footer(); ?>