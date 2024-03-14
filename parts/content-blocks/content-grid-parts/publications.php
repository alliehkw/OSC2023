<?php 
if (have_rows('research')): 
    while (have_rows('research')): the_row(); 
        $title = get_sub_field('title');
        $subtext = get_sub_field('subtext');
        $cover_image = get_sub_field('cover_image_publication');
        $externalLinkPresent = get_sub_field('link_publication');
        $linkType = get_sub_field('link_type');
        $linkClass = $externalLinkPresent == 1 ? "active-link" : "not-a-link";
        $linkName = "#";
        if ($externalLinkPresent == 1 && $linkType == "external_link") : 
            $linkName = get_sub_field('external_link_publications');
        elseif ($externalLinkPresent == 1 && $linkType == "pdf") :
            $PDF = get_sub_field('media_publication');
            $linkName = $PDF['url'];
        endif;
        echo '<div class="cell large-6 medium-12 publications">';
        echo '<a href="' . $linkName . '" class="external-link ' . $linkClass . '" target="_blank" onclick="if(this.href === \'#\') { event.preventDefault(); }">';
        echo '<div class="single-publication">';    
        if ($cover_image) :
            echo '<div class="preview-block image">';
            echo '<img src="' . $cover_image['url'] . '"/>'; 
            echo '</div>';
        else :
            echo '<div class="preview-block">';
            echo '<div class="title-container">';
            echo $title;
            echo '</div>';
            echo '</div>';
        endif;
        echo '<div class="content-pub">';
        echo '<div class="title-below">';
            echo $title;
        echo '</div>';
        echo '<div class="subtext-below">';
            echo $subtext;
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    endwhile;
endif; ?>