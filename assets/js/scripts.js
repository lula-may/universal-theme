const swiper = new Swiper(".swiper-container", {
  // Optional parameters
  loop: true,
  autoplay: {
    delay: 5000,
  },
  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },
});

const menuToggle = $(".header-menu-toggle");
menuToggle.on("click", function (evt) {
  evt.preventDefault();
  $(".header-nav").slideToggle(200);
});
