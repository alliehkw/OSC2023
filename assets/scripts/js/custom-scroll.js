var isBlogPage = pageData.isBlogPage;
var isCategoryPage = pageData.isCategoryPage;
var isSinglePage = pageData.isSinglePage;
var templateUrl = pageData.templateUrl;
document.addEventListener("DOMContentLoaded", function () {
  var header = document.querySelector(".sticky-container");
  var imageLogo = document.querySelector(".image-logo");

  // Function to update the header based on the scroll position
  function updateHeaderOnScroll() {
    if (window.scrollY > 70) {
      header.classList.add("scrolled");
      header.classList.remove("unscrolled");
      imageLogo.src = templateUrl + "/assets/images/Logo-colored-1.svg";
    } else {
      header.classList.remove("scrolled");
      header.classList.add("unscrolled");
      if (isBlogPage || isCategoryPage || isSinglePage) {
        imageLogo.src = templateUrl + "/assets/images/Logo-colored-1.svg";
      } else {
        imageLogo.src = templateUrl + "/assets/images/Logo-colored-2.svg";
      }
    }
  }

  // Call updateHeaderOnScroll on page load
  updateHeaderOnScroll();

  // Also update the header on scroll
  window.addEventListener("scroll", updateHeaderOnScroll);

  // Add the 'loaded' class to the '.header-container' element
  var headerContainer = document.querySelector(".header-container");
  if (headerContainer) {
    headerContainer.classList.add("loaded");
  }
});
