// This allows the sidebar nav to hop up to where this section starts without taking you
// all the way up to the very top of the page
document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelectorAll("div.sidebar-nav li.menu-item a")
    .forEach(function (link) {
      // Assuming the href already points to the correct page, just append '#top-anchor' to it
      var href = link.getAttribute("href");
      link.setAttribute("href", href + "#sidebar");
    });

  document
    .querySelectorAll("ul#menu-blog-categories.menu li a")
    .forEach(function (link) {
      // Assuming the href already points to the correct page, just append '#top-anchor' to it
      var href = link.getAttribute("href");
      link.setAttribute("href", href + "#category");
    });
});
