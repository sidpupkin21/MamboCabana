// Create a new link element
var cssLink = document.createElement("link");

// Set the rel attribute to "stylesheet"
cssLink.rel = "stylesheet";

// Set the href attribute to the CSS file URL
cssLink.href = "https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css";

// Append the link element to the document's head section
document.head.appendChild(cssLink);

//Initialize Swiper
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    effect: "fade",
    loop: true,
    autoplay: {
      delay: 1500,
      disableOnInteraction: false,
    },
  });