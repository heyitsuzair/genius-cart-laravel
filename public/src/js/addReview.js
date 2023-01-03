/**
 * Using jQuery Plugin
 */
jQuery(".my-rating").starRating({
    totalStars: 5,
    starShape: "rounded",
    starSize: 20,
    emptyColor: "lightgray",
    hoverColor: "#EAB308",
    activeColor: "#EAB308",
    ratedColors: "#EAB308",
    ratedColor: "#EAB308",
    disableAfterRate: false,
    useGradient: false,
    callback: function (currentRating, $el) {
        $("#rating").val(currentRating);
    },
});
