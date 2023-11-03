<?php
/**
 * Displays archive pages if a speicifc template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
// USE THIS FOR "FILTERED" BLOG POSTS
// SHOWS ALL OF THE POSTS 
// ADD FEATURED BLOG POST 
// ADD IN BLOG MENU 
get_header(); ?>
			
	<div class="content">
	
		<div class="inner-content">
		
		    <main class="main" role="main">
		    	<div class="grid-container">
		    		<div class="grid-x grid-padding-x">
			    
		    	<header>
					<!-- Might need to filter out how this shows up -- could say "archieve: blah blah"  -->
		    		<h1 class="page-title"><?php the_archive_title();?></h1>
					<?php the_archive_description('<div class="taxonomy-description">', '</div>');?>
		    	</header>

		    	<div class="medium-9 cell">
		
		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 
					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive-grid' ); ?>
				    
				<?php endwhile; ?>	

					<?php joints_page_navi(); ?>
					
				<?php else : ?>
											
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
				<?php endif; ?>
			</div>
			<div class="medium-3 cell">
				<?php get_sidebar(); ?>
			</div>
		
			</main> <!-- end #main -->

	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>