<?php
/**
 * The template part for displaying a grid of posts
 *
 * For more info: http://jointswp.com/docs/grid-archive/
 */

$grid_columns = 3; ?>

	<!--Item: -->
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
					</section>
				<?php endif; ?>
				
				<header class="article-header">
					<?php get_template_part( 'parts/content', 'byline' ); ?>
					<div class="title-box">    
						<h5 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>    
					</div>
				</header>    
			</div>				
			<section class="entry-content" itemprop="text">
				<?php joints_excerpt_more(); ?>
			</section>													
		</article>
	</div>