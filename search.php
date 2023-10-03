<?php 
/**
 * The template for displaying search results pages
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */
 	
get_header(); ?>
			
	<div class="content">

		<div class="inner-content">
	
			<main class="main" role="main">
				<div class="grid-container">
					<header>
						<h1 class="page-title"><?php _e( 'Search Results for:', 'jointswp' ); ?> <?php echo esc_attr(get_search_query()); ?></h1>
					</header>
					<div class="grid-x grid-padding-x">
		    			
		    
		    			<div class="medium-9 cell">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						 
								<!-- To see additional archive styles, visit the /parts directory -->
								<?php get_template_part( 'parts/loop', 'archive' ); ?>
							    
							<?php endwhile; ?>	

								<?php joints_page_navi(); ?>
								
							<?php else : ?>
							
								<?php get_template_part( 'parts/content', 'missing' ); ?>
									
						    <?php endif; ?>
						</div>
						<div class="medium-3 cell">
							<?php get_sidebar(); ?>
						</div>
					</div>
				</div>
	
		    </main> <!-- end #main -->
		
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
