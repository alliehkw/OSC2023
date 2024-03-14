<?php 
    $alignment = get_sub_field('buttons_alignment');
    echo '<div class="grid-x grid-padding-x ' . $alignment . ' buttons">';
        if( have_rows('buttons') ): 
            while( have_rows('buttons') ): the_row(); 
                $buttonText = get_sub_field('button_text');
                $buttonColor = get_sub_field('button_background_color');
                $linkType = get_sub_field('link_type');
                $link = null;
                $target = '_self';
                if ($linkType == 'document') :
                    $link = get_sub_field('document')[0];
                    $target = '_blank';
                elseif($linkType == 'page') :
                    $link = get_sub_field('page_link');
                elseif($linkType =='external_url') :
                    $link = get_sub_field('external_url');
                    $target = '_blank';
                endif;
                echo '<a target="' . $target . '" href="' . esc_url($link) . '" class="cell small-12 medium-shrink button ' . esc_attr($buttonColor) . ' " role="button">';
                    echo $buttonText;
                echo '</a>';
            endwhile;
        endif;
    echo '</div>'; ?>