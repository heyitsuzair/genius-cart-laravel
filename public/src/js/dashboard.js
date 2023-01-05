const openDeleteModal = $(".open-delete-modal");
const defaultModal = $("#defaultModal");
const actionForm = $(".action-form");
const actionValue = $(".action-value");
const closeModal = $(".close-modal");

/**
 * On Open Delete Modal Add "flex" class to defaultModal and remove "hidden" class from it
 */
openDeleteModal.on("click", function (e) {
    defaultModal.removeClass("hidden").addClass("flex");

    /**
     * Get The Data To Set In Form
     */
    const formAction = e.currentTarget.getAttribute("data-action");
    const formActionValue = e.currentTarget.getAttribute("data-id");
    const formActionName = e.currentTarget.getAttribute("data-name");

    /**
     * Set The Attributes In Form
     */

    actionValue.attr("name", formActionName);
    actionValue.val(formActionValue);
    actionForm.attr("action", formAction);
});
closeModal.on("click", function () {
    defaultModal.addClass("hidden").removeClass("flex");

    /**
     * Remove Attributes from form
     */
    actionValue.attr("name", "");
    actionValue.val("");
    actionForm.attr("action", "");
});

/**
 * On Close Delete Modal Remove "flex" class from defaultModal and add "hidden" class to it
 */
