<?php
$bg = get_sub_field('row_bg');
$vAlign = get_sub_field('vertical_alignment');
?>
<div class="content-block content-grid <?php echo $bg ?>">
    <div class="grid-container">
        <div class="grid-x grid-padding-x align-center <?php echo $vAlign ?>">
           <?php if( have_rows('content') ): while( have_rows('content') ): the_row(); 
                $layout = get_sub_field('layout');
            ?>
            <div class="cell <?php echo $layout ?>">
                <?php $contentType = get_sub_field('content_type');
                    if($contentType == 'rich-text') :
                        $richText = get_sub_field('content');
                        echo $richText;
                    elseif($contentType == 'embed') :
                        $embed = get_sub_field('embed');
                        echo '<div class="embed flex-video">';
                        echo $embed;
                        echo '</div>';
                    elseif($contentType == 'image') :
                        $imageobject = get_sub_field('image');
                        if( !empty($imageobject) ):
                        echo '<img alt="' . $imageobject['title'] . '" src="' . $imageobject['sizes']['medium'] . '" srcset="' . $imageobject['sizes']['medium_large'] .' '. $imageobject['sizes']['medium_large-width'] .'w, '. $imageobject['sizes']['medium'] .' '.  $imageobject['sizes']['medium-width'] .'w, '. $imageobject['sizes']['thumbnail'] .' '.  $imageobject['sizes']['thumbnail-width'] .'w">';
                        endif;
                    elseif($contentType == 'nested') :
                        echo '<div class="grid-x grid-padding-x">';
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
                    elseif($contentType == 'accordion') :
                        if( have_rows('accordion') ): 
                            echo '<ul class="accordion" data-accordion>';
                            while( have_rows('accordion') ): the_row(); 
                            $title = get_sub_field('title');
                            $content = get_sub_field('content');
                                echo '<li class="accordion-item" data-accordion-item>';
                                    echo '<a href="#" class="accordion-title">Accordion 1</a>';
                                    echo '<div class="accordion-content" data-tab-content>';
                                        echo $content;
                                    echo '</div>';
                                echo '</li>';
                            endwhile; 
                            echo '</ul>';
                        endif;
                    elseif($contentType == 'html') :
                        $html = get_sub_field('custom_html');
                        echo $html;
                    elseif($contentType == 'space') :
                        $size = get_sub_field('space');
                        echo '<div class="spacer ' . $size . '"></div>';
                    endif;
                ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>