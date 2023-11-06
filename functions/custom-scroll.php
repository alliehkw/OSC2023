<?php
// custom-scroll.php
add_action('wp_footer', 'add_custom_scroll_script');

function add_custom_scroll_script() {
?>
<script type="text/javascript">
    var isBlogPage = <?php echo json_encode(is_home()); ?>;
    var isCategoryPage = <?php echo json_encode(is_category()); ?>;
    var isSinglePage = <?php echo json_encode(is_single()); ?>;
    document.addEventListener('DOMContentLoaded', function() {
        window.addEventListener('scroll', function() {
            var header = document.querySelector('.sticky-container');
            var imageLogo = document.querySelector('.image-logo');
            if (isBlogPage || isCategoryPage || isSinglePage) {
                imageLogo.src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-colored-1.svg ?>";
            }
            if (window.scrollY > 70) {
                header.classList.add('scrolled');
                header.classList.remove('unscrolled');
                if (!isBlogPage && !isCategoryPage && !isSinglePage) {
                    imageLogo.src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-colored-1.svg ?>";
                }
            } else {
                header.classList.remove('scrolled');
                header.classList.add('unscrolled');
                if (!isBlogPage && !isCategoryPage && !isSinglePage) {
                    imageLogo.src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-colored-2.svg ?>";
                }
            }

        });
    });
</script>
<?php
}
