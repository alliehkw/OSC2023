<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); ?>
			
	<div class="content">
	
		<div class="inner-content">
	
		    <main class="main" role="main">
		    	<div class="grid-container">
		    		<div class="grid-x grid-padding-x">
		    			<div class="medium-12 cell">
						    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						 
								<!-- To see additional archive styles, visit the /parts directory -->
								<?php get_template_part( 'parts/loop', 'archive-grid' ); ?>
							    
							<?php endwhile; ?>	

								<?php joints_page_navi(); ?>
								
							<?php else : ?>
														
								<?php get_template_part( 'parts/content', 'missing' ); ?>
									
							<?php endif; ?>
						</div>
					</div>
				</div>														
		    </main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>