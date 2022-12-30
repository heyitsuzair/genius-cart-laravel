const searchIcon = $("#search");
const searchForm = $("#search-form");
const content = $("#content");

/**
 * Open The Search Form
 */
$(searchIcon).on("click", function () {
    $(searchForm).fadeIn(500);
});

// Close the search form when clicked on  body if it is opened
$(content).on("click", function (e) {
    if ($(searchForm).css("display") === "block") {
        $(searchForm).fadeOut(500);
    }
});
