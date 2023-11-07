var isBlogPage = pageData.isBlogPage;
var isCategoryPage = pageData.isCategoryPage;
var isSinglePage = pageData.isSinglePage;
var templateUrl = pageData.templateUrl;
console.log("templateUrl", templateUrl);
document.addEventListener("DOMContentLoaded", function () {
  window.addEventListener("scroll", function () {
    var header = document.querySelector(".sticky-container");
    var imageLogo = document.querySelector(".image-logo");
    if (isBlogPage || isCategoryPage || isSinglePage) {
      imageLogo.src = templateUrl + "/assets/images/Logo-colored-1.svg";
    }
    if (window.scrollY > 70) {
      header.classList.add("scrolled");
      header.classList.remove("unscrolled");
      if (!isBlogPage && !isCategoryPage && !isSinglePage) {
        imageLogo.src = templateUrl + "/assets/images/Logo-colored-1.svg";
      }
    } else {
      header.classList.remove("scrolled");
      header.classList.add("unscrolled");
      if (!isBlogPage && !isCategoryPage && !isSinglePage) {
        imageLogo.src = templateUrl + "/assets/images/Logo-colored-2.svg";
      }
    }
  });
});
