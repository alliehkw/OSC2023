<!-- SINGLE BLOG POST  -->
<!-- ADD BREADCRUMB ?? ASK STEVE  -->

<?php 
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>
			
<div class="content">

	<div class="inner-content">

		<main class="main" role="main">
			<div class="grid-container">
				<div class="grid-x grid-padding-x single-article">

					<div class="large-7 cell">
					<header class="article-header">
						<!-- TO DO : add in "BY" section for single posts  -->
						<?php get_template_part( 'parts/content', 'byline-single' ); ?>	
						<h2 class="title"><?php the_title(); ?></h2>	
									
					</header>
		
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'parts/loop', 'single' ); ?>
					    	
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'parts/content', 'missing' ); ?>

					    <?php endif; ?>
					</div>
					<div class="large-4 cell">
					<?php if(function_exists('joints_related_posts')) {
						joints_related_posts(); 
					} ?>
					</div>
				</div>
			</div>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->
