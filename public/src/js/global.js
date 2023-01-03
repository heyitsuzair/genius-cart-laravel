if (window.location.pathname === "/") {
    $("body").css("overflow", "hidden");
}

const btnLoadable = $(".btn-loadable");
const btnLoadableText = $(".btn-loadable-text");
const btnLoading = $(".btn-loading");

/**
 * On Button Loadable Click Hide Button Loadable Text And Show Loading Text And Spinner And Disable Loadable Button
 */
btnLoadable.on("click", function (e) {
    btnLoadableText.hide();
    btnLoading.css("display", "flex");
    btnLoadable.prop("disabled", true);
    /**
     * Submit The Closest Form
     */
    const form = $(this).closest("form");
    form.submit();
});
