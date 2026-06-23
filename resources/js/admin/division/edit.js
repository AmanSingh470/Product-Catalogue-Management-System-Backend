import notify from "../../notification.js";

const editDivisionModal = document.getElementById("edit-division-modal");
const editDivisionBtn = document.getElementsByClassName("edit-division-btn");
const editDivisionForm = document.getElementById("edit-division-form");

document.addEventListener("click", async function (e) {
    const editBtn = e.target.closest(".edit-division-btn");

    if (editBtn) {
        const divisionId = editBtn.dataset.id;
        editDivisionForm.dataset.divisionId = divisionId;

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
            console.log(division);

            editDivisionModal.classList.remove("hidden");

            // Populate modal fields
            const nameInput = document.getElementById("edit-division-name");
            nameInput.value = division.name;

            const descriptionInput = document.getElementById("edit-division-description");
            descriptionInput.value = division.description;

            const updatedAtInput = document.getElementById(
                "edit-division-updatedAt",
            );
            updatedAtInput.innerText = division.updated_at;

            const createdAtInput = document.getElementById(
                "edit-division-createdAt",
            );
            createdAtInput.innerText = division.created_at;
        } catch (error) {
            console.error(error);
            alert(error.message);
        }
    }

    if (e.target.closest(".close-edit-division-modal-btn")) {
        editDivisionModal.classList.add("hidden");
    }
});

editDivisionForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const divisionId = this.dataset.divisionId;

    try {
        const response = await fetch(`/admin/division/update/${divisionId}`, {
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
            editDivisionModal.classList.add("hidden");
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
