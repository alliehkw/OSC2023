<?php 
echo '<div class="grid-x grid-padding-x statistics">';
    if( have_rows('statistics') ): 
        while( have_rows('statistics') ): the_row(); 
            $statValue = get_sub_field('statistic_value');
            $statDesc = get_sub_field('statistic_description');
            echo '<div class="cell small-12 medium-4 statistic">';
                echo '<div class="stat_value">';
                    echo $statValue;
                echo '</div>';
                echo '<div class="stat_desc">';
                    echo $statDesc;
                echo '</div>';
            echo '</div>';
        endwhile;
    endif;
echo '</div>'; ?>