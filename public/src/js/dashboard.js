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
 * On Open Edit Modal Add "flex" class to defaultModal and remove "hidden" class from it
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

/**
 * Edit Modal ----------------------------->
 */

/**
 * On Image Upload  ------------------------>
 */
const imageUpload = $(".image-upload");
const imagePreview = $(".image-preview");

imageUpload.on("change", function (e) {
    const files = e.target.files;
    /**
     * Delete all the children of the image preview
     */
    imagePreview.empty();
    /**
     * Iterate over each image
     */
    for (let i = 0; i < files.length; i++) {
        /**
         * Convert the image into base64
         */
        const reader = new FileReader();
        reader.readAsDataURL(files[i]);
        reader.onloadend = () => {
            /**
             * Create A New Div element of 'col-span-3' class
             */

            const div = document.createElement("div");

            div.classList.add("col-span-3");

            /**
             * Create a new image element and add it to image preview children
             */

            const image = document.createElement("img");
            /**
             * Set the image source to base64 result
             */

            image.src = reader.result;
            /**
             * Add the "w-full h-20" class to the image element
             */

            image.classList.add("w-full", "h-28", "rounded-md", "object-cover");

            /**
             * Append the image element to the div
             */

            div.append(image);

            /**
             * Append the div element to the image preview children
             */
            imagePreview.append(div);
        };
    }
});

const anchorSelect = $(".anchor-select");
/**
 * ?pageHandler()
 *
 * Change Page OnChange Select Value Change */
anchorSelect.on("change", (e) => {
    window.location.assign(`/dashboard?route=orders&status=${e.target.value}`);
});
