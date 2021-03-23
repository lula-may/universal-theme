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

let $page = $("html, body");
$('a[href*="#"]').click(function () {
  $page.animate(
    {
      scrollTop: $($.attr(this, "href")).offset().top,
    },
    600
  );
  return false;
});
