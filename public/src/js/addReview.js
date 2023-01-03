/**
 * Using jQuery Plugin
 */
const initialRating = $("#initialRating");
const averageRating = $("#average-rating");
jQuery(".my-rating").starRating({
    initialRating: initialRating.val(),
    totalStars: 5,
    starShape: "rounded",
    starSize: 20,
    emptyColor: "lightgray",
    hoverColor: "#EAB308",
    activeColor: "#EAB308",
    ratedColors: "#EAB308",
    ratedColor: "#EAB308",
    disableAfterRate: false,
    useFullStars: true,
    useGradient: false,
    callback: function (currentRating, $el) {
        $("#rating").val(currentRating);
    },
});
jQuery(".product-rating").starRating({
    initialRating: averageRating.val(),
    totalStars: 5,
    starShape: "rounded",
    starSize: 20,
    emptyColor: "lightgray",
    activeColor: "#EAB308",
    ratedColors: "#EAB308",
    ratedColor: "#EAB308",
    useGradient: false,
    readOnly: true,
});
