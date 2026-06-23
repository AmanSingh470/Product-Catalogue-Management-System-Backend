import notify from "../../notification.js";

const addCategoryModal = document.getElementById("add-category-modal");

document.addEventListener("click", function (e) {
    if (e.target.closest("#add-category-btn")) {
        addCategoryModal.classList.remove("hidden");
    }
    if (e.target.closest(".close-add-category-modal-btn")) {
        addCategoryModal.classList.add("hidden");
    }
});

const addCategoryForm = document.getElementById("add-category-form");

addCategoryForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    try {
        const response = await fetch("/admin/category/create", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]',
                ).content,
                Accept: "application/json",
            },
            body: formData,
        });

        const data = await response.json();

        if (response.status === 201) {
            addCategoryModal.classList.add("hidden");
            notify({
                type: "success",
                message: data.message,
                timeOut: 4000,
            });
        } else if (response.status === 422) {
            notify({
                type: "warning",
                message: data.message,
                timeOut: 4000,
            });

        } else {
            notify({
                type: "error",
                message: data.message || "Some error occurred.",
                timeOut: 4000,
            });
        }
    } catch (error) {
        notify({
            type: "error",
            message: "Server error. Please try again later.",
            timeOut: 4000,
        });
    }
});
