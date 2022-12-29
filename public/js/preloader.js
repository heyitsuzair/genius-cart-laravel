const spinner = $(".spinner-large");

// Hide Spinner On Page Loading
$(window).on("load", function () {
    spinner.fadeOut();
});
