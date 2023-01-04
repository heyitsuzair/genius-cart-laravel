const plusProduct = $(".plus-product-cart");
const minusProduct = $(".minus-product-cart");

/**
 * @plusProduct
 *
 * Add One Quantity When Someone Clicks On Plus ----------->
 * */
$(plusProduct).on("click", (e) => {
    const targetId = e.currentTarget.getAttribute("data-id");

    let newQuantity = parseInt($(".requested-quantity-" + targetId).val());
    let availableQuantity = parseInt(
        $("#" + targetId + "-available-quantity").val()
    );
    let addToCartBtn = $("#" + targetId + "-add-to-cart");

    newQuantity += 1;
    if (newQuantity > availableQuantity) {
        $(addToCartBtn).prop("disabled", true);
        $(addToCartBtn).addClass("btn-disabled");
    }

    $(".requested-quantity-" + targetId).val(newQuantity);
});

/**
 * @minusProduct
 *
 * Subtract One Quantity When Someone Clicks On Minus -------->
 * */
$(minusProduct).on("click", (e) => {
    const targetId = e.currentTarget.getAttribute("data-id");
    let newQuantity = parseInt($(".requested-quantity-" + targetId).val());
    /**
     * ?if(newQuantity === 1)
     *
     * Prevent User From Going In Negative Value
     * */

    if (newQuantity === 1) {
        return;
    }

    let availableQuantity = parseInt(
        $("#" + targetId + "-available-quantity").val()
    );
    let addToCartBtn = $("#" + targetId + "-add-to-cart");

    newQuantity -= 1;
    if (newQuantity <= availableQuantity) {
        $(addToCartBtn).prop("disabled", false);
        $(addToCartBtn).removeClass("btn-disabled");
    }

    $(".requested-quantity-" + targetId).val(newQuantity);
});
