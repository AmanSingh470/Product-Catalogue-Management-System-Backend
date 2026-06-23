import notify from "../../notification.js";

const editCategoryModal = document.getElementById('edit-category-modal');
const editCategoryBtn = document.getElementsByClassName('edit-category-btn');
const editCategoryForm = document.getElementById("edit-category-form");

document.addEventListener('click', async function (e) {

    const editBtn = e.target.closest('.edit-category-btn');

    if (editBtn) {
        const categoryId = editBtn.dataset.id;

        editCategoryForm.dataset.categoryId = categoryId;

        try {

            const response = await fetch(`/admin/category/${categoryId}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json'
                }
            });

            if (response.status === 404) {
                throw new Error('Category not found');
            }

            if (!response.ok) {
                throw new Error(`Request failed with status ${response.status}`);
            }

            const category = await response.json();

            console.log(category);

            editCategoryModal.classList.remove('hidden');

            // Populate modal fields
            const nameInput = document.getElementById("edit-category-name");
            nameInput.value = category.name;

            const updatedAtInput = document.getElementById("edit-category-updatedAt");
            updatedAtInput.innerText = category.updated_at;

            const createdAtInput = document.getElementById("edit-category-createdAt");
            createdAtInput.innerText = category.created_at;
        } catch (error) {
            console.error(error);
            alert(error.message);
        }
    }

    if (e.target.closest('.close-edit-category-modal-btn')) {
        editCategoryModal.classList.add('hidden');
    }
});

editCategoryForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    
    const categoryId = this.dataset.categoryId;

    try {
        const response = await fetch(`/admin/category/update/${categoryId}`, {
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
            editCategoryModal.classList.add("hidden");
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

        } 
        else {
            notify({
                type: "error",
                message: data.message || "Some error occurred.",
                timeOut: 4000,
            });
        }
    } catch (error) {
        console.log(error);
        
        notify({
            type: "error",
            message: "Server error. Please try again later.",
            timeOut: 4000,
        });
    }
});
