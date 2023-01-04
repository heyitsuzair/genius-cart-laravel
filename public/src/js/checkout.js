const paymentMethod = $(".payment-method");
const ccForm = $(".cc-form");

/**
 * On Payment Method Change Check If The Value of the Payment Method Is COD Than hide the "ccForm" else if it is cc than show the 'ccForm'
 */
paymentMethod.on("change", function () {
    if ($(this).val() === "COD") {
        ccForm.hide();
    } else {
        ccForm.show();
    }
});

/**
 * On Submit of the CC Form
 */
