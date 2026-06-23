import notify from "../../notification.js";

const editProductModal = document.getElementById("edit-product-modal");
const editProductBtn = document.getElementsByClassName("edit-product-btn");
const editProductForm = document.getElementById("edit-product-form");

document.addEventListener("click", async function (e) {
    
    const editBtn = e.target.closest(".edit-product-btn");

    if (editBtn) {
        const productId = window.location.pathname.split('/').pop();
        try {
            const response = await fetch(`/admin/product/detail/data/${productId}`, {
                method: "GET",
                headers: {
                    Accept: "application/json",
                },
            });

            if (response.status === 404) {
                throw new Error("Product not found");
            }

            if (!response.ok) {
                throw new Error(
                    `Request failed with status ${response.status}`,
                );
            }

            const product = await response.json();
            console.log(product);

            editProductModal.classList.remove("hidden");

            // Populate modal fields
            const titleInput = document.getElementById("edit-product-title");
            titleInput.value = product.title;

            const descriptionInput = document.getElementById("edit-product-description");
            descriptionInput.value = product.description;

            const categoryInput = document.getElementById("edit-product-category");
            categoryInput.value = product.category.id;

            const segmentInput = document.getElementById("edit-product-segment");
            segmentInput.value = product.segment.id;

            const divisionInput = document.getElementById("edit-product-division");
            divisionInput.value = product.division.id;

            const companyInput = document.getElementById("edit-product-company");
            companyInput.value = product.company.id;

            const statusInput = document.getElementById("edit-product-status");
            statusInput.value = product.status;

            const updatedAtInput = document.getElementById("edit-product-updatedAt");
            updatedAtInput.innerText = product.updated_at;

            const createdAtInput = document.getElementById("edit-product-createdAt");
            createdAtInput.innerText = product.created_at;

        } catch (error) {
            console.error(error);
            alert(error.message);
        }
    }

    if (e.target.closest(".close-edit-product-modal-btn")) {
        editProductModal.classList.add("hidden");
    }
});

editProductForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const productId = this.dataset.productId;

    try {
        const response = await fetch(`/admin/product/update/${productId}`, {
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
            editProductModal.classList.add("hidden");
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
        console.log(error);

        notify({
            type: "error",
            message: "Server error. Please try again later.",
            timeOut: 4000,
        });
    }
});
