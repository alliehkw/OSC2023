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
                    elseif($contentType == 'testimonial_rotator') :
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
                        echo '</div>';
                    elseif($contentType == 'research') :
                        $display_type = get_sub_field('display_type');
                        echo '<div class="grid-x grid-padding-x research ' . $display_type . '">';
                        if ($display_type == "row_line"):
                            if (have_rows('research')):
                                while (have_rows('research')): the_row();
                                    $title = get_sub_field('title');
                                    $mediaPresent = get_sub_field('include_media_with_post');
                                    $externalLinkPresent = get_sub_field('include_external_link');
                                    echo '<ul class="cell xlarge-12 research-info">';
                                        echo '<li class="research-title">';
                                            if ($externalLinkPresent == 1) :
                                                $externalLink = get_sub_field('external_link');
                                                echo '<a href="' . $externalLink . '" class="external-link" target="_blank">';
                                                    echo $title;
                                                echo '</a>';
                                            else : 
                                                echo $title;
                                            endif;
                                        if ($mediaPresent && have_rows('media')):
                                            echo '<div class="medias">';
                                            while (have_rows('media')): the_row();
                                                $cover_image = get_sub_field('cover_image');
                                                $media_upload = get_sub_field('media');
                                                    $image_url = $cover_image['url'];
                                                    $media_item_title = $cover_image['title'];
                                                    if ($media_upload) :
                                                        echo '<a href="' . $media_upload['url'] . '" target="_blank" class="media-item-with-link">'; 
                                                            echo '<div class="media-item">';
                                                                echo '<div class="media-item-image">';
                                                                    echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($media_item_title) . '">';
                                                                echo '</div>';
                                                                echo '<div class="media-title">';
                                                                    echo esc_html($media_item_title);
                                                                echo '</div>';
                                                            echo '</div>';
                                                        echo '</a>';
                                                    else : 
                                                        echo '<div class="media-item">';
                                                            echo '<div class="media-item-image">';
                                                                echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($media_item_title) . '">';
                                                            echo '</div>';
                                                            echo '<div class="media-title">';
                                                                echo esc_html($media_item_title);
                                                            echo '</div>';
                                                        echo '</div>';
                                                    endif;
                                            endwhile;
                                            echo '</div>';
                                        endif;
                                        echo '</li>';
                                    echo '</ul>';
                                endwhile;
                            endif;
                        elseif($display_type == "card_block") :
                            if( have_rows('research') ): 
                                while( have_rows('research') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $author = get_sub_field('author');
                                    $summary = get_sub_field('summary');
                                    $externalLinkPresent = get_sub_field('include_external_link');
                                    $linkClass = $externalLinkPresent == 1 ? "active-link" : "not-a-link";
                                    $linkName = "#";
                                    if ($externalLinkPresent == 1) : 
                                        $linkName = get_sub_field('external_link');
                                    endif;
                                        echo '<div class="cell medium-6 small-12 research-info ">';
                                            echo '<a href="' . $linkName . '" class="external-link ' . $linkClass . '" target="_blank" onclick="if(this.href === \'#\') { event.preventDefault(); }">';
                                                echo '<div class="card-block">';
                                                    echo '<div class="research-title">';
                                                        echo $title;
                                                    echo '</div>';
                                                    echo '<div class="author">';
                                                        echo $author;
                                                    echo '</div>';
                                                echo '</div>';
                                                echo '<div class="research-title">';
                                                    echo $title;
                                                echo '</div>';
                                                echo '<div class="summary">';
                                                    echo $summary;
                                                echo '</div>';
                                            echo '</a>';
                                        echo '</div>';
                                endwhile;
                            endif;
                        endif;
                        echo '</div>';
                        endif;
                ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>