const plusProduct = $(".plus-product");
const minusProduct = $(".minus-product");
const singleProductQuantity = $("#single_prod_quantity");
const availableQuantity = $("#available_quantity");
const addToCardBtn = $("#add_to_cart");
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
    }

    $(singleProductQuantity).val(newQuantity);
});
