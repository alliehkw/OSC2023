<?php 
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
                    echo '<div class="modal">'; // NEW
                    echo '<div class="grid-x grid-padding-x modal-content">';
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
                                        $linkType = get_sub_field('link_type');
                                        $target="_self";
                                        if ($linkType == 'page') :
                                            $link = get_sub_field('page_link');
                                        elseif ($linkType == 'externalLink') :
                                            $link = get_sub_field('external_link');
                                            $target="_blank";
                                        else :
                                            $category_id = get_sub_field('blog_category_link');
                                            $link = get_category_link($category_id);
                                        endif;  
                                        $linkText = get_sub_field('link_name');
                                        echo '<a target="' . $target . '" href="' . esc_url($link) . '" class="cell button" role="button">';
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
                echo '</div>';
                $counter++;                              
            endwhile;
        endif;
        echo '</div>';
     echo '</div>'; ?>                                      