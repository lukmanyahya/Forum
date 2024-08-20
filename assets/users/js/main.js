// Data AOS
(function() {
  "use strict";

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  });

})()

// Preview Image Profile
function PreviewImage() {
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("avatar").files[0]);

  oFReader.onload = function(oFREvent) {
    document.getElementById("profileImage").src = oFREvent.target.result;
  };
}

// Add event listener to call PreviewImage function when a new file is selected
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById("avatar").addEventListener("change", PreviewImage);
});
