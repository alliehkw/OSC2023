<?php
function joints_related_posts() {
    global $post;
    $tags = wp_get_post_tags($post->ID);
    $cats = get_the_category($post->ID);
    $tag_arr = '';
    $cat_arr = '';

    if ($tags) {
        foreach ($tags as $tag) {
            $tag_arr .= $tag->slug . ',';
        }
        $args = array(
            'tag' => $tag_arr,
            'numberposts' => 3, // you can change this to show more
            'post__not_in' => array($post->ID)
        );
    } else {
        foreach ($cats as $cat) {
            $cat_arr .= $cat->slug . ',';
        }
        $args = array(
            'category_name' => $cat_arr,
            'numberposts' => 5, // you can change this to show more
            'post__not_in' => array($post->ID)
        );
    }

    $related_posts = get_posts($args);

    if ($related_posts) {
        echo __( '<h5 class="read-more">Read More</h5>', 'jointswp' );
        echo '<ul class="joints-related-posts">';
        foreach ($related_posts as $post) : setup_postdata($post);
            ?>
            <li class="related-post">
                <?php
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                if (!empty($thumbnail_url)) : ?>
                    <div class="related-post-image">
						<div class="image-container">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
							</a>
						</div>
                    </div>
                <?php endif; ?>
                <div class="related-post-text">
                    <?php get_template_part('parts/content', 'byline'); ?>
                    <h6 class="related-post-link"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
                </div>
            </li>
            <?php
        endforeach;
        echo '</ul>';
    }
    wp_reset_postdata();
} // end joints related posts function
?>
