$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        items: 1,
        mouseDrag: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        loop: true,
        animateOut: "animate__fadeOutUp",
        animateIn: "animate__fadeInDown",
        nav: true,
        navText: [
            "<i class='fa fa-chevron-left text-white text-7xl'></i>",
            "<i class='fa fa-chevron-right text-white text-7xl'></i>",
        ],
    });
});
