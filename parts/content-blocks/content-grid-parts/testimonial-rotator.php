<?php
$upperRichText = get_sub_field('upper_rich_text');
$lowerRichText = get_sub_field('lower_rich_text');
echo '<div class="grid-x grid-padding-x testimonial-rotator">';
    echo '<div class="cell large-6 medium-12 testimonials-text">';
        echo'<div class="upper-testimonials-text">';
            echo $upperRichText;
        echo '</div>';
        echo'<div class="lower-testimonials-text desktop">';
            echo $lowerRichText;;
        echo '</div>';
    echo '</div>';
    if( have_rows('testimonials') ): 
        echo '<div class="cell large-6 medium-12 testimonials">';
        while( have_rows('testimonials') ): the_row();
            $starRating = get_sub_field('star_rating');
            $testimonial = get_sub_field('testimonial');
            $author = get_sub_field('author');
            $date = get_sub_field('date');
            echo '<div class="single-testimonial">';
                echo '<div class="rotator">';
                    echo '<div class="star_rating">';
                        echo '<div class="stars" style="--stars: ' . esc_attr($starRating) . ';"></div>';
                    echo '</div>';
                    echo '<div class="content">';
                        echo $testimonial;
                    echo '</div>';
                    echo '<div class="author">';
                        echo $author;
                    echo '</div>';
                    echo '<div class="date">';
                        echo $date;
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        endwhile;
        echo '<div class="testimonial-nav">';
            echo '<button class="prev-testimonial"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_1390_7389)"><path d="M5 12H19" stroke="#112E3D" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 12L11 18" stroke="#112E3D" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 12L11 6" stroke="#112E3D" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_1390_7389"><rect width="24" height="24" fill="white"/></clipPath></defs></svg></button>';
            echo '<button class="next-testimonial"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_1390_7396)"><path d="M5 12H19" stroke="white" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 18L19 12" stroke="white" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 6L19 12" stroke="white" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_1390_7396"><rect width="24" height="24" fill="white"/></clipPath></defs></svg></button>';
        echo '</div>';
        echo '</>';
    endif;
    echo '<div class="cell xlarge-12 lower-testimonials-text tablet">';
        echo $lowerRichText;;
    echo '<div>';
echo '</div>';
echo '</div>'; ?>