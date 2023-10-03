<?php
/**
 * The template for displaying 404 (page not found) pages.
 *
 * For more info: https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>
			
	<div class="content">

		<div class="inner-content">
	
			<main class="main" role="main">
				<div class="grid-container">
					<div class="grid-x grid-padding-x align-center">
						<div class="small-8 medium-6 cell">

							<article class="content-not-found">
							
								<header class="article-header">
									<h1 class="h3"><?php _e( 'Uh oh. That page isn&apos;t here.', 'jointswp' ); ?></h1>
								</header> <!-- end article header -->
								
								<section class="entry-content">
									<br />
									<p><?php _e( 'Maybe try a search?', 'jointswp' ); ?></p>
								</section> <!-- end article section -->

								<section class="search">
								    <p><?php get_search_form(); ?></p>
								</section> <!-- end search section -->
						
							</article> <!-- end article -->
							
						</div>
					</div>
				</div>
	
			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>