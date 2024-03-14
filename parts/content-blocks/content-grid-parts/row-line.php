<?php 
if (have_rows('research')):
    while (have_rows('research')): the_row();
        $title = get_sub_field('title');
        $mediaPresent = get_sub_field('include_media_with_post');
        $externalLinkPresent = get_sub_field('include_external_link');
        echo '<ul class="cell xlarge-12 research-info">';
            echo '<li class="research-title">';
            if ($externalLinkPresent == 1) :
                $externalLink = get_sub_field('external_link');
                echo '<a href="' . $externalLink . '" class="external-link" target="_blank">';
                    echo $title;
                echo '</a>';
            else : 
                echo $title;
            endif;
            if ($mediaPresent && have_rows('media')):
                echo '<div class="medias">';
                while (have_rows('media')): the_row();
                    $media_type = get_sub_field('media_type');
                    if ($media_type === 'image') :
                        $cover_image = get_sub_field('cover_image');
                        $media_upload = get_sub_field('media');
                        $image_url = $cover_image['url'];
                        $media_item_title = $cover_image['title'];
                        if ($media_upload) :
                            echo '<a href="' . $media_upload['url'] . '" target="_blank" class="media-item-with-link">'; 
                                echo '<div class="media-item">';
                                    echo '<div class="media-item-image">';
                                        echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($media_item_title) . '">';
                                    echo '</div>';
                                    echo '<div class="media-title">';
                                        echo esc_html($media_item_title);
                                    echo '</div>';
                                echo '</div>';
                            echo '</a>';
                        else : 
                            echo '<div class="media-item">';
                                echo '<div class="media-item-image">';
                                    echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($media_item_title) . '">';
                                echo '</div>';
                                echo '<div class="media-title">';
                                    echo esc_html($media_item_title);
                                echo '</div>';
                            echo '</div>';
                        endif;
                        elseif ($media_type === 'video') :
                            include __DIR__ . '/../embed.php';
                        endif;
                endwhile;
                echo '</div>';
            endif;
            echo '</li>';
        echo '</ul>';
    endwhile;
endif; ?>