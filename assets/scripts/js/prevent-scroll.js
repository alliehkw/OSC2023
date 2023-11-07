// This prevents all nav links with class "no-scroll" from hopping to the top of the page on load
// I use this with the side navs and add the class to the menu items directly
jQuery(document).ready(function ($) {
  // When a no-scroll link is clicked, save the current scroll position
  $("li.no-scroll a").on("click", function () {
    sessionStorage.setItem("noScrollPosition", $(window).scrollTop());
    // Remove the stored scroll position after 1 second, which is enough for the page to unload
    // This prevents the stored position from affecting other navigations
    setTimeout(function () {
      sessionStorage.removeItem("noScrollPosition");
    }, 1000);
  });

  // When the page loads, check if there's a saved position from a no-scroll link
  var savedScrollPosition = sessionStorage.getItem("noScrollPosition");
  if (savedScrollPosition) {
    $(window).scrollTop(savedScrollPosition);
    sessionStorage.removeItem("noScrollPosition"); // Clear the stored position
  }
});
