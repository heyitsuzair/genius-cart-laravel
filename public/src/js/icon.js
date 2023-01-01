const iconBadge = $(".icon-badged");

/**
 * On Badged Icon Mouse Enter Change Add Class Of 'bg-blue-500' to the badge
 */
iconBadge.mouseenter(function (e) {
    const badge = e.target.closest("div").querySelector(".badge");
    $(badge).addClass("bg-blue-500");
});

/**
 * On Badged Icon Mouse Leave Change Remove Class Of 'bg-blue-500' from the badge
 */
iconBadge.mouseleave(function (e) {
    const badge = e.target.closest("div").querySelector(".badge");
    $(badge).removeClass("bg-blue-500");
});
