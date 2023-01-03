const productImages = $(".product-images");
const activeImage = $("#active-image");

$(productImages).click(function (e) {
    /**
     * Set Active Image Source
     */
    activeImage.attr("src", e.target.currentSrc);
});

const plusProduct = $(".plus-product");
const minusProduct = $(".minus-product");
const singleProductQuantity = $("#single_prod_quantity");
const availableQuantity = $("#available_quantity");
const addToCardBtn = $("#add_to_cart");
const buyNowBtn = $("#buy_now");
const addType = $("#addition_type");

let newQuantity = 1;

/**
 * @plusProduct
 *
 * Add One Quantity When Someone Clicks On Plus ----------->
 * */
$(plusProduct).on("click", () => {
    newQuantity += 1;
    if (newQuantity > parseInt($(availableQuantity).val())) {
        $(addToCardBtn).prop("disabled", true);
        $(addToCardBtn).addClass("btn-disabled");
        $(buyNowBtn).prop("disabled", true);
        $(buyNowBtn).addClass("btn-disabled");
    }
    $(singleProductQuantity).val(newQuantity);
});

/**
 * @minusProduct
 *
 * Subtract One Quantity When Someone Clicks On Minus -------->
 * */
$(minusProduct).on("click", () => {
    /**
     * ?if(newQuantity === 1)
     *
     * Prevent User From Going In Negative Value
     * */

    if (newQuantity === 1) {
        return;
    }
    newQuantity -= 1;

    if (newQuantity <= parseInt($(availableQuantity).val())) {
        $(addToCardBtn).prop("disabled", false);
        $(addToCardBtn).removeClass("btn-disabled");
        $(buyNowBtn).prop("disabled", false);
        $(buyNowBtn).removeClass("btn-disabled");
    }

    $(singleProductQuantity).val(newQuantity);
});

/**
 * @buyNowBtn
 */
$(buyNowBtn).on("click", () => {
    $(addType).val("buy");
    $(addType).val() === "buy" && $(addType).closest("form").submit();
});

$(".related-products").owlCarousel({
    mouseDrag: true,
    loop: true,
    dots: false,
    nav: true,
    margin: 20,
    navText: [
        "<i class='fa fa-chevron-left bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full text-2xl'></i>",
        "<i class='fa fa-chevron-right bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full text-2xl'></i>",
    ],
    responsive: {
        0: {
            items: 1,
            stagePadding: 100,
        },
        1000: {
            items: 3,
        },
    },
});
