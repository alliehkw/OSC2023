<?php
$bg = get_sub_field('row_bg');
$vAlign = get_sub_field('vertical_alignment');
$tabletAlign = get_sub_field('align_top_on_tablet');
$hAlign = get_sub_field('horizontal_alignment');
$reverseOrder = get_sub_field('order_on_mobile');
$customPadding = null;
$overlapSibling = get_sub_field('overlap_sibling');
if (get_sub_field('custom_padding')) {
    $customPadding = get_sub_field('custom_padding_select');
}
?>
<div class="content-block content-grid <?php echo $bg ?> <?php echo $customPadding ?> <?php echo $overlapSibling ?>">
    <div class="grid-container">
        <div class="grid-x grid-padding-x <?php echo $hAlign ?> <?php echo $vAlign ?> <?php if ($tabletAlign) { echo "tablet-top"; }?> <?php echo $reverseOrder ?>">
           <?php if( have_rows('content') ): while( have_rows('content') ): the_row(); 
                $layout = get_sub_field('layout');
            ?>
            <div class="cell <?php echo $layout ?>">
                <?php $contentType = get_sub_field('content_type');
                    if($contentType == 'rich-text') :
                        include('content-grid-parts/rich-text.php');
                    elseif($contentType == 'embed') :
                        include('embed.php');
                    elseif($contentType == 'image') :
                        include('content-grid-parts/image.php');
                    elseif($contentType == 'nested') :
                        include('content-grid-parts/nested.php');
                    elseif($contentType == 'accordion') :
                        include('content-grid-parts/accordion.php');
                    elseif($contentType == 'html') :
                        $html = get_sub_field('custom_html');
                        echo $html;
                    elseif($contentType == 'space') :
                        $size = get_sub_field('space');
                        echo '<div class="spacer ' . $size . '"></div>';
                    elseif($contentType == 'buttons') :
                        include('content-grid-parts/buttons.php');
                    elseif($contentType == 'statistics') :
                        include('content-grid-parts/stats.php');
                    elseif($contentType == 'doctor_modal') :
                        include('content-grid-parts/doctor-modal.php');
                    elseif($contentType == 'accolades') :
                        include('content-grid-parts/accolades.php');
                    elseif($contentType == 'testimonial_rotator') :
                        include('content-grid-parts/testimonial-rotator.php');
                    elseif ($contentType == 'research') :
                        $display_type = get_sub_field('display_type');
                        echo '<div class="grid-x grid-padding-x research ' . $display_type . '">';
                        if ($display_type == "row_line"):
                            include('content-grid-parts/row-line.php');
                        elseif ($display_type == "card_block") :
                            include('content-grid-parts/card-block.php');
                        elseif ($display_type == "publications") :
                            include('content-grid-parts/publications.php');
                        endif;
                        echo '</div>'; 
                    endif;            
                ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>