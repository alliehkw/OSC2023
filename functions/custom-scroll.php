<?php
// custom-scroll.php
add_action('wp_footer', 'add_custom_scroll_script');

function add_custom_scroll_script() {
?>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        window.addEventListener('scroll', function() {
            var header = document.querySelector('.sticky-container');
            var imageLogo = document.querySelector('.image-logo');
            if (window.scrollY > 70) {
                header.classList.add('scrolled');
                header.classList.remove('unscrolled');
                imageLogo.src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-colored-1.svg ?>";
            } else {
                header.classList.remove('scrolled');
                header.classList.add('unscrolled');
                imageLogo.src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo-colored-2.svg ?>";
            }
        });
    });
</script>
<?php
}
