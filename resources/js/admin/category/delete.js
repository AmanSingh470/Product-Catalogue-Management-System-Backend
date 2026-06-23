import notify from "../../notification.js";

const deleteCategoryModal = document.getElementById("delete-category-modal");
const deleteCategoryForm = document.getElementById("delete-category-form");

document.addEventListener("click", async function (e) {
    const deleteBtn = e.target.closest(".delete-category-btn");

    if (deleteBtn) {
        const categoryId = deleteBtn.dataset.id;

        deleteCategoryForm.dataset.categoryId = categoryId;
        console.log("working");
        
        try {
            const response = await fetch(`/admin/category/${categoryId}`, {
                method: "GET",
                headers: {
                    Accept: "application/json",
                },
            });

            if (response.status === 404) {
                throw new Error("Category not found");
            }

            if (!response.ok) {
                throw new Error(
                    `Request failed with status ${response.status}`,
                );
            }

            const category = await response.json();

            deleteCategoryModal.classList.remove("hidden");

            // Populate modal fields
            const nameInput = document.getElementById("delete-category-name");
            nameInput.innerText = category.name;

            const updatedAtInput = document.getElementById("delete-category-updatedAt");
            updatedAtInput.innerText = category.updated_at;
        } catch (error) {
            console.error(error);
            alert(error.message);
        }
    }

    if (e.target.closest(".close-delete-modal-btn")) {
        deleteCategoryModal.classList.add("hidden");
    }
});

deleteCategoryForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const categoryId = this.dataset.categoryId;

    try {
        const response = await fetch(`/admin/category/delete/${categoryId}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]',
                ).content,
                Accept: "application/json",
            },
        });

        const data = await response.json();

        if (response.status === 200) {
            deleteCategoryModal.classList.add("hidden");

            notify({
                type: "success",
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
        console.error(error);

        notify({
            type: "error",
            message: "Server error. Please try again later.",
            timeOut: 4000,
        });
    }
});
