<?php
$bg = get_sub_field('row_bg');
$vAlign = get_sub_field('vertical_alignment');
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
        <div class="grid-x grid-padding-x <?php echo $hAlign ?> <?php echo $vAlign ?> <?php echo $reverseOrder ?>">
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
                    elseif($contentType == 'accordion') :
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
                        endif;
                    elseif($contentType == 'html') :
                        $html = get_sub_field('custom_html');
                        echo $html;
                    elseif($contentType == 'space') :
                        $size = get_sub_field('space');
                        echo '<div class="spacer ' . $size . '"></div>';
                    elseif($contentType == 'buttons') :
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
                        echo '</div>';
                    elseif($contentType == 'statistics') :
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
                        echo '</div>';
                    elseif($contentType == 'doctor_modal') :
                        $sliderType = get_sub_field('section_summary');
                        echo '<div class="grid-x grid-padding-x doctor-modals">';
                            echo '<div class="large-5 cell">';
                                echo $sliderType;
                            echo '</div>';
                            echo '<div class="large-6 cell doctors">';
                            if( have_rows('doctor') ): 
                                $counter = 1;
                                while( have_rows('doctor') ): the_row(); 
                                    $doctorName = get_sub_field('doctor_name');
                                    $doctorSummary = get_sub_field('summary');
                                    $modalId = "modal" . $counter; // This creates a unique ID for each doctor
                                    $doctorSpecialty = get_sub_field('doctor_specialty');
                                    $doctorImage = get_sub_field('doctor_image');
                                    echo '<div class="doctor">';
                                        echo '<div class="image">';
                                            echo '<img alt="' . $doctorImage['title'] . '" src="' . $doctorImage['sizes']['medium'] . '" srcset="' . $doctorImage['sizes']['medium_large'] .' '. $doctorImage['sizes']['medium_large-width'] .'w, '. $doctorImage['sizes']['medium'] .' '.  $doctorImage['sizes']['medium-width'] .'w, '. $doctorImage['sizes']['thumbnail'] .' '.  $doctorImage['sizes']['thumbnail-width'] .'w">';
                                        echo '</div>';
                                        echo '<div class="name">';
                                            echo $doctorName;                                        echo '</div>';
                                        echo '<div class="specialty">';
                                            echo $doctorSpecialty;
                                        echo '</div>';
                                        echo '<p><a data-open="' . $modalId . '" class="button transparent profile">View Profile</a></p>';
                                        echo '<div class="large reveal doctor-modal" id="' . $modalId . '" data-reveal>';
                                           echo '<button class = "close-button" data-close aria-label = "Close reveal" type = "button">';
                                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"><path d="M18.5293 6L6.5293 18M6.5293 6L18.5293 18" stroke="#112E3D" stroke-linecap="round" stroke-linejoin="round"/></svg>';
                                           echo '</button>';
                                           echo '<div class="grid-x grid-padding-x">';
                                               echo '<div class="large-3 medium-12 cell image-and-links">';
                                                    echo '<div class="image-modal">';
                                                        echo '<img alt="' . $doctorImage['title'] . '" src="' . $doctorImage['sizes']['medium'] . '" srcset="' . $doctorImage['sizes']['medium_large'] .' '. $doctorImage['sizes']['medium_large-width'] .'w, '. $doctorImage['sizes']['medium'] .' '.  $doctorImage['sizes']['medium-width'] .'w, '. $doctorImage['sizes']['thumbnail'] .' '.  $doctorImage['sizes']['thumbnail-width'] .'w">';
                                                    echo '</div>';
                                                    echo '<div class="links-modal">';
                                                        $resume = get_sub_field('resume')[0]['url'];
                                                        echo '<a target="_blank" href="' . esc_url($resume) . '" class="cell button" role="button">';
                                                                echo 'resume';
                                                        echo '</a>';
                                                        if( have_rows('links') ): 
                                                            while( have_rows('links') ): the_row(); 
                                                            $link = get_sub_field('page_link');
                                                            $linkText = get_sub_field('link_name');
                                                            echo '<a target="_self" href="' . esc_url($link) . '" class="cell button" role="button">';
                                                                echo $linkText;
                                                            echo '</a>';
                                                            endwhile;
                                                        endif;
                                                    echo '</div>';
                                               echo '</div>';
                                               echo '<div class="large-9 cell summary-and-certs">';
                                                echo '<div class="summary-modal">';
                                                        echo '<h3>';
                                                            echo $doctorName;    
                                                        echo '</h3>';   
                                                        echo $doctorSummary;   
                                                        
                                                        if( have_rows('certification_images') ): 
                                                            echo '<div class="certs">';
                                                            while( have_rows('certification_images') ): the_row();    
                                                                $imageURL = get_sub_field('certification');
                                                                echo '<div class="cert-image">';
                                                                    echo '<img alt="' . $imageURL['title'] . '" src="' . $imageURL['sizes']['medium'] . '" srcset="' . $imageURL['sizes']['medium_large'] .' '. $imageURL['sizes']['medium_large-width'] .'w, '. $imageURL['sizes']['medium'] .' '.  $imageURL['sizes']['medium-width'] .'w, '. $imageURL['sizes']['thumbnail'] .' '.  $imageURL['sizes']['thumbnail-width'] .'w">';
                                                                echo '</div>';
                                                            endwhile;
                                                            echo '</div>';
                                                        endif;                           
                                                    echo '</div>';
                                               echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                    $counter++; 
                                endwhile;
                            endif;
                            echo '</div>';
                        echo '</div>';
                    elseif($contentType == 'accolades') :
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

                        endif;
                    endif;
                ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>