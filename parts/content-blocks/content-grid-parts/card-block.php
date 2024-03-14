<?php
if (have_rows('research')): 
    while (have_rows('research')): the_row(); 
        $title = get_sub_field('title');
        $author = get_sub_field('author');
        $summary = get_sub_field('summary');
        $externalLinkPresent = get_sub_field('include_external_link');
        $mediaPresent = get_sub_field('include_media_with_post');
        $linkClass = $externalLinkPresent == 1 ? "active-link" : "not-a-link";
        $linkName = "#";
        if ($externalLinkPresent == 1) : 
            $linkName = get_sub_field('external_link');
        endif;
        echo '<div class="cell medium-6 small-12 research-info ">';
        echo '<a href="' . $linkName . '" class="external-link ' . $linkClass . '" target="_blank" onclick="if(this.href === \'#\') { event.preventDefault(); }">';
        echo '<div class="card-block">';
        echo '<div class="research-title">';
        echo $title;
        echo '</div>';
        echo '<div class="author">';
        echo $author;
        echo '</div>';
        echo '</div>';
        echo '<div class="research-title">';
        echo $title;
        echo '</div>';
        echo '<div class="summary">';
        echo $summary;
        echo '</div>';
        echo '</a>';
        if ($mediaPresent && have_rows('media')):
            echo '<div class="medias">';
            while (have_rows('media')): the_row();
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
            endwhile;
            echo '</div>';
        endif;
        echo '</div>';
    endwhile;
endif; ?>