document.addEventListener("DOMContentLoaded", function () {
  var poster = document.querySelector(".video-poster");
  var container = document.querySelector(".video-container");
  var iframe = container.querySelector("iframe");
  var playButton = document.querySelector(".play-button");
  var headerContainer = document.querySelector(".header-container");
  var isVideoPlaying = false; // Flag to track video playing status

  // Function to manage header class based on scroll position and video status
  if (poster) {
    function manageHeaderClass() {
      if (isVideoPlaying && window.scrollY < 70) {
        headerContainer.classList.add("video");
      } else {
        headerContainer.classList.remove("video");
      }
    }

    // Function to start video playback
    function startVideo() {
      // Remove the poster and play button
      poster.style.display = "none";
      playButton.style.display = "none";
      // Set the iframe to display
      iframe.style.display = "block";

      // Change the `src` to start the video
      iframe.src =
        iframe.src + (iframe.src.includes("?") ? "&" : "?") + "autoplay=1";

      // Set isVideoPlaying to true and manage header class immediately
      isVideoPlaying = true;
      manageHeaderClass();
    }

    // Add event listener to the play button
    if (playButton) {
      playButton.addEventListener("click", startVideo);
    }

    // Update the header class on scroll
    window.addEventListener("scroll", manageHeaderClass);
  }
});
