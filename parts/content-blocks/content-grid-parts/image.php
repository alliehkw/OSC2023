<?php 
    $imageobject = get_sub_field('image');
    
    if( !empty($imageobject) ):
        echo '<img alt="' . $imageobject['title'] . '" src="' . $imageobject['sizes']['medium'] . '" srcset="' . $imageobject['sizes']['medium_large'] .' '. $imageobject['sizes']['medium_large-width'] .'w, '. $imageobject['sizes']['medium'] .' '.  $imageobject['sizes']['medium-width'] .'w, '. $imageobject['sizes']['thumbnail'] .' '.  $imageobject['sizes']['thumbnail-width'] .'w">';
    endif;
?>