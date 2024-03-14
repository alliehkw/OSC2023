<?php
echo '<div class="grid-x grid-padding-x">';
    echo '<div class="medium-8 cell">';
    if( have_rows('nested_grid') ): 
        while( have_rows('nested_grid') ): the_row(); 
            $nestedLayout = get_sub_field('layout');
            $nestedContent = get_sub_field('content');
            echo '<div class="cell small-6 ' . $nestedLayout . ' ">';
                echo $nestedContent;
            echo '</div>';
        endwhile;
    endif;
    echo '</div>';
echo '</div>';
?>