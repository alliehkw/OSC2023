<?php
if( have_rows('accordion') ): 
    echo '<ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">';
    while( have_rows('accordion') ): the_row(); 
    $title = get_sub_field('title');
    $content = get_sub_field('content');
        echo '<li class="accordion-item" data-accordion-item>';
            echo '<a href="#" class="accordion-title allCaps">';
                echo $title;
            echo '</a>';
            echo '<div class="accordion-content" data-tab-content>';
                echo $content;
            echo '</div>';
        echo '</li>';
    endwhile; 
    echo '</ul>';
endif; ?>