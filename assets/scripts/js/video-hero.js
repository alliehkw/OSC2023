document.addEventListener("DOMContentLoaded", function () {
  var poster = document.querySelector(".video-poster");
  var container = document.querySelector(".video-container-hero");
  var iframe = container.querySelector("iframe");
  var playButton = document.querySelector(".play-button");
  var headerContainer = document.querySelector(".header-container");
  var isVideoPlaying = false; // Flag to track video playing status
  var player = null; // Variable to store the Vimeo player instance

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

      // Initialize the Vimeo player
      player = new Vimeo.Player(iframe);

      // Play the video
      player.play().then(function () {
        // Video started playing
        isVideoPlaying = true;
        manageHeaderClass();
      });

      // Add event listener for ended event
      player.on("ended", function () {
        handleVideoEnd();
      });
    }

    // Function to handle video end
    function handleVideoEnd() {
      // Show the poster and play button
      poster.style.display = "block";
      playButton.style.display = "block";
      // Hide the iframe
      iframe.style.display = "none";

      // Set isVideoPlaying to false
      isVideoPlaying = false;

      // Manage header class immediately
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
