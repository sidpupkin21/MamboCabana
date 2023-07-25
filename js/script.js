// // Create a new link element
// var cssLink = document.createElement("link");

// // Set the rel attribute to "stylesheet"
// cssLink.rel = "stylesheet";

// // Set the href attribute to the CSS file URL
// cssLink.href = "https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css";

// // Append the link element to the document's head section
// document.head.appendChild(cssLink);

// //Initialize Swiper
//   var swiper = new Swiper(".mySwiper", {
//     spaceBetween: 30,
//     centeredSlides: true,
//     effect: "fade",
//     loop: true,
//     autoplay: {
//       delay: 1500,
//       disableOnInteraction: false,
//     },
//   });

var swiper = new Swiper(".swiper-container", {
  spaceBetween: 30,
  effect: "fade",
  loop: true,
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  }
});

var swiper = new Swiper(".swiper-testimonials", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  slidesPerView: "3",
  loop: true,
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: false,
  },
  pagination: {
    el: ".swiper-pagination",
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
    },
    640: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  }
});
