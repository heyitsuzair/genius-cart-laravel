import "../libraries/jquery/jquery.min.js";
import "../libraries/owl/owl.carousel.min.js";
import "./preloader.js";
import "./heroCarousel.js";
import "./search.js";

if (window.location.pathname === "/") {
    $("body").css("overflow", "hidden");
}