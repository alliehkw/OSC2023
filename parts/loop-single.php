<?php
/**
 * Template part for displaying a single post
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
    <section class="entry-content" itemprop="text">
		<?php if( have_rows('content_blocks') ):
			    // loop through the rows of data
			    while ( have_rows('content_blocks') ) : the_row();

			        get_template_part( 'parts/content-blocks/' . get_row_layout() );

			    endwhile;

			else :

			the_content();

		endif; ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
		<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>	
	</footer> <!-- end article footer -->
													
</article> <!-- end article -->