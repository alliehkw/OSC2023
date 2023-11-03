<!-- SINGLE BLOG POST  -->
<!-- ADD BREADCRUMB ?? ASK STEVE  -->
<!-- ADD READ MORE GENEVA HAS SNIPPER  -->
<!-- add grid container and add READ MORE section  -->

<?php 
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>
			
<div class="content">

	<div class="inner-content">

		<main class="main" role="main">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<header class="article-header">
						<h1 class="title"><?php the_title(); ?></h1>	
						<?php get_template_part( 'parts/content', 'byline' ); ?>				
					</header> <!-- end article header -->	
				</div>
			</div>
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="medium-2 cell">
						<div class="share-sidebar">
							<p>Share this page</p>
							<?php social_sharing_buttons(); ?>
						</div>
					</div>

					<div class="medium-8 cell">
		
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'parts/loop', 'single' ); ?>
					    	
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'parts/content', 'missing' ); ?>

					    <?php endif; ?>
					</div>
					<div class="medium-12 cell">
						<div class="post-navigation">
							<div class="grid-x">
								<div class="medium-6 cell">
									<div class="prev">
										<?php
										$prev_post = get_previous_post();
										if($prev_post) {
										   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
										   echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" ">'. $prev_title . '</a>' . "\n";
										                }
										?>
									</div>
								</div>
								<div class="medium-6 cell">
									<div class="next">
										<?php
										$next_post = get_next_post();
										if($next_post) {
										   $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
										   echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" ">'. $next_title . '</a>' . "\n";
										                }
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->
<?php wp_link_pages(); ?>
<!-- <?php edit_post_link(__('Edit'), '', '', null, 'button edit-post-button'); ?> -->
<?php get_footer(); ?>