<?php
/*
Template Name: Has Sidebar
*/
get_header(); 
?>

<div class="content">
    <!-- Display Parent Page Content -->
    <?php
        if($post->post_parent) {
            $parent = get_post($post->post_parent);
            if ( $parent ) : ?>
                <main class="main cell small-12 " role="main">
                    <?php
                        // Temporarily set the global post object to the parent post
                        $temp_post = $post;
                        $post = $parent;

                        // Load the 'parts/loop' template part
                        get_template_part('parts/loop', 'page');

                        // Restore the global post object
                        $post = $temp_post;
                    ?>
                </main>
            <?php endif;
        }
    ?>
    <div class="content-block">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <!-- Sidebar Logic -->
                <?php
                if( have_rows('content_blocks') ):
                    // Loop through the rows of data
                    while ( have_rows('content_blocks') ) : the_row();
                        // Check for the 'Sidebar Nav' layout or subfield
                        if( get_row_layout() == 'sidebar_nav' ) {
                            // Get the 'Sidebar Nav' select subfield value
                            $selected_sidebar = get_sub_field('sidebar_nav');
                            if ($selected_sidebar && is_active_sidebar($selected_sidebar)) {
                                // The sidebar is different for desktop and tablet and mobile. This is handled in the
                                // individual sidebar php files and with css display: none
                                get_sidebar($selected_sidebar);
                            }
                        }
                    endwhile;
                endif;
                ?>

                <!-- Main Child Content Logic -->
                <?php if (have_posts()) : ?>
                    <main class="main cell medium-12 large-9 child-content" role="main">
                        <div id="top-anchor"></div>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part( 'parts/loop', 'page' ); ?>
                        <?php endwhile; ?>
                        <div id="bottom-anchor"></div>
                    </main>
                <?php endif; ?>
            </div> <!-- end .grid-x -->
        </div> <!-- end .grid-container -->
    </div> <!-- end content-block -->
</div> <!-- end #content -->

<?php wp_link_pages(); ?>
<?php edit_post_link(__('Edit'), '', '', null, 'button edit-post-button'); ?>
<?php get_footer(); ?>
