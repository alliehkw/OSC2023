jQuery(document).ready(function ($) {
  $(".gfield_required").each(function () {
    $(this).html('<span class="gf_required">*</span>');
  });
});
