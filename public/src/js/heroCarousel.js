$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: false,
        animateOut: "animate__fadeOutUp",
        animateIn: "animate__fadeInDown",
        nav: true,
        navText: [
            "<i class='fa fa-chevron-left text-white text-7xl'></i>",
            "<i class='fa fa-chevron-right text-white text-7xl'></i>",
        ],
    });
});
