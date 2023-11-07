jQuery(document).ready(function ($) {
  var testimonials = $(".testimonials .single-testimonial");
  var currentIndex = 0;
  var testimonialInterval;

  // Function to show a testimonial based on an index
  function showTestimonial(index) {
    testimonials.filter(".active").fadeOut(300, function () {
      testimonials.removeClass("active");
      testimonials.eq(index).fadeIn(300).addClass("active");
    });
  }

  // Start the automatic rotation
  function startRotation() {
    if (testimonialInterval) clearInterval(testimonialInterval);
    testimonialInterval = setInterval(function () {
      currentIndex = (currentIndex + 1) % testimonials.length;
      showTestimonial(currentIndex);
    }, 10000); // 10 seconds
  }

  // Show the initial testimonial without fade effect
  testimonials.eq(currentIndex).addClass("active");
  startRotation(); // Start the rotation

  // Handle clicks on the 'next' button
  $(".next-testimonial").click(function () {
    currentIndex = (currentIndex + 1) % testimonials.length;
    showTestimonial(currentIndex);
    startRotation(); // Reset the timer
  });

  // Handle clicks on the 'previous' button
  $(".prev-testimonial").click(function () {
    currentIndex =
      (currentIndex - 1 + testimonials.length) % testimonials.length;
    showTestimonial(currentIndex);
    startRotation(); // Reset the timer
  });
});
