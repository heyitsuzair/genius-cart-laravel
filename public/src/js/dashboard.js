/**
 * Delete Modal ----------------------------->
 */
const openDeleteModal = $(".open-delete-modal");
const defaultModal = $("#defaultModal");
const actionForm = $(".action-form");
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

/**
 * Delete Modal ----------------------------->
 */

/**
 * Edit Modal ----------------------------->
 */
const openEditModal = $(".open-edit-modal");
const editModal = $("#editModal");
const actionEditForm = $(".action-form-edit");
const actionEditValue = $(".action-value");
const closeEditModal = $(".close-edit-modal");
const actionField = $(".action-field");

/**
 * On Open Delete Modal Add "flex" class to defaultModal and remove "hidden" class from it
 */
openEditModal.on("click", function (e) {
    editModal.removeClass("hidden").addClass("flex");

    /**
     * Get The Data To Set In Form
     */
    const formAction = e.currentTarget.getAttribute("data-action");
    const formActionValue = e.currentTarget.getAttribute("data-id");
    const formFieldName = e.currentTarget.getAttribute("data-name");
    const formFieldValue = e.currentTarget.getAttribute("data-value");

    /**
     * Set The Attributes In Form
     */

    actionEditForm.attr("action", `${formAction}/${formActionValue}`);

    /**
     * Set Attributes In Field
     */

    actionField.attr("name", formFieldName);
    actionField.val(formFieldValue);
});
closeEditModal.on("click", function () {
    editModal.addClass("hidden").removeClass("flex");

    /**
     * Remove Attributes from form
     */
    actionEditForm.attr("action", "");

    actionField.attr("name", "");
    actionField.val("");
});
