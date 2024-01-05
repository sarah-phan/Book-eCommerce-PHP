
// Function to initialize Swipers
function initializeSwipers() {
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
    });

    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        thumbs: {
            swiper: swiper,
        },
    });
}

// Ensure Swipers are initialized when the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function() {
    if (document.querySelector('.mySwiper')) {
        initializeSwipers();
    }
});