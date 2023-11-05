<?php
/**
 * The template part for displaying a grid of posts
 *
 * For more info: http://jointswp.com/docs/grid-archive/
 */

// Adjust the amount of rows in the grid
// FORMATING FOR HOW A BLOG CARD LOOKS WHEN IN A GRID
$grid_columns = 3; ?>

<!-- <?php if( 0 === ( $wp_query->current_post  )  % $grid_columns ): ?> -->

    <!-- <div class="grid-x grid-margin-x grid-padding-x archive-grid" data-equalizer> Begin Grid  -->

<!-- <?php endif; ?>  -->

		<!--Item: -->
		<!-- <div class="small-12 medium-6 large-4 cell panel" data-equalizer-watch> -->
			<div class="article-container">
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
			<div class="image-and-header">
    <?php 
    // Get the URL of the post thumbnail.
    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

    // Check if the URL is not empty.
    if ( !empty($thumbnail_url) ): ?>
        <section class="featured-image" itemprop="text">
            <?php the_post_thumbnail('full'); ?>
        </section> <!-- end article section -->
    <?php endif; ?>
    
    <header class="article-header">
        <?php get_template_part( 'parts/content', 'byline' ); ?>
        <div class="title-box">    
            <h5 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>    
        </div>
    </header> <!-- end article header -->        
</div>

								
				<section class="entry-content" itemprop="text">
					<?php joints_excerpt_more(); ?>
				</section> <!-- end article section -->
								    							
			</article> <!-- end article -->
</div>
			
		<!-- </div> -->

<!-- <?php if( 0 === ( $wp_query->current_post + 1 )  % $grid_columns ||  ( $wp_query->current_post + 1 ) ===  $wp_query->post_count ): ?> -->

   <!-- </div>  End Grid  -->

<!-- <?php endif; ?> -->

