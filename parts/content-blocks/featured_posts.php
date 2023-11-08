<?php

echo '<div class="content-block featured-posts">';
    echo '<div class="grid-container">';
        echo '<div class="grid-x grid-margin-x">';
        if( have_rows ('featured_posts') ):
            while( have_rows ('featured_posts') ): the_row();
                    $display = get_sub_field('display_like_regular_post');
                        $postObject = get_sub_field_object('posts');
                        setup_postdata($postObject);
                        $postObject = $postObject['value'];
                        if(!$display) :
                            $postType = $postObject->post_type;
                            $fp_title = $postObject->post_title;
                            $post_type_obj = get_post_type_object( get_post_type($postObject) );
                            $post_type_title = apply_filters('post_type_archive_title', $post_type_obj->labels->name);
                            $categories = get_the_category($postObject); 
                            $category = $categories[0]->name;
                            $date = get_the_date('', $postObject->ID);

                            if($post_type_title != 'Posts') :
                                $fp_archive_title = $post_type_title; 
                            else :
                                $fp_archive_title = $category;
                            endif; 
                            if(has_excerpt($postObject)):
                                $fp_excerpt = get_the_excerpt($postObject);
                            else :
                                $fp_excerpt = strip_shortcodes( $postObject->post_content );
                                $fp_excerpt = apply_filters( 'the_content', $fp_excerpt );
                                $fp_excerpt = str_replace(']]>', ']]&gt;', $fp_excerpt);
                                $excerpt_length = apply_filters( 'excerpt_length', 45 );
                                $fp_excerpt = wp_trim_words( $fp_excerpt, $excerpt_length);
                            endif;
                            $image_id = get_post_thumbnail_id($postObject);
                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                            $fp_img = get_the_post_thumbnail_url($postObject, 'featured-thumbnail');
                            $link = get_the_permalink($postObject);
                            echo '<div class="cell">';
                                echo '<div class="post-card grid-x">';
                                    echo '<div class="cell small-12 medium-12 large-6">';
                                        echo '<div class="image">';
                                            echo '<img class="featured-image" src="' . $fp_img . '" alt="'. $image_alt . '" />';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class="cell small-12 medium-12 large-6">';
                                        echo '<div class="featured-post-text">';
                                            echo '<p class="featured-post">Featured Post</p>';
                                            echo '<h3>' . $fp_title . '</h3>';
                                            echo '<p class="excerpt">' . $fp_excerpt . '</p>';
                                            echo '<a class="read-more" href="' . $link . '" title="' . $fp_title . '">'. __('Read more &raquo;', 'jointswp') .'</a>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        else : 
                            // Set up the post data for the WP_Post object.
                            setup_postdata($GLOBALS['post'] =& $postObject);
                            $thumbnail_url = get_the_post_thumbnail_url($postObject->ID, 'full');
                            echo '<div class="article-container card_post cell large-4 medium-12">';
                                echo '<article id="post-' . esc_attr($postObject->ID) . '" ' . join(' ', get_post_class('', $postObject->ID)) . ' role="article">';
                                    echo '<div class="image-and-header">';
                                        if (!empty($thumbnail_url)) {
                                            echo '<section class="featured-image" itemprop="text">';
                                            echo get_the_post_thumbnail($postObject->ID, 'full');
                                            echo '</section>';
                                        }
                                            echo '<header class="article-header">';
                                            get_template_part('parts/content', 'byline');
                                                echo '<div class="title-box">';
                                                    echo '<h5 class="title"><a href="' . esc_url(get_permalink($postObject->ID)) . '" rel="bookmark" title="' . esc_attr($postObject->post_title) . '">';
                                                    echo get_the_title($postObject->ID);
                                                    echo '</a></h5>';
                                                echo '</div>';
                                            echo '</header>';
                                        echo '</div>';
                                    echo '<section class="entry-content" itemprop="text">';
                                    joints_excerpt_more();
                                    echo '</section>'; // Close entry-content section
                                echo '</article>';
                            echo '</div>'; // Close article-container div
                            // After the loop, reset post data so that the rest of the template is not affected.
                        wp_reset_postdata();
                    endif;
            endwhile;
        endif;
        echo '</div>';
    echo '</div>';
echo '</div>';
?>