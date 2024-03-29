<?php
/**
 * Displays archive pages if a speicifc template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
get_header(); ?>
			
	<div class="content">
	
		<div class="inner-content">
		
		    <main class="main" role="main">
		    	<div class="grid-container">
		    		<div class="grid-x grid-padding-x">
			    
						<header class="blog-header">
							<h2 class="page-title">Blog</h2>
						</header>
						<div class="medium-12 cell">
						<?php 
						/** Add this where you want the content blocks to show up */
							$archive_id = get_option( 'page_for_posts', false );
							if ( false !== $archive_id ) {
								if ( have_rows( 'content_blocks', $archive_id ) ) :
									// loop through the rows of data
									while ( have_rows( 'content_blocks', $archive_id ) ) : the_row();

										get_template_part( 'parts/content-blocks/' . get_row_layout() );

									endwhile;
								endif;
							}
						?>
						<!-- Blog categories nav  -->
						<div class="blog-categories-container">
						<?php
							echo '<p class="category">Category:</p>';
							echo '<div class="blog-categories">';
								wp_nav_menu( array( 'theme_location' => 'blog-categories' ) );
							echo '</div>';
						?>
						</div>
						
							<div class="article-loop">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
									<!-- To see additional archive styles, visit the /parts directory -->
									<?php get_template_part( 'parts/loop', 'archive-grid' ); ?>
									
								<?php endwhile; ?>	
									
								<?php else : ?>
															
									<?php get_template_part( 'parts/content', 'missing' ); ?>
										
								<?php endif; ?>
							</div>
							<?php joints_page_navi(); ?>
						</div>
						<?php get_sidebar(); ?>
					</div>
				</div>
		
			</main> <!-- end #main -->

	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>						