<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */
// THIS SHOWS ALL BLOG POSTS 
get_header(); ?>
			
	<div class="content">
	
		<div class="inner-content">
	
		    <main class="main" role="main">
		    	<div class="grid-container">
		    		<div class="grid-x grid-padding-x">
					<header class="blog-header">
						
						<h1 class="page-title">Blog</h1>
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
										<!-- Need to create and call for custom nav like u did for sidenav  -->
										<!-- To see additional archive styles, visit the /parts directory -->
										<!-- This is where you style the blog cards  -->
										<?php get_template_part( 'parts/loop', 'archive-grid' ); ?>
										
									<?php endwhile; ?>	
									<?php else : ?>
																
										<?php get_template_part( 'parts/content', 'missing' ); ?>
											
									<?php endif; ?>
									
								</div>
								<!-- This is pagination  -->
								<?php joints_page_navi(); ?>
						</div>
					</div>
				</div>														
		    </main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>