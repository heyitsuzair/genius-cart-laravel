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

    /**
     * Set The Attributes In Form
     */

    actionForm.attr("action", `${formAction}/${formActionValue}`);
});
closeModal.on("click", function () {
    defaultModal.addClass("hidden").removeClass("flex");

    /**
     * Remove Attributes from form
     */
    actionForm.attr("action", "");
});

/**
 * On Close Delete Modal Remove "flex" class from defaultModal and add "hidden" class to it
 */
