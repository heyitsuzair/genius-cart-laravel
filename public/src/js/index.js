import "../libraries/jquery/jquery.min.js";
import "../libraries/owl/owl.carousel.min.js";
import "./preloader.js";
import "./heroCarousel.js";
import "./search.js";
import "./toast.js";
import "./icon.js";
import "./product.js";

if (window.location.pathname === "/") {
    $("body").css("overflow", "hidden");
}
