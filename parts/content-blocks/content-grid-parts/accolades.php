<?php 
if( have_rows('accolades') ): 
    echo '<div class="grid-x grid-padding-x accolades">';
    while( have_rows('accolades') ): the_row();
        $starRating = get_sub_field('star_rating');
        $brandLogo = get_sub_field('brand_logo');
            echo '<div class="small-12 medium-shrink cell">';
                echo '<div class="accolade">';
                    echo '<div class="star_rating">';
                        echo '<div class="stars" style="--stars: ' . esc_attr($starRating) . ';"></div>';
                    echo '</div>';
                    echo '<div class="logo-image">';
                        echo '<img alt="' . $brandLogo['title'] . '" src="' . $brandLogo['sizes']['medium'] . '" srcset="' . $brandLogo['sizes']['medium_large'] .' '. $brandLogo['sizes']['medium_large-width'] .'w, '. $brandLogo['sizes']['medium'] .' '.  $brandLogo['sizes']['medium-width'] .'w, '. $brandLogo['sizes']['thumbnail'] .' '.  $brandLogo['sizes']['thumbnail-width'] .'w">';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        endwhile;
        echo '</div>';
    endif; ?>