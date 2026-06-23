import notify from "../../notification.js";

const deleteCategoryModal = document.getElementById("delete-division-modal");
const deleteCategoryForm = document.getElementById("delete-division-form");

document.addEventListener("click", async function (e) {
    const deleteBtn = e.target.closest(".delete-division-btn");

    if (deleteBtn) {
        const divisionId = deleteBtn.dataset.id;

        deleteCategoryForm.dataset.divisionId = divisionId;
        console.log("working");
        
        try {
            const response = await fetch(`/admin/division/${divisionId}`, {
                method: "GET",
                headers: {
                    Accept: "application/json",
                },
            });

            if (response.status === 404) {
                throw new Error("Division not found");
            }

            if (!response.ok) {
                throw new Error(
                    `Request failed with status ${response.status}`,
                );
            }

            const division = await response.json();

            deleteCategoryModal.classList.remove("hidden");

            // Populate modal fields
            const nameInput = document.getElementById("delete-division-name");
            nameInput.innerText = division.name;

            const descriptionInput = document.getElementById("delete-division-description");
            descriptionInput.innerText = division.description;

            const updatedAtInput = document.getElementById("delete-division-updatedAt");
            updatedAtInput.innerText = division.updated_at;
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

    const divisionId = this.dataset.divisionId;

    try {
        const response = await fetch(`/admin/division/delete/${divisionId}`, {
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
